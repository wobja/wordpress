<?php declare(strict_types=1);

function scripts(): void
{
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.min.css', false, 'd480e99013ef039e0fd96b717d6b8e6e');

    wp_register_script('scripts', get_template_directory_uri() . '/assets/js/bundle.min.js', [], '43a308b210c2990a91c43c1341771f89', true);

    wp_enqueue_script('scripts');
}

//add_action('wp_enqueue_scripts', 'scripts', 100);