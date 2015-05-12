<?php

namespace Entity;

/**
 * Image class
 * Stores all uploaded images
 * 
 * @Entity
 * @Table(name="images")
 */
class Image extends Steven{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @Column(type="string", length=500, nullable=true)
     */
    protected $location;

    /**
     *
     * @Column(type="string", length=255, nullable=true)
     */
    protected $title = '';

    /**
     *
     * @ManyToOne(targetEntity="Gallery", inversedBy="images")
     */
    protected $gallery;

    function getId() {
        return $this->id;
    }

    function getLocation($substr = null) {
        if($substr === null){
        return $this->location;
        } else if ($substr === 'thumb'){
            return substr_replace($this->location, '_thumb', strrpos($this->location, '.'), 0);
        } else if ($substr === 'small'){
            return substr_replace($this->location, '_small', strrpos($this->location, '.'), 0);
        } else if ($substr === 'medium'){
            return substr_replace($this->location, '_medium', strrpos($this->location, '.'), 0);
        } else if ($substr === 'large'){
            return substr_replace($this->location, '_large', strrpos($this->location, '.'), 0);
        }
    }

    function getTitle() {
        return $this->title;
    }

    function getGallery() {
        return $this->gallery;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setGallery(Gallery $gallery) {
        $this->gallery = $gallery;

        if (!$gallery->getImages()->contains($this)) {
            $gallery->addImage($this);
        }
    }
    

}
