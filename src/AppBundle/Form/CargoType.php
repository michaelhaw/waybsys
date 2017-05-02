<?php

// src/AppBundle/Form/CargoType.php
namespace AppBundle\Form;

use AppBundle\Entity\Cargo;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CargoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
            ->add('quantity', NumberType::class)
            ->add('unit', TextType::class)
            ->add('description', TextType::class)
            ->add('declared_value', MoneyType::class, array('currency' => false))
            ->add('charge_type', ChoiceType::class, array(
				'choices' => array(
					'Volume' => 'VOL',
					'Weight' => 'WGT',
					'Combination' => 'COM'
				)
			))
            ->add('length', NumberType::class, array('required' => false))
            ->add('width', NumberType::class, array('required' => false))
            ->add('height', NumberType::class, array('required' => false))
            ->add('total_volume', NumberType::class, array('required' => false))
            ->add('weight', NumberType::class, array('required' => false))
            ->add('volume_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('weight_charge', MoneyType::class, array('currency' => false, 'required' => false))
            ->add('additional_charge', MoneyType::class, array('currency' => false, 'required' => false))
        ;
	}
	
	public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Cargo::class,
        ));
    }
}