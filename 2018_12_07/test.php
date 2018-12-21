<?php

function test($function) {
  $test_cases = array(
      'How do you do?'                      => array(
          'in' => 'Hphpow dphpo yphpophpu dphpo?', 'out' => 'How do you do?'
      ),
      'Elephpants like to write good code.' => array(
          'in'  => 'Elphpephpphpants lphpikphpe tphpo wrphpitphpe gphpophpod cphpodphpe.',
          'out' => 'Elephpants like to write good code.'
      ),
      'PHP sure is a handy language!'       => array(
          'in'  => 'PHP sphpure is a hphpandy lphpangphpuphpagphpe!',
          'out' => 'PHP sure is a handy language!'
      ),
      'Elephants love Elephpants and PHP'   => array(
          'in'  => 'Elphpephphpants lphpovphpe Elphpephpphpants and PHP',
          'out' => 'Elephants love Elephpants and PHP'
      ),
  );
  $results    = array();

  $passed = true;
  foreach ($test_cases as $test_name => $test) {
    $actual = $function($test['in']);

    if ($actual === $test['out']) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] = 'Failed.  Expected: ' . $test['out'] . ' Got: ' . $actual;
      $passed              = false;
    }
  }

  if (!($passed)) {
    foreach ($results as $test_name => $result) {
      echo $test_name . "\t" . $result . "\n";
    }
  }
  return $passed;
}