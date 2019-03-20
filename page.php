<?php 
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>

<div class='container content'>
    <?php the_content(); ?>
</div>

<?php
endwhile;
else :
    echo 'No Content Found';

endif;

get_footer();
?>