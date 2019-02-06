<?php
return function(array $queues) : array {
  $big_queue = [];
  $index = 0;
  while (true) {
    $has_found = false;
    foreach ($queues as $queue) {
      if (isset($queue[$index])) {
        $big_queue[] = $queue[$index];
        $has_found = true;
      }
    }
    if (!$has_found) {
      break;
    }
    $index++;
  }
  return $big_queue;
};