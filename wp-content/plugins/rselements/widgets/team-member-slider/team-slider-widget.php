<?php
/**
 * Elementor rsgallery Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;


defined( 'ABSPATH' ) || die();

class Rsaddon_Elementor_Team_Slider_Pro_Widget extends \Elementor\Widget_Base {

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
		return 'rsteam-slider';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve rsgallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'RS Team Slider', 'rsaddon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve rsgallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-slider-1';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the rsgallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'rsaddon_category' ];
    }

	/**
	 * Register rsgallery widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'rsaddon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'team_slider_style',
			[
				'label'   => esc_html__( 'Select Style', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',				
				'options' => [
					'default' => 'Default 1',
					'style1' => 'Style 1',
					'style2' => 'Style 2',
					'style3' => 'Style 3',
					'style4' => 'Style 4',
					'style5' => 'Style 5',
					'style6' => 'Style 6',
					'style7' => 'Style 7'
				],											
			]
		);


		$this->add_control(
			'team_link_condition',
			[
				'label'   => esc_html__( 'Link Enable / Disable', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'enable',				
				'options' => [
					'enable' => 'Enable',
					'disable' => 'Disable',
				],											
			]
		);


		$this->add_control(
			'team_category',
			[
				'label'   => esc_html__( 'Category', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT2,	
				'default' => 0,			
				'options' => $this->getCategories(),
				'multiple' => true,	
				'separator' => 'before',		
			]

		);

		

		$this->add_control(
			'per_page',
			[
				'label' => esc_html__( 'Team Show Per Page', 'rsaddon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'rsaddon' ),
				'separator' => 'before',
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


		$this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
            ]
        );  


        $this->add_control(
			'image_spacing_custom',
			[
				'label' => esc_html__( 'Item Bottom Gap', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,
				'separator' => 'before',
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],		
				

				'selectors' => [
                    '{{WRAPPER}} .team-item-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .team-inner-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			]
		); 
  
				
		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Team Style', 'rsaddon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content h3.team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .member-desc .team-name a' => 'color: {{VALUE}};',

                ],                
            ]
        );



        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .member-desc .team-name a:hover' => 'color: {{VALUE}};',
                ],                
            ]

            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .team-content .team-name, {{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .member-desc .team-name a, {{WRAPPER}} .team-slider-style4 .team-item .team-content .team-name a, {{WRAPPER}} .team-slider-style2 .team-item-wrap .team-img .team-content .team-name a, {{WRAPPER}} .team-slider-style1 .team-item .team-content h3.team-name a',
			]
		);


        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-title' => 'color: {{VALUE}};',

                ],                
            ]
        );

         $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .team-content .team-title, {{WRAPPER}} .team-slider-style4 .team-item .team-content .team-title',
			]
		);




        $this->add_control(
            'content_hover_bg',
            [
                'label' => esc_html__( 'Content Hover Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_hover_text_color',
            [
                'label' => esc_html__( 'Content Hover Text Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-item .team-inner-wrap:hover .team-content .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .member-desc .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .member-desc .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .social-icons a i' => 'color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .team-content .team-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec .team-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-text' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'content_top_border_color',
            [
                'label' => esc_html__( 'Content Top Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-text::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_bottom_border_color',
            [
                'label' => esc_html__( 'Content Bottom Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec::before' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__( 'Navigation Arrow Background', 'rsaddon' ),
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
                'label' => esc_html__( 'Navigation Arrow Icon Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-prev::before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_border_color',
            [
                'label' => esc_html__( 'Dot Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'background-color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Dot Background (Active)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_corner_border_color',
            [
                'label' => esc_html__( 'Image Corner Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style3 .team-img::before' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img::after' => 'border-top-color: {{VALUE}};',

                ],                
            ]
        );

        // Grid Part Style
        $this->add_control(
			'grid_part_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Grid Part', 'rsaddon' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
		    'grid_border_radius',
		    [
		        'label' => esc_html__( 'Grid Border Radius', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .team-inner-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
		        ],
		    ]
		);

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'grid_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .team-inner-wrap',
			]
		);

		// Image Part Style
        $this->add_control(
			'image_part_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Image Part', 'rsaddon' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
		    'image_border_radius',
		    [
		        'label' => esc_html__( 'Image Border Radius', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .team-inner-wrap .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
		        ],
		    ]
		);

		// Icon Part Style
        $this->add_control(
			'icon_part_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Icon Part', 'rsaddon' ),
				'separator' => 'before',
			]
		);

        $this->add_control(
            'icon_section_bg',
            [
                'label' => esc_html__( 'Icon Section Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style1',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-content i.fi-rr-share, {{WRAPPER}} div.team-content .social-icons1, {{WRAPPER}} .team-slider-style1 .team-item .image-wrap .social-icons1' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style1 .team-item .image-wrap .social-icons1:after' => 'border-top-color: {{VALUE}};',
                ],               
            ]
        );
		

        $this->add_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'rsaddon' ),
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
                     '{{WRAPPER}} .social-icons1 a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-item .social-icons a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
		);


        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content .social-icons1 a i, {{WRAPPER}} .team-content i.fi-rr-share, {{WRAPPER}} .social-icons1 a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style7 .team-item .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-item .team-content .social-icons a' => 'color: {{VALUE}};',
                ],               
            ]
        );


        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__( 'Icon Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icons1 a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .social-icons a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .social-icons a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style7 .team-item .social-icons a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-item .team-content .social-icons a' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__( 'Icon Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content .social-icons1 a:hover i, {{WRAPPER}} .social-icons1 a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style7 .team-item .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-item .team-content .social-icons a:hover' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
			'social_icons_wrapper_width',
			[
				'label' => esc_html__( 'Social Icons Wrapper Width', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'show_label' => true,
				'range' => [
		            '%' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
		        'condition' => [
                	'team_slider_style' => 'style1',
                ],
				'selectors' => [
                    '{{WRAPPER}} .team-content .plus_team .social-icons1' => 'width: {{SIZE}}{{UNIT}}',
                ],
			]
		);

        $this->add_responsive_control(
			'social_icons_position_x',
			[
				'label' => esc_html__( 'Icons Position X', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'show_label' => true,
				'range' => [
		            '%' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
		        'condition' => [
                	'team_slider_style' => 'style1',
                ],
				'selectors' => [
                    '{{WRAPPER}} .team-content .plus_team .social-icons1' => 'right: {{SIZE}}{{UNIT}}',
                ],
			]
		);

        $this->add_responsive_control(
			'social_icons_position_y',
			[
				'label' => esc_html__( 'Icons Position Y', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'show_label' => true,
				'range' => [
		            '%' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
		        'condition' => [
                	'team_slider_style' => 'style1',
                ],
				'selectors' => [
                    '{{WRAPPER}} .team-content .plus_team .social-icons1' => 'bottom: {{SIZE}}{{UNIT}}',
                ],
			]
		);

		$this->add_responsive_control(
		    'social_icons_wrapper_padding',
		    [
		        'label' => esc_html__( 'Social Icons Wrapper Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'condition' => [
                	'team_slider_style' => 'style1',
                ],
		        'selectors' => [
		            '{{WRAPPER}} .team-content .plus_team .social-icons1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

        $this->add_responsive_control(
			'social_button_position_x',
			[
				'label' => esc_html__( 'Social Button Position X', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'show_label' => true,
				'separator' => 'before',
				'condition' => [
                	'team_slider_style' => 'style1',
                ],
				'range' => [
		            '%' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
				'selectors' => [
                    '{{WRAPPER}} .team-content .plus_team i.fi-rr-share' => 'right: {{SIZE}}{{UNIT}}',
                ],
			]
		);

        $this->add_responsive_control(
			'social_button_position_y',
			[
				'label' => esc_html__( 'Social Button Position Y', 'rsaddon' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,
				'condition' => [
                	'team_slider_style' => 'style1',
                ],
				'size_units' => [ 'px', '%' ],
				'range' => [
		            '%' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
				'selectors' => [
                    '{{WRAPPER}} .team-content .plus_team i.fi-rr-share' => 'top: {{SIZE}}{{UNIT}}',
                ],
			]
		);

        // Content Part Style
		$this->add_control(
			'content_part_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Content Part', 'rsaddon' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
		    'content_padding',
		    [
		        'label' => esc_html__( 'Content Part Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .team-item .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'label' => esc_html__( 'Content Box Shadow', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .team-item .team-content',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'rsaddon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .team-item .team-inner-wrap, {{WRAPPER}} .team-content',
				
			]
		);
		$this->add_control(
		    'background_title_image',
		    [
		    	'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Image Background', 'rsaddon' ),
				'condition' => [
                	'team_slider_style' => 'style7',
                ],
		        'separator' => 'before', 
		    ]
		);

		$this->add_responsive_control(
		    'image_padding_area',
		    [
		        'label' => esc_html__( 'Image Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .team-slider-style7 .team-item .image-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'condition' => [
                	'team_slider_style' => 'style7',
                ],
		    ]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_image',
				'label' => esc_html__( 'Image Background', 'rsaddon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .team-slider-style7 .team-item .image-wrap',
				'condition' => [
                	'team_slider_style' => 'style7',
                ],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_background',
				'label' => esc_html__( 'Hover Background', 'rsaddon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                     '{{WRAPPER}} .team-item .team-inner-wrap:hover' => 'background: {{VALUE}};',
                ],
				
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		    'section_arrow_style',
		    [
		        'label' => esc_html__( 'Arrow Style', 'rsaddon' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		        'condition' => [
                	'slider_nav' => 'true',
                ],
		        
		    ]
		);

		$this->add_control(
		    'arrow_color',
		    [
		        'label' => esc_html__( 'Arrow Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow:before' => 'color: {{VALUE}};',  
		        ],                
		    ]
		);

		$this->add_control(
		    'arrow_bg_color',
		    [
		        'label' => esc_html__( 'Arrow Background Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow' => 'background: {{VALUE}};',  
		        ],                
		    ]
		);
		$this->add_control(
		    'arrow_hover_color',
		    [
		        'label' => esc_html__( 'Arrow Hover Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow:hover:before' => 'color: {{VALUE}};',  
		        ],                
		    ]
		);

		$this->add_control(
		    'arrow_hover_bg_color',
		    [
		        'label' => esc_html__( 'Arrow Hover Background Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow:hover' => 'background: {{VALUE}};',  
		        ],                
		    ]
		);

		$this->add_responsive_control(
		    'arrow_font_size',
		    [
		        'label' => esc_html__( 'Arrow Font Size', 'rsaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		            'px' => [
		                'min' => 0,
		                'max' => 5000,
		            ],
		        ],
		       
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow:before' => 'font-size: {{SIZE}}{{UNIT}};',
		        ],
		        
		    ]
		);



		$this->add_responsive_control(
		    'arrows_tops_positions',
		    [
		        'label'      => esc_html__( 'Top Position', 'rsaddon' ),
		        'type'       => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -5000,
		                'max' => 5000,
		            ],
		        ],
		     
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-prev' => 'top: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);  

		$this->add_responsive_control(
		    'arrows_lefts_positions',
		    [
		        'label'      => esc_html__( 'Left Position', 'rsaddon' ),
		        'type'       => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -5000,
		                'max' => 5000,
		            ],
		        ],
		     
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);  

		$this->add_responsive_control(
		    'arrow_tos_positions',
		    [
		        'label'      => esc_html__( 'Top Position', 'rsaddon' ),
		        'type'       => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -5000,
		                'max' => 5000,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-next' => 'top: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);

		$this->add_responsive_control(
		    'arrows_rights_positions',
		    [
		        'label'      => esc_html__( 'Right Position', 'rsaddon' ),
		        'type'       => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		            'px' => [
		                'min' => -5000,
		                'max' => 5000,
		            ],
		        ],          
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-next' => 'right: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'ars_border_color',
		    [
		        'label' => esc_html__( 'Border Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-next, {{WRAPPER}} .rsaddon-unique-slider .slick-prev' => 'border-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'testimonial_arrow_box_shadow',
		        'selector' => '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow',
		    ]
		);
		$this->add_responsive_control(
		    'arrow_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .rsaddon-unique-slider .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render rsgallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); 
				
		$slidesToShow    = !empty($settings['col_lg']) ? $settings['col_lg'] : 3;
		$autoplaySpeed   = $settings['slider_autoplay_speed'];
		$interval        = $settings['slider_interval'];
		$slidesToScroll  = $settings['slides_ToScroll'];
		$slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
		$pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
		$sliderDots      = $settings['slider_dots'] == 'true' ? 'true' : 'false';
		$sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';		
		$infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
		$centerMode      = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
		$col_lg          = $settings['col_lg'];
		$col_md          = $settings['col_md'];
		$col_sm          = $settings['col_sm'];
		$col_xs          = $settings['col_xs'];


		

		$unique = rand(2012,35120);
		$slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');


		$popup_slider_title_color = !empty( $settings['popup_slider_title_color']) ? 'style="color: '.$settings['popup_slider_title_color'].'"' : '';
		$popup_slider_dgn_color = !empty( $settings['popup_slider_dgn_color']) ? 'style="color: '.$settings['popup_slider_dgn_color'].'"' : '';
		$popup_slider_content_color = !empty( $settings['popup_slider_dgn_color']) ? 'style="color: '.$settings['popup_slider_dgn_color'].'"' : '';
		$popup_slider_info_color = !empty( $settings['popup_slider_info_color']) ? 'style="color: '.$settings['popup_slider_info_color'].'"' : '';
		$popup_slider_background = !empty( $settings['popup_slider_background']) ? 'style="background: '.$settings['popup_slider_background'].'"' : '';

		//Icon Style
		$icon_style='';
		if(!empty($settings['popup_slider_icon_color']) && empty($settings['popup_slider_icon_bg_color'])){
			$icon_style = 'style="color: '.$settings['popup_slider_icon_color'].'"';				
		}
		if(!empty($settings['popup_slider_icon_bg_color'])){
			$icon_style = ($settings['popup_slider_icon_bg_color']) ? ' style="background: '.$settings['popup_slider_icon_bg_color'].'"' : '';
		}

		if(!empty($settings['popup_slider_icon_color']) && !empty($settings['popup_slider_icon_bg_color'])){
			$icon_style = 'style="background: '.$settings['popup_slider_icon_bg_color'].'; color: '.$settings['popup_slider_icon_color'].'"';				
		}

		
		if('disable' == $settings['team_link_condition']){
			$disable_link = "#";
		} 

		?>	

		<div class="rsaddon-unique-slider rs-team-slider rs-team team-slider-<?php echo esc_attr($settings['team_slider_style']); ?>">


			<?php if('default' !== $settings['team_slider_style']):?>
			<div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="rs-addon-slider" >
				 <?php 

				 	if('style1' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style1.php";
					}
	
				 	if('style1' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style1.php";
					}

					if('style2' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style2.php";
					}

					if('style3' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style3.php";
					}

					if('style4' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style4.php";
					}

					if('style5' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style5.php";
					}
					if('style6' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style6.php";
					}
					if('style7' == $settings['team_slider_style']){
						include plugin_dir_path(__FILE__)."/style7.php";
					}
				?>
			</div>
			<?php endif; ?>

			<?php if('default' == $settings['team_slider_style']):?> 
				<div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="slider-for" >
				<?php 
					$cat = $settings['team_category'];
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					if(empty($cat)){
						$best_wp = new wp_Query(array(
								'post_type'      => 'teams',
								'posts_per_page' => $settings['per_page'],
								'paged'          => $paged					
						));	  
					}   
					else{
						$best_wp = new wp_Query(array(
								'post_type'      => 'teams',
								'posts_per_page' => $settings['per_page'],
								'paged'          => $paged,
								'tax_query'      => array(
							        array(
										'taxonomy' => 'team-category',
										'field'    => 'slug', //can be set to ID
										'terms'    => $cat //if field is ID you can reference by cat/term number
							        ),
							    )
						));	  
					}

					while($best_wp->have_posts()): $best_wp->the_post();

					    $designation  = !empty(get_post_meta( get_the_ID(), 'designation', true )) ? get_post_meta( get_the_ID(), 'designation', true ):'';			
					    $content = get_the_content();									   
						//retrive social icon values			
						$facebook    = get_post_meta( get_the_ID(), 'facebook', true );
						$twitter     = get_post_meta( get_the_ID(), 'twitter', true );
						$google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
						$linkedin    = get_post_meta( get_the_ID(), 'linkedin', true );
						$show_phone  = get_post_meta( get_the_ID(), 'phone', true );
						$show_email  = get_post_meta( get_the_ID(), 'email', true );
						
						$fb   ='';
						$tw   ='';
						$gp   ='';
						$ldin ='';

						if($facebook!=''){
							$fb='<a href="'.$facebook.'" class="social-icon"><i class="fab fa-facebook-f"></i></a> ';
						}
						if($twitter!=''){
							$tw='<a href="'.$twitter.'" class="social-icon"><i class="fab fa-twitter"></i></a>';
						}
						if($google_plus!=''){
							$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fab fa-instagram"></i></a> ';
						}
						if($linkedin!=''){
							$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fab fa-linkedin-in"></i></a>';
						}
					?>
					<div class="team-item">
						<div class="team-inner-wrap">
							<div class="image-wrap">
								<a href="<?php 

								if('enable' == $settings['team_link_condition']){
									the_permalink(); 
								}else{
									echo $disable_link;
								}?>">
									<?php the_post_thumbnail($settings['thumbnail_size']); ?>
								</a> 

							</div>	
							<div class="team-content">
							    <h3 class="team-name">
							    	<a class="pointer-events" href="<?php 
								if('enable' == $settings['team_link_condition']){
									the_permalink(); 
								}else{
									echo $disable_link;
								}?>"><?php the_title();?></a>
							    </h3>
							    <span class="team-title"><?php echo esc_html( $designation );?></span>
							</div>					
						</div>
					</div>

					<?php
					endwhile;
					wp_reset_query();  
					?>  
			</div>
			<div class="slider-nav rs-slide-nav">
			<?php 
				$cat = $settings['team_category'];
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if(empty($cat)){
					$best_wp = new wp_Query(array(
							'post_type'      => 'teams',
							'posts_per_page' => $settings['per_page'],
							'paged'          => $paged					
					));	  
				}   
				else{
					$best_wp = new wp_Query(array(
							'post_type'      => 'teams',
							'posts_per_page' => $settings['per_page'],
							'paged'          => $paged,
							'tax_query'      => array(
						        array(
									'taxonomy' => 'team-category',
									'field'    => 'slug', //can be set to ID
									'terms'    => $cat //if field is ID you can reference by cat/term number
						        ),
						    )
					));	  
				}

				while($best_wp->have_posts()): $best_wp->the_post(); ?>
					<div class="image-list">
						<?php the_post_thumbnail($settings['thumbnail_size']); ?>   
					</div>	
				<?php
				endwhile;
				wp_reset_query(); ?> 
			</div>
			<?php endif; ?>

		


		<div class="rsaddon-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
	
		
	</div>

	<?php if('default' !== $settings['team_slider_style']):?>
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
    <?php endif; ?>

    <?php if('default' == $settings['team_slider_style']):?> 
        <script type="text/javascript"> 
            jQuery(document).ready(function(){
                jQuery( '.slider-for' ).each(function( index ) { 
                var slider_id       = jQuery(this).attr('id');     
                var slider_conf     = jQuery.parseJSON( jQuery(this).closest('.rsaddon-unique-slider').find('.rsaddon-slider-conf').attr('data-conf'));
                var sliderfor = jQuery('.slider-for');
                if(sliderfor.length){
                    jQuery('.slider-for').slick({
                        slidesToShow    : parseInt(slider_conf.col_lg),
                        slidesToScroll  : parseInt(slider_conf.slidesToScroll),
                        arrows  : (slider_conf.sliderNav) == "true" ? true : false,
                        centerMode : (slider_conf.centerMode)  == "true" ? true : false,
                        fade: false,
                        asNavFor: '.slider-nav',
                        
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
                var slidernav = jQuery('.slider-nav');
                if(slidernav.length){
                    jQuery('.slider-nav').slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        asNavFor: '.slider-for',
                        dots    : (slider_conf.sliderDots)  == "true" ? true : false,
                        arrows  : false,
                        vertical: false,
                        centerMode : (slider_conf.centerMode)  == "true" ? true : false,
                        centerPadding: '0',
                        focusOnSelect: true,
                        directionNav: true,
                        fade: false,
                        vertical: true,
                        responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 2,
                        		slidesToScroll: 1,
                            }
                        }, 
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                        		slidesToScroll: 1,
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
    <?php endif; ?>

	<?php 
	}

	public function getCategories(){
        $cat_list = [];
         	if ( post_type_exists( 'teams' ) ) { 
          	$terms = get_terms( array(
             	'taxonomy'    => 'team-category',
             	'hide_empty'  => true            
         	) );           
         
  
	        foreach($terms as $post) {
	        	$cat_list[$post->slug]  = [$post->name];
	        }
    	}  
        return $cat_list;
    }
}?>