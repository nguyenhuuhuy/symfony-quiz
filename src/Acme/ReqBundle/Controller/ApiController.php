<?php

namespace Acme\ReqBundle\Controller;

/**   
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class ApiController extends Controller
{
    public function apiAction()
    {
        return $this->render('AcmeReqBundle:Default:api.html.twig', array(
            
        ));
    }
}