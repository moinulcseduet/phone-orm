<?php

namespace Loosemonkies\Bundle\CoreBundle\Mapper;

use Loosemonkies\Bundle\CoreBundle\Entity\Click;

class ClickMapper extends BaseMapper
{
    protected $applicableFields = array('score');

    public function map($data, Click $clickEntity)
    {
        $data = $this->clean($this->applicableFields, $data);

        if (isset($data['id']) && !is_null($data['id'])) {
            $clickEntity->setId($data['id']);
        }

        if (isset($data['ads_id']) && !is_null($data['ads_id'])) {
            $clickEntity->setAdsId($data['ads_id']);
        }

        if (isset($data['user_id']) && !is_null($data['user_id'])) {
            $clickEntity->setUserId($data['user_id']);
        }

        if (isset($data['score']) && !is_null($data['score'])) {
            $clickEntity->setScore($data['score']);
        }

        if (isset($data['ip']) && !is_null($data['ip'])) {
            $clickEntity->setIp($data['ip']);
        }

        $clickEntity->setDate(new \DateTime());

        return $clickEntity;
    }
}