<?php

return function ($soup_order_in) {




  $stringParts = str_split($soup_order_in);
  natcasesort($stringParts);
  $soup_order_out = implode('', $stringParts);




  return $soup_order_out;
};