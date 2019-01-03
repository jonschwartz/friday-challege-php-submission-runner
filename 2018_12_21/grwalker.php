<?php
return function ($team, $party) {
  $found_teammates = [];

  $found_teammates = array_intersect($team, $party);

  return $found_teammates;
};