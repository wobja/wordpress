<?php declare(strict_types=1);

require_once locate_template('/lib/autoload.php');

function getView(string $path, array $includes = null){
    $includes;
    require_once $path;
}