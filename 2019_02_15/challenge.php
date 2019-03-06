<?php
/**
 * One of the elephpants' favorite games is reporter.  They observe something in the world.
 * They write about it.  Then they publish their writing on the side of their desks.
 * Other elephpants come by and, if they're interested, they read the report.
 * If they're not, they keep walking until they see a report they like pop up.
 *
 * While this is all well and good, the elephpants do a heck of a lot of walking
 * while waiting for a report to come that they want to read.  It'd be much better if
 * something delivered all the reports they were interested in straight to their desks.
 *
 * This week's challenge is to implement a report retriever who can search through
 * all the reports that come through and only grab the ones their designated elephpant has asked
 * for.
 *
 * Caveats:
 *  - reports will only have 1 topic
 *  - elephpants will only have 1 favorite topic they want to know about
 *
 * Good Luck!
 */

$function = function(array $elephpants, array $reports) {
  // YOUR CODE GOES HERE
};

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

test($function);


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