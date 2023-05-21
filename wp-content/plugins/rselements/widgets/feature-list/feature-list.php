<?php
/**
 * Feature List
 *
 */

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;


defined( 'ABSPATH' ) || die();

class Rsaddon_Elementor_Pro_Features_List_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve rsgallery widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rsfeatureslist';
    }   


    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'RS Features List', 'rsaddon' );
    }
    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'glyph-icon flaticon-price';
    }


    public function get_categories() {
        return [ 'rsaddon_category' ];
    }

    public function get_keywords() {
        return [ 'list', 'title', 'features', 'heading', 'plan' ];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'_section_header',
			[
				'label' => esc_html__( 'Content', 'rsaddon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		); 
        $this->add_control(
            'feature_title',
            [
                'label'       => esc_html__( 'Feature Title', 'rsaddon' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Feature Title', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );
        $this->add_control(
            'feature_text',
            [
                'label'       => esc_html__( 'Feature Text', 'rsaddon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => esc_html__( 'Feature Text', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => esc_html__( 'Feature Image', 'rsaddon' ),
                'type'  => Controls_Manager::MEDIA,  
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_alignment',
            [
                'label'   => esc_html__( 'Image Alignment', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'top-image',            
                'options' => [                  
                    'top-image' => esc_html__( 'Top', 'rsaddon'),
                    'left-image' => esc_html__( 'left', 'rsaddon'),         
                ],
            ]
        );
        $this->add_control(
            'border_option',
            [
                'label'   => esc_html__( 'Border Option', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'border-disable',            
                'options' => [                  
                    'border-disable' => esc_html__( 'Disable', 'rsaddon'),
                    'border-enable' => esc_html__( 'Enable', 'rsaddon'),         
                ],
                'condition' => [
                    'image_alignment' => 'left-image',
                ],
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '100GB free space with hosting', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'icon_type',
            [
                'label'   => esc_html__( 'Select Icon Type', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'icon',            
                'options' => [                  
                    'icon' => esc_html__( 'Icon', 'rsaddon'),
                    'image' => esc_html__( 'Image', 'rsaddon'),         
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'rsaddon' ),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-check',  
                'condition' => [
                    'icon_type' => 'icon',
                ],              
            ]
        );

        $repeater->add_control(
            'selected_image',
            [
                'label' => esc_html__( 'Choose Image', 'rsaddon' ),
                'type'  => Controls_Manager::MEDIA,             
                
                'condition' => [
                    'icon_type' => 'image',
                ], 
            ]
        );

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'text' => esc_html__( '100GB Free Space with Hosting', 'rsaddon' ),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => esc_html__( 'Responsive Features List', 'rsaddon' ),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => esc_html__( 'Auto Renew After Finish', 'rsaddon' ),
                        'icon' => 'fa fa-close',
                    ],
                    [
                        'text' => esc_html__( 'Hurry UP! RSElements Now Free', 'rsaddon' ),
                        'icon' => 'fa fa-check',
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );


        $this->end_controls_section();


    
        $this->start_controls_section(
            '_section_style_general',
            [
                'label' => esc_html__( 'General', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__( 'List Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-features-list li',
            ]
        );       

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'general_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .rs-features-list li'
            ]
        );       

        $this->add_responsive_control(
            'general_padding',
            [
                'label' => esc_html__( 'List Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'separator' => 'before', 
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'general_margin',
            [
                'label' => esc_html__( 'List Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
      
       $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'list_item_border',
                'selector' => '{{WRAPPER}} .rs-features-list li'                
            ]
        );

       $this->add_responsive_control(
            'features_title_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();   

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => esc_html__( 'Title, Description & Image', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Description Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .rs-features-list-content .feature-title',
            ]
        ); 
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .desc' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Image Width', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .feature-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'Image Height', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .feature-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Image Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content .feature-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'image_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list-content.border-enable .feature-image img' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .rs-features-list-content.border-enable .feature-image:after, {{WRAPPER}} .rs-features-list-content.border-enable .feature-image:before' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'border_option' => 'border-enable',
                ],
            ]
        );
        $this->end_controls_section();  


        $this->start_controls_section(
            '_section_style_text',
            [
                'label' => esc_html__( 'Text', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-feature-text' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'text_hover_color',
            [
                'label' => esc_html__( 'Text Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-feature-text:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .rs-feature-text',
            ]
        );      
        $this->end_controls_section();       


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => esc_html__( 'Icon & image', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li i' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg',
                'label' => esc_html__( 'Icon Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i',
            ]
        );   

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'list_item_icon_border',
                'selector' => '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i'                
            ]
        );

         $this->add_responsive_control(
            'features_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Font Size', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],             
            ]
        ); 

        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Width', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'width: {{SIZE}}{{UNIT}};',
                ],               
            ]
        );

        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__( 'Icon Height', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        ); 

        $this->add_responsive_control(
            'icon_line_height',
            [
                'label' => esc_html__( 'Line Height', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-features-list li img, {{WRAPPER}} .rs-features-list li i' => 'line-height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        
        $this->end_controls_section();
    }

  

	protected function render() {
        $settings = $this->get_settings_for_display();?> 

        <div class="rs-features-list-content <?php echo esc_html($settings['image_alignment']);?> <?php echo esc_html($settings['border_option']);?>">


            <?php if(!empty($settings['feature_image']['url'])) : ?>
            <div  class="feature-image">
                <img src="<?php echo esc_url( $settings['feature_image']['url'] );?>" alt="image"/>
            </div>
            <?php endif;?>

            <div class="feature-content">
                <?php if(!empty($settings['feature_title'])) { ?>
                    <h3 class="feature-title"><?php echo esc_html($settings['feature_title']);?> </h3>  
                <?php } ?>
                 
                <?php if(!empty($settings['feature_text'])) { ?>
                    <div class="desc"><?php echo esc_html($settings['feature_text']);?> </div>  
                <?php } ?>

                <?php if ( is_array( $settings['features_list'] ) ) : ?>
                    <ul class="rs-features-list">
                        <?php foreach ( $settings['features_list'] as $index => $feature ) :
                            $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                            $this->add_inline_editing_attributes( $name_key, 'basic' );
                            $this->add_render_attribute( $name_key, 'class', 'rs-feature-text' );
                            ?>
                            <li class="<?php echo esc_attr( 'elementor-repeater-item-' . $feature['_id'] ); ?>">

                                <?php if ( $feature['icon'] ) : ?>
                                    <i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i>
                                <?php endif; ?>

                                <?php if ( $feature['selected_image'] ) : ?>
                                    <img src="<?php echo esc_url( $feature['selected_image']['url'] );?>" alt="">
                                <?php endif; ?>

                                <span <?php $this->print_render_attribute_string( $name_key ); ?>><?php echo wp_kses_post( $feature['text'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>  

        </div>
        <?php
    }
}
