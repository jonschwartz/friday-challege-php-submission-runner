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

test();

function Scales($inputArr) {

  $half1 = array_slice($inputArr, 0, floor(count($inputArr) / 2));
  $half2 = array_slice($inputArr, floor(count($inputArr) / 2));

  do {
    $difference = array_sum($half1) - array_sum($half2);
    $diffElement = floor($difference / 2);
    if ($difference > 1) {
      echo '1'."\n";
      if ($key = array_search($diffElement, $half1) !== false) {
        // remove the element from half1, put it in half2... do the opposite for half2 below
        $half1 = array_diff($half1, [$diffElement]);
        array_push($half2, $diffElement);
      } else {
        echo "5\n";
        chaos_monkey($half1, $half2);
      }
    } elseif ($difference < 1) {
      echo '2'."\n";
      $diffElement = $diffElement * -1;
      if ($key = array_search($diffElement, $half2) !== false) {
        $half2 = array_diff($half2, [$diffElement]);
        array_push($half1, $diffElement);
        // remove the element from half2, put it in half1
      } else {
        echo "5\n";
        chaos_monkey($half1, $half2);
      }
    }

    if ((count($half1) == count($half2)) && (array_sum($half1) == array_sum($half2))){
      echo '3'."\n";
      echo join(', ', $half1)."\n".join(', ', $half2)."\n\n";
      return [$half1, $half2];
    }

    echo join(', ', $half1)."\n".join(', ', $half2)."\n\n";
    $hi = readline('.');
  } while ($difference != 0);

}

function test() {
  $test_cases = array(
      '[0, 2, 3, 4, 5, 6]'         => array('in' => [0, 2, 3, 4, 5, 6], 'out' => [[2, 3, 5], [0, 4, 6]]),
      '[36, 24, 8, 2, 10, 4]' => array('in' => [36, 24, 8, 2, 10, 4], 'out' => [[36, 2, 4], [24, 8, 10]]),
  );
  $results    = array();

  $passed = true;
  foreach ($test_cases as $test_name => $test) {
    $actual = Scales($test['in']);


    if (((count(array_diff($actual[0], $test['out'][0])) == 0) ||
        (count(array_diff($actual[0], $test['out'][1])) == 0)) && (array_sum($actual[0]) == array_sum($test['out'][0]))) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] =
          'Failed.  '. "\n\t\t\t".'Expected: ' . join(', ', $test['out'][0]) . ' Got: ' . join(', ', $actual[0]) . "\n\t\t\t" .
          'Expected: ' . join(', ', $test['out'][1]) . ' Got: ' . join(', ', $actual[1]);
      $passed              = false;
    }
  }

  foreach ($results as $test_name => $result) {
    echo $test_name . "\t" . $result . "\n";
  }

  return $passed;
}

function chaos_monkey(&$half1, &$half2) {
  if (count($half2) > count($half1)) {
    array_unshift($half1, array_shift($half2));
  } else {
    array_unshift($half2, array_shift($half1));
  }
}