<?php
/**
 * Elephpants are very weight conscious.
 *
 * Despite their larger mass compared to other office creatures, they like to keep in relative shape.
 *
 * This week's challenge involves balancing scales.
 *
 * Given an input array, your code should output a balanced set of arrays.
 *
 * What does balanced mean?  both sum of elements and count of elements should be the same on both output arrays.
 *
 * e.g.
 *   given  [0,2,3,4,5,6]
 *   output [[2,3,5],[0,4,6]]
 *
 * Elements should not be repeated.  Your solution should be able to generalize past the test cases.
 *
 * Also, you can assume whatever your code is fed *can* be balanced.
 *
 * Bonus points for using as many array library functions as possible (e.g. array_merge, array_diff, etc).
 *
 * More Bonus points for preserving original element order within each balanced side
 */

function test($function) {
  $test_cases = array(
      '[0, 2, 3, 4, 5, 6]'         => array('in' => [0, 2, 3, 4, 5, 6], 'out' => [[2, 3, 5], [0, 4, 6]]),
      '[36, 24, 8, 2, 10, 4]' => array('in' => [36, 24, 8, 2, 10, 4], 'out' => [[36, 2, 4], [24, 8, 10]]),
  );
  $results    = array();

  $passed = true;
  foreach ($test_cases as $test_name => $test) {
    $actual = $function($test['in']);


    if ((
        (count(array_diff($actual[0], $test['out'][0])) == 0) ||
        (count(array_diff($actual[0], $test['out'][1])) == 0)) && (array_sum($actual[0]) == array_sum($test['out'][0]))) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] =
          'Failed.  '. "\n\t\t\t".'Expected: ' . join(', ', $test['out'][0]) . ' Got: ' . join(', ', $actual[0]) . "\n\t\t\t" .
          'Expected: ' . join(', ', $test['out'][1]) . ' Got: ' . join(', ', $actual[1]);
      $passed              = false;
    }
  }

  if (!($passed)) {
    foreach ($results as $test_name => $result) {
      echo $test_name . "\t" . $result . "\n";
    }
  }
  return $passed;
}

/**
 * No winner because of no entrants.  Interesting comment from @grwalker
 * Greg Walker:
    I feel like the solution for that that I've encountered is:
    - count the total/2, there you have a target to reach `O(n)`
    - then build an algorithm to find a sum based on a list of inputs with extras in it (which can somewhat be like a recursive binary search for most of it, after you sort the list `O(n log(n))`) `O(n log(n)) again?`
    - so `O(n log(n))` overall
 */