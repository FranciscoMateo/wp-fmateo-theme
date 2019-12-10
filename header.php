<!DOCTYPE html>
<?php
global $theme_settings;
$theme_settings = get_theme_mods();
$theme_settings = !empty($theme_settings['fmateo_test_options']) ? $theme_settings['fmateo_test_options'] : array();
?>
<html <?php language_attributes(); ?> <head>
<title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK:400,900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<style type="text/css" rel="header-image">
.custom-header {
    background: url(<?php echo $theme_settings['header_section']['header_image'] ?>) no-repeat;
}
.scroll-down {
    background: url(<?php echo get_template_directory_uri(); ?>/assets/images/btn-scroll-up.png) no-repeat center;
}
.scroll-down:hover {
    background: url(<?php echo get_template_directory_uri(); ?>/assets/images/btn-scroll-down.png) no-repeat center;
}
.section-one {
    background: url(<?php echo $theme_settings['section_one']['section_image'] ?>) no-repeat;
}
.social-icon-faceboock{
    background: url(<?php echo get_template_directory_uri(); ?>/assets/images/face-icon.png) no-repeat center;
}
.social-icon-twitter{
    background: url(<?php echo get_template_directory_uri(); ?>/assets/images/twitter-icon.png) no-repeat center;
}
.social-icon-instagram{
    background: url(<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon.png) no-repeat center;
}
</style>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="custom-header">
            <div class="title-and-menu">
                <div class="title">
                    <p class="bold-first-word"><?php echo get_bloginfo(); ?></p>
                </div>
                <div class="nav-menu">
                    <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?>
                </div>
            </div>
            <div class="header-content">
                <div class="header-content-title">
                    <p class="bold-first-word"><?php echo $theme_settings['header_section']['header_title']; ?></p>
                </div>
                <div class="header-content-text">
                    <p><?php echo $theme_settings['header_section']['header_text']; ?></p>
                </div>
            </div>
            <div class="scroll-down">
                
            </div><!-- .scroll-down -->
        </div>
    </header>