<?php declare(strict_types=1);

function myAutoLoader(string $classname)
{
    $classname = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    $file = __DIR__.DIRECTORY_SEPARATOR.$classname.'.php';

    if (!file_exists($file)) {
        return false;
    }

    include $file;
}

spl_autoload_register('myAutoLoader');