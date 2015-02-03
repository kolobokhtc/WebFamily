<?php

namespace WebFamily\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => '');
    }
    
    /**
     * @Route("/dashboard")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    
    public function dashboardAction(){
	return [];
    }
}
