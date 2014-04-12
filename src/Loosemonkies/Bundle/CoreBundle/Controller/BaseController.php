<?php

namespace Loosemonkies\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Loosemonkies\Bundle\CoreBundle\Utility\JsonFormatter;

abstract class BaseController extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response;
     */
    protected $response;

    /**
     * Called at the beginning
     */
    public function preInit()
    {
        $this->request = $this->getRequest();
        //$this->setSessionUser();
    }

    /**
     * Load the requesting user's object if provided in the header.
     */
   /* public function setSessionUser()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();

        if ($request->headers->has('Auth-Token')) {
            $authToken  = $request->headers->get('Auth-Token');
            $this->user = $this->get('user_repository')->getByAuthToken($authToken);
        }
    }*/

    /**
     * Initializer function to be used by child classes.
     */
    public function init()
    {
        // Override
    }

    /**
     * Call for debugging any response visually
     *
     * @param $response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function debugResponse($response)
    {
        return $this->render('@LoosemonkiesCore/debug.html.twig', array(
            'response' => JsonFormatter::format($response->getContent())
        ));
    }

    /**
     * Helper for transitioning, should be removed later
     *
     * @param $name
     *
     * @return \Doctrine\Bundle\MongoDBBundle\ManagerRegistry|object|\stdClass
     */
    public function __get($name)
    {
        switch ($name) {
            case 'dm': return $this->get('doctrine_mongodb');
            case 'conn': return $this->get('doctrine.dbal.default_connection');
        }

        if ($this->container->has($name)) {
            return $this->container->get($name);
        }
    }
}