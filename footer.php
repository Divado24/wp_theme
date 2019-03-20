<footer>
    <div class='container navbar navbar-default navbar-fixed-bottom'>
        <div class='navbar-header'>
            <a class="navbar-brand logo" href="<?php echo site_url(); ?>"><img class="logo" src="<?php echo wp_get_attachment_url(get_theme_mod('divado-logo')); ?>" alt="logo"/></a>
            <div class='info'>
                <a id='tel' href='tel:<?php echo get_theme_mod('divado-tel');?>'><?php echo get_theme_mod('divado-tel');?></a>
            </div>
        </div>
        <?php if (get_theme_mod('divado-social-media') == "Yes") {?>
            <div class='navbar-right' id="social-media">
                <?php if (get_theme_mod('divado-social-media-linkedin') == "Yes") {?>
                    <a href="#"><img src="<?php echo get_theme_file_uri('images/linkedin.png'); ?>" alt="Linkedin Logo"></a>
                <?php } ?>
                <?php if (get_theme_mod('divado-social-media-instagram') == "Yes") {?>
                    <a href="#"><img src="<?php echo get_theme_file_uri('images/instagram.png'); ?>" alt="Instagram Logo"></a>
                <?php } ?>
                <?php if (get_theme_mod('divado-social-media-twitter') == "Yes") {?>
                    <a href="#"><img src="<?php echo get_theme_file_uri('images/twitter.png'); ?>" alt="Twiiter Logo"></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>