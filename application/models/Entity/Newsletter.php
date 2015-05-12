<?php

namespace Entity;

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
