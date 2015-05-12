<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="wholesalers")
 * @author emmett.newman
 */
class Wholesaler extends User {
    
    /**
     *
     * @Column(type="string", length=255)
     */
    protected $businessName;
    
    public function getType() {
        return 'wholesaler';
    }
    
    public function getBusinessName() {
        return $this->businessName;
    }

    public function setBusinessName($businessName) {
        $this->businessName = $businessName;
    }

}
