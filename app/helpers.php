<?php

function checkResult($erotisiType,$erotisiCorrects,$apantisi){

    if($erotisiType == 'truefalse' || $erotisiType == 'complete') {
        if($erotisiCorrects == $apantisi) {
            $apotelesma = 100;
        } else {
            $apotelesma = 0;
        }
    } elseif( $erotisiType == 'multiplechoice' ) {
        if($erotisiCorrects == $apantisi) {
            $apotelesma = 100;
        } else {
            $apotelesma = 0;
        }
    }

    return $apotelesma;

}
