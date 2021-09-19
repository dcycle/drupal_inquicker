<?php

namespace Drupal\Tests\drupal_inquicker\Unit\Formatter;

use Drupal\drupal_inquicker\Formatter\RequirementsFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Test RequirementsFormatter.
 *
 * @group drupal_inquicker
 */
class RequirementsFormatterTest extends TestCase {

  /**
   * Smoke test.
   */
  public function testSmoke() {
    $object = $this->getMockBuilder(RequirementsFormatter::class)
      // NULL = no methods are mocked; otherwise list the methods here.
      ->setMethods([])
      ->disableOriginalConstructor()
      ->getMockForAbstractClass();

    $this->assertTrue(is_object($object));
  }

}
