<?php

// src/AppBundle/Twig/WaybsysExtension.php
namespace AppBundle\Twig;

use Symfony\Component\Intl\Intl;

class WaybsysExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('country', array($this, 'countryFilter')),
        );
    }

    public function countryFilter($countryCode, $locale = 'en')
    {
		$countries = Intl::getRegionBundle()->getCountryNames($locale);
        $country = Intl::getRegionBundle()->getCountryName($countryCode, $locale);

		return array_key_exists($countryCode, $countries)
			? $countries[$countryCode]
			: $countryCode;
    }
	

	public function getName()
	{
		return 'waybsys_extension';
	}
}