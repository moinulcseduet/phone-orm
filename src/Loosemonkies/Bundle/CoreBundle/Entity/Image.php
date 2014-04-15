<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Entity;

class Image
{
    protected $photo;

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

}