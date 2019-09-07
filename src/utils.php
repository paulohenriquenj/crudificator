<?php

function dd(){
    echo '<pre>';
    array_map(function ($item){
        var_dump($item);
    }, func_get_args());
    echo '</pre>';
    exit('X_X');
}
