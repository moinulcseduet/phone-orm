<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Loosemonkies\Bundle\CoreBundle\Utility\Url as UrlHelper;

/**
 * @ODM\Document(collection="industries",repositoryClass="Loosemonkies\Bundle\CoreBundle\Repository\IndustryRepository")
 */

class Industry
{
    /** @ODM\Id */
    protected $id;

    /**
     * @ODM\String
     * @ODM\Index(safe=true)
     */
    protected $name;

    /**
     * @ODM\String
     * @ODM\Index(unique=true, safe=true)
     */
    protected $slug;

    /** @ODM\Int */
    protected $sortOrder;

    /** @ODM\PrePersist */
    public function generateSlug()
    {
        if (is_null($this->getId())) {
            $this->setSlug(UrlHelper::getSlug($this->getName()));
        }
    }

    public function toArray()
    {
        $data = array(
            'id'         => $this->getId(),
            'name'       => $this->getName(),
            'slug'       => $this->getSlug(),
            'sort_order' => $this->getSortOrder()
        );

        return $data;
    }

    public function isValid()
    {
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}