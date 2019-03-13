<?php
/**
 * Is Kevin Elephpant's birthday!  The other elephpants want to write Happy Birthday to him,
 * but all their letters got jumbled.  This week's challenge is to re-arrange the letters to
 * give Kevin a happy birthday!
 *
 * Caveats:
 *  - Can you do it with only array_* functions?
 *  - there may be some extra letters in the elephpant's pile of letters
 *  - you should actually try to re-arrange the message from the pile of letters, not just return an array in the correct order
 *
 * Good Luck!
 */

$function = function($testData) {
  $expected = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];

  $out = [];
  $used = [];
  foreach ($expected as $letter) {
    $nextIndex = array_search($letter, $testData);
    while (in_array($nextIndex, $used)) {
      $nextIndex = array_search($letter, array_slice($testData, $nextIndex+1));
      if ($nextIndex > count($testData)) {
        $nextIndex = 0;
      }
      echo $nextIndex."\t".$letter."\n";
    }
    $used[] = $nextIndex;
    $out[] = $testData[$nextIndex];
  }
  return $out;
};

function test(Callable $function) : bool {
  $expected = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];

  $test_data = array_merge($expected, str_split('GazoinksBo! Heres some random characters.  Feel free to throw this all out.'));
  shuffle($test_data);

  $result = $function($test_data);

  if ($expected == $result) {
    echo "Passed\n";
    return true;
  }
  print_r($result);
  echo "Failed\n";
  return false;
}

test($function);