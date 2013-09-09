<?php

namespace Mmoreram\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Entity()
 * @ORM\Table(name="carts")
 */
class Cart
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue()
     */
    protected $id;


    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", nullable=false, precision=10, scale=6)
     */
    protected $price = 0;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
    * Get price coupons with tax
    *
    * @return float price with tax
    */
    public function getPrice()
    {
        return $this->price;
    }


    /**
    * Set price coupons with tax
    *
    * @param float $priceCoupons  price without tax
    *
    * @return Object self Object
    */
    public function setPrice($priceCoupons)
    {
        $this->price = $priceCoupons;

        return $this;
    }
}