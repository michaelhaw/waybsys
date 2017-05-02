<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cargo")
 */
class Cargo
{
	/**
     * @ORM\Id
     * @ORM\Column(name="cargo_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $cargo_id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Waybill", inversedBy="cargo")
     * @ORM\JoinColumn(name="waybill_id", referencedColumnName="waybill_id")
     */
    private $waybill;
	
	/**
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
	
	/**
     * @ORM\Column(name="unit", type="text")
     */
    private $unit;
	
	/**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
	
	/**
     * @ORM\Column(name="declared_value", type="decimal", precision=11, scale=2)
     */
    private $declared_value;
	
	/**
     * @ORM\Column(name="length", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $length;
	
	/**
     * @ORM\Column(name="width", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $width;
	
	/**
     * @ORM\Column(name="height", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $height;
	
	/**
     * @ORM\Column(name="weight", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $weight;
	
	/**
     * @ORM\Column(name="total_volume", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $total_volume;
	
	/**
     * @ORM\Column(name="charge_type", type="text", nullable=true)
     */
    private $charge_type;
	
	/**
     * @ORM\Column(name="volume_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $volume_charge;
	
	/**
     * @ORM\Column(name="weight_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $weight_charge;
	
	/**
     * @ORM\Column(name="additional_charge", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $additional_charge;
	
    /**
     * Get cargoId
     *
     * @return integer
     */
    public function getCargoId()
    {
        return $this->cargo_id;
    }

    /**
     * Set waybill
     *
     * @param \AppBundle\Entity\Waybill $waybill
     *
     * @return Cargo
     */
    public function setWaybill(\AppBundle\Entity\Waybill $waybill = null)
    {
        $this->waybill = $waybill;

        return $this;
    }

    /**
     * Get waybill
     *
     * @return \AppBundle\Entity\Waybill
     */
    public function getWaybill()
    {
        return $this->waybill;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Cargo
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return Cargo
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cargo
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set declaredValue
     *
     * @param string $declaredValue
     *
     * @return Cargo
     */
    public function setDeclaredValue($declaredValue)
    {
        $this->declared_value = $declaredValue;

        return $this;
    }

    /**
     * Get declaredValue
     *
     * @return string
     */
    public function getDeclaredValue()
    {
        return $this->declared_value;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return Cargo
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param string $width
     *
     * @return Cargo
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return Cargo
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Cargo
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set totalVolume
     *
     * @param string $totalVolume
     *
     * @return Cargo
     */
    public function setTotalVolume($totalVolume)
    {
        $this->total_volume = $totalVolume;

        return $this;
    }

    /**
     * Get totalVolume
     *
     * @return string
     */
    public function getTotalVolume()
    {
        return $this->total_volume;
    }

    /**
     * Set chargeType
     *
     * @param string $chargeType
     *
     * @return Cargo
     */
    public function setChargeType($chargeType)
    {
        $this->charge_type = $chargeType;

        return $this;
    }

    /**
     * Get chargeType
     *
     * @return string
     */
    public function getChargeType()
    {
        return $this->charge_type;
    }

    /**
     * Set volumeCharge
     *
     * @param string $volumeCharge
     *
     * @return Cargo
     */
    public function setVolumeCharge($volumeCharge)
    {
        $this->volume_charge = $volumeCharge;

        return $this;
    }

    /**
     * Get volumeCharge
     *
     * @return string
     */
    public function getVolumeCharge()
    {
        return $this->volume_charge;
    }

    /**
     * Set weightCharge
     *
     * @param string $weightCharge
     *
     * @return Cargo
     */
    public function setWeightCharge($weightCharge)
    {
        $this->weight_charge = $weightCharge;

        return $this;
    }

    /**
     * Get weightCharge
     *
     * @return string
     */
    public function getWeightCharge()
    {
        return $this->weight_charge;
    }

    /**
     * Set additionalCharge
     *
     * @param string $additionalCharge
     *
     * @return Cargo
     */
    public function setAdditionalCharge($additionalCharge)
    {
        $this->additional_charge = $additionalCharge;

        return $this;
    }

    /**
     * Get additionalCharge
     *
     * @return string
     */
    public function getAdditionalCharge()
    {
        return $this->additional_charge;
    }
}
