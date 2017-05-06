<?php

// src/AppBundle/Form/WaybillType.php
namespace AppBundle\Form;

use AppBundle\Entity\Waybill;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WaybillType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
            ->add('waybill_no', TextType::class)
            ->add('shipper', EntityType::class, array(
				'class' => 'AppBundle:Customer',
				'choice_label' => 'customer_name'
			))
            ->add('consignee', EntityType::class, array(
				'class' => 'AppBundle:Customer',
				'choice_label' => 'customer_name'
			))
            ->add('destination', ChoiceType::class, array(
				'choices' => array(
					'Manila' => 'MNL',
					'Cebu' => 'CEB',
					'Iloilo' => 'ILO',
					'Bacolod' => 'BCD'
				)
			))
            ->add('waybill_date', DateType::class, array(
				'widget' => 'choice', 
				'format' => 'MM/dd/yyyy',
				'html5' => true,
				'required' => false
			))
            ->add('received_by', TextType::class, array('required' => false))
            ->add('received_at', TextType::class, array('required' => false))
            ->add('total_amount', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('total_weight_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('total_value_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('total_cu_msmt_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('total_delivery_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('total_vat', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('cargo', CollectionType::class, array(
				'entry_type' => CargoType::class,
				'allow_add' => true,
				'allow_delete' => true,
				'by_reference' => false,
			))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
        ;
	}
	
	public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Waybill::class,
        ));
    }
}