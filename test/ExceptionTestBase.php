<?php
//----------------------------------------------------------------------------------------------------------------------
use SetBased\Exception\NamedException;

//----------------------------------------------------------------------------------------------------------------------
class ExceptionTestBase extends PHPUnit_Framework_TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  static $class;

  static $name;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test name.
   */
  public function testName()
  {
    if (self::$name===null) return;

    $num      = 5;
    $location = 'tree';

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$num], $format, $num, $location);
    }
    catch (Exception $e)
    {
      /** @var $e NamedException */
      $this->assertSame(self::$name, $e->getName());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting.
   */
  public function testCode()
  {
    $num      = 5;
    $location = 'tree';

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$num], $format, $num, $location);
    }
    catch (Exception $e)
    {
      $this->assertSame('There are 5 monkeys in the tree', $e->getMessage());
      $this->assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting.
   */
  public function testFormatting()
  {
    $num      = 5;
    $location = 'tree';

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class($format, $num, $location);
    }
    catch (Exception $e)
    {
      $this->assertSame('There are 5 monkeys in the tree', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test previous exception.
   */
  public function testPrevious()
  {
    $num      = 5;
    $location = 'tree';
    $previous = new \RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$previous], $format, $num, $location);
    }
    catch (Exception $e)
    {
      $this->assertSame('There are 5 monkeys in the tree', $e->getMessage());
      $this->assertSame($previous, $e->getPrevious());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test code & previous exception.
   */
  public function testCodePrevious()
  {
    $num      = 5;
    $location = 'tree';
    $previous = new \RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$num, $previous], $format, $num, $location);
    }
    catch (Exception $e)
    {
      $this->assertSame('There are 5 monkeys in the tree', $e->getMessage());
      $this->assertSame($previous, $e->getPrevious());
      $this->assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test previous & code exception.
   */
  public function testPreviousCode()
  {
    $num      = 5;
    $location = 'tree';
    $previous = new \RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$previous, $num], $format, $num, $location);
    }
    catch (Exception $e)
    {
      $this->assertSame('There are 5 monkeys in the tree', $e->getMessage());
      $this->assertSame($previous, $e->getPrevious());
      $this->assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
