<?php

/**
 *
 * Elephpants speak elephpant (or php).
 * Humans speak human languages such as English.
 *
 * The elephpants need a way to translate their words from
 * their native tongue to our's (which, for this challenge, is English)
 *
 * your code should:
 *  1) take in a random string in Elephpant
 *  2) translate that code to English
 *  3) output it
 *
 * Examples of Elephpant to English include:
 *
 * 1) Hphpow dphpo yphpophpu dphpo? -> How do you do?
 * 2) Elphpephpphpants lphpikphpe tphpo wrphpitphpe gphpophpod cphpodphpe. -> Elephpants like to write good code.
 * 3) PHP sphpure is a hphpandy lphpangphpuphpagphpe! -> PHP sure is a handy language!
 * 4) Elphpephphpants lphpovphpe Elphpephpphpants and PHP -> Elephants love Elephpants and PHP
 *
 * Caveats:
 *  You may have noticed, PHP is a valid word in Elephpant.  Be sure to watch out for that.
 *  Elephant is also a valid word in Elephpant.
 *
 * Bonus points if you translate to another language
 *  (ps I won't know how to speak that language since I know English and Bad English)
 *
 * More Bonus points for no loops.
 *
 * Extra More Bonus points from Sticker Clause.... you get those ones for free.
 */

test(
    function ($input) {

      $phps   = ['php', 'PHP'];
      $vowels = ['a', 'e', 'i', 'o', 'u', 'y'];

      $replace = [];
      foreach ($phps as $php) {
        foreach ($vowels as $vowel) {
          $replace[] = ['php' => $php . $vowel, 'vowel' => $vowel];
        }
      }


      return str_replace(array_column($replace, 'php'), array_column($replace, 'vowel'), $input);
    }
);

function test($function) {
  $test_cases = array(
      'How do you do?'                      => array(
          'in' => 'Hphpow dphpo yphpophpu dphpo?', 'out' => 'How do you do?'
      ),
      'Elephpants like to write good code.' => array(
          'in'  => 'Elphpephpphpants lphpikphpe tphpo wrphpitphpe gphpophpod cphpodphpe.',
          'out' => 'Elephpants like to write good code.'
      ),
      'PHP sure is a handy language!'       => array(
          'in'  => 'PHP sphpure is a hphpandy lphpangphpuphpagphpe!',
          'out' => 'PHP sure is a handy language!'
      ),
      'Elephants love Elephpants and PHP'   => array(
          'in'  => 'Elphpephphpants lphpovphpe Elphpephpphpants and PHP',
          'out' => 'Elephants love Elephpants and PHP'
      ),
  );
  $results    = array();

  $passed = true;
  foreach ($test_cases as $test_name => $test) {
    $actual = $function($test['in']);

    if ($actual === $test['out']) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] = 'Failed.  Expected: ' . $test['out'] . ' Got: ' . $actual;
      $passed              = false;
    }
  }

  //  if (!($passed)) {
  foreach ($results as $test_name => $result) {
    echo $test_name . "\t" . $result . "\n";
  }

  //  }
  return $passed;
}