<?php

function test(callable $function) {

  $queues = [
      [1,2,3,4,5],
      ['a', 'b', 'c', 'd'],
      ['aa', 'ab', 'ac', 'ad', 'ae'],
      ['1B', 'DI', 'UR', 'Gr8']
  ];
  $final_queue = [1,'a', 'aa', '1B', 2, 'b', 'ab', 'DI', 3, 'c', 'ac', 'UR', 4, 'd', 'ad', 'Gr8', 5, 'ae'];

  $passed = true;

  $big_queue = $function($queues);

  if (count(array_diff($final_queue, $big_queue)) != 0) {
    $passed = false;
  }

  if ($big_queue !== $final_queue) {
    $passed = false;
  }

  return $passed;
}
