<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="quantities")
 */
class Quantity {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @Column(type="string", length=255) 
     */
    protected $name;
    
    /**
     *
     * @Column(type="integer", length=255) 
     */
    protected $value;
    
    /**
     *
     * @Column(type="text")
     */
    protected $description;
    
    /**
     *
     * @Column(type="boolean")
     */
    protected $watch;

    /**
     *
     * @OneToMany(targetEntity="Price", mappedBy="quantity", cascade={"remove"})
     */
    protected $prices;

    /**
     *
     * @ManyToOne(targetEntity="Product", inversedBy="quantities")
     */
    protected $product;
    
    /**
     *
     * @OneToMany(targetEntity="LineItem", mappedBy="quantity")
     */
    protected $lineItems;
    
    public function __construct() {
        $this->prices = new ArrayCollection();
        $this->lineItems = new ArrayCollection();
    }
    
    function getPrices() {
        return $this->prices;
    }
    
    function getPriceByType($type) {
        foreach ($this->prices as $price){
            if($price->getType() === $type){
                return $price;
            }
        }
        foreach ($this->prices as $price){
            if($price->getType() === 'public'){
                return $price;
            }
        }
        return false;
    }

    function addPrice($price) {
        $this->prices[] = $price;
        if ($price->getQuantity() !== $this) {
            $price->setQuantity($this);
        }
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getProduct() {
        return $this->product;
    }

    function setProduct($product) {
        $this->product = $product;
        if (!$product->getQuantities()->contains($this)) {
            $product->addQuantity($this);
        }
    }
    
    function getValue() {
        return $this->value;
    }

    function setValue($value) {
        $this->value = $value;
    }
    
    function getLineItems() {
        return $this->lineItems;
    }

    function addLineItem($lineItem) {
        $this->lineItems = $lineItem;
        if($lineItem->getQuantity() !== $this){
            $lineItem->setQuantity($this);
        }
    }
    
    function getWatch() {
        return $this->watch;
    }

    function setWatch($watch) {
        $this->watch = (boolean) $watch;
    }




}
