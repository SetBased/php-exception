<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

use SetBased\Exception\RuntimeException;

/**
 * Test cases for class RuntimeException.
 */
class RuntimeFormattedExceptionTest extends FormattedExceptionTestBase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function setUp(): void
  {
    parent::setUp();

    self::$class = RuntimeException::class;
    self::$name  = 'Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
