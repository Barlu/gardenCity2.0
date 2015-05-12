<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="bags")
 */
class Bag extends Product {
    public function getType() {
        return 'Bag';
    }
}



