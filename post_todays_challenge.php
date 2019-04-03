<?php
/**
 * post_todays_challenge.php
 * use this script to post a challenge that's been set up for today.
 *
 * @author    Jon Schwartz <joschwartz@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';
require_once dirname(__FILE__).'/endpoints.php';

$client = new \GuzzleHttp\Client();
$challenges_dir = dirname(__FILE__);

send_to_jon($wf_slack, $client, 'Starting to post today\'s challenge.');

// GRAB THE CODE
$today = new DateTime();
$todays_challenge_dir = $challenges_dir . '/' . $today->format('Y_m_d');

if (is_dir($todays_challenge_dir)) {
  if (is_file($todays_challenge_dir.'/challenge.php')) {
    $code = file_get_contents($todays_challenge_dir.'/challenge.php');
  } else {
    send_to_jon($wf_slack, $client, 'Challenge file is missing from directory ('.$todays_challenge_dir.'/challenge.php), bailing.');
    die('Challenge file is missing from directory.  Bailing'."\n");
  }
} else {
  send_to_jon($wf_slack, $client, 'Challenge directory does not exist for today ('.$todays_challenge_dir.').  Bailing.');
  die('Challenge directory does not exist for today.  Bailing.'."\n");
}

// POST THE CODE
send_to_jon($wf_slack, $client, 'Posting the code.');
$response = $client->post('https://3v4l.org/new', [
    'form_params' => [
        'title' => 'Friday Challenge PHP - ' . $today->format('m/d/Y'),
        'code' => $code,
        'submit' => 'eval();'
    ]
]);

$body = $response->getBody();

$hashes = [];

preg_match('/https:\/\/3v4l.org\/embed\/(.*?)"/i', $body, $hashes);


$url = 'https://3v4l.org/'.$hashes[1];

send_to_jon($wf_slack, $client, 'Code posted to '.$url);
echo 'Code posted to: ' . $url . "\n";

// POST TO CHANNEL

$challenge_message = '';

if (is_file($todays_challenge_dir.'/pre_challenge_writeup.md')) {
  $challenge_message .= file_get_contents($todays_challenge_dir.'/pre_challenge_writeup.md')."\n\n";
} else {
  send_to_jon($wf_slack, $client, 'Pre-challenge write up missing');
}

if (is_file($todays_challenge_dir.'/challenge_comment.php') && (file_get_contents($todays_challenge_dir.'/challenge_comment.php') != '')) {
  $challenge_message .= '```' . file_get_contents($todays_challenge_dir.'/challenge_comment.php') .'```'."\n\n";
} else if (stristr($code, "*/")) {
  $begin_challenge_message = strpos($code, "/*");
  $end_challenge_message = strpos($code, "*/", $begin_challenge_message);
  echo $begin_challenge_message."|".$end_challenge_message."\n";
  $challenge_message = '```' . substr($code, $begin_challenge_message, $end_challenge_message - $begin_challenge_message + 2).'```'."\n\n";

} else {
  send_to_jon($wf_slack, $client, 'Challenge Comment missing.  Bailing');
  die('Challenge comment missing.  Bailing');
}

if (is_file($todays_challenge_dir.'/post_challenge_writeup.md')) {
  $challenge_message .= file_get_contents($todays_challenge_dir.'/post_challenge_writeup.md')."\n\n";
} else {
  send_to_jon($wf_slack, $client, 'Post challenge writeup missing.');
}

if (!(empty($url))) {
  $challenge_message .= $url."\n\n";
  send_to_jon($wf_slack, $client, 'URL was found and added.');
} else {
  send_to_jon($wf_slack, $client, 'URL for posted code is missing.  Bailing.');
  die('URL for posted code is missing.  Bailing');
}


echo $challenge_message;

if (!(empty($challenge_message))) {
//  $data = [
//      'message' => $challenge_message,
////      'users'   => 'joschwartz',
//      'rooms'   => 'friday-challenge-php'
//  ];
//
//  $response = $client->post($wf_slack, [\GuzzleHttp\RequestOptions::JSON => $data]);
//  var_dump($response);
//  echo $response->getBody();
  send_to_jon($wf_slack, $client, 'Challenge has been posted.');
} else {
  send_to_jon($wf_slack, $client, 'Challenge Message was empty.  Did not post to channel.');
}

function send_to_jon(string $wf_slack, \GuzzleHttp\Client $client, string $message) {
  if (!(empty($message))) {
    $url  = $wf_slack;
    $data = [
        'message' => $message,
        'users'   => 'joschwartz'
    ];

//    $client->post($url, [\GuzzleHttp\RequestOptions::JSON => $data]);
  }
}