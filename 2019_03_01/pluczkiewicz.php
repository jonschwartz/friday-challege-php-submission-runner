<?php
namespace pluczkiewicz;

final class Assert {
  public static function arrayOf(array $items, string $typeName): void {
    foreach($items as $item) {
      if(!($item instanceof $typeName)) {
        throw new \InvalidArgumentException(
            sprintf(
                'Expected array of "%s", "%s" given',
                $typeName,
                is_object($item) ? get_class($item) : gettype($item)
            )
        );
      }
    }
  }
}

final class Price
{
  private $value;
  private $currency;

  public function __construct(int $value, string $currency)
  {
    if($currency !== 'EUR') {
      throw new \InvalidArgumentException('EUR is the only supported currency');
    }

    $this->value = $value;
    $this->currency = $currency;
  }

  public function add(Price $other) {
    if($this->currency !== $other->currency) {
      throw new \InvalidArgumentException('Can\'t add prices with different currencies');
    }

    return new Price($this->value + $other->value, $this->currency);
  }

  public function value():int {
    return $this->value;
  }
}

interface Ingredient {
  public function name(): string;
  public function price(): Price;
}

final class DefaultIngredient implements Ingredient {
  private $name;
  private $price;

  public function __construct(string $name, Price $price) { $this->name = $name; $this->price = $price; }
  public function name(): string { return $this->name; }
  public function price(): Price { return $this->price; }
};

final class Pizza {
  private $name;
  private $basePrice;
  private $additionalIngredients;

  public function __construct(string $name, Price $basePrice, array $additionalIngredients)
  {
    Assert::arrayOf($additionalIngredients, Ingredient::class);

    $this->additionalIngredients = $additionalIngredients;
    $this->basePrice = $basePrice;
    $this->name = $name;
  }

  public function price(): Price {
    $price = $this->basePrice;

    foreach($this->additionalIngredients as $ingredient) {
      $price = $price->add($ingredient->price());
    }

    return $price;
  }

  public function description(PizzaLocale $locale): string {
    return $locale->generatePizzaName($this->name, array_map(function($i) { return $i->name(); }, $this->additionalIngredients));
  }
}

interface PizzaLocale {
  public function isIngredient(string $text): bool;
  public function isPizza(string $text): bool;
  public function extractIngredientName(string $text): string;
  public function extractPizzaName(string $text): string;
  public function generatePizzaName(string $name, array $ingredients): string;
}

final class EnUsLocale implements PizzaLocale {
  private $collator;

  public function __construct() {
    $this->collator = new \Collator('en_US');
    $this->collator->setStrength(\Collator::SECONDARY); // case-insensitive, but consider accents
  }

  public function isIngredient(string $text): bool {
    return $this->collator->compare('add', mb_substr($text, 0, 3)) === 0;
  }

  public function isPizza(string $text): bool {
    return $this->collator->compare('pizza', mb_substr($text, mb_strlen($text) - mb_strlen('pizza'))) === 0;
  }

  public function extractIngredientName(string $text): string {
    return mb_substr($text, mb_strlen('add') + 1); // +1 for space
  }

  public function extractPizzaName(string $text): string {
    return mb_substr($text, 0, mb_strlen($text) - mb_strlen('pizza') - 1);
  }

  public function generatePizzaName(string $name, array $ingredients): string {
    if(count($ingredients) === 0) {
      return $name;
    }

    return $name . ' Pizza with ' . implode(' and ', $ingredients);
  }
}

final class PizzaParser {
  private $locale;

  public function __construct(PizzaLocale $locale) {
    $this->locale = $locale;
  }

  public function parse(array $pizza): array {
    $pizzaName = null;
    $ingredients = [];

    foreach($pizza as $part) {
      if($this->locale->isIngredient($part)) {
        $ingredients[] = $this->locale->extractIngredientName($part);
      } else if($this->locale->isPizza($part)) {
        if($pizzaName !== null) {
          throw new \InvalidArgumentException('Cannot have multiple pizzas at once!');
        }

        $pizzaName = $this->locale->extractPizzaName($part);
      } else {
        throw new \InvalidArgumentException(sprintf('Cannot parse name "%s"', $part));
      }
    }

    if($pizzaName === null) {
      throw new \InvalidArgumentException('Missing pizza name!');
    }

    return ['name' => $pizzaName, 'ingredients' => $ingredients];
  }
}

interface PricingRepository {
  public function findIngredientPrice(string $name): Price;
  public function findPizzaPrice(string $name): Price;
}

final class InMemoryPricingRepository implements PricingRepository
{
  public function findIngredientPrice(string $name): Price {
    static $ingredients = [
        'Chicken' => 2,
        'Mushrooms'        => 1,
        'Salami'           => 2,
        'White Sauce'      => 1,
        'Extra Cheese'     => 1,
    ];

    if(!isset($ingredients[$name])) {
      throw new \RuntimeException(sprintf('Ingredient "%s" not found', $name));
    }

    return new Price($ingredients[$name], 'EUR');
  }

  public function findPizzaPrice(string $name): Price {
    static $pizzas = [
        'Regular Cheese' => 10,
        'Meat Lovers'    => 15,
        'Margherita'     => 11,
        'Veggie Lovers'  => 12,
    ];

    if(!isset($pizzas[$name])) {
      throw new \RuntimeException(sprintf('Pizza "%s" not found', $name));
    }

    return new Price($pizzas[$name], 'EUR');
  }
}

final class PizzaHydrator {
  private $prices;

  public function __construct(PricingRepository $prices) {
    $this->prices = $prices;
  }

  public function hydrate(array $rawPizza): Pizza {
    $ingredients = [];
    foreach($rawPizza['ingredients'] as $ingredientName) {
      $ingredients[] = new DefaultIngredient($ingredientName, $this->prices->findIngredientPrice($ingredientName));
    }

    $pizzaPrice = $this->prices->findPizzaPrice($rawPizza['name']);

    return new Pizza($rawPizza['name'], $pizzaPrice, $ingredients);
  }
}


return function($test_data) {
  $pizza_cost = 0;
  $pizza_description = '';

  $locale = new EnUsLocale();
  $parser = new PizzaParser($locale);
  $hydrator = new PizzaHydrator(new InMemoryPricingRepository());

  $rawPizza = $parser->parse($test_data);
  $pizza = $hydrator->hydrate($rawPizza);

  return ['cost' => $pizza->price()->value(), 'description' => $pizza->description($locale)];
};