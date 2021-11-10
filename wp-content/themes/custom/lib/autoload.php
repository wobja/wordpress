<?php declare(strict_types=1);

/**
 * @param string $folder the directory within the lib directory
 */
function include_php_files(string $folder): void
{
    $folder = __DIR__.DIRECTORY_SEPARATOR.$folder;

    foreach (glob("{$folder}/*.php") as $filename) {
        include_once $filename;
    }
}

include_php_files('hooks/actions');
include_php_files('hooks/filters');
include_php_files('custom-post-types');
include_php_files('custom-taxonomies');