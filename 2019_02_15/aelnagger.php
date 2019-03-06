<?php
return function(array $elephpants, array $reports) {
  array_walk($elephpants, function($elephant) use ($reports){
    $elephant->reports = array_filter($reports, function($report) use ($elephant){
      return $elephant->favorite_topic == $report->topic;
    });
  });
};