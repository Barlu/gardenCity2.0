<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="ci_sessions")
 */
class Session {
    
    /**
     * @Id
     * @Column(type="string", length=40)
     */
    protected $session_id;
    
    /**
     * @Column(type="string", length=45)
     */
    protected $ip_address;
    
    /**
     * @Column(type="string", length=120)
     */
    protected $user_agent;
    
    /**
     * @Column(type="integer", length=10)
     */
    protected $last_activity;
    
    /**
     * @Column(type="text")
     */
    protected $user_data;
}

