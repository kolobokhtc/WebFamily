<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 06.02.2015
 * Time: 1:12
 */

namespace WebFamily\MoneyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BalanceType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Amount', 'text')
                ->add('save', 'submit');
    }

    public function getName()
    {
        return 'Balance';
    }


}