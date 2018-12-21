<?php
return function ($soup_order_in) {

  // YOUR CODE GOES HERE //
  $soup_split = str_split($soup_order_in);
  for ($i = 0; $i < count($soup_split); ++$i) {
    for ($j = $i; $j < count($soup_split); ++$j) {
      $char1 = strtolower($soup_split[$i]);
      $char2 = strtolower($soup_split[$j]);

      if ($char1 === $char2) {
        if ($soup_split[$i] > $soup_split[$j]) {
          $temp = $soup_split[$i];
          $soup_split[$i] = $soup_split[$j];
          $soup_split[$j] = $temp;
        }
      }
      else if ($char1 > $char2) {
        $temp = $soup_split[$i];
        $soup_split[$i] = $soup_split[$j];
        $soup_split[$j] = $temp;
      }
    }
  }

  $soup_order_out = implode($soup_split);
  return $soup_order_out;
};