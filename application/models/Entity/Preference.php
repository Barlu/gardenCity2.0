<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="preferences")
 * 
 * @author emmett.newman
 */
class Preference {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ManyToOne(targetEntity="Product", inversedBy="preferences")
     */
    protected $product;
    
    /**
     *
     * @ManyToOne(targetEntity="Customer", inversedBy="preferences")
     */
    protected $user;
    
    /**
     *
     * @Column(type="boolean")
     */
    protected $prefer;
    
    function getId() {
        return $this->id;
    }

    function getProduct() {
        return $this->product;
    }

    function getUser() {
        return $this->user;
    }

    function getPrefer() {
        return $this->prefer;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduct($product) {
        $this->product = $product;
        if(!$product->getPreferences()->contains($this)){
            $product->addPreference($this);
        }
    }

    function setUser($user) {
        $this->user = $user;
        if(!$user->getPreferences()->contains($this)){
            $user->addPreference($this);
        }
    }

    function setPrefer($prefer) {
        $this->prefer = $prefer;
    }


}
