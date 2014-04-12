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

use Doctrine\ORM\Mapping as ORM;
use Respect\Validation\Validator;

/**
 * @ORM\Entity(repositoryClass="Loosemonkies\Bundle\CoreBundle\Repository\PhoneRepository")
 * @ORM\Table(name="phones")
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(length=150)
     */
    protected $phone_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $age;

    /**
     * @ORM\Column(length=150)
     */
    protected $name;

    /**
     * @ORM\Column(length=350)
     */
    protected $snippet;

    /**
     * @ORM\Column(length=500)
     */
    protected $description;

    /**
     * @ORM\Column(length=150)
     */
    protected $images;

    public function toArray()
    {
        $data = array(
            'id'           => $this->getId(),
            'age'          => $this->getAge(),
            'name'         => $this->getName(),
            'phone_id'     => $this->getPhoneId(),
            'snippet'      => $this->getSnippet(),
            'description'  => $this->getDescription(),
            'images'       => $this->getImages()
        );

        return $data;
    }

    public function isValid()
    {
        try {
            Validator::create()->notEmpty()->alnum()->assert($this->getAge());
            Validator::create()->notEmpty()->assert($this->getName());
            Validator::create()->notEmpty()->assert($this->getPhoneId());
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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