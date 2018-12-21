<?php

function test($function) {
  $passed = true;
  $test_cases = array(
      'example test case' => array('in' => 'fdsiahfdsaifdsaihfdsaiohufdsahio', 'out' => 'aaaaadddddfffffhhhhiiiiioosssssu'),
      'Camel Cased Soup' => array('in' => 'elePHPantsLoveCamelCasedAlphabetSoup', 'out' => 'AaaaabCCdeeeeeehHlllLmnoopPPpssSttuv'),
      'Thanks for playing!' => array('in' => 'ThanksForPlayingTheFirstFridayChallengePHPEditionChallenge', 'out' => 'aaaaaCCddeeeEeeFFFggghhHhhiiiiiklllllnnnnnooPPPrrrsstTTtyy'),
  );
  $results    = array();

  foreach ($test_cases as $test_name => $test) {
    $actual = $function($test['in']);

    if (strtoupper($actual) === strtoupper($test['out'])) {
      $results[$test_name] = 'Passed.';
    } else {
      $passed = false;
      $results[$test_name] = 'Failed.  Expected: ' . $test['out'] . ' Got: ' . $actual;
    }
  }

  if (!$passed) {
    foreach ($results as $test_name => $result) {
      echo $test_name . "\t" . $result . "\n";
    }
  }
  return $passed;
}

/**
 * This week goes to @grwalker but only just barely!  @rparekh submitted the exact same code.
 * Greg gets it for speed to entry.  Both solutions used just 3 library functions and 3 user
 * submitted lines of code (excluding whitespace)  to accomplish the task.
 * Well done everyone!  Sticker Clause (see #friday-challenge for context) left some
 * stickers on my desk Cop02-T2-E3 (the seat with the elephpants) and anyone who participated
 * in the challenge is free to grab one.  @grwalker gets the trophy (I got it to re-print…)
 * this week!  Hope to see you all next challenge!
 */