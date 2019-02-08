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

// GRAB THE CODE
$today = new DateTime();

$todays_challenge_dir = $challenges_dir . '/' . $today->format('Y_m_d');

if (is_dir($todays_challenge_dir)) {
  if (is_file($todays_challenge_dir.'/challenge.php')) {
    $code = file_get_contents($todays_challenge_dir.'/challenge.php');
  } else {
    die('Challenge file is missing from directory.  Bailing'."\n");
  }
} else {
  die('Challenge directory does not exist for today.  Bailing.'."\n");
}


// POST THE CODE

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

echo 'Code posted to: ' . $url . "\n";

// POST TO CHANNEL

$challenge_message = '';

if (is_file($todays_challenge_dir.'/pre_challenge_writeup.md')) {
  $challenge_message .= file_get_contents($todays_challenge_dir.'/pre_challenge_writeup.md')."\n\n";
}

if (is_file($todays_challenge_dir.'/challenge_comment.php')) {
  $challenge_message .= '```' . file_get_contents($todays_challenge_dir.'/challenge_comment.php') .'```'."\n\n";
}

if (is_file($todays_challenge_dir.'/post_challenge_writeup.md')) {
  $challenge_message .= file_get_contents($todays_challenge_dir.'/post_challenge_writeup.md')."\n\n";
}

if (!(empty($url))) {
  $challenge_message .= $url."\n\n";
}


if (!(empty($challenge_message))) {
  $url  = $wf_slack;
  $data = [
      'message' => $challenge_message,
      'users'   => 'joschwartz',
      //    'rooms' => 'friday_challenge_php'
  ];

  $response = $client->post($url, [\GuzzleHttp\RequestOptions::JSON => $data]);
}