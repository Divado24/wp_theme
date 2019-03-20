<?php

function divado_files() {
    wp_enqueue_style('bootstrap_styles', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap_scripts', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', NULL, '4.3.1', true);
    wp_enqueue_script('bootstrap_jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', NULL, '4.3.1', true);

    wp_enqueue_style('divado_style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'divado_files');

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 99);
function wpdocs_custom_excerpt_length(){
    return 25;
}

// Nav Menus
register_nav_menus(array(
    'header' => __('Header Menu'),
));

// Contact Form Email
//Remove personall emaill stuff before uploading

/*  **  EMAIL SMTP  **  */
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'smtp.gmail.com'; // HOST SMTP ex: smtp.gmail.com
    $phpmailer->SMTPAuth   = true; // AUTHENTIFICATION ex: false disable
    $phpmailer->Port       = '465'; // PORT NUMBER ex: 465
    $phpmailer->SMTPSecure = 'ssl'; // SECURITY PROTOCOL ex: ssl or tls
    $phpmailer->Username   = ''; // EMAIL ADRESS ex: johndoe@gmail.com
    $phpmailer->Password   = '';
    $phpmailer->From       = ''; // EMAIL ADRESS ex: johndoe@gmail.com
    $phpmailer->FromName   = ''; // EMAIL NICKNAME ex: John De
}

// Quick Validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*  **  Form Handling and Emailing   **  */
function email_contact_form() {
    if (!empty($_POST)) {
        $contactname = test_input($_POST["contactname"]);
        $visitor_email = test_input($_POST["email"]);
        $company = test_input($_POST["company"]);
        $message = test_input($_POST["message"]);

        $email_subject = "Contact Page Submission";
        $email_body = "Name: $contactname \nEmail: $visitor_email \nCompany: $company \nMessage: $message";
        $to = "divado24@gmail.com";


        if (wp_mail($to, $email_subject, $email_body)) {
            return true;
        }
        else {
            return false;
        }
    }
}

