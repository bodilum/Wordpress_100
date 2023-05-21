<?php
/**
 * Rs Slider widget class
 *
 */
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;


defined( 'ABSPATH' ) || die();

class Rsaddon_Slider_Pro_Widget extends \Elementor\Widget_Base {
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
        return 'rs-sliders';
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
        return esc_html__( 'RS Full Width Slider', 'rsaddon' );
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
        return 'eicon-gallery-grid';
    }


    public function get_categories() {
        return [ 'rsaddon_category' ];
    }

    public function get_keywords() {
        return [ 'slider', 'slide', 'image' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            '_section_slider',
            [
                'label' => esc_html__( 'RS Slider', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Slide Shape', 'rsaddon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'rsaddon'),
                'type' => Controls_Manager::URL,                
            ]
        ); 

        $repeater->add_control(
            'watermark',
            [
                'label' => esc_html__('Slide Watermark Title', 'rsaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Watermark Title', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title Title', 'rsaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Sub Title', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Title', 'rsaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Title', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rsaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Description', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button', 'rsaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Button', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'selected_image',
            [
                'label' => esc_html__( 'Image', 'rsaddon' ),
                'type'  => Controls_Manager::MEDIA,             
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sliders_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );        


        $this->end_controls_section();

        $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );
   
            

        $this->add_control(
            'slider_nav',
            [
                'label'   => esc_html__( 'Navigation Nav', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'true',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'rsaddon' ),
                    'false' => esc_html__( 'Disable', 'rsaddon' ),              
                ],
                'separator' => 'before',                            
            ] 
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label'   => esc_html__( 'Autoplay', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'rsaddon' ),
                    'false' => esc_html__( 'Disable', 'rsaddon' ),              
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_autoplay_speed',
            [
                'label'   => esc_html__( 'Autoplay Slide Speed', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '1000' => esc_html__( '1 Seconds', 'rsaddon' ),
                    '2000' => esc_html__( '2 Seconds', 'rsaddon' ), 
                    '3000' => esc_html__( '3 Seconds', 'rsaddon' ), 
                    '4000' => esc_html__( '4 Seconds', 'rsaddon' ), 
                    '5000' => esc_html__( '5 Seconds', 'rsaddon' ), 
                ],
                'separator' => 'before',                            
            ]
            
        );

        $this->add_control(
            'slider_stop_on_hover',
            [
                'label'   => esc_html__( 'Stop on Hover', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'rsaddon' ),
                    'false' => esc_html__( 'Disable', 'rsaddon' ),              
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_interval',
            [
                'label'   => esc_html__( 'Autoplay Interval', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '5000' => esc_html__( '5 Seconds', 'rsaddon' ), 
                    '4000' => esc_html__( '4 Seconds', 'rsaddon' ), 
                    '3000' => esc_html__( '3 Seconds', 'rsaddon' ), 
                    '2000' => esc_html__( '2 Seconds', 'rsaddon' ), 
                    '1000' => esc_html__( '1 Seconds', 'rsaddon' ),     
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_loop',
            [
                'label'   => esc_html__( 'Loop', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'rsaddon' ),
                    'false' => esc_html__( 'Disable', 'rsaddon' ),
                ],
                'separator' => 'before',
                            
            ]    
        );
                
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Arrow & Number Align', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'nev_positions',
            [
                'label' => esc_html__( 'Left/Right Position (Left Arrow)', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -0,
                        'max' => 2000,
                    ],
                ],
               
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'nev_positiond',
            [
                'label' => esc_html__( 'Left/Right Position (Right Arrow)', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -0,
                        'max' => 2000,
                    ],
                ],
               
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'nev_position',
            [
                'label' => esc_html__( 'Left/Right Position (Number)', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -0,
                        'max' => 2000,
                    ],
                ],
               
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .grid-item .rs-slide span.number' => 'left: {{SIZE}}{{UNIT}}; right: auto; width: auto;',
                ],
            ]
        ); 

        $this->end_controls_section();


        $this->start_controls_section(
            '_sub_style',
            [
                'label' => esc_html__( 'Sub Title', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .grid-item .rs-slide .slide-img .slide_des .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sub__title_shap',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .grid-item .rs-slide .slide-img .slide_des .sub-title::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs__banner__slider .grid-item .rs-slide .slide-img .slide_des .sub-title',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'sub_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .grid-item .rs-slide .slide-img .slide_des .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_title_style',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .title' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs__banner__slider .rs-slide .slide-img .slide_des .title',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_description_style',
            [
                'label' => esc_html__( 'Description', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .description' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .description',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'des_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_watermark_style',
            [
                'label' => esc_html__( 'Watermark', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'watermark_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .watermark' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'watermark_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .watermark',
                'separator'   => 'before',
            ]
        );

		$this->add_responsive_control(
		    'numbers_tops_position',
		    [
				'label'      => esc_html__( 'Watermark Top / Buttom Position', 'rsaddon' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
                
		        'selectors' => [
		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .watermark' => 'top: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);

        $this->end_controls_section();


        $this->start_controls_section(
            '_button_style',
            [
                'label' => esc_html__( 'Button', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

       		$this->start_controls_tabs( '_tabs_button' );

       		$this->start_controls_tab(
                   '_normal_tab',
                   [
                       'label' => esc_html__( 'Normal', 'rsaddon' ),
                   ]
               ); 

       		$this->add_control(
       		    'btn_text_color',
       		    [
       		        'label' => esc_html__( 'Text Color', 'rsaddon' ),
       		        'type' => Controls_Manager::COLOR,		      
       		        'selectors' => [
       		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a' => 'color: {{VALUE}};',
       		        ],
       		    ]
       		);

       		$this->add_responsive_control(
       		    'link_padding',
       		    [
       		        'label' => esc_html__( 'Padding', 'rsaddon' ),
       		        'type' => Controls_Manager::DIMENSIONS,
       		        'size_units' => [ 'px', 'em', '%' ],
       		        'selectors' => [
       		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
       		        ],
       		    ]
       		);

       		$this->add_group_control(
       		    Group_Control_Typography::get_type(),
       		    [
       		        'name' => 'btn_typography',
       		        'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a',
       		    ]
       		);

       		$this->add_group_control(
       		    Group_Control_Background::get_type(),
       			[
       				'name' => 'background_normal',
       				'label' => esc_html__( 'Background', 'rsaddon' ),
       				'types' => [ 'classic', 'gradient' ],
       				'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a',
       			]
       		);

       		$this->add_group_control(
       		    Group_Control_Border::get_type(),
       		    [
       		        'name' => 'button_border',
       		        'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a',
       		    ]
       		);

       		$this->add_control(
       		    'button_border_radius',
       		    [
       		        'label' => esc_html__( 'Border Radius', 'rsaddon' ),
       		        'type' => Controls_Manager::DIMENSIONS,
       		        'size_units' => [ 'px', '%' ],
       		        'selectors' => [
       		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
       		        ],
       		    ]
       		);

       		$this->end_controls_tab();

       		$this->start_controls_tab(
                   '_hover_tab',
                   [
                       'label' => esc_html__( 'Hover', 'rsaddon' ),
                   ]
               ); 

       		$this->add_control(
       		    'btn_text_hover_color',
       		    [
       		        'label' => esc_html__( 'Text Color', 'rsaddon' ),
       		        'type' => Controls_Manager::COLOR,		      
       		        'selectors' => [
       		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a:hover' => 'color: {{VALUE}};',
       		        ],
       		    ]
       		);


       		$this->add_group_control(
       		    Group_Control_Typography::get_type(),
       		    [
       		        'name' => 'btn_hover_typography',
       		        'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a:hover',
       		    ]
       		);

       		$this->add_group_control(
       		    Group_Control_Background::get_type(),
       			[
       				'name' => 'background_hover',
       				'label' => esc_html__( 'Background', 'rsaddon' ),
       				'types' => [ 'classic', 'gradient' ],
       				'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a:hover',
       			]
       		);

       		$this->add_group_control(
       		    Group_Control_Border::get_type(),
       		    [
       		        'name' => 'button_border_hover',
       		        'selector' => '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a:hover',
       		    ]
       		);

       		$this->add_control(
       		    'button_hover_radius',
       		    [
       		        'label' => esc_html__( 'Border Radius', 'rsaddon' ),
       		        'type' => Controls_Manager::DIMENSIONS,
       		        'size_units' => [ 'px', '%' ],
       		        'selectors' => [
       		            '{{WRAPPER}} .rs__banner__slider .rs-slide .slide-img .slide_des .rs__button a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
       		        ],
       		    ]
       		);

       		$this->end_controls_tab();
       		$this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $slidesToShow    = 1;
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $interval        = $settings['slider_interval'];
        $slidesToScroll  = 1;
        $slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
        $pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
        $sliderDots      = false;
        $sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';        
        $infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
        $centerMode      = false;
        $col_lg          = 1;


        $unique = rand(2012,35120);

        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderNav', 'infinite', 'col_lg');   

        if ( empty($settings['sliders_list'] ) ) {
            return;
        }
        ?>
       
            <div class="rsaddon-unique-slider rs__banner__slider">
                <div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="rs-addon-slider">                   
                        
                <?php

                	$total = count($settings['sliders_list']); 
                	$i = 1;

                    foreach ( $settings['sliders_list'] as $index => $item ) :
                        $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                        $selected_image = wp_get_attachment_image_url( $item['selected_image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = Utils::get_placeholder_image_src();
                        }
                        if ( ! $selected_image ) {
                            $selected_image = Utils::get_placeholder_image_src();
                        }
                        
                        $title              = !empty($item['name']) ? $item['name'] : '';                                
                        $button_text        = !empty($item['button_text']) ? $item['button_text'] : '';                                
                        $watermark          = !empty($item['watermark']) ? $item['watermark'] : '';                                
                        $subtitle           = !empty($item['subtitle']) ? $item['subtitle'] : '';                                
                        $title_tag          = !empty($settings['title_tag']) ? $settings['title_tag'] : 'h3';
                        $description        = !empty($item['description']) ? $item['description'] : '';
                        $target             = !empty($item['link']['is_external']) ? 'target=_blank' : '';  
                        $link               = !empty($item['link']['url']) ? $item['link']['url'] : '';                          
                        ?>
                        <div class="grid-item">
                            <div  class="rs-slide">
                                <div class="slide-img">                                   
                                    
                                    <div class="slide_des">
                                    	<div class="container">
    	                                    <div class="inner-container">
                                                <div class="content-left">
                                                    <?php if(!empty($item['watermark'])):?>                                    
                                                        <span class="watermark">
                                                            <?php echo wp_kses_post ($watermark);?>
                                                        </span>                                    
                                                    <?php endif;?>

                                                    <?php if(!empty($item['subtitle'])):?>                                    
                                                        <h4 class="sub-title">
                                                           <?php echo wp_kses_post ($subtitle);?>
                                                        </h4>                                    
                                                    <?php endif;?>

                                                    <?php if(!empty($item['name'])):?>                                    
                                                        <h1 class="title">
                                                             <?php echo wp_kses_post ($title);?>
                                                        </h1>                                    
                                                    <?php endif;?>

                                                    <?php if(!empty($item['description'])):?>                                    
                                                        <div class="desc">
                                                            <p class="description"> <?php echo wp_kses_post ($description);?></p>
                                                        </div>                                    
                                                    <?php endif;?>

                                                    <?php if(!empty($item['button_text'])):?>  
                                                    <div class="rs__button">                                  
                                                        <a href="<?php echo esc_url($link);?>">
                                                            <?php echo wp_kses_post ($button_text);?>                                      
                                                        </a>  
                                                    </div>                                  
                                                    <?php endif;?>
                                                </div>
                                                <div class="slide-image">
                                                    <?php if(!empty($item['image']['url'])){?>
                                                        <img class="rs__banner_shap" src="<?php echo esc_url( $image ); ?>" alt="image">
                                                    <?php } ?>

                                                    <?php if(!empty($item['selected_image']['url'])){?>
                                                        <img src="<?php echo esc_url( $selected_image ); ?>" alt="image">
                                                    <?php } ?>
                                                </div>
                                            </div>
    	                                </div>
	                                </div>
                                    

	                                <span class="number"><span class="first"> <?php echo esc_html("0 ", "swipy"); ?>  <?php echo  $i;?></span> / <span class="last"> <?php echo esc_html("0 ", "swipy"); ?> <?php echo  $total;?></span></span>
                                </div>
                            </div>
                        </div>           
                    <?php $i++; endforeach; ?>
                </div>
                <div class="rsaddon-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
            </div>
            <script type="text/javascript"> 
                jQuery(document).ready(function(){
                    jQuery( '.rs-addon-slider' ).each(function( index ) {        
                    var slider_id       = jQuery(this).attr('id'); 
                    var slider_conf     = jQuery.parseJSON( jQuery(this).closest('.rsaddon-unique-slider').find('.rsaddon-slider-conf').attr('data-conf'));
                   
                    if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
                    jQuery('#'+slider_id).not('.slick-initialized').slick({
                    slidesToShow    : parseInt(slider_conf.col_lg),
                    centerMode      : (slider_conf.centerMode)  == "true" ? true : false,
                    dots            : (slider_conf.sliderDots)  == "true" ? true : false,
                    arrows          : (slider_conf.sliderNav) == "true" ? true : false,
                    autoplay        : (slider_conf.slider_autoplay) == "true" ? true : false,
                    slidesToScroll  : parseInt(slider_conf.slidesToScroll),
                    centerPadding   : '0px',
                    autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
                    pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
                    loop : false,
                    });
                }
               
                });
            });
            </script>
        <?php }

}