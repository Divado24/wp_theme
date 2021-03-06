<?php 
get_header();
?>


<?php if (get_theme_mod('divado-carousel-display') == "Yes") {?>
<div id="divado-carousel" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#divado-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#divado-carousel" data-slide-to="1"></li>
        <li data-target="#divado-carousel" data-slide-to="2"></li>
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
        <a class="carousel-control-prev" href="#divado-carousel" role='button' data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#divado-carousel" role='button' data-slide="next">
             <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
 </div>
<?php } ?>

<div class='container content'>
    <div>
    <?php $the_query = new WP_Query('pagename=about-us');
    while ($the_query->have_posts()) : $the_query->the_post();?>
        <h3><a href='<?php echo esc_url(get_permalink());?>'><?php the_title();?></a></h3>
        <?php the_excerpt();
    endwhile;
    ?>
    </div>
    <div>
    <?php $the_query = new WP_Query('pagename=services');
    while ($the_query->have_posts()) : $the_query->the_post();?>
        <h3><a href='<?php echo esc_url(get_permalink());?>'><?php the_title();?></a></h3>
        <?php the_excerpt();
    endwhile;
    ?>
    </div>
</div>


<?php
get_footer();
?>