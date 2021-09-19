<?php

namespace Drupal\Tests\drupal_inquicker\Unit\Source;

use Drupal\drupal_inquicker\Source\DummySource;
use PHPUnit\Framework\TestCase;

/**
 * Test DummySource.
 *
 * @group drupal_inquicker
 */
class DummySourceTest extends TestCase {

  /**
   * Smoke test.
   */
  public function testSmoke() {
    $object = $this->getMockBuilder(DummySource::class)
      // NULL = no methods are mocked; otherwise list the methods here.
      ->setMethods([])
      ->disableOriginalConstructor()
      ->getMockForAbstractClass();

    $this->assertTrue(is_object($object));
  }

}