//Customize
add_action('customize_register', 'divadoCustomize');
function divadoCustomize($wp_customize) {

    $wp_customize->add_panel('divado-panel', array(
        'title' => 'Divado Theme',
        'priority' => 10
    ));


    //LOGO
    $wp_customize->add_section('divado-logo-section', array(
        'title'=> 'Divado Logo',
        'panel' => 'divado-panel',
        'priority' => 1
    ));
    $wp_customize->add_setting('divado-logo', array(
        'default-image' => 'echo get_theme_file_uri("images/njit_logo.png")'
    ));
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'divado-logo-control', array(
        'label' => 'Logo',
        'section' => 'divado-logo-section',
        'settings' => 'divado-logo',
        'width' => 768,
        'height' => 273
    )));
    

    //Background Image
    $wp_customize->add_section('divado-background-section', array(
        'title' => 'Header Background',
        'panel' => 'divado-panel',
        'priority' => 2
    ));

    $wp_customize->add_setting('divado-background');
    $wp_customize->add_control(New WP_Customize_Cropped_Image_Control($wp_customize, 'divado-background-control', array(
        'label' => 'Background Image',
        'section' => 'divado-background-section',
        'settings' => 'divado-background',
        'width' => 1026,
        'height' => 220
    )));

    /*  **  Carousel    **  */
    $wp_customize->add_section('divado-carousel-section', array(
        'title' => 'Carousel',
        'panel' => 'divado-panel',
        'priority' => 3
    ));

    $wp_customize->add_setting('divado-carousel-display', array(
        'default' => 'Yes'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-carousel-display-control', array(
        'label' => 'Display carousel?',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-display',
        'type' => 'radio',
        'choices' => array('Yes' => 'Yes', 'No' => 'No')
    )));

    //Slide 1
    $wp_customize->add_setting('divado-carousel-pic1', array(
        'defualt' => '3'
    ));
    $wp_customize->add_control(New WP_Customize_Cropped_Image_Control($wp_customize, 'divado-carousel-pic1-control', array(
        'label' => 'First Slide Image',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-pic1',
        'width' => '1350',
        'height' => '600'
    )));
    $wp_customize->add_setting('divado-carousel-caption1', array(
        'default' =>'Caption'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-carousel-caption1-control', array(
        'label' => 'Caption',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-caption1',
        'type' => 'text'
    )));
    //Slide 2
    $wp_customize->add_setting('divado-carousel-pic2', array(
        'defualt' => '#'
    ));
    $wp_customize->add_control(New WP_Customize_Cropped_Image_Control($wp_customize, 'divado-carousel-pic2-control', array(
        'label' => 'Second Slide Image',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-pic2',
        'width' => '1350',
        'height' => '600'
    )));
    $wp_customize->add_setting('divado-carousel-caption2', array(
        'default' =>'Caption'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-carousel-caption2-control', array(
        'label' => 'Caption',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-caption2',
        'type' => 'text'
    )));
    //Slide 3
    $wp_customize->add_setting('divado-carousel-pic3', array(
        'defualt' => '#'
    ));
    $wp_customize->add_control(New WP_Customize_Cropped_Image_Control($wp_customize, 'divado-carousel-pic3-control', array(
        'label' => 'Third Slide Image',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-pic3',
        'width' => '1350',
        'height' => '600'
    )));
    $wp_customize->add_setting('divado-carousel-caption3', array(
        'default' =>'Caption'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-carousel-caption3-control', array(
        'label' => 'Caption',
        'section' => 'divado-carousel-section',
        'settings' => 'divado-carousel-caption3',
        'type' => 'text'
    )));

    /*  **  FOOTER  **  */
    $wp_customize->add_section('divado-footer-section', array(
        'title' => 'Footer',
        'panel' => 'divado-panel',
        'priority' => 4
    ));

    //TEL Number
    $wp_customize->add_setting('divado-tel', array(
        'default' => '+1-800-000-0000'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-tel-control', array(
        'label' => 'Phone Number',
        'section' => 'divado-footer-section',
        'settings' => 'divado-tel',
        'type' => 'tel'
    )));

    //Social Media
    $wp_customize->add_setting('divado-social-media', array(
        'default' => 'Yes'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-control', array(
        'label' => 'Display social media icons?',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media',
        'type' => 'radio',
        'choices' => array('Yes' => 'Yes', 'No' => 'No')
    )));

    //Linkedin
    $wp_customize->add_setting('divado-social-media-linkedin', array(
        'default' => 'Yes'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-linkedin-control', array(
        'label' => 'Display Linkedin icons?',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-linkedin',
        'type' => 'radio',
        'choices' => array('Yes' => 'Yes', 'No' => 'No')
    )));
    $wp_customize->add_setting('divado-social-media-linkedin-url', array(
        'default' => '#'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-linkedin-url', array(
        'label' => 'URL',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-linkedin-url',
        'type' => 'url'
    )));

    //Instagram
    $wp_customize->add_setting('divado-social-media-instagram', array(
        'default' => 'Yes'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-instagram-control', array(
        'label' => 'Display Instagram icons?',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-instagram',
        'type' => 'radio',
        'choices' => array('Yes' => 'Yes', 'No' => 'No')
    )));
    $wp_customize->add_setting('divado-social-media-instagram-url', array(
        'default' => '#'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-instagram-url', array(
        'label' => 'URL',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-instagram-url',
        'type' => 'url'
    )));

    //Twitter
    $wp_customize->add_setting('divado-social-media-twitter', array(
        'default' => 'Yes'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-twitter-control', array(
        'label' => 'Display Twitter icons?',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-twitter',
        'type' => 'radio',
        'choices' => array('Yes' => 'Yes', 'No' => 'No')
    )));
    $wp_customize->add_setting('divado-social-media-twitter-url', array(
        'default' => '#'
    ));
    $wp_customize->add_control(New WP_Customize_Control($wp_customize, 'divado-social-media-twitter-url', array(
        'label' => 'URL',
        'section' => 'divado-footer-section',
        'settings' => 'divado-social-media-twitter-url',
        'type' => 'url'
    )));

}


?>