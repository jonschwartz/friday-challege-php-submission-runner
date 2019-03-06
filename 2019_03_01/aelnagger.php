<?php
namespace aelnagger;

define('MENU', [
    'Regular Cheese Pizza' => 10,
    'Meat Lovers Pizza'    => 15,
    'Margherita Pizza'     => 11,
    'Veggie Lovers Pizza'  => 12,
    'Add Chicken'          => 2,
    'Add Mushrooms'        => 1,
    'Add Salami'           => 2,
    'Add White Sauce'      => 1,
    'Add Extra Cheese'     => 1,
]);

class Topping {
  private $name;
  private $cost;

  public function __construct($name, $cost) {
    $this->name = $name;
    $this->cost = $cost;
  }

  public function getName() {
    return $this->name;
  }

  public function getCost() {
    return $this->cost;
  }

  public static function FromCommand($command) {
    return new Topping(str_replace('Add ', '', $command), MENU[$command]);
  }
}

class Pizza {
  private $kind;
  private $toppings = [];

  public function __construct($options) {
    $this->kind = array_shift($options);

    foreach($options as $command) {
      $this->addTopping(Topping::FromCommand($command));
    }
  }

  public function addTopping($topping){
    $this->toppings[] = $topping;
  }

  public function getCost() {
    return array_reduce($this->toppings, function($carry, $topping) {return $carry + $topping->getCost();}, MENU[$this->kind]);
  }

  public function getDescription() {
    $toppings = $this->toppings?
        " with " . implode(" and ", array_map(function($topping){return $topping->getName();}, $this->toppings)): '';
    return "{$this->kind}{$toppings}";
  }
}

return function($test_data) {
  $pizza = new Pizza($test_data);

  return ['cost' => $pizza->getCost(), 'description' => $pizza->getDescription()];
};