<?php
/**
 * The elephpants are getting ready to run a meetup of BostonPHP
 * (hosted monthly here at Wayfair, hit up @bcahill for more info)
 * and they need to provide a list of people coming from outside
 * the company to the security desk in the sky lobby.
 *
 * People have RSVP'd on Meetup.com.  When the list of people
 * was printed out, it was in {First Name} {Last Name} Order (mostly).
 *
 * Security has requested the list to be in {Last Name}, {First Name} order.
 * (e.g. Kevin Smith -> Smith, Kevin)
 *
 * Your challenge this week is to take the list as it was provided
 * from meetup.com and translate it to what Security has requested.
 *
 * p.s. Yes we may use this code next time this happens in real life.
 *
 * Caveats:
 *  - first names may be more than one actual name
 *  - For these purposes, last names will only be one name or be hyphenated.
 *  - names may be abbreviated
 *  - People may have submitted their title in front of their name, feel free to drop those
 *  - There will be at least one first name and at least one last name for each person
 *
 * Bonus points:
 *  - your code can handle multi name first names AND multi name last names.
 *  - you alphabetize the list of names by last name
 *
 * Good Luck!
 */

$switch_names = function(array $input_names) : array {
  $formatted_names = [];
  // YOUR CODE GOES HERE
  return $formatted_names;
};

function test(Callable $function) : bool {
  $input_names = [
      'Kevin McFizzlebottom',
      'Suzie Quiznos',
      'Mary Jane Spiderman',
      'Shauna Malwae-Tweep',
      'Janet Snakehole',
      'Burt Macklin',
      'Johnny Karate',
      'Isanyone Readingthis',
      'Dr. Richard Nygard',
      'Duke Silver',
      'Kay Razzy',
      'Prof. Charles Xavier'
  ];
  $expected_flipped_names = [
      'McFizzlebottom, Kevin',
      'Quiznos, Suzie',
      'Spiderman, Mary Jane',
      'Malwae-Tweep, Shauna',
      'Snakehole, Janet',
      'Macklin, Burt',
      'Karate, Johnny',
      'Readingthis, Isanyone',
      'Nygard, Richard',
      'Silver, Duke',
      'Razzy, Kay',
      'Xavier, Charles'
  ];

  $flipped_names = $function($input_names);

  if ((count(array_diff($expected_flipped_names, $flipped_names)) == 0) && (count(array_diff($flipped_names, $expected_flipped_names)) == 0)) {

    sort($expected_flipped_names);
    if ($expected_flipped_names === $flipped_names) {
      echo "\n\t".'Bonus Points for alphabetized names!'."\n";
    }
    return true;
  }
  return false;
}

test($switch_names);