<?php

namespace Drupal\drupal_inquicker\traits;

use Drupal\drupal_inquicker\Formatter\KeyListFormatter;
use Drupal\drupal_inquicker\Formatter\RequirementsFormatter;
use Drupal\drupal_inquicker\Formatter\ResponseListFormatter;
use Drupal\drupal_inquicker\Formatter\DetailedResponseListFormatter;
use Drupal\drupal_inquicker\Formatter\ScheduleFormatter;
use Drupal\drupal_inquicker\Formatter\ScheduleListFormatter;
use Drupal\drupal_inquicker\Source\SourceCollection;
use Drupal\drupal_inquicker\Source\SourceCollectionFactory;
use Drupal\drupal_inquicker\Source\SourceFactory;
use Drupal\drupal_inquicker\Inquicker\Inquicker;

/**
 * Dependency injection.
 *
 * Any class can "use DependencyInjection" and have access these methods which
 * can be mocked during tests.
 */
trait DependencyInjection {

  /**
   * Get the DetailedResponseListFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\DetailedResponseListFormatter
   *   The DetailedResponseListFormatter singleton.
   */
  public function detailedResponseListFormatter() : DetailedResponseListFormatter {
    return DetailedResponseListFormatter::instance();
  }

  /**
   * Get the Inquicker app singleton.
   *
   * @return \Drupal\drupal_inquicker\Inquicker\Inquicker
   *   The Inquicker singleton.
   */
  public function inquicker() : Inquicker {
    return Inquicker::instance();
  }

  /**
   * Get the KeyListFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\KeyListFormatter
   *   The KeyListFormatter singleton.
   */
  public function keyListFormatter() : KeyListFormatter {
    return KeyListFormatter::instance();
  }

  /**
   * The REQUIREMENT_ERROR constant.
   *
   * This is not defined in some cases, for example if this called indirectly
   * from code in /devel/php.
   *
   * @return int
   *   The REQUIREMENT_ERROR constant.
   */
  public function requirementError() : int {
    if (defined('REQUIREMENT_ERROR')) {
      return REQUIREMENT_ERROR;
    }
    else {
      return 2;
    }
  }

  /**
   * Get the RequirementsFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\RequirementsFormatter
   *   The RequirementsFormatter singleton.
   */
  public function requirementsFormatter() : RequirementsFormatter {
    return RequirementsFormatter::instance();
  }

  /**
   * The REQUIREMENT_INFO constant.
   *
   * This is not defined in some cases, for example if this called indirectly
   * from code in /devel/php.
   *
   * @return int
   *   The REQUIREMENT_INFO constant.
   */
  public function requirementInfo() : int {
    if (defined('REQUIREMENT_INFO')) {
      return REQUIREMENT_INFO;
    }
    else {
      return -1;
    }
  }

  /**
   * The REQUIREMENT_OK constant.
   *
   * This is not defined in some cases, for example if this called indirectly
   * from code in /devel/php.
   *
   * @return int
   *   The REQUIREMENT_OK constant.
   */
  // @codingStandardsIgnoreStart
  public function requirementOK() : int {
  // @codingStandardsIgnoreEnd
    if (defined('REQUIREMENT_OK')) {
      return REQUIREMENT_OK;
    }
    else {
      return 0;
    }
  }

  /**
   * The REQUIREMENT_WARNING constant.
   *
   * This is not defined in some cases, for example if this called indirectly
   * from code in /devel/php.
   *
   * @return int
   *   The REQUIREMENT_WARNING constant.
   */
  public function requirementWarning() : int {
    if (defined('REQUIREMENT_WARNING')) {
      return REQUIREMENT_WARNING;
    }
    else {
      return 1;
    }
  }

  /**
   * Get the ResponseListFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\ResponseListFormatter
   *   The ResponseListFormatter singleton.
   */
  public function responseListFormatter() : ResponseListFormatter {
    return ResponseListFormatter::instance();
  }

  /**
   * Get the ScheduleFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\ScheduleFormatter
   *   The ScheduleFormatter singleton.
   */
  public function scheduleFormatter() : ScheduleFormatter {
    return ScheduleFormatter::instance();
  }

  /**
   * Get the ScheduleListFormatter singleton.
   *
   * @return \Drupal\drupal_inquicker\Formatter\ScheduleListFormatter
   *   The ScheduleListFormatter singleton.
   */
  public function scheduleListFormatter() : ScheduleListFormatter {
    return ScheduleListFormatter::instance();
  }

  /**
   * Get the SourceCollectionFactory singleton.
   *
   * @return \Drupal\drupal_inquicker\Source\SourceCollectionFactory
   *   The SourceCollectionFactory singleton.
   */
  public function sourceCollectionFactory() : SourceCollectionFactory {
    return SourceCollectionFactory::instance();
  }

  /**
   * Get the SourceFactory singleton.
   *
   * @return \Drupal\drupal_inquicker\Source\SourceFactory
   *   The SourceFactory singleton.
   */
  public function sourceFactory() : SourceFactory {
    return SourceFactory::instance();
  }

  /**
   * Get all Sources.
   *
   * @return \Drupal\drupal_inquicker\Source\SourceCollection
   *   All Sources.
   *
   * @throws \Exception
   */
  public function sources() : SourceCollection {
    return $this->sourceCollectionFactory()->all();
  }

}
