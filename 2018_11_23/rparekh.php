<?php
$factorial = function ($num) use (&$factorial) {
  return $num == 0 ? 1 : ($num * $factorial($num - 1));
};

return $factorial;