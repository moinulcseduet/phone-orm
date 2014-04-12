<?php

namespace Loosemonkies\Bundle\CoreBundle\Exception;

/**
 * Thrown when an bad request is made.
 *
 * @author Md. Moinul Islam <moinul@loosemonkies.com>
 */
class BadRequestException extends \Exception
{
    public function __construct()
    {
        parent::__construct('You have no sufficient credit to buy the requested subscription package.', 400);
    }
}