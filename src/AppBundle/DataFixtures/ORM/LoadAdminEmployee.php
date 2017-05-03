<?php

// src/AppBundle/DataFixtures/ORM/LoadAdminEmployee.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Employee;

class LoadAdminEmployee extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $employeeAdmin = new Employee();

		$employeeAdmin->setFirstName('System');
		$employeeAdmin->setLastName('Admin');
		$employeeAdmin->setEmail('admin@waybsys.com');
		
        $manager->persist($employeeAdmin);
        $manager->flush();

        $this->addReference('admin-empoyee', $employeeAdmin);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}