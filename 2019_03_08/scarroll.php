<?php
return function ($test_data) {
       $phrase = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];
       $result = [];

       foreach ($phrase as $phraseLetter) {
             foreach ($test_data as $letter) {
               if ($letter == $phraseLetter) {
                   $result[] = $letter;
                   break;
               }
             }
       }

       return $result;
     };

//    // This works if there's no duplicate letters in phrase, which there are
//    function happyBirthday($test_data) {
//      $phrase = ['h', 'a', 'p', 'p', 'y', ' ', 'b', 'i', 'r', 't', 'h', 'd', 'a', 'y', ' ', 'k', 'e', 'v', 'i', 'n'];
//
//      $intersection = array_intersect($test_data, $phrase);
//      $unique = array_unique($intersection);
//      $letters = array_merge($unique, ['p', ' ', 'i', 'a', 'y']);
//
//      uasort(
//          $letters, function ($a, $b) use ($phrase) {
//        return array_search($a, $phrase) - array_search($b, $phrase);
//      }
//      );
//
//      return $letters;
//    };