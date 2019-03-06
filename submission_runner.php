<?php
/**
 * submission_runner.php
 * run all submissions for #friday-challenge-php
 *
 * @author    Jon Schwartz <joschwartz@wayfair.com>
 * @copyright 2018 Wayfair LLC - All rights reserved
 */

// TEST VARS

$challenge_date = '2019_02_15';
if (!empty($argv[1])) {
  $challenge_date = $argv[1];
}

$test_return_params = ['passed', 'time'];

$challenge_dir  = dirname(__FILE__);
$this_challenge = $challenge_dir . '/' . $challenge_date . '/';

$trophy_winners = include('trophy_progression.php');
$trophy_counts  = array_count_values($trophy_winners);

echo '```The Automated Awards for : ' . $challenge_date . "\n\n";


require_once $this_challenge . 'test.php';

$directory_iterator = new DirectoryIterator($this_challenge);

$min_line_count  = 9999999999;
$min_line_person = [];

$min_char_count  = 9999999999;
$min_char_person = [];

$min_func_count  = 9999999999;
$min_func_person = [];

$min_submitted_time   = 9999999999999;
$min_submitted_person = '';

$min_time = 99999999999999;
$min_time_person = [];

echo '"Unit" testing...' . "\n\n";

$excluded_files = ['test.php', 'joschwartz.php', 'challenge.php', 'challenge_comment.php', 'post_challenge_writeup.md', 'pre_challenge_writeup.md'];
$submission_count = 0;

foreach ($directory_iterator as $fileinfo) {
  $passed = false;
  if (($fileinfo->getExtension() == 'php') && (!in_array($fileinfo->getFilename(), $excluded_files))) {
    $function = include($fileinfo->getPath() . '/' . $fileinfo->getFilename());

    $submission_count++;
    $person = $fileinfo->getBasename('.php');
    echo $person . ": ";
    $start = microtime(true);

    $passed = test($function);
    $time = microtime(true) - $start;

    echo 'Ran in '.$time."\n";

    if (!($passed)) {
      echo "Failed.\n";
      echo "\n-------------------------------\n";
    } else {
      echo "Passed.\n";
      echo "\n-------------------------------\n";
    }

    if ($passed) {

      // min run time award
      if ($time < $min_time) {
        $min_time = $time;
        $min_time_person = [$person];
      } elseif ($time == $min_time) {
        $min_time_person[] = $person;
      }

      //Submitted First Award
      if ($fileinfo->getMTime() < $min_submitted_time) {
        $min_submitted_time   = $fileinfo->getATime();
        $min_submitted_person = [$person];
      } elseif ($min_submitted_time == $fileinfo->getATime()) {
        $min_submitted_person[] = $person;
      }

      $code = file_get_contents($fileinfo->getPath() . '/' . $fileinfo->getFilename());

      //Line count award
      $lines      = explode("\n", $code);
      $lines      = array_filter($lines);
      $line_count = count($lines);
      if ($line_count < $min_line_count) {
        $min_line_person = [$person];
        $min_line_count  = $line_count;
      } elseif ($line_count == $min_line_count) {
        $min_line_person[] = $person;
      }

      //Char count award
      $char_count = strlen(preg_replace("/\w+/", '', $code));
      if ($char_count < $min_char_count) {
        $min_char_person = [$person];
        $min_char_count  = $char_count;
      } elseif ($char_count == $min_line_count) {
        $min_char_person[] = $person;
      }

      //Least Functions award
      $tokens = token_get_all($code);

      $function_count = 0;
      foreach ($tokens as $token) {

        if (is_int($token[0])) {
          //          echo token_name($token[0]) . "\t" . $token[1] . "\n";
          if (function_exists($token[1])) {
            $function_count++;
          }
        }
      }
      if ($function_count < $min_func_count) {
        $min_func_person = [$person];
        $min_func_count  = $function_count;
      } elseif ($function_count == $min_func_count) {
        $min_func_person[] = $person;
      }
    }
  }
}

