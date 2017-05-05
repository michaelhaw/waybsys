<?php

// src/AppBundle/Controller/AdminController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Utility\Navigation\Navigation;
use AppBundle\Entity\User;

class AdminController extends Controller
{
	/**
     * @Route("/admin")
	 * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
	
	/**
     * @Route("/admin/create/employee", name="admin_create_employee")
	 * @Security("has_role('ROLE_ADMIN')")
     */
    public function createEmployee()
    {
        return new Response('<html><body>Create Employee!</body></html>');
    }
	
	/**
     * @Route("/admin/create/user", name="admin_create_user")
	 * @Security("has_role('ROLE_ADMIN')")
     */
    public function createUser()
    {
        return new Response('<html><body>Create User!</body></html>');
    }
}