<?php

function initialize_theme_options()
{
    $theme_options_default = array(
        'header_section' => array(
            'header_image' => get_parent_theme_file_uri('/assets/images/header.jpg'),
            'header_title' => get_bloginfo(),
            'header_text' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium'
        ),
        'section_one' => array(
            'section_image' => get_parent_theme_file_uri('/assets/images/section_one.jpg'),
            'title' => 'Lorem ipsum',
            'text' => 'Sed ut prespiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo iventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam volptatem quia voluptas sit aspernatur aut fugit, sed quia consquuntur magni dolores eos qui ratione voluptaten sequi nesciunt. Neque porro quisquam estm qui dolorem ipsum quia dolor sit amet, cosecteur, adipisci velit, sed quia nuamquam eius modi tempora icidunt ut labore et dolore magnam aliquam quaerat voluptatem. Uy enim ad minima. Neque porro quisquam est, qui dolrem ipsum quia dolor sit amet consectetur, adipsci velit, sed quia non numquam eiu.'
        ),
        'section_two' => array(
            'section_video' => get_parent_theme_file_uri('/assets/video/section_two_video.mp4'),
            'title' => 'Dolor asimet'
        ),
        'section_three' => array(
            'main_image' => get_parent_theme_file_uri('/assets/images/section_three.jpg'),
            'gallery' => ''
        ),
        'section_four' => array(
            'section_image' => get_parent_theme_file_uri('/assets/images/section_four.jpeg'),
            'title' => 'Lorem ipsum',
            'subtitle' => 'Neque porr quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipsci velit, sed quia non numquam eiu.',
            'text' => 'Neque porr quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipsci velit, sed quia non numquam eiu. Neque porr quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipsci velit, sed quia non numquam eiu. Neque porr quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipsci velit, sed quia non numquam eiu.',
            'button_text' => 'Lorem ipsum',
            'button_link' => ''
        ),
        'section_five' => array(
            'title' => 'Lorem ipsum',
            'text' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consentetur adipsci velit, sed quia numquam eiu',
            'name_placeholder' => 'Lorem ipsum',
            'surname_placeholder' => 'Lorem ipsum',
            'textarea_placeholder' => 'Lorem ipsum',
            'button_text' => 'Lorem ipsum',
        )
    );
    set_theme_mod('fmateo_test_options', $theme_options_default);
}

$theme_options = get_theme_mods();
if (!isset($theme_options['fmateo_test_options'])) {
    add_action('init', 'initialize_theme_options');
}

