<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sum extends Model
{
    public static function nrinvoice()
    {   
        $a=array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $random_keys=array_rand($a,6);
        
        $randomInt=(int)implode('', $random_keys);
        
        return $randomInt;   
    } 
    
}
