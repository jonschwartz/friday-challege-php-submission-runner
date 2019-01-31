<?php
/**
 * It's been well established by past challenges that elephpants love counting.
 * One of the things that frequently trips them up is when there's a nice long
 * sequence of rising numbers (they love that, see last week's challenge) but then
 * *boop* there's one missing.
 *
 * This week's challenge is to find which number in an array of numbers is missing.
 *
 * caveats:
 *  - only one number per sequence will be missing.
 *  - The whole element will be gone, not leaving an empty element in the array.
 *  - numbers will all be integers
 *  - the range will always start at 1, the end number will change every time you run the test
 *  - the last number in the range will not be the one removed
 *
 * Good luck!
 */

$missingNumber = function(array $input) : int {
  $actualTotal = array_sum($input);
  $expectedTotal = array_sum(range(1, max($input)));
  $removed_number = $expectedTotal-$actualTotal - 1;

  echo $removed_number;
  return $removed_number;
};

function test(callable $function) {

  $max_number = rand(50, 200);
  $remove_number = rand(1, $max_number-1);
  $test_array = range(1, $max_number);

  echo $remove_number."\n";
  unset($test_array[$remove_number]);


  $passed = true;

  if ($function($test_array) !== $remove_number) {
    $passed = false;
  }
  return $passed;
}

test($missingNumber);