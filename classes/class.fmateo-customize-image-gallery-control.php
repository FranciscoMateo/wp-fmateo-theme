<?php
if (!class_exists('Fmateo_Customize_Image_Gallery_Control')) {
    class Fmateo_Customize_Image_Gallery_Control extends WP_Customize_Control
    {
        public $type = 'image_gallery';

        public $file_type = 'image';

        public $button_labels = array();

        public function __construct($manager, $id, $args = array())
        {
            parent::__construct($manager, $id, $args);
            $this->button_labels = wp_parse_args($this->button_labels, array(
                'select'       => __('Select Images', 'customize-image-gallery-control'),
                'change'       => __('Modify Gallery', 'customize-image-gallery-control'),
                'default'      => __('Default', 'customize-image-gallery-control'),
                'remove'       => __('Remove', 'customize-image-gallery-control'),
                'placeholder'  => __('No images selected', 'customize-image-gallery-control'),
                'frame_title'  => __('Select Gallery Images', 'customize-image-gallery-control'),
                'frame_button' => __('Choose Images', 'customize-image-gallery-control'),
            ));
        }

        protected function content_template()
        {
            $data = $this->json();
            ?>
        <# _.defaults( data, <?php echo wp_json_encode($data) ?> ); data.input_id='input-' + String( Math.random() ); #>
            <span class="customize-control-title"><label for="{{ data.input_id }}">{{ data.label }}</label></span>
            <# if ( data.attachments ) { #>
                <div class="image-gallery-attachments">
                    <# _.each( data.attachments, function( attachment ) { #>
                        <div class="image-gallery-thumbnail-wrapper" data-post-id="{{ attachment.id }}">
                            <img class="attachment-thumb" src="{{ attachment.url }}" draggable="false" alt="" />
                        </div>
                        <# } ) #>
                </div>
                <# } #>
                    <div>
                        <button type="button" class="button upload-button" id="image-gallery-modify-gallery">{{ data.button_labels.change }}</button>
                    </div>
                    <div class="customize-control-notifications"></div>

                <?php
            }

            public function to_json()
            {
                parent::to_json();
                $this->json['label'] = html_entity_decode($this->label, ENT_QUOTES, get_bloginfo('charset'));
                $this->json['file_type'] = $this->file_type;
                $this->json['button_labels'] = $this->button_labels;
            }
        }
    }
