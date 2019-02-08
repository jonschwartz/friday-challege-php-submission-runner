<?php
/**
 * The elephpants are building a robot to navigate the office.
 * They want the robot to be able to get from their desk to the
 * kitchen to grab them a snack.  The robots have limited
 * battery power and also the elephpants are hungry so time is
 * of the essence!
 *
 * Your challenge this week is to build an algorithm that gets
 * the robots from the Elephpant's desk to the kitchen in the
 * least amount of steps.
 *
 * Caveats:
 *  - The map will be presented as an NxN array (so, always a square)
 *  - Walls or obstacles will be marked as an *
 *  - kitchen is marked with a K
 *  - desk is marked with a D
 *  - open paths in the map will be empty
 *  - there will always be a clear path from the desk to the kitchen
 *  - path should be returned as an Jx2 array
 */

$navigate = function(array $map) : array {
  $path = [];
  // YOUR CODE GOES HERE
  return $path;
};

function test(Callable $function) {
  $map = [
      ['','K','*','',''],
      ['','*','*','','',],
      ['','*','','','',],
      ['','*','','D','',],
      ['','','','','',]
  ];

  $path = $function($map);

  echo count($path).' steps returned.';

}