<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="prices")
 */
class Price {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @Column(type="float", length=255) 
     */
    protected $amount;
    
    
    /**
     *
     * @Column(type="string", length=255) 
     */
    protected $type;
    
    /**
     *
     * @ManyToOne(targetEntity="Quantity", inversedBy="prices")
     */
    protected $quantity;
    
    function getId() {
        return $this->id;
    }

    function getAmount() {
        return $this->amount;
    }

    function getType() {
        return $this->type;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
        if(!$quantity->getPrices()->contains($this)){
            $quantity->addPrice($this);
        }
    }


}