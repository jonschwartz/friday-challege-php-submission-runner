<?php

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