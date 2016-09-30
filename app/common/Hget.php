<?php
namespace PocketExample\Common;

use Exception;

/**
 * 数据库类
 */
class Hget
{
    public static function get($url, $gzip=false){
        $curl = curl_init($url);   
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array (
            'Content-Type: application/json; charset=UTF-8',
            "X-Accept: application/json",
            ) 
        ); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
        // if($gzip) curl_setopt($curl, CURLOPT_ENCODING, "gzip");    
        $content = curl_exec($curl);   
        curl_close($curl);   
        return $content;   
    }  
}
