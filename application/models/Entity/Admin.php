<?php

namespace Entity;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="admins")
 * @author emmett.newman
 */
class Admin extends User {
    public function getType() {
        return 'admin';
    }
}
