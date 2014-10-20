<?php

namespace Acme\RESTBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class DefaultController extends FOSRestController
{
    /**
     * @return \FOS\RestBundle\View\ViewHandler
     */
    public function cgetAction()
    {
        $view = View::create()->setStatusCode(200)->setFormat('json')->setData(
                array('first', 'second...')
        );
        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
