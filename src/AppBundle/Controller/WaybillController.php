<?php

// src/AppBundle/Controller/WaybillController.php
namespace AppBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Utility\Navigation\Navigation;

use AppBundle\Entity\Waybill;

use AppBundle\Form\WaybillType;

class WaybillController extends Controller
{

	/**
     * @Route("/waybill/create", name="waybill_create")
     */
    public function createWaybill(Request $request)
    {
		$nav = new Navigation();
		
		//Get current employee
		$user = $this->getUser();
		$employee = $user->getEmployee();
		
		$waybill = new Waybill();
		$waybill->setReceivedBy(substr($employee->getFirstName(),0,8));
		$waybill->setReceivedAt($employee->getLocalOffice());
		$form = $this->createForm(WaybillType::class, $waybill);
		
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			
			$waybill = $form->getData();

			$em = $this->getDoctrine()->getManager();
			
			$em->persist($waybill);
			
			foreach($waybill->getCargo() as $cargo) {
				$cargo->setWaybill($waybill);
				$em->persist($cargo);
			}
			
			$em->flush();

			$this->addFlash(
				'success',
				'Waybill was created successfully!'
			);

			return $this->redirectToRoute('waybill_create');
		}
		
		return $this->render('waybsys/waybill/waybill-create.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
        ]);
	}
	
	/**
     * @Route("/waybill/search", name="waybill_search")
     */
    public function searchWaybill(Request $request)
    {
		$nav = new Navigation();
		$search = new SearchWaybill();
		
		$waybill_no = '';
		$shipper = '';
		$consignee = '';
		$destination = '';
		
		$form = $this->createFormBuilder($search)
			->setMethod('GET')
			->add('waybill_no', TextType::class, array('required' => False))
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
					'All' => '%',
					'Manila' => 'MNL',
					'Cebu' => 'CEB',
					'Iloilo' => 'ILO',
					'Bacolod' => 'BCD'
				)
			))
			->add('search', SubmitType::class, array('label' => 'Search'))
			->getForm();
			
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$waybill_no = $form['waybill_no']->getData();
			$shipper = $form['shipper']->getData();
			$consignee = $form['consignee']->getData();
			$destination = $form['destination']->getData();
		}
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
						'SELECT w
						FROM AppBundle:Waybill w
						WHERE lower(w.waybill_no) like lower(:waybill_no)
						AND lower(w.destination) like lower(:destination)
						ORDER BY w.waybill_no ASC'
					)
						->setParameter('waybill_no','%'.$waybill_no.'%' )
						->setParameter('destination','%'.$destination.'%' );
		$waybills = $query->getResult();
		
		
		
		return $this->render('waybsys/waybill/waybill-search.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
			'waybills' => $waybills,
        ]);
	}
	
	/**
     * @Route("/waybill/edit/{waybill_no}", name="waybill_edit")
     */
    public function editWaybill(Request $request, $waybill_no)
    {
		$nav = new Navigation();
		
		$waybill = $this->getDoctrine()
			->getRepository('AppBundle:Waybill')
			->findOneBy(array('waybill_no' => $waybill_no));
			
		$originalCargoList = new ArrayCollection();
		
		// Create copy of original list of included Cargo
		foreach($waybill->getCargo() as $cargo) {
			$originalCargoList->add($cargo);
		}

		$form = $this->createForm(WaybillType::class, $waybill);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			
			$waybill = $form->getData();

			$em = $this->getDoctrine()->getManager();
			
			foreach($originalCargoList as $cargo) {
				if(false === $waybill->getCargo()->contains($cargo)) {
					$cargo->setWaybill(null);
					$em->remove($cargo);
				}
			}
			
			foreach($waybill->getCargo() as $cargo) {
				$cargo->setWaybill($waybill);
				$em->persist($cargo);
			}
			
			$em->flush();

			$this->addFlash(
				'success',
				'AR was modified successfully!'
			);

			return $this->redirectToRoute('waybill_edit', array('waybill_no' => $waybill_no));
		}
		
		return $this->render('waybsys/waybill/waybill-edit.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
        ]);
	}
	
	/**
     * @Route("/print/waybill/{waybill_no}", name="print_waybill")
     */
    public function printWaybill(Request $request, $waybill_no)
    {
		$waybill = $this->getDoctrine()
			->getRepository('AppBundle:Waybill')
			->findOneBy(array('waybill_no' => $waybill_no));
			
		return $this->render('waybsys/print/print-waybill.html.twig', [
			'waybill' => $waybill,
        ]);
	}
}

class SearchWaybill {
	
	private $waybill_no;
	private $shipper;
	private $consignee;
	private $destination;
	
	public function getWaybillNo()
    {
        return $this->waybill_no;
    }
	
    public function setWaybillNo($waybill_no)
    {
        $this->waybill_no = $waybill_no;

        return $this;
    }
	
	public function getShipper()
    {
        return $this->shipper;
    }
	
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;

        return $this;
    }
	
	public function getConsignee()
    {
        return $this->consignee;
    }
	
    public function setConsignee($consignee)
    {
        $this->consignee = $consignee;

        return $this;
    }
	
	public function getDestination()
    {
        return $this->destination;
    }
	
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }
}