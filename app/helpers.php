<?php

use App\Models\User;

function checkResult($erotisiType,$erotisiCorrects,$apantisi,$erotisiWrongs){

    if($erotisiType == 'truefalse' || $erotisiType == 'complete' || $erotisiType == 'singlechoice') {
        if($erotisiCorrects == $apantisi) {
            $apotelesma = 100;
        } else {
            $apotelesma = 0;
        }
    } elseif( $erotisiType == 'multiplechoice' ) {

        $wrongsArray = explode (",", $erotisiWrongs);
        $apantiseis = $apantisi;


        $resultR = array_intersect($wrongsArray, $apantiseis);


        if(empty($resultR)) {
            $apotelesma = 100;
        } else {
            $apotelesma = 0;
        }

    }

    return $apotelesma;

}
