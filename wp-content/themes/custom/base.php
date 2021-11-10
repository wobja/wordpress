<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<?php getView('views/organisms/head.php'); ?>

<body <?php body_class(); ?>>
<div id="custom-theme">

    <?php do_action('get_header'); ?>

    <?php getView('views/organisms/header.php'); ?>

    <main class="main" role="main">
        <?php include templatePath(); ?>
    </main>

    <?php getView('views/organisms/footer.php'); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>