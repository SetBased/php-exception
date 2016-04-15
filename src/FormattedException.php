<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception;

//----------------------------------------------------------------------------------------------------------------------
trait FormattedException
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param string|array $format    The format string of the error message, see
   *                                [sprintf](http://php.net/manual/function.sprintf.php).
   * @param mixed        $param,... The arguments for the format string. However, if the first argument is an exception
   *                                it will be used as the [previous](http://php.net/manual/exception.construct.php)
   *                                exception for the exception chaining.
   */
  public function __construct($format)
  {
    $code     = 0;
    $previous = null;

    $args = func_get_args();
    array_shift($args);

    if (is_array($format))
    {
      $special = $format;
      $format  = array_shift($args);

      if (isset($special[0]))
      {
        if ($special[0] instanceof \Exception) $previous = $special[0];
        elseif (is_int($special[0])) $code = $special[0];
      }

      if (isset($special[1]))
      {
        if ($special[1] instanceof \Exception) $previous = $special[1];
        elseif (is_int($special[1])) $code = $special[1];
      }
    }

    parent::__construct(vsprintf($format, $args), $code, $previous);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
