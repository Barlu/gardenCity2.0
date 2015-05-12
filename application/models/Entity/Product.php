<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="products")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"bag"="Bag", "produce"="Produce"})
 */
class Product {
    
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
    protected $name;
    
    /**
     *
     * @Column(type="text")
     */
    protected $description;
    
    
    /**
     *
     * @OneToMany(targetEntity="Quantity", mappedBy="product", cascade={"remove"})
     */
    protected $quantities;
    
    /**
     *
     * @OneToMany(targetEntity="Preference", mappedBy="product")
     */
    protected $preferences;
    
    /**
     *
     * @OneToMany(targetEntity="LineItem", mappedBy="product")
     */
    protected $lineItems;
    
    
    /**
     *
     * @OneToOne(targetEntity="Image", cascade={"remove"})
     */
    protected $image;
    
    /**
     *
     * @ManytoMany(targetEntity="Recipe", mappedBy="products")
     */
    protected $recipes;
    
    public function __construct() {
        $this->lineItems = new ArrayCollection();
        $this->quantities = new ArrayCollection();
        $this->preferences = new ArrayCollection();
        $this->recipes = new ArrayCollection();
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    
    function getQuantities() {
        return $this->quantities;
    }



    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function addQuantity($quantity) {
        $this->quantities[] = $quantity;
        if($quantity->getProduct() !== $this){
            $quantity->setProduct($this);
        }
    }

    function setImage($image) {
        $this->image = $image;
    }

    function getPreferences() {
        return $this->preferences;
    }

    function getLineItems() {
        return $this->lineItems;
    }

    function addPreference($preference) {
        $this->preferences[] = $preference;
        if($preference->getProduct() !== $this){
            $preference->setProduct($this);
        }
    }

    function addLineItem($lineItem) {
        $this->lineItems[] = $lineItem;
        if($lineItem->getProduct() !== $this){
            $lineItem->setProduct($this);
        }
    }



}

