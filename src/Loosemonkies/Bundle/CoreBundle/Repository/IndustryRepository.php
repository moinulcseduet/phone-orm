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

use Loosemonkies\Bundle\CoreBundle\Document\Industry;
use Loosemonkies\Bundle\CoreBundle\Mapper\IndustryMapper;

use Doctrine\ODM\MongoDB\DocumentRepository;

class IndustryRepository extends DocumentRepository
{
    public function insert($data)
    {
        $exists = $this->exists($data);

        if ($exists) {

            return $exists;
        }

        $industryEntity = new Industry();

        $mapper   = new IndustryMapper();
        $industry = $mapper->map($data, $industryEntity);

        if ($industry->isValid() === false) {

            throw new \InvalidArgumentException();
        }

        $this->dm->persist($industry);
        $this->dm->flush();

        $industry->setSlug($industry->getName() . '-' . $industry->getId());

        $this->dm->persist($industry);
        $this->dm->flush();

        return $industry;
    }

    public function get($start = 0, $limit = 10)
    {
        $results = $this->createQueryBuilder('LoosemonkiesCoreBundle:Industry')
                        ->limit($limit)
                        ->skip($start)
                        ->getQuery()
                        ->execute();

        if (($results->count()) == 0) {

            return false;
        }

        $industries = array();

        foreach ($results as $industry) {

            $industries[] = $industry->toArray();
        }

        return $industries;
    }

    public function getIndustryByName($name)
    {
        $results = $this->createQueryBuilder('LoosemonkiesCoreBundle:Industry')
                        ->field('name')->equals(urldecode($name))
                        ->getQuery()
                        ->execute();

        if ($results->count() == 0) {
            return false;
        }

        return $results->getSingleResult();
    }

    public function exists($data)
    {
        $qb = $this->createQueryBuilder('LoosemonkiesCoreBundle:Industry');

        $results = $qb->addOr($qb->expr()->field('name')->equals($data['name']))
                      ->getQuery()
                      ->execute();

        if ($results->count() > 0) {

            return $results->getSingleResult();
        }

        return false;
    }

    public function getIndustryInfoById($id)
    {
        $industry = $this->find($id);

        if (false === $industry) {

            throw new \InvalidArgumentException();
        }

        return $industry;
    }

}