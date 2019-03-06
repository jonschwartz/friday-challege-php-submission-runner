<?php
/**
 * The Elephpants are opening a pizza shop.  They need some code to run their online ordering system.
 * They want this code to be very extensible as they change their menu since they know what type of
 * pizzas they want to sell at the beginning, but that may change as they gather data on what
 * their customers like to eat.  The challenge this week will have you take in an array of menu items
 * and you should output a description of the final pizza and the total cost for those items.
 *
 * Caveats:
 *  - take a look at the decorator pattern (possibly)
 *  - make sure your solution can add new items easily
 *  - any of the descriptions in the test are valid.  There are probably others and if you're close, I'll give it to you.
 *
 * Good Luck!
 */

$function = function($test_data) {
  $pizza_cost = 0;
  $pizza_description = '';

  // YOUR CODE GOES HERE

  return ['cost' => $pizza_cost, 'description' => $pizza_description];
};

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

  return true;
}

test($function);