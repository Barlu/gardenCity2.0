<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="extra")
 */
class Extra {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @OneToOne(targetEntity="Order", mappedBy="extra")
     */
    protected $order;
    
    /**
     * @ManyToMany(targetEntity="Order")
     * @JoinTable(name="extra_product")
     */
    protected $products;
    
    /**
     * @Column(type="string", length=255) 
     */
    protected $frequency;
    
    public function getId() {
        return $this->id;
    }

    public function getOrder() {
        return $this->order;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getFrequency() {
        return $this->frequency;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function setFrequency($frequency) {
        $this->frequency = $frequency;
    }


}

