<?php

return function ($testData) {
  $start  = "Suzi";
  $edges  = [];
  $vetex  = [];
  $result = [];
  foreach ($testData as $startingPerson => $directions) {
    foreach ($directions as $destinationPerson => $weight) {
      if (!isset($edges[$startingPerson . "-" . $destinationPerson]) &&
          !isset($edges[$destinationPerson . "-" . $startingPerson])) {
        $edges[$startingPerson . "-" . $destinationPerson] = $weight;
      }
      if (!isset($vetex[$startingPerson])) {
        $vetex[$startingPerson] = 1;
      }
    }
  }
  asort($edges);
  foreach ($edges as $path => $weight) {
    list($person, $person2) = explode('-', $path);
    if ((!isset($result[$person]) || !isset($result[$person2]))
        && $vetex[$person] < 3 && $vetex[$person2] < 3) {

      if ((($person == $start || $person2 == $start) && $vetex[$start] < 2)) {
        $vetex[$person]++;
        $vetex[$person2]++;
        if (isset($result[$person])) {
          $result[$person2] = $person;
        } else {
          $result[$person] = $person2;
        }
      } else if ($person != $start && $person2 != $start) {
        $vetex[$person]++;
        $vetex[$person2]++;
        if (isset($result[$person])) {
          $result[$person2] = $person;
        } else {
          $result[$person] = $person2;
        }
      }

    }
  }
  
  $return_value = [$start];
  while (isset($result[$start])) {
    $return_value[] = $result[$start];
    $start          = $result[$start];
  }
//  if (count($return_value) < count($result) + 1) {
  if (count($return_value) < count($result) + 1) {
    $result2 = [];
    foreach ($result as $directions => $person2) {
      $result2[$person2] = $directions;
    }
    while (isset($result2[$start])) {
      $return_value[] = $result2[$start];
      $start          = $result2[$start];
    }
  }

  //  print_r($return_value);
  return $return_value;
};