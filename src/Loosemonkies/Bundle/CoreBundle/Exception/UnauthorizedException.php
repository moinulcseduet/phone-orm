<?php

namespace Loosemonkies\Bundle\CoreBundle\Exception;

/**
 * Thrown when an unauthorized request is made.
 *
 * @author Emran Hasan <emran@loosemonkies.com>
 */
class UnauthorizedException extends \Exception
{
    public function __construct($errorMessage = '')
    {
        if(!$errorMessage){
            $errorMessage = 'The authorization token is not valid for the requesting operation.';
        }

        parent::__construct($errorMessage, 401);
    }
}