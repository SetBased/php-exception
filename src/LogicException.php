<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Exception;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Class for errors in program logic.
 */
class LogicException extends \LogicException implements NamedException
{
  //--------------------------------------------------------------------------------------------------------------------
  use FormattedException;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param mixed ... The arguments, see {@see \SetBased\Exception\FormattedException::formattedConstruct}.
   *
   * @since 1.0.0
   * @api
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
    return 'Programming Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
