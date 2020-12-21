<?php

if(!function_exists('dateFormat'))
{
    function dateFormat($givenDate, $format='d/m/Y')
    {
        return date($format, strtotime($givenDate));
    }
}