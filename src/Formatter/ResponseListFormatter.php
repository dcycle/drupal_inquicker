<?php

namespace Drupal\drupal_inquicker\Formatter;

use Drupal\drupal_inquicker\Inquicker\RowCollection;
use Drupal\drupal_inquicker\traits\Singleton;

/**
 * Formats a RowCollection as an array of ids.
 */
class ResponseListFormatter extends Formatter {

  use Singleton;

  /**
   * {@inheritdoc}
   */
  public function catchError(\Throwable $t) {
    $this->watchdogThrowable($t);
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function formatValidatedSource($data) {
    $return = [];
    foreach ($data as $location) {
      $return[$location->id()] = $location->id();
    }
    return $return;
  }

  /**
   * {@inheritdoc}
   */
  public function validateSource($data) {
    $this->validateClass($data, RowCollection::class);
    $data->validateMembers();
  }

}
