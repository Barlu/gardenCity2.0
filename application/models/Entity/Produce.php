<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="produce")
 */
class Produce extends Product {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true) 
     */
    protected $variety;
    
    /**
     *
     * @Column(type="boolean") 
     */
    protected $status;
    
    public function getType() {
        return 'Produce';
    }
    
    function getVariety() {
        return $this->variety;
    }

    function getStatus() {
        return $this->status;
    }

    function setVariety($variety) {
        $this->variety = $variety;
    }

    function setStatus($status) {
        $this->status = $status;
    }


    
}

