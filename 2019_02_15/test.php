<?php

function test(Callable $function) : bool {

  $kevin = new Elephpant();
  $kevin->favorite_topic = Topic::TOPIC_PHP;

  $suzie = new Elephpant();
  $suzie->favorite_topic = Topic::TOPIC_TRUNKS;

  $elephpants = [
      $kevin,
      $suzie
  ];

  $reports = [];

  $report_titles = [
      'Trunk Sleeves: The new pants?',
      'Writing PHP with no hands: The Elephpant Way!',
      'How many colors in your herd?',
      'PHP... just an extension of c?',
      'Trunks: Big fingers for your face',
      'Yellow... Who wants to go to Florida?',
      'Blue and other defaults.',
      'Anonymous functions and someone (maybe you)',
      'Git is too easy, let\'s switch back to svn (an editorial)',
      'Human ears are too small: One Elephpant\'s opinion.',
      'Stop writing code for your human!',
  ];

  for ($x = 0; $x < 4; $x++) {
    $report = new Report();
    $report->topic = rand(1,4);
    $title_index = rand(0, count($report_titles) - 1);
    $report->title = $report_titles[$title_index];
    unset($report_titles[$title_index]);
    $report_titles = array_values($report_titles);
    $reports[] = $report;
  }


  $function($elephpants, $reports);

  /** @var Elephpant $elephpant */
  foreach ($elephpants as $elephpant) {
    if (!$elephpant->check_reports($reports)) {
      return false;
    }
  }

  return true;
}


class Topic
{
  const TOPIC_COLORS = 1;
  const TOPIC_TRUNKS = 2;
  const TOPIC_PHP    = 3;
  const TOPIC_CODE   = 4;
}

class Report
{
  /** @var int $topic */
  public $topic;

  /** @var string $title */
  public $title;
}

class Elephpant
{
  /** @var int $favorite_topic */
  public $favorite_topic;

  /** @var Report[] $reports each report of their favorite topic type */
  public $reports;

  public function check_reports($reports) : bool
  {
    /** @var Report $report */
    foreach ($reports as $report) {
      if ((!in_array($report, $this->reports)) && ($report->topic == $this->favorite_topic)) {
        return false;
      }
    }

    return true;
  }
}