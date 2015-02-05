<?php

namespace WebFamily\MoneyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Response;

use WebFamily\MoneyBundle\Entity\Balance;

class DefaultController extends Controller
{
    /**
     * @Route("/money")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     * 
     */
    public function indexAction()
    {
        return array('name' => '');
    }
    /**
     * @Route("/money/add")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     * 
     */
    public function addMoneyAction(){
	
	$user = $this->getUser();
	/*
	$balance = new Balance();
	
	$balance->setUser($user);
	$balance->setType(1);
	$balance->setAmount(1000);
	*/
	$em = $this->getDoctrine()->getManager();
	
	//$balance = $em->getRepository("WebFamily\MioneyBundle")
	
	$em->persist($balance);
	$em->flush();
	
	
	
	 return new Response('Created product id '.$user->getId());
	
    }
}
