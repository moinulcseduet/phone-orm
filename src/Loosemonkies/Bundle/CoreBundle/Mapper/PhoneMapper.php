<?php

namespace Loosemonkies\Bundle\CoreBundle\Mapper;

use Loosemonkies\Bundle\CoreBundle\Entity\Phone;

class PhoneMapper
{
    public function map($data, Phone $phoneEntity)
    {
        if (isset($data['id']) && !is_null($data['id'])) {
            $phoneEntity->setId($data['id']);
        }

        if (isset($data['age']) && !is_null($data['age'])) {
            $phoneEntity->setAge($data['age']);
        }

        if (isset($data['phone_id']) && !is_null($data['phone_id'])) {
            $phoneEntity->setPhoneId($data['phone_id']);
        }

        if (isset($data['name']) && !is_null($data['name'])) {
            $phoneEntity->setName($data['name']);
        }

        if (isset($data['snippet']) && !is_null($data['snippet'])) {
            $phoneEntity->setSnippet($data['snippet']);
        }

        if (isset($data['description']) && !is_null($data['description'])) {
            $phoneEntity->setDescription($data['description']);
        }

        if (isset($data['images']) && !is_null($data['images'])) {
            $phoneEntity->setImages($data['images']);
        }

        return $phoneEntity;
    }
}