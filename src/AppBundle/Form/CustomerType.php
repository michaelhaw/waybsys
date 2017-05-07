<?php

// src/AppBundle/Form/CustomerType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Customer;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer_name', TextType::class)
            ->add('customer_address', TextType::class, array('required' => false))
            ->add('customer_city', TextType::class, array('required' => false))
            ->add('customer_country', CountryType::class, array('required' => false))
            ->add('customer_contact_no', TextType::class, array('required' => false))
            ->add('rate_volume', MoneyType::class, array('currency' => false))
            ->add('rate_value', MoneyType::class, array('currency' => false))
            ->add('customer_notes', TextareaType::class, array('required' => false))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
        ;
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Customer::class,
		));
	}
}