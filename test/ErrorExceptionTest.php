<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception\Test;

use PHPUnit\Framework\TestCase;
use SetBased\Exception\ErrorException;

/**
 * Test cases for class ErrorException.
 */
class ErrorExceptionTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test ErrorException with valid code.
   */
  public function test1()
  {
    try
    {
      throw new ErrorException('Something went wrong', E_WARNING);
    }
    catch (ErrorException $e)
    {
      self::assertSame('PHP Warning', $e->getName());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test ErrorException with invalid code.
   */
  public function test2()
  {
    try
    {
      throw new ErrorException('Something went wrong', 123456);
    }
    catch (ErrorException $e)
    {
      self::assertSame('Error', $e->getName());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
