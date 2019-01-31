<?php
return function(array $input) : int {
  $fullArray = range(1, count($input)+1);
  $diff = array_diff($fullArray, $input);

  $oneOffSetInsteadOfZeroOffset = 1;

  return reset($diff) - $oneOffSetInsteadOfZeroOffset;
};