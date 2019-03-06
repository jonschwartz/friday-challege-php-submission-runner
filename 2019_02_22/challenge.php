<?php
/**
 * The elephpants want in on that sweet sweet toddler Youtube money.
 * They've realized that if they take the biggest songs that toddlers
 * like these days and just insert elephpant instead of, for instance,
 * shark, they could make billions!  The problem is, they don't really
 * want to do a lot of work to get this done.  So, this week's challenge
 * is to write a song "Baby Elephpant" to the tune of "Baby Shark" using
 * as little code as possible which is just Baby Shark with the word
 * Shark substituted out for Elephpant.  Your function will receive
 * no input and must output the entire song.
 *
 * That's right, devs!  It's Code Golf!
 *
 * Good Luck!
 */

$function = function() {
  // YOUR CODE GOES HERE
};

function test(Callable $function) : bool {
  $expected = 'Baby Elephpant doo doo doo doo doo doo
Baby Elephpant doo doo doo doo doo doo
Baby Elephpant doo doo doo doo doo doo
Baby Elephpant!
Daddy Elephpant doo doo doo doo doo doo
Daddy Elephpant doo doo doo doo doo doo
Daddy Elephpant doo doo doo doo doo doo
Daddy Elephpant!
Mommy Elephpant doo doo doo doo doo doo
Mommy Elephpant doo doo doo doo doo doo
Mommy Elephpant doo doo doo doo doo doo
Mommy Elephpant!
Grandpa Elephpant doo doo doo doo doo doo
Grandpa Elephpant doo doo doo doo doo doo
Grandpa Elephpant doo doo doo doo doo doo
Grandpa Elephpant!
Grandma Elephpant doo doo doo doo doo doo
Grandma Elephpant doo doo doo doo doo doo
Grandma Elephpant doo doo doo doo doo doo
Grandma Elephpant!';

  $result = $function();
  if (strcasecmp($expected, $result) == 0) {
    return true;
  }
  return false;
}

test($function);