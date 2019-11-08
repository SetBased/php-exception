<?php
declare(strict_types=1);

namespace SetBased\Exception;

/**
 * Interface for exceptions with user-friendly names.
 */
interface NamedException
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a user-friendly name of this exception.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getName(): string;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
