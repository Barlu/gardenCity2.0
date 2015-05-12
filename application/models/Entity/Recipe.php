<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="recipe")
 */
class Recipe extends Content {
    
    /**
     *
     * @ManytoMany(targetEntity="Product", inversedBy="recipes")
     * @JoinTable(name="Recipe_Product")
     */
    protected $products;
    
    public function __construct() {
        $this->products = new ArrayCollection();
        
    }
    public function getType() {
        return 'Recipe';
    }
    
    function getProducts() {
        return $this->products;
    }

    function addProduct($product) {
        $this->products[] = $product;
        if(!$product->getRecipes()->contains($this)){
            $product->addRecipe($this);
        }
    }

}

