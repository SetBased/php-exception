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
   * {@inheritdoc}
   */
  public function getName()
  {
    return 'Error';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
