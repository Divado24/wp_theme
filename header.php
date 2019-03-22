<!DOCTYPE html>
<html>
    <head>
    <?php wp_head(); ?>
    </head>

    <body>
        <header  style="background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('divado-background')); ?>);">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img id= "logo" src="<?php echo wp_get_attachment_url(get_theme_mod('divado-logo')); ?>" alt="logo"/></a>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class='container title'>
            <h1><?php  the_title(); ?></h1>
        </div>
        
        </header>
