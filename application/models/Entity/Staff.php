<?php

namespace Entity;

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
