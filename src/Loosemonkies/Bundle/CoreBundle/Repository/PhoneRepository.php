<?php

namespace Loosemonkies\Bundle\CoreBundle\Repository;

use Loosemonkies\Bundle\CoreBundle\Entity\Phone;
use Loosemonkies\Bundle\CoreBundle\Mapper\PhoneMapper;

use Doctrine\ORM\EntityRepository;

class PhoneRepository extends EntityRepository
{

    public function insert($data)
    {
        $phoneEntity = new Phone();
        $mapper = new PhoneMapper();
        $phone  = $mapper->map($data, $phoneEntity);

        if ($phone->isValid() === false) {
            throw new \InvalidArgumentException();
        }

        $this->_em->persist($phone);
        $this->_em->flush();

        return $phone->toArray();
    }

    public function getAll()
    {
        $phone = $this->findAll();

        if (!$phone) {
            return array();
        }

        return $phone;
    }

    public function getPhoneByPhoneId($phoneId)
    {
        $phone = $this->findOneBy(array('phone_id' => $phoneId));

        if (!$phone) {
            return array();
        }

        return $phone->toArray();
    }

    public function searchPhoneByKeyword($keyword)
    {
        $sql = "SELECT * FROM phones WHERE name LIKE ? OR snippet LIKE ? OR description LIKE ?";

        $stmt = $this->_em->getConnection()->prepare($sql);
        $stmt->bindValue(1, '%'.$keyword.'%');
        $stmt->bindValue(2, '%'.$keyword.'%');
        $stmt->bindValue(3, '%'.$keyword.'%');
        $stmt->execute();

        $phones = $stmt->fetchAll();

        $phone = array();

        foreach($phones as $value) {
            $phone[] = $value;
        }

        return $phone;
    }

    public function searchPhoneByKeywordWithSorting($keyword, $sort)
    {
        $sortValue = trim($sort);

        if (!empty($sortValue)) {

            if ($sort == 'name') {
                $ord = 'name ASC';

            } elseif ($sort == 'age') {
                $ord = 'age ASC';

            } else {
                $ord = 'age DESC';
            }

            $sql = "SELECT * FROM phones WHERE name LIKE ? OR snippet LIKE ? OR description LIKE ? ORDER BY $ord";

        } else{
            $sql = "SELECT * FROM phones WHERE name LIKE ? OR snippet LIKE ? OR description LIKE ?";
        }

        $stmt = $this->_em->getConnection()->prepare($sql);
        $stmt->bindValue(1, '%'.$keyword.'%');
        $stmt->bindValue(2, '%'.$keyword.'%');
        $stmt->bindValue(3, '%'.$keyword.'%');
        $stmt->execute();

        $phones = $stmt->fetchAll();

        $phone = array();

        foreach($phones as $value) {
            $phone[] = $value;
        }

        return $phone;
    }

}