<?php

namespace Drupal\drupal_inquicker\Schedule;

/**
 * Represents a scheduled time.
 */
class Schedule {

  /**
   * Constructor.
   *
   * @param array $data
   *   Information about this scheduled time.
   */
  public function __construct(array $data) {
    $this->data = $data;
  }

  /**
   * Get raw data.
   *
   * @return array
   *   Raw data.
   */
  public function data() : array {
    return $this->data;
  }

  /**
   * Get the type IDs and names.
   *
   * @return array
   *   The type ids and names, for example:
   *   [
   *     'my-type' => ['name' => 'My Type'],
   *   ].
   */
  public function types() : array {
    $return = [];
    foreach ($this->data['appointmentTypes'] as $type) {
      $return[$type['id']] = $type;
    }
    return $return;
  }

}
