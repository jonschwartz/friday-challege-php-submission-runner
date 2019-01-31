<?php
return function(array $input) : int {
  $removed_number = 0;
  $last = end($input);
  $expected_sum = ($last * (1 + $last)) / 2;
  $actual_sum = array_sum($input);
  $removed_number = $expected_sum - $actual_sum;
  return $removed_number;
};