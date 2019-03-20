<?php 
get_header();
?>


<?php if (get_theme_mod('divado-carousel-display') == "Yes") {?>
<div id="doCarousel" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#doCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#doCarousel" data-slide-to="1"></li>
        <li data-target="#doCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('divado-carousel-pic1')); ?>" alt="" class="img-rounded"/>
             <div class="carousel-caption">
                 <h3><?php echo get_theme_mod('divado-carousel-caption1');?></h3>
             </div>
         </div>
        <div class="carousel-item">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('divado-carousel-pic2')); ?>" alt="" class="img-rounded"/>
            <div class="carousel-caption">
                 <h3><?php echo get_theme_mod('divado-carousel-caption2');?></h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('divado-carousel-pic3')); ?>" alt="" class="img-rounded"/>
             <div class="carousel-caption">
                 <h3><?php echo get_theme_mod('divado-carousel-caption3');?></h3>
            </div>
        </div>
    </div>
        <a class="carousel-control-prev" href="#doCarousel" role='button' data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#doCarousel" role='button' data-slide="next">
             <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
 </div>
<?php } ?>

<div class='container content'>
    <?php $the_query = new WP_Query('pagename=about');
    while ($the_query->have_posts()) : $the_query->the_post();
        the_excerpt();
    endwhile;
    
    ?>
</div>


<?php
get_footer();
?>