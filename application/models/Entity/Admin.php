<?php

namespace Entity;

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
