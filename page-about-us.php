<?php 

/*
Template Name: Contact Page Template
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>

<div class='container content'>
    <?php the_content(); ?>
    <div class='container'>
        <h1>Location</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.919041309184!2d-74.2846976847092!3d40.65371497933825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b325fccf6e9f%3A0xa815efd24e9f82a8!2sUniversal+Pest+Control+LLC!5e0!3m2!1sen!2sus!4v1551247855783" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>      
    </div>
</div>

<?php
endwhile;
else :
    echo 'No Content Found';

endif;

get_footer();
?>