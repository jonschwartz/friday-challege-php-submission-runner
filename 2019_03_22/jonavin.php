<?php
namespace jonavin;

interface PaintAbilityChecker {
  public function canBePainted(string $color): bool;
}

abstract class BasePaintAbilityChecker implements PaintAbilityChecker {
  public function construct(array $homeData) {
    foreach (array_keys(get_object_vars($this)) as $key) {
      if (isset($homeData[$key])) {
        $this->$key = $homeData[$key];
      }
    }
  }
}

class EquipmentChecker extends BasePaintAbilityChecker {
  private $hasPaintAtHome;
  private $paintColorsAtHome;
  private $havePaintBrushes;
  private $haveRulers;
  private $haveDropcloths;

  private function hasColor(string $color) {
    return in_array($color, $this->paintColorsAtHome);
  }

  private function hasColorIngredients(string $color) {
    if ($this->hasColor($color)) {
      return true;
    }
    switch ($color) {
      case 'orange':
        return $this->hasColor('red') && $this->hasColor('yellow');
      case 'violet':
      case 'purple':
        return $this->hasColor('red') && $this->hasColor('blue');
      case 'green':
        return $this->hasColor('yellow') && $this->hasColor('blue');
      default:
        return false;
    }
  }

  public function canBePainted(string $color): bool {
    return $this->hasPaintAtHome
           && $this->havePaintBrushes
           && $this->haveRulers
           && $this->haveDropcloths
           && $this->hasColorIngredients($color);
  }
}

class PainterChecker extends BasePaintAbilityChecker {
  private $eatingAloneTonight;
  private $watchedHoursOfYoutubeHousePaintingVideos;
  private $paintedAHouseBefore;
  private $willingToTryPaintingAHouse;
  private $friendsComingOverTonight;
  private $numberOfFriends;

  private function isAvailable() {
    return $this->eatingAloneTonight &&
           (!$this->friendsComingOverTonight || $this->numberOfFriends === 0);
  }

  private function isPrepared() {
    return $this->willingToTryPaintingAHouse
           && ($this->paintedAHouseBefore || $this->watchedHoursOfYoutubeHousePaintingVideos);
  }

  public function canBePainted(string $color): bool {
    return $this->isAvailable() && $this->isPrepared();
  }
}

class HouseChecker extends BasePaintAbilityChecker {
  private $hasGarage;
  private $houseWasJustPainted;
  private $allowedToPaintHouse;

  public function canBePainted(string $color): bool {
    return $this->hasGarage && $this->allowedToPaintHouse && !$this->houseWasJustPainted;
  }
}

class PetChecker extends BasePaintAbilityChecker {
  private $washingTheDog;
  private $petStatus;

  public function canBePainted(string $color): bool {
    return !$this->washingTheDog && $this->petStatus !== 'untrained';
  }
}

class Home implements PaintAbilityChecker {
  private $checkers;
  // This is where the test data will be sent, it's up to you to figure out how to deal with it.
  public function __construct(array $testData) {
    $this->checkers = [
        new EquipmentChecker($testData),
        new PainterChecker($testData),
        new HouseChecker($testData),
        new PetChecker($testData)
    ];
  }

  // Check if the house can be painted a certain color
  public function canBePainted(string $color): bool {
    $canBePainted = true;
    foreach ($this->checkers as $checker) {
      $canBePainted &= $checker->canBePainted($color);
    }
    return $canBePainted;
  }
}


return function ($testData) {
  $home = new Home($testData);
  return $home->canBePainted($testData['canBePaintedColor']);
};