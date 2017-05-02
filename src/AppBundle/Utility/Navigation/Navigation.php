<?php

namespace AppBundle\Utility\Navigation;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class Navigation {

	public function getNavigationDropdownArray(){
		
		$nav_home = new MenuItem;
		$nav_home->label = "Home";
		$nav_home->href = "/";
		
		$nav_waybill = new MenuItem;
		$nav_waybill->label = "Waybill/AR";
		$nav_waybill->href = "#";
		
		$nav_waybill_create = new MenuItem;
		$nav_waybill_create->label = "Create";
		$nav_waybill_create->href = "/waybill/create";
		
		$nav_waybill_search = new MenuItem;
		$nav_waybill_search->label = "Search";
		$nav_waybill_search->href = "/waybill/search";
		
		$nav_waybill->subitems = [$nav_waybill_create, $nav_waybill_search];
		
		$nav_customer = new MenuItem;
		$nav_customer->label = "Customer";
		$nav_customer->href = "#";
		
		$nav_customer_create = new MenuItem;
		$nav_customer_create->label = "Create";
		$nav_customer_create->href = "/customer/create";
		
		$nav_customer_search = new MenuItem;
		$nav_customer_search->label = "Search";
		$nav_customer_search->href = "/customer/search";
		
		$nav_customer->subitems = [$nav_customer_create, $nav_customer_search];
		
		$navigation = [$nav_home, $nav_waybill, $nav_customer];
		
		return $navigation;
	}

}

?>