<?php
namespace jonavin;

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

class RegularCheesePizza extends BasePizza {
  public function __construct() {
    parent::__construct('Regular Cheese Pizza', 10);
  }
}

class MeatLoversPizza extends BasePizza {
  public function __construct() {
    parent::__construct('Meat Lovers Pizza', 15);
  }
}

class MargheritaPizza extends BasePizza {
  public function __construct() {
    parent::__construct('Margherita Pizza', 11);
  }
}

class VeggieLoversPizza extends BasePizza {
  public function __construct() {
    parent::__construct('Veggie Lovers Pizza', 12);
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

class PizzaWithChicken extends ToppingDecorator {
  public function __construct($pizza) {
    parent::__construct($pizza, 'Add Chicken', 2);
  }
}

class PizzaWithMushrooms extends ToppingDecorator {
  public function __construct($pizza) {
    parent::__construct($pizza, 'Add Mushrooms', 1);
  }
}

class PizzaWithSalami extends ToppingDecorator {
  public function __construct($pizza) {
    parent::__construct($pizza, 'Add Salami', 2);
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

  public static function createPizza($order) {
    $pizza = null;
    foreach($order as $index => $ingredient) {
      if ($index === 0) {
        $pizza = new BasePizza($ingredient, self::MENU[$ingredient]);
      } else {
        $pizza = new ToppingDecorator($pizza, $ingredient, self::MENU[$ingredient]);
      }
    }
    return $pizza;
  }
}

return function($test_data) {
  $pizza = PizzaFactory::createPizza($test_data);
  return ['cost' => $pizza->getCost(), 'description' => $pizza->getDescription()];
};