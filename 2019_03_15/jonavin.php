<?php
namespace jonavin;

interface MilkShakeInterface {
  public function getSize() : string;
  public function getFlavor() : string;
}

class MilkShake extends ExpectedShake implements MilkShakeInterface {}

class MilkShakeFactory {
  public static function getShake($shakeData) : MilkShakeInterface {
    return new MilkShake($shakeData['size'], $shakeData['flavor']);
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

return function($test_data) {
  return MilkShakeFactory::getShake($test_data);
};