<?php

function singleLetter($mot){
    if ($mot == "") {
        return "";
    }

    $compt = [];

    for ($i=0; $i < strlen($mot); $i++) { 
        $char = $mot[$i];
        if (array_key_exists($char, $compt)) {
            $compt[$char] += 1;
        } else {
            $compt[$char] = 1;
        }
    }

    foreach ($compt as $key => $value) {
        if ($value == 1) {
            echo "The first non-repeating character is: " . $key . "\n";
            return $key;
        }
    }
    echo "All characters are repeating.\n";
    return null;
}

singleLetter("swiss");