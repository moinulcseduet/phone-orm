<?php

namespace Loosemonkies\Bundle\CoreBundle\Exception;

/**
 * Thrown when a requested resource does not exist.
 *
 * @author Emran Hasan <emran@loosemonkies.com>
 */
class ResourceNotFoundException extends \Exception
{
    public function __construct($msg = '')
    {
        if ($msg){
            parent::__construct($msg, 404);
        } else {
            parent::__construct('The requested resource does not exist.', 404);
        }
    }
}