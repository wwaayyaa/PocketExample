<?php
namespace PocketExample\Common;

use Exception;

/**
 * 数据库类
 */
class Poster
{
    public static function post($uri, $data){
        $ch = curl_init ();
        // print_r($ch);
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, true); 
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
            'Content-Type: application/json; charset=UTF-8',
            "X-Accept: application/json") 
        );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }  
}
