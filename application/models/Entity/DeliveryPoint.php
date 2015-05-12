<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="deliveryPoints")
 */
class DeliveryPoint extends Steven {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @OneToOne(targetEntity="User", inversedBy="deliveryPoint")
     */
    protected $host;
    
    /**
     *
     * @Column(type="string", length=500, nullable=true) 
     */
    protected $address;
    
    /**
     *
     * @Column(type="text", nullable=true)
     */
    protected $description  = '';
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $day;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $timeFrom;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $timeTo;
    
    
    /**
     * @OneToMany(targetEntity="Order", mappedBy="deliveryPoint")
     */
    protected $orders;
    
    
    
    public function __construct() {
        $this->orders = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getHost() {
        return $this->host;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDay() {
        return $this->day;
    }

    public function getTimeFrom() {
        return $this->timeFrom;
    }

    public function getTimeTo() {
        return $this->timeTo;
    }

    public function getOrders() {
        return $this->orders;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setHost($host) {
        $this->host = $host;
        if($host->getDeliveryPoint() !== $this){
            $host->setDeliveryPoint($this);
        }
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDay($day) {
        $this->day = $day;
    }

    public function setTimeFrom($timeFrom) {
        $this->timeFrom = $timeFrom;
    }

    public function setTimeTo($timeTo) {
        $this->timeTo = $timeTo;
    }

    public function addOrder($order) {
        $this->orders[] = $order;
        if($order->getDeliveryPoint() !== $this){
            $order->setDeliveryPoint($this);
        }
    }

    function getAddress() {
        return $this->address;
    }

    function setAddress($address) {
        $this->address = $address;
    }



}

