<?php
/**
 * Logo widget class
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
use Elementor\Group_Control_Image_Size;


defined( 'ABSPATH' ) || die();

class Rsaddon_Elementor_pro_RSservices_Slider_Widget extends \Elementor\Widget_Base {
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
        return 'rs-service-slider';
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
        return esc_html__( 'RS Service Slider', 'rsaddon' );
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
        return [ 'service' ];
    }


    protected function register_controls() {       

        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Service Item', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'rsaddon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );        

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Title', 'rsaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'rsaddon' ),
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
            'link',
            [
                'label' => esc_html__('Link', 'rsaddon'),
                'type' => Controls_Manager::URL,                
            ]
        ); 

        $this->add_control(
            'service_list',
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
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );    

        $this->add_control(
            'read__more',
            [
                'label' => esc_html__('Button Text', 'rsaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rsaddon'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Read More', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                '_services_slider_s',
                [
                    'label' => esc_html__( 'Service Settings', 'rsaddon' ),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
        		'services_slider_style',
        		[
        			'label'   => esc_html__( 'Select Style', 'rsaddon' ),
        			'type'    => Controls_Manager::SELECT,
        			'default' => 'Default',
        			'options' => [					
        				'style1' => esc_html__( 'Style 1', 'rsaddon'),
        				'style2' => esc_html__( 'Style 2', 'rsaddon'),
                        'style3' => esc_html__( 'Style 3', 'rsaddon'),
        			],
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

    
        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__( 'Desktops > 1199px', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'rsaddon' ), 
                    '2' => esc_html__( '2 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rsaddon' ),
                    '4' => esc_html__( '4 Column', 'rsaddon' ),
                    '5' => esc_html__( '5 Column', 'rsaddon' ),
                    '6' => esc_html__( '6 Column', 'rsaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Desktops > 991px', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rsaddon' ), 
                    '2' => esc_html__( '2 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rsaddon' ),
                    '4' => esc_html__( '4 Column', 'rsaddon' ),
                    '5' => esc_html__( '5 Column', 'rsaddon' ),
                    '6' => esc_html__( '6 Column', 'rsaddon' ),                     
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__( 'Tablets > 767px', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rsaddon' ), 
                    '2' => esc_html__( '2 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rsaddon' ),
                    '4' => esc_html__( '4 Column', 'rsaddon' ),
                    '5' => esc_html__( '5 Column', 'rsaddon' ),
                    '6' => esc_html__( '6 Column', 'rsaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__( 'Tablets < 768px', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 1,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rsaddon' ), 
                    '2' => esc_html__( '2 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rsaddon' ),
                    '4' => esc_html__( '4 Column', 'rsaddon' ),
                    '5' => esc_html__( '5 Column', 'rsaddon' ),
                    '6' => esc_html__( '6 Column', 'rsaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slides_ToScroll',
            [
                'label'   => esc_html__( 'Slide To Scroll', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Item', 'rsaddon' ),
                    '2' => esc_html__( '2 Item', 'rsaddon' ),
                    '3' => esc_html__( '3 Item', 'rsaddon' ),
                    '4' => esc_html__( '4 Item', 'rsaddon' ),                   
                ],
                'separator' => 'before',        
            ]
        );

        $this->add_control(
            'slider_dots',
            [
                'label'   => esc_html__( 'Navigation Dots', 'rsaddon' ),
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
            'slider_nav',
            [
                'label'   => esc_html__( 'Navigation Nav', 'rsaddon' ),
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

        $this->add_control(
            'slider_centerMode',
            [
                'label'   => esc_html__( 'Center Mode', 'rsaddon' ),
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
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Gap', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],          

                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .grid-item' => 'padding:0 {{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();

   
        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Item Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'rsaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'rsaddon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rsaddon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'rsaddon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'rsaddon' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img' => 'text-align: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider.services-style2 .rs-service-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );   

        $this->add_responsive_control(
            'margin_slid',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider.services-style2 .rs-service-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );     

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'grid_border',
                'selector' => '{{WRAPPER}} .rs-service-slider, {{WRAPPER}} .rs-addon-slider.rs-services-slider.services-style2 .rs-service-slider',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'grid_box_shadow',
                'selector' => '{{WRAPPER}} .rs-service-slider, {{WRAPPER}} .rs-addon-slider.rs-services-slider.services-style2 .rs-service-slider',
            ]
        );

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
            	'name' => 'Background',
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-service-slider, {{WRAPPER}} .rs-addon-slider.rs-services-slider.services-style2 .rs-service-slider, {{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider'
            ]
        ); 

        $this->add_responsive_control(
            'grid_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
                ],               
            ]
        );  

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            '_img_sett_ings',
            [
                'label' => esc_html__( 'Image Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
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

         $this->add_responsive_control(
             'image_align',
             [
                 'label' => esc_html__( 'Alignment', 'rsaddon' ),
                 'type' => Controls_Manager::CHOOSE,
                 'options' => [
                     '0' => [
                         'title' => esc_html__( 'Left', 'rsaddon' ),
                         'icon' => 'eicon-text-align-left',
                     ],
                     '0 auto' => [
                         'title' => esc_html__( 'Center', 'rsaddon' ),
                         'icon' => 'eicon-text-align-center',
                     ],
                     '0 0 0 auto' => [
                         'title' => esc_html__( 'Right', 'rsaddon' ),
                         'icon' => 'eicon-text-align-right',
                     ],
                 ],
                 'toggle' => true,
                 'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                 'selectors' => [
                     '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a' => 'margin: {{VALUE}}',
                 ],
                 'separator' => 'before',
             ]
         );

        $this->add_responsive_control(
            'serv_image_width',
            [
                'label' => esc_html__( 'Image Width', 'rsaddon' ),
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
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'serv_image_wrapper_width',
            [
                'label' => esc_html__( 'Image Wrapper Width', 'rsaddon' ),
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
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'serv_image_wrapper_height',
            [
                'label' => esc_html__( 'Image Wrapper Height', 'rsaddon' ),
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
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'condition' => [
                    'services_slider_style' => 'style3',
                 ],
                'selector' => '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-img a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_title_style_grid',
            [
                'label' => esc_html__( 'Title Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'show_title',
            [
                'label' => esc_html__( 'Show Title', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'rsaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => esc_html__( 'H1', 'rsaddon' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => esc_html__( 'H2', 'rsaddon' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => esc_html__( 'H3', 'rsaddon' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => esc_html__( 'H4', 'rsaddon' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => esc_html__( 'H5', 'rsaddon' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => esc_html__( 'H6', 'rsaddon' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs-addon-slider.rs-services-slider .rs-service-slider .service-title .title',
                'separator'   => 'before',
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-title .title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-title a:hover .title, {{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-title .title:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_desc_style_grid',
            [
                'label' => esc_html__( 'Description Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'show_desc',
            [
                'label' => esc_html__( 'Show Description', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs-addon-slider.rs-services-slider .rs-service-slider .service-desc p.description',
                'separator'   => 'before',
                'condition' => [
                    'show_desc' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'desc_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-desc p.description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_desc' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider.rs-services-slider .rs-service-slider .service-desc p.description' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_desc' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_read_style_',
            [
                'label' => esc_html__( 'Read More Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'show_read',
            [
                'label' => esc_html__( 'Show Read More', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_responsive_control(
            'show_read_icon',
            [
                'label' => esc_html__( 'Show Icon', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );
        

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'read_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs-service-slider .read__more a .custom-blog-btn',
                'separator'   => 'before',
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'read__background_psudo',
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-service-slider .read__more a::before',
                'condition' => [
                    'services_slider_style!' => 'style3',
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'read__background',
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-service-slider .read__more a',
                'condition' => [
                    'services_slider_style' => 'style3',
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'read_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more a .custom-blog-btn, {{WRAPPER}} .rs-service-slider .read__more a .custom-blog-btn i:before' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'read_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'condition' => [
                    'show_read' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'read_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'condition' => [
                    'show_read' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'read_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'condition' => [
                    'show_read' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'read_border',
                'selector' => '{{WRAPPER}} .rs-service-slider .read__more a',
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hover_heading',
            [
                'label' => esc_html__( 'Hover Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'read_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more a:hover .custom-blog-btn, {{WRAPPER}} .rs-service-slider .read__more a:hover .custom-blog-btn i:before' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'read__background_hover',
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-service-slider .read__more a:hover',
                'condition' => [
                    'services_slider_style' => 'style3',
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'read_border_color_hover',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-service-slider .read__more a:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_read' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__( 'Slider Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
     
       
      
        $this->add_control(
            'arrow_options',
            [
                'label' => esc_html__( 'Arrow Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-next, .rs-addon-slider .slick-prev' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-next, .rs-addon-slider .slick-next' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-prev::before' => 'color: {{VALUE}};',

                ],                
            ]
        );


        // Bullet Style Start
         $this->add_control(
            'bullet_options',
            [
                'label' => esc_html__( 'Bullet Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs( '_tabs_slider_dots' );

        // Normal Bullet Start
        $this->start_controls_tab(
            'slider_dots_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'rsaddon' ),
            ]
        );

        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_responsive_control(
            'bullet_height_custom',
            [
                'label' => esc_html__( 'Bullet Height', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bullet_normal_width_custom',
            [
                'label' => esc_html__( 'Bullet Width', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bullet_border_radius_custom',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bullet_border_custom',
                'selector' => '{{WRAPPER}} .rs-addon-slider .slick-dots li button',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bullet_shadow_custom',
                'selector' => '{{WRAPPER}} .rs-addon-slider .slick-dots li button'
            ]
        );

        $this->end_controls_tab();
        // Normal Bullet End

        // Active Bullet Start
        $this->start_controls_tab(
            'slider_dots_active_tab',
            [
                'label' => esc_html__( 'Active', 'rsaddon' ),
            ]
        );

        $this->add_control(
            'navigation_dot_icon_background_active',
            [
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_responsive_control(
            'bullet_active_width_custom',
            [
                'label' => esc_html__( 'Bullet Width', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button:hover' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li.slick-active button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'navigation_dot_active_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li.slick-active button' => 'border-color: {{VALUE}};',

                ],                
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        // Active Bullet End

        $this->add_responsive_control(
            'bullet_spacing_custom',
            [
                'label' => esc_html__( 'Top Gap', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 25,
                ],          
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots' => 'margin-bottom: {{SIZE}}{{UNIT}};',                    
                ],
            ]
        );
        // Bullet Style End

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $slidesToShow           = !empty($settings['col_lg']) ? $settings['col_lg'] : 3;
        $autoplaySpeed          = $settings['slider_autoplay_speed'];
        $interval               = $settings['slider_interval'];
        $slidesToScroll         = $settings['slides_ToScroll'];
        $slider_autoplay        = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
        $pauseOnHover           = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
        $sliderDots             = $settings['slider_dots'] == 'true' ? 'true' : 'false';
        $sliderNav              = $settings['slider_nav'] == 'true' ? 'true' : 'false';        
        $infinite               = $settings['slider_loop'] === 'true' ? 'true' : 'false';
        $centerMode             = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
        $col_lg                 = $settings['col_lg'];
        $col_md                 = $settings['col_md'];
        $col_sm                 = $settings['col_sm'];
        $col_xs                 = $settings['col_xs'];


        $unique = rand(2012,35120);

        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');   

        if ( empty($settings['service_list'] ) ) {
            return;
        }
        ?>



            <div class="rsaddon-unique-slider">
                <div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="rs-addon-slider rs-services-slider services-<?php echo esc_attr( $settings['services_slider_style'] ); ?>">                   
                        
                        <?php
                            foreach ( $settings['service_list'] as $index => $item ) :
                                $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                                
                                
                                $title        = !empty($item['name']) ? $item['name'] : '';                                
                                $title_tag    = !empty($settings['title_tag']) ? $settings['title_tag'] : 'h3';
                                $description  = !empty($item['description']) ? $item['description'] : '';
                                $target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';  
                                $link         = !empty($item['link']['url']) ? $item['link']['url'] : '';
                                                           
                                
                                ?>
                                <div class="grid-item">
                                    <div  class="rs-service-slider">
                                        <div class="service-img">
                                            <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>><img class="rs-grid-img" src="<?php echo esc_url( $image ); ?>" title="<?php echo esc_attr( $item['name'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>"></a>
                                        </div>
                                        <?php if(!empty($item['name'])):?>
                                            <?php if ( 'yes' === $settings['show_title'] ):?>
                                                <div class="service-title">
                                                    <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>><<?php echo esc_attr($title_tag);?> class="title"> <?php echo esc_attr ($title);?></<?php echo esc_attr($title_tag);?>></a>                               
                                                </div>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <?php if(!empty($item['description'])):?>
                                            <?php if ( 'yes' === $settings['show_desc'] ):?>
                                                <div class="service-desc">
                                                    <p class="description"> <?php echo esc_attr ($description);?></p>
                                                </div>
                                            <?php endif;?>
                                        <?php endif;?>

                                        <?php if(!empty($settings['show_read'])) { ?>
                                            <div class="read__more">
                                                <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>>
                                                    <span class="custom-blog-btn">
                                                        <?php echo esc_html($settings['read__more']);?> <?php if(!empty($settings['show_read_icon'])) { ?><i class="eicon-arrow-right"></i><?php } ?>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                      
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
                    centerPadding   : '15px',
                    autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
                    pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
                    loop : false,

                    responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: parseInt(slider_conf.col_md),
                        }
                    }, 
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: parseInt(slider_conf.col_sm),
                        }
                    }, 
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: parseInt(slider_conf.col_xs),
                        }
                    }, ]
                    });
                }
               
                });
            });
            </script>
        <?php
    }
}