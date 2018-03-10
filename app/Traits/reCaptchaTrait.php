<?php

namespace App\Traits;
 
use ReCaptcha\ReCaptcha;
 
trait reCaptchaTrait {
 
    public function verifyCaptcha($response)
    {
 
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('GOOGLE_RECAPTCHA_SECRET');
 
        $recaptcha = new ReCaptcha($secret);
        $status = $recaptcha->verify($response, $remoteip);
        if ($status->isSuccess()) {
            return true;
        } else {
            return false;
        }
 
    }
 
}

?>