<?php

function test(Callable $function) : bool {
  $expected = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];

  $test_data = array_merge($expected, str_split('GazoinksBo! Heres some random characters.  Feel free to throw this all out.'));
  shuffle($test_data);

  $result = $function($test_data);

  if ($expected == $result) {
    return true;
  }
  return false;
}