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
  $w=['Baby','Daddy','Mommy','Grandpa','Grandma'];
  $e=' Elephpant';
  $s='';
  foreach($w as $n){
    $r=$n.$e;
    $s.=str_repeat($r.' '.join(' ',array_fill(0,6,'doo'))."\n",3).$r."!\n";
  }
  return trim($s);
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
    echo 'passed';
    return true;
  }

  $lines_expected = explode("\n", $expected);
  $lines_result = explode("\n", $result);

  for($i = 0; $i < count($lines_expected); $i++) {
    if (strcasecmp($lines_result[$i], $lines_expected[$i]) != 0) {
      echo 'Line '.$i."\n\t".$lines_result[$i]."\t".$lines_expected[$i]."\n\n";
    }
  }

  echo 'failed';
  echo "\n".$result;
  return false;
}

test($function);