<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 * @UniqueEntity(
 * 		fields={"customer_name"},
 *		message="This customer already exists."
 * )
 */
class Customer
{
	/**
     * @ORM\Id
     * @ORM\Column(name="customer_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $customer_id;
	
	/**
     * @ORM\Column(name="customer_name", type="string", length=100, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Name must be at least {{ limit }} characters long",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters"
     * )
     */
    private $customer_name;
	
	/**
     * @ORM\Column(name="customer_address", type="text", nullable=true)
     * @Assert\NotBlank()
     */
    private $customer_address;
	
	/**
     * @ORM\Column(name="customer_city", type="text", nullable=true)
     */
    private $customer_city;
	
	/**
     * @ORM\Column(name="customer_country", type="text", nullable=true)
     */
    private $customer_country;
	
	/**
     * @ORM\Column(name="customer_contact_no", type="text", nullable=true)
     */
    private $customer_contact_no;
	
	/**
     * @ORM\Column(name="rate_volume", type="decimal", precision=11, scale=2)
     * @Assert\NotBlank()
	 * @Assert\Range(
     *      min = 0,
     *      minMessage = "Cannot enter amount less than {{ limit }}",
     *      invalidMessage = "Enter a valid amount"
     * )
     */
    private $rate_volume;
	
	/**
     * @ORM\Column(name="rate_value", type="decimal", precision=11, scale=2)
     * @Assert\NotBlank()
	 * @Assert\Range(
     *      min = 0,
     *      minMessage = "Cannot enter amount less than {{ limit }}",
     *      invalidMessage = "Enter a valid amount"
     * )
     */
    private $rate_value;
	
	/**
     * @ORM\Column(name="customer_notes", type="text", nullable=true)
     */
    private $customer_notes;


    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return Customer
     */
    public function setCustomerName($customerName)
    {
        $this->customer_name = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Set customerAddress
     *
     * @param string $customerAddress
     *
     * @return Customer
     */
    public function setCustomerAddress($customerAddress)
    {
        $this->customer_address = $customerAddress;

        return $this;
    }

    /**
     * Get customerAddress
     *
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customer_address;
    }

    /**
     * Set rateVolume
     *
     * @param string $rateVolume
     *
     * @return Customer
     */
    public function setRateVolume($rateVolume)
    {
        $this->rate_volume = $rateVolume;

        return $this;
    }

    /**
     * Get rateVolume
     *
     * @return string
     */
    public function getRateVolume()
    {
        return $this->rate_volume;
    }

    /**
     * Set rateValue
     *
     * @param string $rateValue
     *
     * @return Customer
     */
    public function setRateValue($rateValue)
    {
        $this->rate_value = $rateValue;

        return $this;
    }

    /**
     * Get rateValue
     *
     * @return string
     */
    public function getRateValue()
    {
        return $this->rate_value;
    }

    /**
     * Set customerNotes
     *
     * @param string $customerNotes
     *
     * @return Customer
     */
    public function setCustomerNotes($customerNotes)
    {
        $this->customer_notes = $customerNotes;

        return $this;
    }

    /**
     * Get customerNotes
     *
     * @return string
     */
    public function getCustomerNotes()
    {
        return $this->customer_notes;
    }

    /**
     * Set customerCity
     *
     * @param string $customerCity
     *
     * @return Customer
     */
    public function setCustomerCity($customerCity)
    {
        $this->customer_city = $customerCity;

        return $this;
    }

    /**
     * Get customerCity
     *
     * @return string
     */
    public function getCustomerCity()
    {
        return $this->customer_city;
    }

    /**
     * Set customerCountry
     *
     * @param string $customerCountry
     *
     * @return Customer
     */
    public function setCustomerCountry($customerCountry)
    {
        $this->customer_country = $customerCountry;

        return $this;
    }

    /**
     * Get customerCountry
     *
     * @return string
     */
    public function getCustomerCountry()
    {
        return $this->customer_country;
    }

    /**
     * Set customerContactNo
     *
     * @param string $customerContactNo
     *
     * @return Customer
     */
    public function setCustomerContactNo($customerContactNo)
    {
        $this->customer_contact_no = $customerContactNo;

        return $this;
    }

    /**
     * Get customerContactNo
     *
     * @return string
     */
    public function getCustomerContactNo()
    {
        return $this->customer_contact_no;
    }
}
