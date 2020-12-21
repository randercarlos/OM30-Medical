<?php

if(!function_exists('dd'))
{
    function dd($object)
    {
        echo '<pre>';
        print_r($object);
        echo '</pre>';
    }
}
