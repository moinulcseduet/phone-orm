<?php

namespace Loosemonkies\Bundle\CoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
{
    /**
     * Fired when controller has been setup
     *
     * @param FilterControllerEvent $event
     * @return mixed
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (!is_array($controller)) {
            return;
        }

        if (method_exists($controller[0], 'preInit')) {
            $controller[0]->preInit();
        }

        if (method_exists($controller[0], 'init')) {
            $controller[0]->init();
        }
    }
}