<?php
/**
 * The elephpants are buying a factory.  This factory is going to whip up different kinds of milk shakes.
 *
 * The milk shakes can have different flavors and sizes.
 *
 * The challenge this week is to implement the milk shake factory.
 *
 * Possible flavors include:
 *  Chocolate, Vanilla, Strawberry, Coffee
 *
 * Sizes Include:
 *  Small, Medium, Large, Child Sized (because it's the size of a 2 y/o child.
 *                                    Don't include these parens in your size
 *                                    description.  This is a Parks and Rec joke.
 *                                    https://www.youtube.com/watch?v=Ish8NBunrQU )
 *
 * Caveats:
 *  - Try using the factory pattern for this one.
 *
 *  - I've set up some classes below but you don't need to use them as long as
 *    your final shake object conforms to the signature (not necessarily the interface)
 *    I'm looking for.
 *
 * Good Luck!
 */

interface MilkShakeInterface {
  public function getSize() : string;
  public function getFlavor() : string;
}

class MilkShakeFactory {
  public static function getShake($shakeData) : MilkShakeInterface {
    /*
     * @var MilkShakeInterface
     */
    /**
     * Replace this line with your code,
     * I just wanted to give you some guidance.
     */
    $shake = '';

    // YOUR CODE HERE
    return $shake;
  }
}


/**
 * I'm intentionally not implementing the interface
 * in case people want to make their own.
 */
class ExpectedShake {
  protected $size;
  protected $flavor;

  public function __construct(string $size = null, string $flavor = null) {
    $this->setSize($size);
    $this->setFlavor($flavor);
  }

  public function getSize() : string {
    return $this->size;
  }

  public function setSize($size): void {
    $this->size = $size;
  }

  public function getFlavor() : string {
    return $this->flavor;
  }

  public function setFlavor($flavor): void {
    $this->flavor = $flavor;
  }
}

$function = function($test_data) {
  return MilkShakeFactory::getShake($test_data);
};

function test(Callable $function) : bool {
  $flavors = ['Chocolate', 'Vanilla', 'Strawberry', 'Coffee'];
  $sizes = ['Small', 'Medium', 'Large', 'Child Sized'];

  $flavor = array_rand($flavors, 1);
  $size = array_rand($sizes, 1);

  $expectedShake = new ExpectedShake($size, $flavor);

  $result = $function(['size' => $size, 'flavor' => $flavor]);

  if ($result->getSize() == $expectedShake->getSize() && $result->getFlavor() == $expectedShake->getFlavor()) {
    return true;
  }
  return false;
}

test($function);