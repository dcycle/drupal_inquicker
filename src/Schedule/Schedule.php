<?php

namespace Drupal\drupal_inquicker\Schedule;

/**
 * Represents a scheduled time.
 */
class Schedule {

  /**
   * Constructor.
   *
   * @param string $time
   *   A time such as 2019-03-13T09:20:00-06:00.
   * @param array $type
   *   A registration type such as ['id' => "emergency", 'name' => "ER"].
   * @param string $base_registration_url
   *   A registration URL such as https://example.inquicker.com/1.
   *   See the "Send to registration page" section of
   *   https://docs.inquicker.com/api/v2/#resources-list-schedules
   *   on how this will be used to construct a registration url.
   */
  public function __construct(string $time, array $type, string $base_registration_url) {
    $this->time = $time;
    $this->type = $type;
    $this->base_registration_url = $base_registration_url;
  }

  /**
   * Get raw data.
   *
   * @return array
   *   Raw data.
   */
  public function data() : array {
    return [
      'time' => $this->time,
      'type' => $this->type,
      'type_id' => $this->type['id'],
      'type_name' => $this->type['name'],
      'url' => $this->base_registration_url . '?at=' . $this->time . '&appointment_type=' . $this->type['id'],
    ];
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
    return [
      $this->type['id'] => $this->type,
    ];
  }

}
