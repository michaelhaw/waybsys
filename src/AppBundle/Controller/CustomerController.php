<?php

// src/AppBundle/Controller/CustomerController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Utility\Navigation\Navigation;

use AppBundle\Entity\Customer;

use AppBundle\Form\CustomerType;

class CustomerController extends Controller
{
	/**
     * @Route("/customer/create", name="customer_create")
     */
    public function createCustomer(Request $request)
    {
		$nav = new Navigation();
		
		$customer = new Customer();
		$form = $this->createForm(CustomerType::class, $customer);
		
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			
			$customer = $form->getData();

			$em = $this->getDoctrine()->getManager();
			$em->persist($customer);
			$em->flush();

			$this->addFlash(
				'success',
				'Customer was created successfully!'
			);

			return $this->redirectToRoute('customer_create');
		}
		
		return $this->render('waybsys/customer-create.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
        ]);
    }

	/**
     * @Route("/customer/search", name="customer_search")
     */
    public function searchCustomer(Request $request)
    {
		$nav = new Navigation();
		$search = new SearchCustomer();
		$customer_name = '';
		
		$form = $this->createFormBuilder($search)
			->setMethod('GET')
			->add('customer_name', TextType::class, array('required' => False))
			->add('search', SubmitType::class, array('label' => 'Search'))
			->getForm();
			
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$customer_name = $form['customer_name']->getData();
		}
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
						'SELECT c
						FROM AppBundle:Customer c
						WHERE lower(c.customer_name) like lower(:customer_name)
						ORDER BY c.customer_name ASC'
						)->setParameter('customer_name','%'.$customer_name.'%' );
		$customers = $query->getResult();
		
		return $this->render('waybsys/customer-search.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
			'customers' => $customers,
        ]);
	}
	
	/**
     * @Route("/customer/edit/{customer_id}", name="customer_edit")
     */
    public function editCustomer(Request $request, $customer_id)
    {
		$nav = new Navigation();
		
		$customer = $this->getDoctrine()
			->getRepository('AppBundle:Customer')
			->find($customer_id);

		$form = $this->createForm(CustomerType::class, $customer);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			
			$customer = $form->getData();

			$em = $this->getDoctrine()->getManager();
			
			$em->flush();

			$this->addFlash(
				'success',
				'Customer was modified successfully!'
			);

			return $this->redirectToRoute('customer_edit', array('customer_id' => $customer_id));
		}
		
		return $this->render('waybsys/customer-create.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
			'form' => $form->createView(),
        ]);
	}

}

class SearchCustomer {
	
	private $customer_name;
	
	public function getCustomerName()
    {
        return $this->customer_name;
    }
	
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;

        return $this;
    }
}