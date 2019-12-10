<?php
/**
 * Template Name: Portfolio Page
 *
 * Displays content for portfolio page layouts
 *
 * @package _mbbasetheme
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="section-one">
            <div class="section-one-content">
                <div class="section-one-title">
                    <p class="bold-first-word"><?php echo $theme_settings['section_one']['title']; ?></p>
                </div>
                <div class="section-one-text">
                    <p><?php echo $theme_settings['section_one']['text']; ?></p>
                </div>
            </div>
        </div>
        <div class="section-two">
            <div class="section-two-content">
                <div class="section-two-title">
                    <p class="bold-last-word"><?php echo $theme_settings['section_two']['title']; ?></p>
                </div>
                <div class="section-two-video">
                    <video controls>
                        <source src="<?php echo $theme_settings['section_two']['section_video']; ?>" type="video/mp4">
                    </video>
                </div>
                <div class="section-two-more">
                    <p>Ver más</p>
                </div>
            </div>
        </div>
        <div class="section-three">
            <div class="section-three-content">
                <div class="section-three-main-image">
                    <img class="main-image" src="<?php echo $theme_settings['section_three']['main_image'] ?>">
                </div>
                <div class="section-three-thumbnails">
                    <?php
                    if (empty($theme_settings['section_three']['gallery'])) {
                        ?>
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/section_four.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/section_four.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/section_four.jpeg'; ?>">
                        <img class="image-thumbnail-item" src="<?php echo get_template_directory_uri() . '/assets/images/computer.jpeg'; ?>">
                    <?php
                } else {
                    foreach ($theme_settings['section_three']['gallery'] as $image_id) {
                        $image = wp_get_attachment_image_src($image_id, '');
                        ?>
                            <img class="image-thumbnail-item" src="<?php echo $image[0]; ?>">
                        <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
        <div class="section-four">
            <div class="section-four-content">
                <div class="section-four-text-panel">
                    <div class="section-four-title">
                        <p class="bold-first-word"><?php echo $theme_settings['section_four']['title']; ?></p>
                    </div>
                    <div class="section-four-subtitle">
                        <p class=""><?php echo $theme_settings['section_four']['subtitle']; ?></p>
                    </div>
                    <div class="section-four-text">
                        <p><?php echo $theme_settings['section_four']['text']; ?></p>
                    </div>
                    <div class="section-four-button">
                        <a href="<?php echo $theme_settings['section_four']['button_link'] ?>"><?php echo $theme_settings['section_four']['button_text'] ?></a>
                    </div>
                </div>
                <div class="section-four-image-panel">
                    <div class="section-four-image">
                        <img src="<?php echo $theme_settings['section_four']['section_image']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="section-five">
            <div class="section-five-content">
                <div class="section-five-text-panel">
                    <div class="section-five-title">
                        <p class="bold-first-word"><?php echo $theme_settings['section_five']['title']; ?></p>
                    </div>
                    <div class="section-five-text">
                        <p><?php echo $theme_settings['section_five']['text']; ?></p>
                    </div>
                    <div class="social-icons">
                        <p class="social-icon-item social-icon-faceboock"></p>
                        <p class="social-icon-item social-icon-twitter"></p>
                        <p class="social-icon-item social-icon-instagram"></p>
                    </div>
                </div>
                <div class="section-five-form-panel">
                    <form>
                        <input type="text" class="form-item form-item-text" name="name" placeholder="<?php echo $theme_settings['section_five']['name_placeholder']; ?>">
                        <input type="text" class="form-item form-item-text" name="surname" placeholder="<?php echo $theme_settings['section_five']['surname_placeholder']; ?>">
                        <textarea class="form-item form-item-textarea" name="textarea" placeholder="<?php echo $theme_settings['section_five']['textarea_placeholder']; ?>"></textarea>
                        <div class="form-button">
                            <button><?php echo $theme_settings['section_five']['button_text']; ?></button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>