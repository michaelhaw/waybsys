<?php

// src/AppBundle/DataFixtures/ORM/LoadAdminUser.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class LoadAdminUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	/**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
	
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
		
		$userAdmin->setUsername('admin');
		
		$encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($userAdmin, 'admin');
		
		$userAdmin->setPassword($password);
		$userAdmin->setIsActive(true);
		$userAdmin->setRole('ROLE_SUPER_ADMIN');
		$userAdmin->setEmployee($this->getReference('admin-empoyee'));

        $manager->persist($userAdmin);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}