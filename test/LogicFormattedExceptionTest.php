<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

/**
 * Test case for class LogicException.
 */
class LogicFormattedExceptionTest extends FormattedExceptionTestBase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function setUp(): void
  {
    parent::setUp();

    self::$class = '\SetBased\Exception\LogicException';
    self::$name  = 'Programming Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
