<?php 

namespace App\Core;

class csrf {

    public static function generateToken($formName)
    {
       $secretKey = 'gsfhs154aergz2#';
       if( !session_id() ) {
           session_start();
       }
       $sessionId = session_id();
       
       return sha1($formName.$sessionId.$secretKey);
    }

    public static function checkToken($token, $formName)
    {
        return $token === self::generateToken($formName);
    }

}