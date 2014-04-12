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
use Loosemonkies\Bundle\CoreBundle\Exception\ResourceAlreadyExistsException;

use Loosemonkies\Bundle\CoreBundle\Repository\IndustryRepository;

class IndustryController extends BaseController
{
    /** @var IndustryRepository */
    protected $industryRepository;

    public function init()
    {
        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');

        $this->industryRepository = $this->get('industry_repository');
    }

    public function insertAction()
    {
        try {

            $data     = $this->request->request->all();
            $industry = $this->industryRepository->insert($data);
            $this->response->setContent(json_encode($industry->toArray()));
            $this->response->setStatusCode(201);

        } catch (\InvalidArgumentException $e) {

            $this->response->setContent(json_encode(array('result' => $e->getMessage())));
            $this->response->setStatusCode($e->getCode());

        } catch (ResourceAlreadyExistsException $e) {

            $this->response->setContent(json_encode(array('result' => $e->getMessage())));
            $this->response->setStatusCode($e->getCode());
        }

        return $this->response;
    }

    public function getAllAction()
    {
        $industry = $this->industryRepository->get();

        if (false === $industry) {

            $this->response->setContent(json_encode(array('result' => Response::$statusTexts[404])));
            $this->response->setStatusCode(404);

        } else {

            $this->response->setContent(json_encode($industry));
            $this->response->setStatusCode(200);
        }

        return $this->response;
    }

    public function getIndustryByNameAction($name)
    {
        if (stristr($name, '_')) {

            $name          = explode('_', $name);
            $industry_name = implode(',', $name);

        } else {

            $industry_name = $name;
        }

        $industry = $this->industryRepository->getIndustryByName($industry_name);

        if (false !== $industry) {

            $this->response->setContent(json_encode($industry->toArray()));
            $this->response->setStatusCode(200);

        } else {

            $this->response->setContent(json_encode(array('result' => Response::$statusTexts[404])));
            $this->response->setStatusCode(404);
        }

        return $this->response;
    }

    public function getIndustryByLinkAction()
    {
        $this->response->setContent(json_encode(array('hello')));
        $this->response->setStatusCode(200);

        return $this->response;
    }

}