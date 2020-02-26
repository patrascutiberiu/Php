<?php

class Loader
{
    public static function autoload($classname) 
    {
        $path =$classname.'.php';

        try 
        {
            require_once $path;
        } 
        catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}


spl_autoload_register('Loader::autoload');