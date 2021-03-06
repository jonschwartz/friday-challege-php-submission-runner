<?php

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