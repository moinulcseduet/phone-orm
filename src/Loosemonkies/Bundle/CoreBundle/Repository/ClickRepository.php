<?php

namespace Loosemonkies\Bundle\CoreBundle\Repository;

use Loosemonkies\Bundle\CoreBundle\Entity\Click;
use Loosemonkies\Bundle\CoreBundle\Mapper\ClickMapper;

use Doctrine\ORM\EntityRepository;

class ClickRepository extends EntityRepository
{
    /** @var AdsPriorityRepository */
    protected $adsPriorityRepository;

    /** @var AdsRepository */
    protected $adsRepository;

    public function insert($data)
    {
        $existingEntity = $this->checkClickExists($data['user_id'], $data['ads_id']);

        if (!$existingEntity) {

            $clickEntity = new Click();

        } else {

            return $existingEntity;
        }

        $mapper = new ClickMapper();
        $click  = $mapper->map($data, $clickEntity);

        if ($click->isValid() === false) {

            throw new \InvalidArgumentException();
        }

        $this->_em->persist($click);
        $this->_em->flush();

        // change the ad priority status as the ad is clicked already
        $status      = 'clicked';
        $adsPriority = $this->adsPriorityRepository->changeStatus($data['user_id'], $data['ads_id'], $status);

        // update credit balance based on click
        $this->adsRepository->manageClickCreditHistory($click);

        // update total view count in the ads table
        $adsCountUpdate = $this->adsRepository->adsClickUpdate($data['ads_id']);

        $cacheKey = $this->cacheManager->mapShortenKeywords('provider-active-jobs');
        $this->cacheManager->invalidateNamespace($cacheKey);

        return $click;
    }

    public function getClickByAdsId($adsId)
    {
        $click = $this->findOneBy(array('ads_id' => $adsId));

        if (!$click) {

            return false;
        }

        return $click->toArray();
    }

    public function checkClickExists($user_id, $ads_id)
    {
        $clickEntity = $this->findOneBy(array('user_id' => $user_id, 'ads_id' => $ads_id));

        if (!$clickEntity) {

            return false;
        }

        return $clickEntity;
    }

    public function setAdsPriorityRepository($adsPriorityRepository)
    {
        $this->adsPriorityRepository = $adsPriorityRepository;
    }

    public function setAdsRepository($adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }

}