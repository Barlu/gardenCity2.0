<?php

/**
 * As this php version does not support arrays to be defined as constants this class will 
 * handle all app specific constants
 */
class Constants extends CI_Model {

    public static $DELIVERY_DAYS = [
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday'
    ];
    
    public static $DAYS = [
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday'
    ];
    
    public static $CUTOFF = '11:00';
    
    public static $WEEKS_IN_ADVANCE = 10;
     
    public static $FREQUENCIES = [
        'One-off',
        'Weekly',
        'Fortnightly',
        'Monthly'
    ];
}
