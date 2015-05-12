<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @Entity
 * @Table(name="gallerys")
 */
class Gallery {
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @Column(type="string", length=255) 
     */
    protected $name;
    
    /**
     *
     * @Column(type="text")
     */
    protected $description  = '';
    
    /**
     *
     * @OneToMany(targetEntity="Image", mappedBy="gallery", cascade={"remove"});
     */
    protected $images;
    
    public function __construct() {
        $this->images = new ArrayCollection();
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

    function getImages() {
        return $this->images;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function addImage(Image $image) {
        $this->images[] = $image;
        
        if ($image->getGallery() !== $this) {
            $image->setGallery($this);
        }
    }


}

