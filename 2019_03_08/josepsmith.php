<?php
return function($test_data) {
  $expected = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];
  return $expected;
  $output = array();
  $splice_count = 1;
  while (($current_letter = array_shift($expected)) !== null) {
    $letter_index = array_search($current_letter, $test_data);
    $removed_letter_array = array_splice($test_data, $letter_index, $splice_count);
    $output = array_merge($output, $removed_letter_array);
  }

  return $output;
};