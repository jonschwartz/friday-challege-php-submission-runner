<?php
/**
 * Elephpants love to use parenthesis but hate syntax errors.
 * Unfortunately, they are stuck using a basic text editor for
 * writing code over their holiday break so they can't rely on
 * their awesome IDE and it's tricks for highlighting syntax
 * errors.
 *
 * So, they need you to re-write some of the functionality
 * they've become accustomed to in their IDE to do a check
 * before they can commit.  Your challenge this week is to
 * check the number and orientation of the elephpant's
 * parenthesis.  Your code should return true if the paren
 * pairs match (a match is both number of open and close parens
 * and also an open comes before a corresponding close).
 * For a mismatch it should return an array of false and say either:
 * 'parenthesis count mismatch'
 * or
 * 'parenthesis order mismatch'
 *
 * as a message as the second item in the array
 *
 * e.g. [false, 'parenthesis order mismatch'].
 *
 * If it can fit both scenarios, return the one that is
 * encountered first.
 * e.g. ')((' yields [false, 'parenthesis order mismatch']
 *
 * Bonus points:
 *  - using no loops
 *  - implementing more syntax checks
 *  - using a plain text editor to write your code (this one is on the honor system)
 */

$parenTest = function() {
  $result = true;

  // YOUR CODE GOES HERE

  return $result;
};

function test(callable $function){
  $tests = [
      'one set of parens' => ['()', true],
      'two sets of parens' => ['()()', true],
      'two sets of parens nested in parent' => ['(()())', true],
      'two sets of nested parens' => ['(())', true],
      'unordered parens' => [')(()', [false, 'parenthesis order mismatch']],
      'count mismatched parens' => ['(()', [false, 'parenthesis count mismatch']],
      'two things wrong, mismatched first' => [')((', [false, 'parenthesis order mismatch']],
      'non parens in string' => ['(randomstuffthatisntparens)', true],
      'two sets of parens nested in parent missing end paren' => ['(()()', [false, 'parenthesis count mismatch']],
  ];

  $passed = true;
  foreach ($tests as $name => $test) {
    if ($function($test[0]) !== $test[1]) {
      $passed = false;
    }
  }
  return $passed;
}

test($parenTest);