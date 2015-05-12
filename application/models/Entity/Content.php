<?php

namespace Entity;

/**
 * Content Class
 * Facilitates recipes and newsletters
 * 
 * @Entity
 * @Table(name="content")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"recipe" = "Recipe", "newsletter" = "Newsletter"})
 */
class Content extends Steven {

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
     * @Column(type="text", nullable=true)
     */
    protected $description = '';

    /**
     *
     * @Column(type="string", length=500, nullable=true)
     */
    protected $file;


    /**
     *
     * @OneToOne(targetEntity="Image", cascade={"remove"})
     */
    protected $image;

    /**
     *
     * @Column(type="bigint")
     */
    protected $dateAdded;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getFile() {
        return $this->file;
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

    function setDescription($description) {
        $this->description = $description;
    }

    function setFile($file) {
        $this->file = $file;
    }

    function setImage(Image $image) {
        $this->image = $image;
    }

    function getDateAdded() {
        return $this->dateAdded;
    }

    function setDateAdded($dateAdded) {
        $this->dateAdded = $dateAdded;
    }


}
