<?php

namespace WebFamily\MoneyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @Route("/money")
     * @Template()
     * 
     * @Security("has_role('ROLE_ADMIN')")
     *
     */
    public function indexAction()
    {
	
	
	
        return array('name' => '');
    }
}
