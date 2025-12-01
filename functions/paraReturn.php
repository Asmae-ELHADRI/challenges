<?php

$a=2;
$b=4;
function add($a, $b) {
    return ($a + $b);
}

function soustraction($a, $b) {
    return $a - $b;
}

function multiplication($a, $b) {
    return $a * $b;
}

function division($a, $b) {
    if ($b != 0) {
        echo $a / $b;
    } else {
        echo "Division by zero is not allowed.";
    }
}


function modulus($a, $b) {
    echo $a % $b;
}

echo add($a, $b); 
echo "\n";

echo soustraction($a, $b);
echo "\n";

$var = add($a, $b) * soustraction($a, $b);
echo $var;
echo "\n";

multiplication($a, $b);
echo "\n";

division($a, $b);
echo "\n";

modulus($a, $b);
echo "\n";
?>
