<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**   
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class ApiController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AcmeReqBundle:Default:api.html.twig', array(
            
        ));
    }
}
