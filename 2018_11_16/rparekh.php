<?php
return function ($soup_order_in) {
  $sorted_array = str_split($soup_order_in);
  natcasesort($sorted_array);
  return implode('', $sorted_array);
};
