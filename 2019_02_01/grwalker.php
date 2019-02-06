<?php
return function(array $queues) : array {
  array_unshift($queues, null);
  $big_queue = array_values(array_filter(array_merge(...array_map(...$queues))));
  return $big_queue;
};