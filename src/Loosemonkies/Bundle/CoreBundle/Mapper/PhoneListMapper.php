<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Mapper;

use Loosemonkies\Bundle\CoreBundle\Document\PhoneList;

class PhoneListMapper
{
    public function map($data, PhoneList $phoneListEntity)
    {
        $phone = $phoneListEntity;

        if (isset($data['name']) && !is_null($data['name'])) {
            $phone->setName($data['name']);
        }

        if (isset($data['phone_id']) && !is_null($data['phone_id'])) {
            $phone->setPhoneId($data['phone_id']);
        }

        if (isset($data['snippet']) && !is_null($data['snippet'])) {
            $phone->setSnippet($data['snippet']);
        }

        if (isset($data['description']) && !is_null($data['description'])) {
            $phone->setDescription($data['description']);
        }

        if (isset($data['images']) && !is_null($data['images'])) {
            $phone->setImages($data['images']);
        }

        if (isset($data['age']) && !is_null($data['age'])) {
            $phone->setAge($data['age']);
        }

        return $phone;
    }
}