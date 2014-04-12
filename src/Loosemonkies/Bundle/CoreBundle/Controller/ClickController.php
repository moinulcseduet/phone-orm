<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Loosemonkies\Bundle\CoreBundle\Exception\UnauthorizedException;

use Loosemonkies\Bundle\CoreBundle\Repository\ClickRepository;

class ClickController extends BaseController
{
    /** @var ClickRepository */
    protected $clickRepository;

    public function init()
    {
        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');

        $this->clickRepository = $this->get('click_repository');
    }

    public function insertAction()
    {
        $data = $this->request->request->all();

        try {
            $click = $this->clickRepository->insert($data);

            $this->response->setContent(json_encode($click->toArray()));
            $this->response->setStatusCode(201);

        } catch (UnauthorizedException $e) {
            $this->response->setContent(json_encode(array('result' => 'Access denied for click insert!')));
            $this->response->setStatusCode(401);
        }

        return $this->response;
    }

    public function getClickAction($adsId)
    {
        try {
            $click = $this->clickRepository->getClickByAdsId($adsId);

            $this->response->setContent(json_encode($click));
            $this->response->setStatusCode(201);

        } catch (UnauthorizedException $e) {
            $this->response->setContent(json_encode(array('result' => 'Access denied for click!')));
            $this->response->setStatusCode(401);
        }

        return $this->response;
    }

}