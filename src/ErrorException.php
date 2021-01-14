<?php
declare(strict_types=1);

namespace SetBased\Exception;

/**
 * Class for PHP errors.
 */
class ErrorException extends \ErrorException implements NamedException
{
  protected static array $ourNames = [E_COMPILE_ERROR     => 'PHP Compile Error',
                                      E_COMPILE_WARNING   => 'PHP Compile Warning',
                                      E_CORE_ERROR        => 'PHP Core Error',
                                      E_CORE_WARNING      => 'PHP Core Warning',
                                      E_DEPRECATED        => 'PHP Deprecated Warning',
                                      E_ERROR             => 'PHP Fatal Error',
                                      E_NOTICE            => 'PHP Notice',
                                      E_PARSE             => 'PHP Parse Error',
                                      E_RECOVERABLE_ERROR => 'PHP Recoverable Error',
                                      E_STRICT            => 'PHP Strict Warning',
                                      E_USER_DEPRECATED   => 'PHP User Deprecated Warning',
                                      E_USER_ERROR        => 'PHP User Error',
                                      E_USER_NOTICE       => 'PHP User Notice',
                                      E_USER_WARNING      => 'PHP User Warning',
                                      E_WARNING           => 'PHP Warning'];

  //--------------------------------------------------------------------------------------------------------------------

  /**
   * {@inheritdoc}
   *
   * @since 1.0.0
   * @api
   */
  public function getName(): string
  {
    return isset(self::$ourNames[$this->getCode()]) ? self::$ourNames[$this->getCode()] : 'Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
