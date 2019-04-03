<?php
/**
 * The elephpants want some quick answers on home maintenance.
 * They know there's a bunch of data that goes behind the questions
 * to get them their answers, but they don't want to have to deal
 * with which questions have to get answered internally.
 * They just want to pass their question and their data to our
 * code and get one answer. Done.
 *
 * Caveats:
 *  - Not all the data is relevant to get the answers
 *  - some internal questions that should be answered
 *      1) Do we have any paint of the right color / can we make it with colors we have?
 *      2) Do we have all the tools we need?
 *      3) Are we allowed to paint the house we live in?
 *      4) Do we know how to paint?
 *  - try looking at the facade design pattern https://www.geeksforgeeks.org/facade-design-pattern-introduction/
 *
 * Good Luck!
 */


class Home {
  // This is where the test data will be sent, it's up to you to figure out how to deal with it.
  public function __construct(array $testData) {
    // YOUR CODE GOES HERE
  }

  // Check if the house can be painted a certain color
  public function canBePainted(string $color): bool {
    $canBePainted = false;

    // YOUR CODE GOES HERE
    return $canBePainted;
  }
}


$function = function ($testData) {
  $home = new Home($testData);
  return $home->canBePainted($testData['canBePaintedColor']);
};

function test(Callable $function): bool {

  $testData = [
      'canBePaintedColor'                        => 'orange',
      'hasPaintAtHome'                           => true,
      'paintColorsAtHome'                        => ['green', 'blue', 'yellow', 'red'],
      'favoriteMovie'                            => 'Back to the Future 2',
      'hasGarage'                                => true,
      'eatingAloneTonight'                       => true,
      'havePaintBrushes'                         => true,
      'pancakesForDinner'                        => true,
      'haveRulers'                               => true,
      'watchedHoursOfYoutubeHousePaintingVideos' => true,
      'paintedAHouseBefore'                      => false,
      'willingToTryPaintingAHouse'               => true,
      'washingTheDog'                            => false,
      'petStatus'                                => 'MIA',
      'haveDropcloths'                           => true,
      'haveDimensionalPortals'                   => false,
      'friendsComingOverTonight'                 => true,
      'numberOfFriends'                          => 0,
      'sadnessPercentage'                        => 100,
      'allowedToPaintHouse'                      => true,
      'houseWasJustPainted'                      => false
  ];

  $expected = true;
  $result   = $function($testData);

  return ($expected == $result);
}

test($function);