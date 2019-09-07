<?php

function dd(){
    dump(func_get_args());
    exit('X_X');
}

function dump(){
    echo '<pre>';
    array_map(function ($item){
        var_dump($item);
    }, func_get_args());
    echo '</pre>';
}

function abort($msg)
{
    exit(
        '<p style="color: red; margin: 100px" border: solid 1 px black>' . $msg . ' - ABORT</p>'
    );
}
