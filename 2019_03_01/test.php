<?php

function test(Callable $function) : bool {

  //  $menu = [
  //      'Regular Cheese Pizza' => 10,
  //      'Meat Lovers Pizza'    => 15,
  //      'Margherita Pizza'     => 11,
  //      'Veggie Lovers Pizza'  => 12,
  //      'Add Chicken'          => 2,
  //      'Add Mushrooms'        => 1,
  //      'Add Salami'           => 2,
  //      'Add White Sauce'      => 1,
  //      'Add Extra Cheese'     => 1,
  //  ];

  $pizza = ['Regular Cheese Pizza', 'Add Mushrooms', 'Add Salami'];

  $result = $function($pizza);

  if ($result['cost'] != 13) {
    return false;
  }

  $expected_descriptions = [
      'Regular Cheese Pizza with Mushrooms and Salami',
      'Regular Cheese Pizza with Salami and Mushrooms',
      'Regular Cheese Pizza Add Mushrooms Add Salami',
      'Regular Cheese Pizza Add Salami Add Mushrooms',
      'Regular Cheese Pizza Add Mushrooms and Salami',
      'Regular Cheese Pizza Add Salami and Mushrooms',
  ];

  if (!in_array($result['description'], $expected_descriptions)) {
    return false;
  }

  // Change the order of the order
  $pizza = ['Add Mushrooms', 'Add Salami', 'Regular Cheese Pizza'];

  $result = $function($pizza);

  if ($result['cost'] != 13) {
    return false;
  }

  $expected_descriptions = [
      'Regular Cheese Pizza with Mushrooms and Salami',
      'Regular Cheese Pizza with Salami and Mushrooms',
      'Regular Cheese Pizza Add Mushrooms Add Salami',
      'Regular Cheese Pizza Add Salami Add Mushrooms',
      'Regular Cheese Pizza Add Mushrooms and Salami',
      'Regular Cheese Pizza Add Salami and Mushrooms',
  ];

  if (!in_array($result['description'], $expected_descriptions)) {
    return false;
  }

  return true;
}