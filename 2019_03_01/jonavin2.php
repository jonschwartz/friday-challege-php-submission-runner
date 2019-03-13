<?php
namespace jonavin2;

interface PizzaInterface {
  public function getDescription(): string;
  public function getCost(): int;
  public function getToppingsAmount(): int;
}

class BasePizza implements PizzaInterface {
  private $cost;
  private $description;

  public function __construct($description, $cost) {
    $this->description = $description;
    $this->cost = $cost;
  }

  public function getDescription(): string {
    return $this->description;
  }

  public function getCost(): int {
    return $this->cost;
  }

  public function getToppingsAmount(): int {
    return 0;
  }
}

class ToppingDecorator implements PizzaInterface {
  private $pizza;
  private $topping;
  private $toppingCost;

  public function __construct($pizza, $toppingOrder, $toppingCost) {
    $this->pizza = $pizza;
    $this->topping = substr($toppingOrder, 4);
    $this->toppingCost = $toppingCost;
  }

  public function getDescription(): string {
    return $this->getToppingsAmount() > 1
        ? $this->pizza->getDescription() . ' and ' . $this->topping
        : $this->pizza->getDescription() . ' with ' . $this->topping;
  }

  public function getCost(): int {
    return $this->pizza->getCost() + $this->toppingCost;
  }

  public function getToppingsAmount(): int {
    return $this->pizza->getToppingsAmount() + 1;
  }
}

class PizzaFactory {
  const MENU = [
      'Regular Cheese Pizza' => 10,
      'Meat Lovers Pizza'    => 15,
      'Margherita Pizza'     => 11,
      'Veggie Lovers Pizza'  => 12,
      'Add Chicken'          => 2,
      'Add Mushrooms'        => 1,
      'Add Salami'           => 2,
      'Add White Sauce'      => 1,
      'Add Extra Cheese'     => 1
  ];

  private function isPizzaRequest($request) {
    return substr($request, -5) === 'Pizza';
  }

  private function isToppingRequest($request) {
    return substr($request, 0, 3) === 'Add';
  }

  private function getBasePizza($order) {
    $pizzaRequests = array_filter($order, function ($request) {
      return substr($request, -5) === 'Pizza';
    });
    // Assuming 1 pizza + any amount of orders
    return array_pop($pizzaRequests);
  }

  private function addToppings($pizza, $order) {
    foreach($order as $request) {
      if ($this->isToppingRequest($request)) {
        $pizza = new ToppingDecorator($pizza, $request, self::MENU[$request]);
      }
    }
    return $pizza;
  }

  public function createPizza($order) {
    $pizzaRequest = $this->getBasePizza($order);
    $pizza = new BasePizza($pizzaRequest, self::MENU[$pizzaRequest]);
    return $this->addToppings($pizza, $order);
  }
}

return function($test_data) {
  $pizza = (new PizzaFactory)->createPizza($test_data);
  return ['cost' => $pizza->getCost(), 'description' => $pizza->getDescription()];
};