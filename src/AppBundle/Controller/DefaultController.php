<?php

// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Utility\Navigation\Navigation;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
		/*
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
		*/
		$nav = new Navigation();

		$user = $this->getUser();
		
		/*
		$this->addFlash(
			'notice',
			'Welcome, '. $user->getUsername() .'!'
		);
		*/
		
		return $this->render('waybsys/base.html.twig', [
            'navigation' => $nav->getNavigationDropdownArray(),
        ]);
    }
	
	/**
     * @Route("/admin")
	 * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
	
	/**
     * @Route("/registerAdmin")
     */
    public function registerAdmin()
    {
		
		$user = new User();
		$user->setUsername('new.admin');
		/*
		$encoder = $this->container->get('security.password_encoder');
		$encoded = $encoder->encodePassword($user, 'test1234');
		
		$user->setPassword($encoded);
		$user->setIsActive(true);
	
		$employee = $this->getDoctrine()
			->getRepository('AppBundle:Employee')
			->find(1);
	
		$user->setEmployee($employee);
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();
		*/
        return new Response('<html><body>Created '. $user->getUsername() .'.</body></html>');
    }
}
