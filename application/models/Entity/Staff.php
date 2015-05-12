<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="staff")
 * @author emmett.newman
 */
class Staff extends User {

    public function getType() {
        return 'staff';
    }

}
