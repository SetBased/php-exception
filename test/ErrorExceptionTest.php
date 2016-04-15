<?php
//----------------------------------------------------------------------------------------------------------------------
use SetBased\Exception\ErrorException;

//----------------------------------------------------------------------------------------------------------------------
class ErrorExceptionTest extends PHPUnit_Framework_TestCase
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
      $this->assertSame('PHP Warning', $e->getName());
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
      $this->assertSame('Error', $e->getName());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
