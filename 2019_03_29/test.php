<?php

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
          'Caroline' => 15
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

//  print_r($result);
  return ($result == $expected);
}