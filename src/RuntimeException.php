<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Class for runtime exceptions.
 */
class RuntimeException extends \RuntimeException implements NamedException
{
  //--------------------------------------------------------------------------------------------------------------------
  use FormattedException;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * See {@see \SetBased\Exception\FormattedException::formattedConstruct()} for argument list.
   *
   * @param mixed ... The arguments, see {@see \SetBased\Exception\FormattedException::formattedConstruct()}.
   */
  public function __construct()
  {
    list($message, $code, $previous) = self::formattedConstruct(func_get_args());

    parent::__construct($message, $code, $previous);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  public function getName()
  {
    return 'Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
