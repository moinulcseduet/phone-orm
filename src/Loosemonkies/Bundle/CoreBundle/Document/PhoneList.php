<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Md. Moinul Islam
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Respect\Validation\Validator;

/**
 * @ODM\Document(collection="phones",repositoryClass="Loosemonkies\Bundle\CoreBundle\Repository\PhoneListRepository")
 */

class PhoneList
{
    /** @ODM\Id */
    protected $id;

    /**
     * @ODM\String
     *
     */
    protected $name;

    /**
     * @ODM\String
     *
     */
    protected $snippet;

    /**
     * @ODM\String
     *
     */
    protected $description;

    /**
     * @ODM\String
     *
     */
    protected $images;

    /**
     * @ODM\String
     *
     */
    protected $phone_id;

    /** @ODM\Int */
    protected $age;


    public function toArray()
    {
        $data = array(
            'id'         => $this->getId(),
            'name'       => $this->getName(),
            'phone_id'   => $this->getPhoneId(),
            'snippet'    => $this->getSnippet(),
            'description' => $this->getDescription(),
            'images'     => $this->getImages(),
            'age'        => $this->getAge()
        );

        return $data;
    }

    public function isValid()
    {
        try {
            Validator::create()->notEmpty()->assert($this->getName());
            Validator::create()->notEmpty()->assert($this->getPhoneId());
            Validator::create()->notEmpty()->assert($this->getSnippet());
            Validator::create()->notEmpty()->assert($this->getDescription());
            Validator::create()->notEmpty()->assert($this->getAge());
            //Validator::create()->notEmpty()->assert($this->getImages());

        } catch (\InvalidArgumentException $e) {
            return false;
        }

        return true;
    }

    /**
     * Set age
     *
     * @param mixed $age
     *
     * @return PhoneList
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set description
     *
     * @param mixed $description
     *
     * @return PhoneList
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set images
     *
     * @param mixed $images
     *
     * @return PhoneList
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set name
     *
     * @param mixed $name
     *
     * @return PhoneList
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone_id
     *
     * @param mixed $phone_id
     *
     * @return PhoneList
     */
    public function setPhoneId($phone_id)
    {
        $this->phone_id = $phone_id;

        return $this;
    }

    /**
     * Get phone_id
     *
     * @return mixed
     */
    public function getPhoneId()
    {
        return $this->phone_id;
    }

    /**
     * Set snippet
     *
     * @param mixed $snippet
     *
     * @return PhoneList
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;

        return $this;
    }

    /**
     * Get snippet
     *
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

}