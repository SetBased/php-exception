<?php
declare(strict_types=1);

namespace SetBased\Exception;

use Exception;

/**
 * Trait for exception classes with format string in constructor.
 *
 * Example:
 * ```
 * class MyException extends \Exception
 * {
 *   use FormattedException;
 *
 *   public function __construct()
 *   {
 *     list($message, $code, $previous) = self::formattedConstruct(func_get_args());
 *
 *     parent::__construct($message, $code, $previous);
 *   }
 * }
 * ```
 */
trait FormattedException
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param mixed ...$args The arguments, see {@see formattedConstruct()}.
   *
   * @since 2.0.0
   * @api
   */
  public function __construct(...$args)
  {
    list($message, $code, $previous) = self::formattedConstruct($args);

    parent::__construct($message, $code, $previous);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a list of arguments for \Exception::_construct.
   *
   * @param array $args The arguments for __construct.
   *
   * Below we give same samples of valid combinations for arguments for __construct.
   * ```
   * // Exception with message
   * new MyException('Something went wrong');
   *
   * // Exception with a format string
   * new MyException('There are %d monkeys in the %s', 5, 'tree');
   *
   * // Exception with a message
   * new MyException('Of all monkey 50% are in the tree');
   *
   * // Exception with an exception code
   * new MyException([$code], 'There are %d monkeys in the %s', 5, 'tree');
   *
   * // Exception with q previous exception
   * new MyException([$previous], 'There are %d monkeys in the %s', 5, 'tree');
   *
   * // Exception with an exception code and a previous exception
   * new MyException([$code,$previous], 'There are %d monkeys in the %s', 5, 'tree');
   * // or
   * new MyException([$previous,$code], 'There are %d monkeys in the %s', 5, 'tree');
   * ```
   *
   * @return array
   *
   * @since 1.0.0
   * @api
   */
  public static function formattedConstruct(array $args): array
  {
    $code     = 0;
    $previous = null;
    $format   = array_shift($args) ?? '';

    if (is_array($format))
    {
      $special = $format;
      $format  = array_shift($args);

      for ($i = 0; $i<2; $i++)
      {
        if (isset($special[$i]))
        {
          if ($special[$i] instanceof Exception) $previous = $special[$i];
          elseif (is_int($special[$i])) $code = $special[$i];
        }
      }
    }

    return [empty($args) ? $format : vsprintf($format, $args), $code, $previous];
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
