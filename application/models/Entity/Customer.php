<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="customers")
 * @author emmett.newman
 */
class Customer extends User {
    
    /**
     *
     * @OneToMany(targetEntity="Preference", mappedBy="user", cascade={"remove"})
     */
    protected $preferences;
    
    public function __construct() {
        $this->preferences = new ArrayCollection();
    }
    
    public function getPreferences() {
        return $this->preferences;
    }

    public function addPreference($preference) {
        $this->preferences[] = $preference;
        if($preference->getUser() !== $this){
            $preference->setUser($this);
        }
    }
    
    public function getType() {
        return 'public';
    }

}
