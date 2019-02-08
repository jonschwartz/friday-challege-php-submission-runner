<?php
/**
 * A group of Javascript Birds has taken a group of Elephpants prisoner!  The elephpants are lined up
 * in a row such that the ones behind can see everyone else in front of them.  On top of each
 * elephpant's head stands either a black javascript bird or a white javascript bird.  There are a
 * random number of each bird.  The birds have told the elephpants that they must say the color of
 * the bird standing on their head or they will be pecked.  The elephpants have a small time to talk
 * before the pecking begins.  They aren't allowed to say what bird is on anyone's head, just talk
 * strategy.  The pecking order goes from back of the line forward (remember, the person at the back
 * can see everyone in front of them).  When each elephpant names their color, they can't do anything
 * other than name white or black in as flat a tone as possible without increasing their volume.
 *
 * Using these parameters, this week's challenge is to find a strategy which results in the least number
 * of heads to pecked.
 *
 * caveats:
 *  - as stated above, there are a random number of blacks and whites adding up
 *  to the total number of elephpants
 *
 *  - for our challenge, the front of the line is the front of the array
 *
 *  - for this challenge, there is no failing the test (unless all elephpants get pecked.  I'll be
 *  pretty impressed if you can reliably get each elephpant to guess wrong without doing a * -1 or something)
 *
 *  - 1 = black 2 = white
 *
 *  - $guesses should not just return $input even though that would result in 100% unpecked rate.
 *
 * Good luck!
 */

$pecking_order = function(array $input) : array {
  $guesses = [];

  $reversed = array_reverse($input);

  // white is odd
  // black is even

  foreach ($reversed as $elephpant) {
    $last = array_shift($reversed);

    $counts = array_count_values($reversed);
    if ((count($reversed) % 2 == 0) && ($counts[1] < $counts[2])) {
      $guesses[] = 1;
    } else {
      $guesses[] = 2;
    }
  }

//  foreach ($reversed as $elephpant) {
//    $guesses[] = rand(1,2);
//  }
//
//  foreach ($reversed as $elephpant) {
//    $last = array_shift($reversed);
//    $counts = array_count_values($reversed);
//
//    $guesses[] = ($counts[1] > $counts[2] ? 1 : 2);
//
//  }

  $guesses = array_reverse($guesses);

  return $guesses;
};

function test(callable $function) {

  $number_of_elephpants = 50;

  $black_birds = rand(1, $number_of_elephpants);
  $white_birds = $number_of_elephpants - $black_birds;

  $elephpants = array_merge(array_fill(0, $black_birds, 1), array_fill(0, $white_birds, 2));
  shuffle($elephpants);

  $passed = true;

  $guesses = $function($elephpants);

  $wrong_guesses = array_diff_assoc($elephpants, $guesses);

  $num_correct = $number_of_elephpants - count($wrong_guesses);

  foreach ($wrong_guesses as $guess) {
    echo $guess.' ';
  }
  echo "\n";
  foreach ($guesses as $guess) {
    echo $guess.' ';
  }
  echo "\n";
  foreach ($elephpants as $elephpant) {
    echo $elephpant.' ';
  }
  echo "\n\n";

  echo 'You saved ' . $num_correct . ' out of ' . $number_of_elephpants . ' elephpants from being pecked.  That\'s ' . ($num_correct / $number_of_elephpants) * 100 . '% saved!';

  return $passed;
}

test($pecking_order);