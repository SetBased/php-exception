<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Class for situations where PHP code has fallen through a switch statement or a combination of if-elseif statements.
 */
class FallenException extends RuntimeException
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param string $name  The name or description of the variable of expression.
   * @param string $value The actual value the variable or expression.
   *
   * Example:
   * ```
   *  $size = 'xxl';
   *  switch ($size)
   *  {
   *    case 'S':
   *      echo 'small';
   *      break;
   *
   *    case 'M':
   *      echo 'medium';
   *      break;
   *
   *    case 'L':
   *      echo 'small';
   *      break;
   *
   *    default:
   *      throw new FallenException('size', $size);
   *  }
   * ```
   */
  public function __construct($name, $value)
  {
    parent::__construct("Unknown or unexpected value '%s' for '%s'.", $value, $name);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
