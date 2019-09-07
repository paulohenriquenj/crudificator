<?php

function dd(){
    echo '<pre>';
    array_map(function ($item){
        var_dump($item);
    }, func_get_args());
    echo '</pre>';
    exit('X_X');
}

function abort($msg)
{
    exit(
        '<p style="color: red; margin: 100px" border: solid 1 px black>' . $msg . ' - ABORT</p>'
    );
}
