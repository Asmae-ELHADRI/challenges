<?php

function greet($name = "Guest") {
    echo "Hello, $name !";
}

greet("ark-x"); //outputs: Hello, ark-x!
greet(); //outputs: Hello, Guest!

$globalVar = "I am global";

function testScope() {
    $localVar = "i'm local, ";
    echo $localVar;

    global $globalVar;
    echo $globalVar;

}
testScope();

?>