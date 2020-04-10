<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use SetBased\Exception\FallenException;

/**
 * Test cases for class ErrorException.
 */
class FallenExceptionTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  public function testName(): void
  {
    try
    {
      throw new FallenException('foo', 'bar');
    }
    catch (Exception $e)
    {
      self::assertStringContainsString('foo', $e->getMessage());
      self::assertStringContainsString('bar', $e->getMessage());
      self::assertInstanceOf(\LogicException::class, $e);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
