<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="waybills")
 * @UniqueEntity(
 * 		fields={"waybill_no"},
 *		message="This AR. No. already exists."
 * )
 */
class Waybill
{
	/**
	 *
     * @ORM\Id
     * @ORM\Column(name="waybill_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $waybill_id;
	
	/**
     * @ORM\Column(name="waybill_no", type="string", length=12, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 6,
     *      max = 12,
     *      minMessage = "AR. No. must be at least {{ limit }} characters long",
     *      maxMessage = "AR. No. cannot be longer than {{ limit }} characters"
     * )
     */
    private $waybill_no;
	
	/**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="shipper_id", referencedColumnName="customer_id")
     */
    private $shipper;
	
	/**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="consignee_id", referencedColumnName="customer_id")
     */
    private $consignee;
	
	/**
     * @ORM\Column(name="destination", type="string", length=3)
     */
    private $destination;
	
	/**
     * @ORM\Column(name="waybill_date", type="date", nullable=true)
     */
    private $waybill_date;

    /**
     * @ORM\Column(name="total_amount", type="decimal", precision=11, scale=2)
     */
    private $total_amount;

    /**
     * @ORM\Column(name="total_weight_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_weight_charge;

    /**
     * @ORM\Column(name="total_value_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_value_charge;

    /**
     * @ORM\Column(name="total_cu_msmt_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_cu_msmt_charge;

    /**
     * @ORM\Column(name="total_delivery_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_delivery_charge;

    /**
     * @ORM\Column(name="total_vat", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_vat;

    /**
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

	/**
     * @ORM\OneToMany(targetEntity="Cargo", mappedBy="waybill")
     */
    private $cargo;
	
	/**
     * @ORM\Column(name="received_by", type="string", length=8, nullable=true)
     */
    private $received_by;
	
	/**
     * @ORM\Column(name="received_at", type="string", length=8, nullable=true)
     */
    private $received_at;
	
	/**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="user_id", nullable=true)
     */
    //private $created_by;
	
	/**
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     */
    //private $created_on;
	
	/**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="modified_by", referencedColumnName="user_id", nullable=true)
     */
    //private $modified_by;
	
	/**
     * @ORM\Column(name="modified_on", type="datetime", nullable=true)
     */
    //private $modified_on;

	/**
	*	Waybill Constructor
	*
	*/
    public function __construct()
    {
        $this->cargo = new ArrayCollection();
		$ts = date('Y-m-d H:i:s');
		$this->created_on = $ts;
		$this->modified_on = $ts;
    }

    /**
     * Get waybillId
     *
     * @return integer
     */
    public function getWaybillId()
    {
        return $this->waybill_id;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Waybill
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set totalAmount
     *
     * @param string $totalAmount
     *
     * @return Waybill
     */
    public function setTotalAmount($totalAmount)
    {
        $this->total_amount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Waybill
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     *
     * @return Waybill
     */
    public function addCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargo->add($cargo);

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargo->removeElement($cargo);
    }

    /**
     * Get cargo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set shipper
     *
     * @param \AppBundle\Entity\Customer $shipper
     *
     * @return Waybill
     */
    public function setShipper(\AppBundle\Entity\Customer $shipper = null)
    {
        $this->shipper = $shipper;

        return $this;
    }

    /**
     * Get shipper
     *
     * @return \AppBundle\Entity\Customer
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * Set consignee
     *
     * @param \AppBundle\Entity\Customer $consignee
     *
     * @return Waybill
     */
    public function setConsignee(\AppBundle\Entity\Customer $consignee = null)
    {
        $this->consignee = $consignee;

        return $this;
    }

    /**
     * Get consignee
     *
     * @return \AppBundle\Entity\Customer
     */
    public function getConsignee()
    {
        return $this->consignee;
    }

    /**
     * Set waybillNo
     *
     * @param string $waybillNo
     *
     * @return Waybill
     */
    public function setWaybillNo($waybillNo)
    {
        $this->waybill_no = $waybillNo;

        return $this;
    }

    /**
     * Get waybillNo
     *
     * @return string
     */
    public function getWaybillNo()
    {
        return $this->waybill_no;
    }

    /**
     * Set totalWeightCharge
     *
     * @param string $totalWeightCharge
     *
     * @return Waybill
     */
    public function setTotalWeightCharge($totalWeightCharge)
    {
        $this->total_weight_charge = $totalWeightCharge;

        return $this;
    }

    /**
     * Get totalWeightCharge
     *
     * @return string
     */
    public function getTotalWeightCharge()
    {
        return $this->total_weight_charge;
    }

    /**
     * Set totalValueCharge
     *
     * @param string $totalValueCharge
     *
     * @return Waybill
     */
    public function setTotalValueCharge($totalValueCharge)
    {
        $this->total_value_charge = $totalValueCharge;

        return $this;
    }

    /**
     * Get totalValueCharge
     *
     * @return string
     */
    public function getTotalValueCharge()
    {
        return $this->total_value_charge;
    }

    /**
     * Set totalCuMsmtCharge
     *
     * @param string $totalCuMsmtCharge
     *
     * @return Waybill
     */
    public function setTotalCuMsmtCharge($totalCuMsmtCharge)
    {
        $this->total_cu_msmt_charge = $totalCuMsmtCharge;

        return $this;
    }

    /**
     * Get totalCuMsmtCharge
     *
     * @return string
     */
    public function getTotalCuMsmtCharge()
    {
        return $this->total_cu_msmt_charge;
    }

    /**
     * Set totalDeliveryCharge
     *
     * @param string $totalDeliveryCharge
     *
     * @return Waybill
     */
    public function setTotalDeliveryCharge($totalDeliveryCharge)
    {
        $this->total_delivery_charge = $totalDeliveryCharge;

        return $this;
    }

    /**
     * Get totalDeliveryCharge
     *
     * @return string
     */
    public function getTotalDeliveryCharge()
    {
        return $this->total_delivery_charge;
    }

    /**
     * Set totalVat
     *
     * @param string $totalVat
     *
     * @return Waybill
     */
    public function setTotalVat($totalVat)
    {
        $this->total_vat = $totalVat;

        return $this;
    }

    /**
     * Get totalVat
     *
     * @return string
     */
    public function getTotalVat()
    {
        return $this->total_vat;
    }

    /**
     * Set waybillDate
     *
     * @param \DateTime $waybillDate
     *
     * @return Waybill
     */
    public function setWaybillDate($waybillDate)
    {
        $this->waybill_date = $waybillDate;

        return $this;
    }

    /**
     * Get waybillDate
     *
     * @return \DateTime
     */
    public function getWaybillDate()
    {
        return $this->waybill_date;
    }

    /**
     * Set receivedBy
     *
     * @param string $receivedBy
     *
     * @return Waybill
     */
    public function setReceivedBy($receivedBy)
    {
        $this->received_by = $receivedBy;

        return $this;
    }

    /**
     * Get receivedBy
     *
     * @return string
     */
    public function getReceivedBy()
    {
        return $this->received_by;
    }

    /**
     * Set receivedAt
     *
     * @param string $receivedAt
     *
     * @return Waybill
     */
    public function setReceivedAt($receivedAt)
    {
        $this->received_at = $receivedAt;

        return $this;
    }

    /**
     * Get receivedAt
     *
     * @return string
     */
    public function getReceivedAt()
    {
        return $this->received_at;
    }
}
