<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="orders")
 */
class Order {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ManyToOne(targetEntity="DeliveryPoint", inversedBy="orders")
     */
    protected $deliveryPoint;
    
    /**
     * @OneToMany(targetEntity="LineItem", mappedBy="order", cascade={"remove"})
     */
    protected $lineItems;
    
    /**
     * @OneToOne(targetEntity="Extra", inversedBy="order", cascade={"remove"})
     */
    protected $extra;
    
    /**
     * @Column(type="bigint") 
     */
    protected $firstDelivery;
    
    /**
     * @Column(type="bigint") 
     */
    protected $nextDelivery;
    
    /**
     * @Column(type="string", length=255) 
     */
    protected $frequency;
    
    /**
     *
     * @OneToOne(targetEntity="User", inversedBy="order")
     */
    
    protected $user;
    
    
    public function __construct() {
        $this->lineItems = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getDeliveryPoint() {
        return $this->deliveryPoint;
    }

    public function getLineItems() {
        return $this->lineItems;
    }

    public function getFirstDelivery() {
        return $this->firstDelivery;
    }

    public function getNextDelivery() {
        return $this->nextDelivery;
    }

    public function getFrequency() {
        return $this->frequency;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDeliveryPoint($deliveryPoint) {
        $this->deliveryPoint = $deliveryPoint;
        if(!$deliveryPoint->getOrders()->contains($this)){
            $deliveryPoint->addOrder($this);
        }
    }

    public function addLineItem($lineItem) {
        $this->lineItems[] = $lineItem;
        if($lineItem->getOrder() !== $this){
            $lineItem->setOrder($this);
        }
    }

    public function setFirstDelivery($firstDelivery) {
        $this->firstDelivery = $firstDelivery;
    }

    public function setNextDelivery($nextDelivery) {
        $this->nextDelivery = $nextDelivery;
    }

    public function setFrequency($frequency) {
        $this->frequency = $frequency;
    }

    public function getExtra() {
        return $this->extra;
    }

    public function setExtra($extra) {
        $this->extra = $extra;
    }
    
    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
        if($user->getOrder() !== $this){
            $user->setOrder($this);
        }
    }

}

