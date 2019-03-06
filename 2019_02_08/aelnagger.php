<?php
return function(array $input_names) : array {
  $formatted_names = array_map(
      function($name) {
        $parts = explode(' ', $name);

        // Do we have a fancy title?
        if (stripos($parts[0], '.')) {
          array_shift($parts);
        }

        $last = array_pop($parts);
        $first = implode(' ', $parts);

        return "${last}, ${first}";
      },
      $input_names
  );
  sort($formatted_names);
  return $formatted_names;
};