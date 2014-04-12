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

use Loosemonkies\Bundle\CoreBundle\Document\Industry;

class IndustryMapper extends BaseMapper
{
    protected $applicableFields = array('name');

    public function map($data, Industry $industryEntity)
    {
        $data = $this->clean($this->applicableFields, $data);

        $industry = $industryEntity;

        if (isset($data['name']) && !is_null($data['name'])) {
            $industry->setName($data['name']);
        }

        if (isset($data['slug']) && !is_null($data['slug'])) {
            $industry->setSlug($data['slug']);
        }

        if (isset($data['sort_order']) && !is_null($data['sort_order'])) {
            $industry->setSortOrder($data['sort_order']);
        }

        return $industry;
    }
}