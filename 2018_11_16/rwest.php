<?php
function compareFunction($a, $b) {
  if (strtolower($a) == strtolower($b)) {
    return 0;
  }

  return strtolower($a) < strtolower($b) ? -1 : 1;
}

return function ($input) {
  $chars = str_split($input);

  usort($chars, 'compareFunction');

  return implode('', $chars);
};
