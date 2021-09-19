<?php

namespace Drupal\Tests\drupal_inquicker\Unit\Formatter;

use Drupal\drupal_inquicker\Formatter\ScheduleListFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Test ScheduleListFormatter.
 *
 * @group drupal_inquicker
 */
class ScheduleListFormatterTest extends TestCase {

  /**
   * Smoke test.
   */
  public function testSmoke() {
    $object = $this->getMockBuilder(ScheduleListFormatter::class)
      // NULL = no methods are mocked; otherwise list the methods here.
      ->setMethods([])
      ->disableOriginalConstructor()
      ->getMockForAbstractClass();

    $this->assertTrue(is_object($object));
  }

}
