<?php
/**
 * Sometimes, elephpants have many different lists of things coming at them at once.
 * They can only do one thing at a time so even though there are many different queues
 * coming in, they have to process it as one big queue.  The only way to be fair
 * in this process is to do one thing from each queue before moving on to the next.
 * Each queue gets processed a bit slower, but more fairly.
 *
 * So, for this week's challenge, you must take in an NxM array of queues
 * (where N is the number of queues and M is the number of things in each queue)
 * and combine them into one big super queue in the fairest way possible.
 *
 * Good Luck!
 *
 * Caveats:
 *  - Queues may not be of the same size.  When one queue runs out, you don't need to pick
 *    a thing from it.
 *  - You don't have to do anything with the thing except order it.  Don't worry about thing
 *    validation.  If an element exists, it's something for the elephpants to do.
 */

$big_queue = function(array $queues) : array {
  $big_queue = [];
  //YOUR CODE HERE
  return $big_queue;
};

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
    echo 'Elements missing'."\n";
  }

  if ($big_queue !== $final_queue) {
    $passed = false;
    echo 'Order incorrect'."\n";
  }

  return $passed;
}

test($big_queue);