<?php

function dd($variable){
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    exit(__FILE__ . ':' . __LINE__);
}
