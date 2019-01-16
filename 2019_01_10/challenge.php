<?php
/**
 * Elephpants like counting up.  If they see a set of integers,
 * they want to see a nice upward sequence in them.
 *
 * They only get upset when the sequence ends and they have to
 * start looking for upward trending numbers over again.
 *
 * In this week's challenge, your task is to find the longest
 * consecutive set of increasing numbers in any given array of
 * integers.
 *
 * e.g. given [0,1,2,3,2,3,4,1,2] you should return [0,1,2,3]
 *
 * caveats:
 *  - numbers can repeat (repeated numbers do not increase and therefore should reset the trend)
 *  - numbers will all be integers
 *
 * Good luck!
 */

$counting = function(array $input) : array {
  //YOUR CODE HERE
  return [];
};

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

test($counting);