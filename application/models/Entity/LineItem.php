<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="lineItems")
 * @author Emmett
 */
class LineItem {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ManyToOne(targetEntity="Product", inversedBy="lineItems")
     */
    protected $product;
    
    /**
     * @ManyToOne(targetEntity="Quantity", inversedBy="lineItems")
     */
    protected $quantity;
    
    
    /**
     * @ManyToOne(targetEntity="Order", inversedBy="lineItems")
     */
    protected $order;
    
    /**
     *
     * @Column(type="integer", nullable=false)
     */
    protected $amount;
    
    function getId() {
        return $this->id;
    }

    function getProduct() {
        return $this->product;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getOrder() {
        return $this->order;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduct($product) {
        $this->product = $product;
        if(!$product->getLineItems()->contains($this)){
            $product->addLineItem($this);
        }
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
        if(!$quantity->getLineItems()->contains($this)){
            $quantity->addLineItem($this);
        }
    }

    function setOrder($order) {
        $this->order = $order;
        if(!$order->getLineItems()->contains($this)){
            $order->addLineItem($this);
        }
    }
    
    function getAmount() {
        return $this->amount;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }




}
