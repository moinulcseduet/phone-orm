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
 * @ORM\Entity(repositoryClass="Loosemonkies\Bundle\CoreBundle\Repository\ClickRepository")
 * @ORM\Table(name="clicks")
 */
class Click
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $ads_id;

    /**
     * @ORM\Column(length=50)
     */
    protected $user_id;

    /**
     * @ORM\Column(type="float")
     */
    protected $score;

    /**
     * @ORM\Column(length=50)
     */
    protected $ip;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function toArray()
    {
        $data = array(
            'id'           => $this->getId(),
            'ads_id'       => $this->getAdsId(),
            'user_id'      => $this->getUserId(),
            'score'        => $this->getScore(),
            'ip'           => $this->getIp(),
            'date'         => $this->getDate()
        );

        return $data;
    }

    public function isValid()
    {
        try {
            Validator::create()->notEmpty()->alnum()->assert($this->getAdsId());
            Validator::create()->notEmpty()->alnum()->assert($this->getUserId());
        } catch (\InvalidArgumentException $e) {
            return false;
        }

        return true;
    }

    public function setAdsId($ads_id)
    {
        $this->ads_id = $ads_id;
    }

    public function getAdsId()
    {
        return $this->ads_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}