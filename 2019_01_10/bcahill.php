<?php
return function(array $input) : array {
  $longest_start_pos = 0;
  $longest_length = 0;
  $current_length = 1;
  for ($i = 1; $i < count($input); $i++) {
    // Either increment or reset
    if ($input[$i] <= $input[$i - 1] || $i == count($input)) {
      // Reset the count, but first, check if we just set a new record
      if ($current_length > $longest_length) {
        $longest_start_pos = $i - $current_length;
        $longest_length = $current_length;
      }
      $current_length = 1;
    } else {
      $current_length++;
    }
  }
  return array_slice($input, $longest_start_pos, $longest_length);
};