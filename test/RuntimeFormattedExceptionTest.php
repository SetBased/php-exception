<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

/**
 * Test cases for class RuntimeException.
 */
class RuntimeFormattedExceptionTest extends FormattedExceptionTestBase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function setUp(): void
  {
    parent::setUp();

    self::$class = '\SetBased\Exception\RuntimeException';
    self::$name  = 'Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
