<?php
class ReportRetriever {
  private $elephpant;

  public function __construct($elephpant) {
    $this->elephpant = $elephpant;
    $this->initialize_reports();
  }

  private function initialize_reports() {
    if(!isset($this->elephpant->reports)) {
      $this->elephpant->reports = [];
    }
  }

  private function is_interesting($report) {
    return $this->elephpant->favorite_topic === $report->topic;
  }

  private function add_report($report) {
    $this->elephpant->reports[] = $report;
  }

  public function retrieve($reports) {
    foreach($reports as $report) {
      if($this->is_interesting($report)) {
        $this->add_report($report);
      }
    }
  }
}

return function(array $elephpants, array $reports) {
  foreach($elephpants as $elephpant) {
    (new ReportRetriever($elephpant))->retrieve($reports);
  }
};