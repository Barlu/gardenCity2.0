<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="newsletters")
 */
class Newsletter extends Content {

    /**
     *
     * @Column(type="string", length=500, nullable=true)
     */
    protected $link = '';

    public function getType() {
        return 'Newsletter';
    }
    
    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }

}
