<?php
return function ($soup_order_in) {
  $soup_arr =  preg_split('//', $soup_order_in);
  natcasesort($soup_arr);
  $soup_order_out = join('', $soup_arr);


  return $soup_order_out;
};


//////////


/**
 *
 * It's a well known fact that elephpants love soup.
 * Their favorite kind of soup is alphabet soup.
 * Being as orderly as they are, they like to alphabetize
 * their alphabet soup.
 *
 * Using as elegant a solution as possible, please write
 * a function the elephpants can use to order their soup.
 *
 * Caveats:
 * - Case should be preserved in your final answer
 * - codepad runs php 5.2 until we find a new solution,
 *    your code needs to be 5.2 compliant
 *
 * Usage:
 *
 * $soup_order_in = 'fdsiahfdsaifdsaihfdsaiohufdsahio';
 * echo alphabetize($soup_order_in);
 *
 * output:
 * aaaaadddddfffffhhhhiiiiioosssssu
 *
 * Most elephpagant solution wins!
 **/

testAlphabetize();

//echo alphabetize('ThanksForPlayingTheFirstFridayChallengePHPEditionChallenge')."\n";
//echo alphabetize('elePHPantsLoveCamelCasedAlphabetSoup')."\n";

function alphabetize($soup_order_in) {
  $soup_arr =  preg_split('//', $soup_order_in);
  natcasesort($soup_arr);
  $soup_order_out = join('', $soup_arr);


  return $soup_order_out;
}

function testAlphabetize() {
  $test_cases = array(
      'example test case' => array('in' => 'fdsiahfdsaifdsaihfdsaiohufdsahio', 'out' => 'aaaaadddddfffffhhhhiiiiioosssssu'),
      'Camel Cased Soup' => array('in' => 'elePHPantsLoveCamelCasedAlphabetSoup', 'out' => 'AaaaabCCdeeeeeehHlllLmnoopPPpssSttuv'),
      'Thanks for playing!' => array('in' => 'ThanksForPlayingTheFirstFridayChallengePHPEditionChallenge', 'out' => 'aaaaaCCddeeeEeeFFFggghhHhhiiiiiklllllnnnnnooPPPrrrsstTTtyy'),
  );
  $results    = array();

  foreach ($test_cases as $test_name => $test) {
    $actual = alphabetize($test['in']);

    if (strtoupper($actual) === strtoupper($test['out'])) {
      $results[$test_name] = 'Passed.';
    } else {
      $results[$test_name] = 'Failed.  Expected: ' . $test['out'] . ' Got: ' . $actual;
    }
  }

  foreach ($results as $test_name => $result) {
    echo $test_name . "\t". $result."\n";
  }
}