function add_theme_scripts()
{
    wp_enqueue_script('fmateo-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Gallery Control Styles and Srcripts...
function add_customize_controls_enqueue_scripts()
{
    $in_footer = 1;
    wp_enqueue_script('customize-image-gallery-control-script', get_template_directory_uri() . '/assets/js/customize-image-gallery-control.js', array('jquery', 'customize-controls'), '', $in_footer);
    wp_enqueue_style('customize-image-gallery-control-style', get_template_directory_uri() . '/assets/css/customize-image-gallery-control.css', array('customize-controls'));
}
add_action('customize_controls_enqueue_scripts', 'add_customize_controls_enqueue_scripts');

// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.

function add_normalize_CSS()
{
    wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

// Register a new sidebar simply named 'sidebar'
function add_widget_Support()
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
// Hook the widget initiation and run our function
add_action('widgets_init', 'add_Widget_Support');

// Register a new navigation menu
function add_Main_Nav()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
// Hook to the init action hook, run our navigation menu function
add_action('init', 'add_Main_Nav');

// Customize options...

function fmateo_test_customize_register($wp_customize)
{

    add_header_image_section($wp_customize);

    add_section_one($wp_customize);

    add_section_two($wp_customize);

    require_once __DIR__ . '/classes/class.fmateo-customize-image-gallery-control.php';
    $wp_customize->register_control_type('Fmateo_Customize_Image_Gallery_Control');

    add_section_three($wp_customize);

    add_section_four($wp_customize);

    add_section_five($wp_customize);
}

add_action('customize_register', 'fmateo_test_customize_register');

function add_header_image_section($wp_customize)
{
    $wp_customize->add_section(
        'header_image',
        array(
            'title' => __('Header section', 'fmateo-test')
        )
    );

    $wp_customize->add_setting(
        'fmateo_test_options[header_section][header_image]',
        array(
            'default' => get_parent_theme_file_uri('/assets/images/header.jpg')
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fmateo_test_options[header_section][header_image]',
            array(
                'label'      => __('Upload a header image.', 'fmateo-test'),
                'section'    => 'header_image',
                'settings'   => 'fmateo_test_options[header_section][header_image]',
            )
        )
    );

    $wp_customize->add_setting(
        'fmateo_test_options[header_section][header_title]',
        array(
            'default' => get_bloginfo()
        )
    );

    $wp_customize->add_control('fmateo_test_options[header_section][header_title]', array(
        'label' => __('Header content title', 'fmateo-text'),
        'section' => 'header_image',
        'priority' => 1,
        'type'  => 'text'
    ));

    $wp_customize->add_setting(
        'fmateo_test_options[header_section][header_text]',
        array(
            'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium'
        )
    );

    $wp_customize->add_control('fmateo_test_options[header_section][header_text]', array(
        'label' => __('Header content text', 'fmateo-text'),
        'section' => 'header_image',
        'priority' => 2,
        'type'  => 'textarea'
    ));
}

function add_section_one($wp_customize)
{
    $wp_customize->add_section('section_one', array(
        'title' => __('Section one', 'fmateo-text'),
        'priority' => 210,
    ));

    $wp_customize->add_setting(
        'fmateo_test_options[section_one][section_image]',
        array(
            'default' => get_parent_theme_file_uri('/assets/images/section_one.jpg')
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fmateo_test_options[section_one][section_image]',
            array(
                'label'      => __('Upload a section image.', 'fmateo-test'),
                'section'    => 'section_one',
                'settings'   => 'fmateo_test_options[section_one][section_image]',
            )
        )
    );

    $wp_customize->add_setting('fmateo_test_options[section_one][title]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_one][title]', array(
        'label' => __('Title', 'fmateo-text'),
        'section' => 'section_one',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_one][text]', array(
        'default' => 'Sed ut prespiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo iventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam volptatem quia voluptas sit aspernatur aut fugit, sed quia consquuntur magni dolores eos qui ratione voluptaten sequi nesciunt. Neque porro quisquam estm qui dolorem ipsum quia dolor sit amet, cosecteur, adipisci velit, sed quia nuamquam eius modi tempora icidunt ut labore et dolore magnam aliquam quaerat voluptatem. Uy enim ad minima. Neque porro quisquam est, qui dolrem ipsum quia dolor sit amet consectetur, adipsci velit, sed quia non numquam eiu.'
    ));

    $wp_customize->add_control('fmateo_test_options[section_one][text]', array(
        'label' => __('Text', 'fmateo-text'),
        'section' => 'section_one',
        'priority' => 2,
        'type' => 'textarea',
    ));
}

function add_section_two($wp_customize)
{

    $wp_customize->add_section('section_two', array(
        'title' => __('Section two', 'fmateo-text'),
        'priority' => 220,
    ));

    $wp_customize->add_setting(
        'fmateo_test_options[section_two][section_video]',
        array(
            'default' => get_parent_theme_file_uri('/assets/video/section_two_video.mp4')
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'fmateo_test_options[section_two][section_video]',
            array(
                'label'      => __('Video', 'fmateo-test'),
                'section'    => 'section_two',
                'settings'   => 'fmateo_test_options[section_two][section_video]',
            )
        )
    );

    $wp_customize->add_setting('fmateo_test_options[section_two][title]', array(
        'default' => 'Dolor asimet'
    ));

    $wp_customize->add_control('fmateo_test_options[section_two][title]', array(
        'label' => __('Title', 'fmateo-text'),
        'section' => 'section_two',
        'priority' => 1,
        'type' => 'text',
    ));
}

function add_section_three($wp_customize)
{
    $wp_customize->add_section('section_three', array(
        'title' => __('Section three', 'fmateo-text'),
        'priority' => 230,
    ));

    $wp_customize->add_setting(
        'fmateo_test_options[section_three][main_image]',
        array(
            'default' => get_parent_theme_file_uri('/assets/images/section_three.jpg')
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fmateo_test_options[section_three][main_image]',
            array(
                'label'      => __('Upload a main image.', 'fmateo-test'),
                'section'    => 'section_three',
                'settings'   => 'fmateo_test_options[section_three][main_image]',
            )
        )
    );


    $wp_customize->add_setting('fmateo_test_options[section_three][gallery]', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ));

    $wp_customize->add_control(new Fmateo_Customize_Image_Gallery_Control(
        $wp_customize,
        'fmateo_test_options[section_three][gallery]',
        array(
            'label'    => __('Image Gallery', 'fmateo-text'),
            'section'  => 'section_three',
            'settings' => 'fmateo_test_options[section_three][gallery]',
            'type'     => 'image_gallery',
        )
    ));
}

function add_section_four($wp_customize)
{
    $wp_customize->add_section('section_four', array(
        'title' => __('Section four', 'fmateo-text'),
        'priority' => 240,
    ));

    $wp_customize->add_setting(
        'fmateo_test_options[section_four][section_image]',
        array(
            'default' => get_parent_theme_file_uri('/assets/images/section_four.jpeg')
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fmateo_test_options[section_four][section_image]',
            array(
                'label'      => __('Upload a section image.', 'fmateo-test'),
                'section'    => 'section_four',
                'settings'   => 'fmateo_test_options[section_four][section_image]',
            )
        )
    );

    $wp_customize->add_setting('fmateo_test_options[section_four][title]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_four][title]', array(
        'label' => __('Title', 'fmateo-text'),
        'section' => 'section_four',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_four][subtitle]', array(
        'default' => 'Neque porr quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipsci velit, sed quia non numquam eiu.'
    ));

    $wp_customize->add_control('fmateo_test_options[section_four][subtitle]', array(
        'label' => __('Subtitle', 'fmateo-text'),
        'section' => 'section_four',
        'priority' => 2,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_][text]', array(
        'default' => 'Sed ut prespiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo iventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam volptatem quia voluptas sit aspernatur aut fugit, sed quia consquuntur magni dolores eos qui ratione voluptaten sequi nesciunt. Neque porro quisquam estm qui dolorem ipsum quia dolor sit amet, cosecteur, adipisci velit, sed quia nuamquam eius modi tempora icidunt ut labore et dolore magnam aliquam quaerat voluptatem. Uy enim ad minima. Neque porro quisquam est, qui dolrem ipsum quia dolor sit amet consectetur, adipsci velit, sed quia non numquam eiu.'
    ));

    $wp_customize->add_control('fmateo_test_options[section_][text]', array(
        'label' => __('Text', 'fmateo-text'),
        'section' => 'section_four',
        'priority' => 3,
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_four][button_text]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_four][button_text]', array(
        'label' => __('Button text', 'fmateo-text'),
        'section' => 'section_four',
        'priority' => 4,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_four][button_link]', array(
        'default' => ''
    ));

    $wp_customize->add_control('fmateo_test_options[section_four][button_link]', array(
        'label' => __('Button link', 'fmateo-text'),
        'section' => 'section_four',
        'priority' => 5,
        'type' => 'text',
    ));
}

