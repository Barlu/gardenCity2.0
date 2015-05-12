<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="banner")
 */
class Banner extends Steven {
    
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
    protected $heading;
    
    /**
     *
     * @Column(type="string", length=255, nullable=true)
     */
    protected $caption;
    
    /**
     *
     * @OneToOne(targetEntity="Image", cascade={"remove"})
     */
    protected $image;
    
    /**
     *
     * @Column(type="string", length=500, nullable=true)
     */
    protected $link;
    
    public function getId() {
        return $this->id;
    }

    public function getHeading() {
        return $this->heading;
    }

    public function getCaption() {
        return $this->caption;
    }

    public function getImage() {
        return $this->image;
    }

    public function getLink() {
        return $this->link;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setHeading($heading) {
        $this->heading = $heading;
    }

    public function setCaption($caption) {
        $this->caption = $caption;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setLink($link) {
        $this->link = $link;
    }


}