<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

use SetBased\Exception\LogicException;

/**
 * Test case for class LogicException.
 */
class LogicFormattedExceptionTest extends FormattedExceptionTestBase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function setUp(): void
  {
    parent::setUp();

    self::$class = LogicException::class;
    self::$name  = 'Programming Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
