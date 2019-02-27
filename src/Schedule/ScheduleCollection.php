<?php

namespace Drupal\drupal_inquicker\Schedule;

use Drupal\drupal_inquicker\Utilities\Collection;

/**
 * A list of times for a hospital and a service line.
 */
class ScheduleCollection extends Collection {

  /**
   * Constructor.
   *
   * @param array $data
   *   Information about this collection of times, from Inquicker.
   */
  public function __construct(array $data) {
    parent::__construct();
    $this->data = $data;
    foreach ($data as $group) {
      foreach ($group['availableTimes'] as $date) {
        foreach ($date['times'] as $time) {
          $this->add([new Schedule($time)]);
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function itemClass() : string {
    return Schedule::class;
  }

}
