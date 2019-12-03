<?php
declare(strict_types=1);

namespace SetBased\Exception\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use SetBased\Exception\NamedException;

/**
 * Test cases for class FormattedException.
 */
class FormattedExceptionTestBase extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The class being tested.
   *
   * @var string
   */
  static $class;

  /**
   * The name of the exception.
   *
   * @var string
   */
  static $name;

  //--------------------------------------------------------------------------------------------------------------------

  /**
   * Test formatting.
   */
  public function testCode(): void
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
      self::assertSame('There are 5 monkeys in the tree', $e->getMessage());
      self::assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test code & previous exception.
   */
  public function testCodePrevious(): void
  {
    $num      = 5;
    $location = 'tree';
    $previous = new RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$num, $previous], $format, $num, $location);
    }
    catch (Exception $e)
    {
      self::assertSame('There are 5 monkeys in the tree', $e->getMessage());
      self::assertSame($previous, $e->getPrevious());
      self::assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting.
   */
  public function testFormatting(): void
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
      self::assertSame('There are 5 monkeys in the tree', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting string with missing arguments.
   */
  public function testFormattingMissingArgs1(): void
  {
    try
    {
      $format = '%s';

      throw new self::$class($format);
    }
    catch (Exception $e)
    {
      self::assertSame('%s', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting null string.
   */
  public function testFormattingNull1(): void
  {
    try
    {
      $format = null;

      throw new self::$class($format);
    }
    catch (Exception $e)
    {
      self::assertSame('', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting null string and bogus arguments.
   */
  public function testFormattingNull2(): void
  {
    try
    {
      $format = null;

      throw new self::$class($format, 'bogus', 123);
    }
    catch (Exception $e)
    {
      self::assertSame('', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting string with missing arguments.
   */
  public function testFormattingMissingArgs2(): void
  {
    try
    {
      $format = '%';

      throw new self::$class($format);
    }
    catch (Exception $e)
    {
      self::assertSame('%', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test formatting string without arguments.
   */
  public function testFormattingNoArgs(): void
  {
    try
    {
      $format = 'Of all monkey 50% are in the tree';

      throw new self::$class($format);
    }
    catch (Exception $e)
    {
      self::assertSame('Of all monkey 50% are in the tree', $e->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test name.
   */
  public function testName(): void
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
      self::assertSame(self::$name, $e->getName());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test previous exception.
   */
  public function testPrevious(): void
  {
    $num      = 5;
    $location = 'tree';
    $previous = new RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$previous], $format, $num, $location);
    }
    catch (Exception $e)
    {
      self::assertSame('There are 5 monkeys in the tree', $e->getMessage());
      self::assertSame($previous, $e->getPrevious());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test previous & code exception.
   */
  public function testPreviousCode(): void
  {
    $num      = 5;
    $location = 'tree';
    $previous = new RuntimeException('Previous');

    try
    {
      $format = 'There are %d monkeys in the %s';

      throw new self::$class([$previous, $num], $format, $num, $location);
    }
    catch (Exception $e)
    {
      self::assertSame('There are 5 monkeys in the tree', $e->getMessage());
      self::assertSame($previous, $e->getPrevious());
      self::assertSame($num, $e->getCode());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
