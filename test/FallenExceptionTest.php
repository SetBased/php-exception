<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception\Test;

use PHPUnit\Framework\TestCase;
use SetBased\Exception\FallenException;

/**
 * Test cases for class ErrorException.
 */
class FallenExceptionTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function testName()
  {
    try
    {
      throw new FallenException('foo', 'bar');
    }
    catch (\Exception $e)
    {
      self::assertContains('foo', $e->getMessage());
      self::assertContains('bar', $e->getMessage());
      self::assertInstanceOf('\RuntimeException', $e);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
