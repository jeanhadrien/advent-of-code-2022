<?php

namespace App\Classes;


class Utils {

    static function getAlphabet($lowercase = True) : string {
        if($lowercase) return "abcdefghijklmnopqrstuvwxyz";
        return "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        
    }
    

}

?>