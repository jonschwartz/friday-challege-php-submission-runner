<?php
class ReportRetrieveo {
  private $lookup;

  public function __construct(array $reports) {
    $this->lookup = array_reduce ($reports, function($reportLookup, $report) {
      $thisTopic = $report->topic;
      $isNewTopic = !isset($reportLookup[$thisTopic]);
      $isNewTopic ? $reportLookup[$thisTopic] = array($report) : array_push($reportLookup[$thisTopic], $report);
      return $reportLookup;
    }, array());
  }

  public function getReportsByTopic(int $topic) {
    return isset($this->lookup[$topic]) ? $this->lookup[$topic] : [];
  }
}

return function(array $elephpants, array $reports) {
  $reportRetriever = new ReportRetrieveo($reports);
  foreach ($elephpants as $elephpant) {
    $elephpant->reports = $reportRetriever->getReportsByTopic($elephpant->favorite_topic);
  }
};