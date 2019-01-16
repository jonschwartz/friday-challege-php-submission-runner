<?php
/**
 * Elephpants love to use parenthesis but hate syntax errors.
 * Unfortunately, they are stuck using a basic text editor for
 * writing code over their holiday break so they can't rely on
 * their awesome IDE and it's tricks for highlighting syntax
 * errors.
 *
 * So, they need you to re-write some of the functionality
 * they've become accustomed to in their IDE to do a check
 * before they can commit.  Your challenge this week is to
 * check the number and orientation of the elephpant's
 * parenthesis.  Your code should return true if the paren
 * pairs match (a match is both number of open and close parens
 * and also an open comes before a corresponding close).
 * For a mismatch it should return an array of false and say either:
 * 'parenthesis count mismatch'
 * or
 * 'parenthesis order mismatch'
 *
 * as a message as the second item in the array
 *
 * e.g. [false, 'parenthesis order mismatch'].
 *
 * If it can fit both scenarios, return the one that is
 * encountered first.
 * e.g. ')((' yields [false, 'parenthesis order mismatch']
 *
 * Bonus points:
 *  - using no loops
 *  - implementing more syntax checks
 *  - using a plain text editor to write your code (this one is on the honor system)
 */


function test(callable $function) {
  $tests = [
      'test from the challenge' => [[0,1,2,3,2,3,4,1,2], [0,1,2,3]],
      'starts on the highest number' => [[100,1,2,3,2,3,1,2], [1,2,3]],
      'repeating number included' => [[1,2,3,2,3,3,1,2], [1,2,3]],
      'starts on the highest number, repeating number included' => [[100,1,2,3,2,3,3,1,2], [1,2,3]],
      'reverse order' => [[3,2,1], [3]],
  ];

  $passed = true;
  foreach ($tests as $name => $test) {
    if ($function($test[0]) !== $test[1]) {
      $passed = false;
    }
  }
  return $passed;
}
