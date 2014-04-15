<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Repository;

use Loosemonkies\Bundle\CoreBundle\Document\PhoneList;
use Loosemonkies\Bundle\CoreBundle\Mapper\PhoneListMapper;

use Doctrine\ODM\MongoDB\DocumentRepository;

class PhoneListRepository extends DocumentRepository
{
    public function insert($data)
    {
        $exists = $this->exists($data);

        if ($exists) {
            return $exists;
        }

        $phoneEntity = new PhoneList();

        $mapper   = new PhoneListMapper();
        $phone = $mapper->map($data, $phoneEntity);

        if ($phone->isValid() === false) {

            throw new \InvalidArgumentException();
        }

        $this->dm->persist($phone);
        $this->dm->flush();

        return $phone;
    }

    public function exists($data)
    {
        $exists = $this->findOneBy(array('name' => $data['name']));

        if (empty($exists)) {
            return false;
        }

        return $exists;
    }

    public function getAll()
    {
        $results = $this->findAll();

        if (count($results) < 1) {

            return false;
        }

        $phones = array();

        foreach ($results as $phone) {

            $phones[] = $phone->toArray();
        }

        return $phones;


        /*$results = $this->createQueryBuilder('LoosemonkiesCoreBundle:PhoneList')
                        ->getQuery()
                        ->execute();


        if (($results->count()) == 0) {

            return false;
        }

        $phones = array();

        foreach ($results as $phone) {

            $phones[] = $phone->toArray();
        }

        return $phones;*/
    }

    public function getPhoneByPhoneId($id)
    {
        $results = $this->findOneBy(array('phone_id' => $id));

        return $results->toArray();

    }

    public function searchPhoneByKeyword($keyword)
    {
        $qb = $this->createQueryBuilder('LoosemonkiesCoreBundle:PhoneList');
        $qb->addOr($qb->expr()->field('name')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));
        $qb->addOr($qb->expr()->field('snippet')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));
        $qb->addOr($qb->expr()->field('description')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));

        $results = $qb->getQuery()->execute();

        if (($results->count()) == 0) {

            return false;
        }

        $phones = array();

        foreach ($results as $phone) {

            $phones[] = $phone->toArray();
        }

        return $phones;
    }

    public function searchPhoneByKeywordWithSorting($keyword, $sort)
    {
        $qb = $this->createQueryBuilder('LoosemonkiesCoreBundle:PhoneList');

        if (!empty($keyword)) {
            $qb->addOr($qb->expr()->field('name')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));
            $qb->addOr($qb->expr()->field('snippet')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));
            $qb->addOr($qb->expr()->field('description')->equals(new \MongoRegex('/.*'.$keyword.'.*/i')));
        }

        if ($sort == 'name') {
            $qb->sort('name', 'ASC');

        } elseif ($sort == 'age') {
            $qb->sort('age', 'ASC');

        } else {
            $qb->sort('age', 'DESC');
        }

        $results = $qb->getQuery()->execute();

        if (($results->count()) == 0) {

            return false;
        }

        $phones = array();

        foreach ($results as $phone) {

            $phones[] = $phone->toArray();
        }

        return $phones;
    }

}