<?php
/**
 *
 * Elephpants are always so excited!  They use exclamation points everywhere!
 *
 * Unfortunately, they get called out when their sentences end in numbers!
 *
 * Numbers with an exclamation mark are factorials!  Technically, 4! = 24,
 * not a really excited 4, like you might be thinking!
 *
 * In this challenge, you need to write a function, FirstFactorial($num)
 * which takes in a random integer and outputs the factorial of that number!
 *
 * Bonus points for using no loops.
 *
 * As always, most elephpagant solution wins!
 *
 */


function test($function) {
  $test_cases = array(
      '4' => array('in' => 4, 'out' => 24),
      '5' => array('in' => 5, 'out' => 120),
      '8' => array('in' => 8, 'out' => 40320),
      '20' => array('in' => 20, 'out' => 2432902008176640000),
  );
  $results    = array();

  $passed = true;
  foreach ($test_cases as $test_name => $test) {
    $actual = $function($test['in']);

    if ($actual === $test['out']) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] = 'Failed.  Expected: ' . $test['out'] . ' Got: ' . $actual;
      $passed = false;
    }
  }

  if (!($passed)) {
    foreach ($results as $test_name => $result) {
      echo $test_name . "\t" . $result . "\n";
    }
  }
  return $passed;
}
/**
 * Ok so I’m going to announce the winner!  Despite the literally 1 of submission (excluding my own since I abstain)
 * I’ve narrowed down the winner this week to @rparekh His solution was elegant and did not include any loops or
 * rely on soon to be extinct unused library functions.  So congrats @rparekh You can pick up the coveted Friday
 * Challenge PHP Trophy from @grwalker
 */