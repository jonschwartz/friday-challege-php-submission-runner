<?php
/**
 * Suzi Elephpant has to visit all her teammates' desks.  She doesn't want to spend all day going to each desk so she wants to know the optimal path for the journey (then she can send out meeting invites).
 *
 * This week's challenge is the traveling salesman problem.  You'll have to figure out the most optimal path to visit each of Suzi's teammates in the least number of steps.
 *
 * Caveats:
 *  - The path always starts at her desk and ends when she's visited each teammate once
 *  - You should return the path suzi should take according to your algorithm
 *  - You shouldn't visit the same teammate twice (Suzi can go back to her desk if she wants, but be sure to return that in your path)
 *  - paths have the same weight in either direction
 *  - not every path must be used
 *  - The path map test data (in case it's not clear) is a list of weights from the 'key' person to each 'element key' person they can travel to.
 *
 * Good Luck!
 */

$function = function($testData) {
  // YOUR CODE GOES HERE
};

function test(Callable $function) : bool {
  $pathMap = [
      'Suzi' => [
          'Kevin' => 10,
          'Peter' => 8,
          'Caroline' => 15,
          'Katie' => 2
      ],
      'Kevin' => [
          'Suzi' => 10,
          'Peter' => 15,
          'Katie' => 13
      ],
      'Katie' => [
          'Suzi' => 2,
          'Kevin' => 13,
          'Caroline' => 6
      ],
      'Peter' => [
          'Suzi' => 8,
          'Kevin' => 15,
          'Caroline' => 7
      ],
      'Caroline' => [
          'Suzi' => 15,
          'Katie' => 6,
          'Peter' => 7
      ]
  ];
  $expected = ['Suzi', 'Katie', 'Caroline', 'Peter', 'Kevin'];
  $result = $function($pathMap);
  return ($result == $expected);
}

test($function);