<?php

function test(Callable $function) : bool {
  $input_names = [
      'Kevin McFizzlebottom',
      'Suzie Quiznos',
      'Mary Jane Spiderman',
      'Shauna Malwae-Tweep',
      'Janet Snakehole',
      'Burt Macklin',
      'Johnny Karate',
      'Isanyone Readingthis',
      'Dr. Richard Nygard',
      'Duke Silver',
      'Kay Razzy',
      'Prof. Charles Xavier'
  ];
  $expected_flipped_names = [
      'McFizzlebottom, Kevin',
      'Quiznos, Suzie',
      'Spiderman, Mary Jane',
      'Malwae-Tweep, Shauna',
      'Snakehole, Janet',
      'Macklin, Burt',
      'Karate, Johnny',
      'Readingthis, Isanyone',
      'Nygard, Richard',
      'Silver, Duke',
      'Razzy, Kay',
      'Xavier, Charles'
  ];

  $flipped_names = $function($input_names);

  if ((count(array_diff($expected_flipped_names, $flipped_names)) == 0) && (count(array_diff($flipped_names, $expected_flipped_names)) == 0)) {

    sort($expected_flipped_names);
    if ($expected_flipped_names === $flipped_names) {
      echo "\n\t".'Bonus Points for alphabetized names!'."\n";
    }
    return true;
  }
  return false;
}