<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="bags")
 */
class Bag extends Product {
    public function getType() {
        return 'Bag';
    }
}



