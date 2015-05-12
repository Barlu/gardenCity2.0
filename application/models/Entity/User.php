<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="users")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="role", type="string")
 * @DiscriminatorMap({"admin" = "Admin", "staff" = "Staff", "wholesaler" = "Wholesaler", "public" = "Customer"})
 */
class User {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @Column(type="string", length=255, nullable=false) 
     */
    protected $username;
    
    /**
     *
     * @Column(type="string", length=255, nullable=false) 
     */
    protected $password;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $firstName;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $lastName;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $phone;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $email;
    
    /**
     *
     * @Column(type="integer", nullable=true) 
     */
    protected $discount;
    
    /**
     *
     * @OneToOne(targetEntity="Order", mappedBy="user", cascade={"remove"})
     */
    protected $order;
    
    /**
     *
     * @Column(type="string", length=255)
     */
    protected $status;
    
    /**
     *
     * @OneToOne(targetEntity="DeliveryPoint", mappedBy="host", cascade={"remove"})
     */
    protected $deliveryPoint;
    
    /**
     *
     * @Column(type="float", nullable=true)
     */
    protected $balance;
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function setOrder($order) {
        $this->order = $order;
        if($order->getUser() !== $this){
            $order->setUser($this);
        }
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function getDeliveryPoint() {
        return $this->deliveryPoint;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDeliveryPoint($deliveryPoint) {
        $this->deliveryPoint = $deliveryPoint;
        if($deliveryPoint->getHost() !== $this){
            $deliveryPoint->setHost($this);
        }
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }
           
}

