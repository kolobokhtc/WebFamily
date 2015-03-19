<?php

namespace WebFamily\MoneyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use WebFamily\MoneyBundle\Entity\Balance;
use WebFamily\MoneyBundle\Form\Type\BalanceType;

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

        $balances = $this->getDoctrine()->getRepository("WebFamilyMoneyBundle:Balance")->findBy(['CreatedBy'=>$this->getUser()]);

        return array('balances' => $balances);
    }

    /**
     * @Route("/money/balance")
     * @Template("@WebFamilyMoney/Default/balance_list.html.twig")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function balanceAction(){

        $balances = $this->getDoctrine()->getRepository("WebFamilyMoneyBundle:Balance")->findBy(['CreatedBy'=>$this->getUser()]);

        return array('entities' => $balances);

    }

    /**
     * @Route("/money/add")
     * @Template("@WebFamilyMoney/Default/balance_add.html.twig")
     * @Security("has_role('ROLE_ADMIN')")
     * 
     */
    public function addMoneyAction(Request $request){
	
        $user = $this->getUser();

        $balance = new Balance();

        $form = $this->createForm(new BalanceType(), $balance);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();

            $balance_record = $form->getData();
            $balance_record->setType(1);
            $balance_record->setCreatedBy($user);

            $em->persist($balance_record);
            $em->flush();

            return $this->redirect($this->generateUrl('webfamily_money_default_index'));
        }
	
        return ['form' => $form->createView()];
	
    }
}