if ($min_line_count == 9999999999) {
  $min_line_count = 0;
  $min_line_person = ['Nobody!'];
  $min_char_count = 0;
  $min_char_person = ['Nobody!'];
  $min_func_count = 0;
  $min_func_person = ['Nobody!'];
  $min_time = 0;
  $min_time_person = ['Nobody!'];
}

$trophy_winners_reversed = array_reverse($trophy_winners);

$trophy_winners_combined = [];
foreach ($trophy_winners_reversed as $date => $winner) {
  $date = substr($date, 0, 10);
  if (empty($trophy_winners_combined[$date])) {
    $trophy_winners_combined[$date] = $winner;
  } else {
    $orig_count = $trophy_counts[$trophy_winners_combined[$date]];
    $trophy_winners_combined[$date] .= ', '.$winner;
    $trophy_counts[$trophy_winners_combined[$date]] = $orig_count + $trophy_counts[$winner];
  }
}


$collective_last_winner = false;
$collective_first_previous_winner = false;


$last_winner       = array_shift($trophy_winners_combined);
$last_winner_count = $trophy_counts[$last_winner];
$collective_last_winner = (stristr($last_winner, ',') ? true : false);

$first_previous_winner       = array_shift($trophy_winners_combined);
$first_previous_winner_count = $trophy_counts[$first_previous_winner];
$collective_first_previous_winner = (stristr($first_previous_winner, ',') ? true : false);


$submission_debate_phrases = [
    "pouring every so finely over code to see who’s solution was most elegant",
    "debating with myself and others over who was the most deserving",
    "talking it over with the elephpants",
    "interpretive dancing about it for at least 2 hours",
    "staring blankly at a wall for a while",
    "explaining it to the duck",
    "watching the social network just to see the small amount of php written on whiteboards in certain scenes",
    "submitting an mr about who to pick and getting back some useful comments",
    "putting meeting time on the calendars of all the L5s+",
    "sitting next to a pond on a park bench",
    "staging an elaborate retelling of each submission done by performers from Berklee",
    "designing an elaborate machine learning model to chose for me",
    "failing to actually complete the challenge myself"
];

$reason_one_index = rand(0, count($submission_debate_phrases) - 1);
do {
  $reason_two_index = rand(0, count($submission_debate_phrases) - 1);
} while ($reason_two_index == $reason_one_index);

echo "\n--------------------------------------------------------------------\n
Min Line Award:                            (" . $min_line_count . ")\t@" . join(', @', $min_line_person) . ' 
Min Characters Excluding Whitespace Award: (' . $min_char_count . ")\t@" . join(', @', $min_char_person) . ' 
Min Function Award:                        (' . $min_func_count . ")\t@" . join(', @', $min_func_person) . '
Min Running Time Award:                    (' . $min_time . ")\t@" . join(', @', $min_time_person) . '

--------------------------------------------------------------------
The Winner\'s Circle (past winners):
The Last winner' . ($collective_last_winner ? 's' : '') . ' ' . $last_winner . ' ' . ($collective_last_winner ? 'have collectively' : 'has') . ' won ' . $last_winner_count . ' time' .
     ($last_winner_count != 1 ? 's' : null) . '
Before that it was ' . $first_previous_winner . ' who ' . ($collective_first_previous_winner ? 'have collectively' : 'has') . ' won ' . $first_previous_winner_count . ' time' .
     ($first_previous_winner_count != 1 ? 's' : null) .
"```

Given the literally ".$submission_count.' submissions, after '.join(' and ', [$submission_debate_phrases[$reason_one_index], $submission_debate_phrases[$reason_two_index]]).'.  I’ve made a decision on this week’s winner.'."\n\n"; //Submitted Fastest Award:                   (' . date('m-d h:i:s ', $min_submitted_time) . ")\t@" . join(', @', $min_submitted_person) . '