function add_section_five($wp_customize)
{ 
    $wp_customize->add_section('section_five', array(
        'title' => __('Section five', 'ki5o-text'),
        'priority' => 250,
    ));

    $wp_customize->add_setting('fmateo_test_options[section_five][title]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][title]', array(
        'label' => __('Title', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_five][text]', array(
        'default' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consentetur adipsci velit, sed quia numquam eiu'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][text]', array(
        'label' => __('Text', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 2,
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('fmateo_test_options[section_five][name_placeholder]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][name_placeholder]', array(
        'label' => __('Name placeholder', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 3,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_five][surname_placeholder]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][surname_placeholder]', array(
        'label' => __('Surame placeholder', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 4,
        'type' => 'text',
    ));
    $wp_customize->add_setting('fmateo_test_options[section_five][textarea_placeholder]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][textarea_placeholder]', array(
        'label' => __('Textarea placeholder', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 5,
        'type' => 'text',
    ));

    $wp_customize->add_setting('fmateo_test_options[section_five][button_text]', array(
        'default' => 'Lorem ipsum'
    ));

    $wp_customize->add_control('fmateo_test_options[section_five][button_text]', array(
        'label' => __('Button text', 'fmateo-text'),
        'section' => 'section_five',
        'priority' => 6,
        'type' => 'text',
    ));
}
