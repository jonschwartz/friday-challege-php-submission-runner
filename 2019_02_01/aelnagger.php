<?php
return function(array $queues) : array {
  $big_queue = [];
  do {
    $processing = false;
    foreach($queues as &$queue) {
      if(!empty($queue)){
        $processing = true;
        $big_queue[] = array_shift($queue);
      }
    }
  } while($processing);
  return $big_queue;
};