<?php

namespace AppBundle\Utility\Navigation;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class Navigation {

	public function getNavigationDropdownArray(){
		
		$nav_home = new MenuItem();
		$nav_home->label = "Home";
		$nav_home->href = "/";
		
		$nav_waybill = new MenuItem();
		$nav_waybill->label = "Waybill/AR";
		$nav_waybill->href = "#";
		
		$nav_waybill_create = new MenuItem();
		$nav_waybill_create->label = "Create";
		$nav_waybill_create->href = "/waybill/create";
		
		$nav_waybill_search = new MenuItem();
		$nav_waybill_search->label = "Search";
		$nav_waybill_search->href = "/waybill/search";
		
		$nav_waybill->subitems = [$nav_waybill_create, $nav_waybill_search];
		
		$nav_customer = new MenuItem();
		$nav_customer->label = "Customer";
		$nav_customer->href = "#";
		
		$nav_customer_create = new MenuItem();
		$nav_customer_create->label = "Create";
		$nav_customer_create->href = "/customer/create";
		
		$nav_customer_search = new MenuItem();
		$nav_customer_search->label = "Search";
		$nav_customer_search->href = "/customer/search";
		
		$nav_customer->subitems = [$nav_customer_create, $nav_customer_search];
		
		$nav_settings = new MenuItem;
		$nav_settings->label = "Settings";
		$nav_settings->href = "#";
		$nav_settings->isRight = true;
		
		$nav_settings_change_password = new MenuItem;
		$nav_settings_change_password->label = "Change Password";
		$nav_settings_change_password->href = "/settings/change/password";
		
		$nav_settings->subitems = [$nav_settings_change_password];
		
		$nav_admin = new MenuItem;
		$nav_admin->label = "Admin Tools";
		$nav_admin->href = "#";
		$nav_admin->isRight = true;
		
		$nav_admin_add_employee = new MenuItem;
		$nav_admin_add_employee->label = "Add Employee";
		$nav_admin_add_employee->href = "/admin/create/employee";
		
		$nav_admin_add_user = new MenuItem;
		$nav_admin_add_user->label = "Add User";
		$nav_admin_add_user->href = "/admin/create/user";
		
		$nav_admin->subitems = [$nav_admin_add_employee, $nav_admin_add_user];
		
		$app = [$nav_home, $nav_waybill, $nav_customer];
		$admin = [$nav_admin];
		$user = [$nav_settings];
		
		$navigation = ['app' => $app, 'admin' => $admin, 'user' => $user];
		
		//$navigation = [$nav_home, $nav_waybill, $nav_customer, $nav_settings, $nav_admin];
		
		return $navigation;
	}

}

?>