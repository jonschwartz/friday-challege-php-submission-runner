<?php

function test(callable $function) {

  $passed = true;

  for ($x = 0; $x < 5; $x++) {
    $max_number    = rand(50, 200);
    $remove_number = rand(1, $max_number);
    $test_array    = range(1, $max_number);

    unset($test_array[$remove_number-1]);

    if ($function($test_array) !== $remove_number) {
      echo $function($test_array)."\t".$remove_number."\n";
      $passed = false;
    }
  }
  return $passed;
}
