<?php
namespace wbaldoumas;

class Home {

  private $painter;

  // This is where the test data will be sent, it's up to you to figure out how to deal with it.
  public function __construct(array $testData) {
    $this->painter = new Painter();
  }

  // Check if the house can be painted a certain color
  public function canBePainted(string $color): bool {
    return $this->allowedToBePainted() && $this->painter->canPaintColor($color);
  }

  private function allowedToBePainted() : bool {
    return true;
  }
}

class Painter {
  private $palette;
  private $toolbox;

  public function __construct() {
    $this->palette = new ColorPalette();
    $this->toolbox = new ToolBox();
  }

  public function canPaintColor(string $color) {
    return $this->palette->hasColor($color);
  }

  public function canPaint() : bool {
    return $this->toolbox->hasPaintingTools();
  }

}

class ColorPalette {

  private $colors = ['orange', 'red', 'blue', 'turquoise'];

  public function hasColor(string $color) : bool {
    $foundColor = array_search($color, $this->colors);

    if ($foundColor !== false) {
      return true;
    }

    $madeColor = $this->makeColor($color);

    if (isset($madeColor)) {
      $colors[] = $madeColor;
      return true;
    }

    return false;
  }

  private function makeColor(string $color) : ?string {
    // make color here... no need to implement this now.
    return null;
  }

}

class ToolBox {
  public function hasPaintingTools() : bool {
    return true;
  }
}

return function ($testData) {
  $home = new Home($testData);
  return $home->canBePainted($testData['canBePaintedColor']);
};
