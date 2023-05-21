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
use Elementor\Group_Control_Background;
use Elementor\Utils;


defined( 'ABSPATH' ) || die();

class Rsaddon_Portfolio_pro_Grid_Widget extends \Elementor\Widget_Base {

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
		return 'rsportfolio';
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
		return __( 'RS Portfolio Grid', 'rsaddon' );
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
		return 'glyph-icon flaticon-grid';
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
			'portfolio_grid_style',
			[
				'label'   => esc_html__( 'Select Style', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',				
				'options' => [
					'1' => 'Style 1',
					'2' => 'Style 2',
					'3' => 'Style 3',				
					'4' => 'Style 4',				
					'5' => 'Style 5',				
					'6' => 'Style 6',				
					'7' => 'Style 7',				
					'8' => 'Style 8',				
				],											
			]
		);


		$this->add_control(
			'portfolio_category',
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
				'label' => esc_html__( 'Project Show Per Page', 'rsaddon' ),
				'type' => Controls_Manager::TEXT,
				'default' => -1,
				'separator' => 'before',
			]
		);

		$this->add_control(
            'blog_pagination_show_hide',
            [
                'label' => esc_html__( 'Pagination Show/Hide', 'rsaddon' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'rsaddon' ),
                    'no' => esc_html__( 'No', 'rsaddon' ),
                ],                
                'separator' => 'before',
            ]
        );

		$this->add_control(
		    'pre_posts_order_by',
		    [
		        'label'   => esc_html__( 'Order by', 'prelements' ),
		        'type'    => Controls_Manager::SELECT,
		        'options' => [
		            'date'          => esc_html__( 'Date', 'prelements' ),
		            'title'         => esc_html__( 'Title', 'prelements' ),
		            'author'        => esc_html__( 'Author', 'prelements' ),
		            'modified'      => esc_html__( 'Modified', 'prelements' ),
		            'comment_count' => esc_html__( 'Comments', 'prelements' ),
		            'menu_order' => esc_html__( 'Menu Order', 'prelements' ),
		        ],
		        'default' => 'date',
		    ]
		);

		$this->add_control(
		    'pre_posts_sort',
		    [
		        'label'   => esc_html__( 'Order', 'prelements' ),
		        'type'    => Controls_Manager::SELECT,
		        'options' => [
		            'ASC'  => esc_html__( 'ASC', 'prelements' ),
		            'DESC' => esc_html__( 'DESC', 'prelements' ),
		        ],
		        'default' => 'DESC',
		    ]
		);


		$this->add_control(
			'categorie_position',
			[
				'label'   => esc_html__( 'Categorie Position', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'bottom',	
				'condition' => [
                	'portfolio_grid_style' => ['6']
                ],
                'separator' => 'before',
				'options' => [
					'top' => 'Top',
					'bottom' => 'Bottom',
				],
			]
		);
	
		$this->add_control(
			'portfolio_columns',
			[
				'label'   => esc_html__( 'Columns', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,				
				'options' => [
					'6' => esc_html__( '2 Column', 'rsaddon' ),
					'4' => esc_html__( '3 Column', 'rsaddon' ),
					'3' => esc_html__( '4 Column', 'rsaddon' ),
					'2' => esc_html__( '6 Column', 'rsaddon' ),
					'12' => esc_html__( '1 Column', 'rsaddon' ),					
				],
				'separator' => 'before',							
			]
		);

		$this->add_control(
			'portfolio_md_columns',
			[
				'label'   => esc_html__( 'Medium Device Columns', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,				
				'options' => [
					'6' => esc_html__( '2 Column', 'rsaddon' ),
					'4' => esc_html__( '3 Column', 'rsaddon' ),
					'3' => esc_html__( '4 Column', 'rsaddon' ),
					'2' => esc_html__( '6 Column', 'rsaddon' ),
					'12' => esc_html__( '1 Column', 'rsaddon' ),					
				],
				'separator' => 'before',							
			]
		);

		$this->add_control(
			'portfolio_link_icon',
			[
				'label'   => esc_html__( 'Select Icon', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'style1' => 'Icon',
					'style2' => 'Image',				
				],											
			]
		);

		$this->add_control(
		    'selected_icon',
		    [
		        'label' => __( 'Icon', 'prelements' ),
		        'type' => Controls_Manager::ICONS,
		        'default' => [
		            'value' => 'fas fa-plus',
		            'library' => 'reguler',
		        ],
		        'condition' => [
		            'portfolio_grid_style' => ['2', '1', '7'],
		        ],
		        'condition' => [
		            'portfolio_link_icon' => ['style1'],
		        ]
		    ]
		);

		$this->add_control(
			'selected_icon_image',
			[
				'label' => esc_html__( 'Choose Image', 'rsaddon' ),
				'type'  => Controls_Manager::MEDIA,				
				'separator' => 'before',
				'condition' => [
				    'portfolio_link_icon' => ['style2'],
				]
			]
		);

		$this->add_responsive_control(
		    'selected_icon_image_width',
		    [
		        'label' => esc_html__( 'Width', 'rsaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px' ],
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 100,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item .portfolio-img a img, {{WRAPPER}} .rs-portfolio-style2 .portfolio-content a img' => 'width: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		        'condition' => [
		            'portfolio_link_icon' => ['style2'],
		        ]
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

		$this->add_responsive_control(
		    'show_icon_button',
		    [
		        'label' => esc_html__( 'Show Button', 'rsaddon' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => esc_html__( 'Show', 'rsaddon' ),
		        'label_off' => esc_html__( 'Hide', 'rsaddon' ),
		        'return_value' => 'yes',
		        'default' => 'yes',
		        'separator' => 'before',
		        'condition' => [
		        	'portfolio_grid_style' => '8',
		        ],
		    ]
		);


		$this->add_responsive_control(
		    'show_button',
		    [
		        'label' => esc_html__( 'Show Button', 'rsaddon' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => esc_html__( 'Show', 'rsaddon' ),
		        'label_off' => esc_html__( 'Hide', 'rsaddon' ),
		        'return_value' => 'yes',
		        'default' => 'no',
		        'separator' => 'before',
		        'condition' => [
		        	'portfolio_grid_style' => '1',
		        ],
		    ]
		);


		$this->add_control(
			'read_more_text',
			[
				'label'       => esc_html__( 'Button Text', 'rsaddon' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'View More',
				'placeholder' => esc_html__( 'View More', 'rsaddon' ),
				'condition' => [
					'show_button' => 'yes',
				],	
				'separator'   => 'before',
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
                    '{{WRAPPER}} .portfolio-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-inner-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			]
		);   


        $this->add_control(
			'gap_conditon',
			[
				'label' => esc_html__( 'left Right Gap', 'rsaddon' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => [
					''   => 'Yes',
					'no-gutters' => 'No'				
				],	
				'default' => '',
			]
		); 

		$this->add_responsive_control(
            'background_border_radius',
            [
                'label' => esc_html__( 'Background Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .portfolio-img img, {{WRAPPER}} .rs-portfolio-style8 .portfolio-item .portfolio-content, {{WRAPPER}} .portfolio-item, {{WRAPPER}} .portfolio-item .portfolio-content:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
                ],               
            ]
        );

		$this->add_control(
			'grid_popup',
			[
				'label'   => esc_html__( 'Show Popup', 'rsaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'popup',				
				'options' => [
					'popup'   => 'Popup Style',
					'default' => 'Default Style'				
				],
				'separator' => 'before',
													
			]
		);    

				
		$this->end_controls_section();

		
        $this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Style', 'rsaddon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p-title a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p-title a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .p-title',                    
			]
		);

	    $this->add_responsive_control(
		    'title_margin',
		    [
		        'label' => esc_html__( 'Title Margin', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-item .portfolio-content .p-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'category_color',
		    [
		        'label' => esc_html__( 'Category Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'separator' => 'before',
		        'selectors' => [
		            '{{WRAPPER}} .p-category a' => 'color: {{VALUE}};',                   

		        ],                
		    ]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => esc_html__( 'Category Typography', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .p-category a, {{WRAPPER}} .p-title > .p-category > a',                    
			]
		);

        $this->add_control(
            'category_color_hover',
            [
                'label' => esc_html__( 'Category Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p-category a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        ); 
        $this->add_responsive_control(
		    'cat_margin',
		    [
		        'label' => esc_html__( 'Category Margin', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-details .p-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

        $this->add_control(
            'read_more',
            [
                'label' => esc_html__( 'Read More Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item a' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        ); 

        $this->add_control(
            'read_more_hover_color',
            [
                'label' => esc_html__( 'Read More Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        ); 

        $this->add_control(
            'content_bg',
            [
                'label' => esc_html__( 'Content Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-portfolio-style3 .portfolio-item .portfolio-content .portfolio-inner, {{WRAPPER}} .portfolio-details' => 'background: {{VALUE}};',                    
                ],
                'condition' => [
				    'portfolio_grid_style' => ['3', '1'],
				]              
            ]            
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .rs-portfolio-style8 .portfolio-item .p-icon a, {{WRAPPER}} .rs-portfolio-style3 .portfolio-item .p-icon i, {{WRAPPER}} .rs-portfolio-style1 .portfolio-item .portfolio-img a, 
                    {{WRAPPER}} .rs-portfolio-style2 .portfolio-item .portfolio-content .p-icon a, 
                    {{WRAPPER}} .rs-portfolio-style7 .content-overlay a.link7, 
                    {{WRAPPER}} .rs-portfolio-style2 .portfolio-item .portfolio-content .p-icon a' => 'color: {{VALUE}};',                    
                ],              
            ]            
        );  


        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-portfolio-style8 .portfolio-item .p-icon a, {{WRAPPER}} .rs-portfolio-style3 .portfolio-item .p-icon, {{WRAPPER}} .rs-portfolio-style1 .portfolio-item .portfolio-img a, {{WRAPPER}} .rs-portfolio-style7 .content-overlay a.link7, {{WRAPPER}} .rs-portfolio-style2 .portfolio-item .portfolio-content .p-icon' => 'background: {{VALUE}};',                    
                ],              
            ]            
        );  

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => esc_html__( 'Icon Typography', 'rsaddon' ),
				'selector' => '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item .portfolio-img a, {{WRAPPER}} .rs-portfolio-style7 .content-overlay a.link7, {{WRAPPER}} .rs-portfolio-style2 .portfolio-item .portfolio-content .p-icon',                    
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'image_overlay',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item, {{WRAPPER}} .portfolio-content:before, {{WRAPPER}} .rs-portfolio-style2 .portfolio-item:before, {{WRAPPER}} .portfolio-content:before, {{WRAPPER}} .rs-portfolio-style7 .content-overlay:before',

            ]
        );

        $this->add_control(
			'overlay_heading',
			[
				'label' => esc_html__( 'Image Overlay', 'rsaddon' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'gradient_bg_color',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-portfolio-style1 .portfolio-item:hover .portfolio-img:before, {{WRAPPER}} .rs-portfolio-style8 .portfolio-item .portfolio-content, {{WRAPPER}} .rs-portfolio-style2 .portfolio-item:before, {{WRAPPER}} .portfolio-content:before, {{WRAPPER}} .rs-portfolio-style7 .content-overlay:before, {{WRAPPER}} .rs-portfolio-style6 .portfolio-item .portfolio-content:before',

            ]
        ); 

        $this->add_responsive_control(
            'content_border_radius',
            [
                'label' => esc_html__( 'Content Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
                ],               
            ]
        );

        $this->add_responsive_control(
		    'item_padding_area',
		    [
		        'label' => esc_html__( 'Content Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'separator' => 'before',
		        'selectors' => [
		            '{{WRAPPER}} .rs-portfolio-style1 .portfolio-details, {{WRAPPER}} .portfolio-item .portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'content_align',
		    [
		        'label' => esc_html__( 'Content Alignment', 'rsaddon' ),
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
		        ],
		        'toggle' => true,
		        'condition' => [
		        	'portfolio_grid_style' => '8',
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-item .portfolio-content' => 'text-align: {{VALUE}}',
		        ],
		    ]
		);



		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'content_box_shadow',
		        'selector' => '{{WRAPPER}} .portfolio-item .portfolio-details, {{WRAPPER}} .portfolio-item .portfolio-content',
		        'condition' => [
		        	'portfolio_grid_style' => ['8', '1'],
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'pagination_content_align',
		    [
		        'label' => esc_html__( 'Pagination Content Alignment', 'rsaddon' ),
		        'type' => Controls_Manager::CHOOSE,
		        'options' => [
		            'flex-start' => [
		                'title' => esc_html__( 'Left', 'rsaddon' ),
		                'icon' => 'eicon-text-align-left',
		            ],
		            'center' => [
		                'title' => esc_html__( 'Center', 'rsaddon' ),
		                'icon' => 'eicon-text-align-center',
		            ],
		            'flex-end' => [
		                'title' => esc_html__( 'Right', 'rsaddon' ),
		                'icon' => 'eicon-text-align-right',
		            ], 
		        ],
		        'toggle' => true,
		        'condition' => [
		        	'blog_pagination_show_hide' => 'yes',
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .pagination-area .nav-links' => 'justify-content: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_control(
            'pagination_color',
            [
                'label' => esc_html__( 'Pagination Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area .nav-links a' => 'color: {{VALUE}};',                    
                ], 
                'condition' => [
		        	'blog_pagination_show_hide' => 'yes',
		        ],            
            ]            
        );

		$this->add_control(
            'pagination_color_active',
            [
                'label' => esc_html__( 'Pagination Active Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area .nav-links span.current' => 'color: {{VALUE}};',                    
                ], 
                'condition' => [
		        	'blog_pagination_show_hide' => 'yes',
		        ],            
            ]            
        ); 

		$this->add_control(
            'pagination_bg_color_active',
            [
                'label' => esc_html__( 'Pagination Active Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area .nav-links span.current' => 'background: {{VALUE}};',                    
                ], 
                'condition' => [
		        	'blog_pagination_show_hide' => 'yes',
		        ],             
            ]            
        ); 


        $this->end_controls_section();

		//Popup Style Setting
		$this->start_controls_section(
			'section_portfolio_grid_style',
			[
				'label' => esc_html__( 'Popup Style', 'rsaddon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'popup_port_title_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,                              
            ]
        );


        $this->add_control(
            'popup_port_content_color',
            [
                'label' => esc_html__( 'Content Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,              
            ]
        );	

        $this->add_control(
            'popup_port_info_color',
            [
                'label' => esc_html__( 'Project Information Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,              
            ]
        );		

        $this->add_control(
            'popup_port_background',
            [
                'label' => esc_html__( 'Background Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',                
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

	$popup_port_title_color = !empty( $settings['popup_port_title_color']) ? 'style="color: '.$settings['popup_port_title_color'].'"' : '';
	$popup_port_content_color = !empty( $settings['popup_port_content_color']) ? 'style="color: '.$settings['popup_port_content_color'].'"' : '';
	$popup_port_info_color = !empty( $settings['popup_port_info_color']) ? 'style="color: '.$settings['popup_port_info_color'].'"' : '';
	$popup_port_background = !empty( $settings['popup_port_background']) ? 'style="background: '.$settings['popup_port_background'].'"' : '';

	?>
		<div class="rs-portfolio-style<?php echo esc_attr($settings['portfolio_grid_style']); ?> rsaddon_pro_box">
			<div class="row <?php echo esc_html($settings['gap_conditon']);?>">

			    <?php 			

					if('1' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style1.php";
					}

					if('2' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style2.php";
					}

					if('3' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style3.php";
					}

					if('4' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style4.php";
					}

					if('5' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style5.php";
					}

					if('6' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style6.php";
					}

					if('7' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style7.php";
					}

					if('8' == $settings['portfolio_grid_style']){
						include plugin_dir_path(__FILE__)."/style8.php";
					}
					
				?>
			</div>
		</div>
	
	<?php	

	}
	public function getCategories(){
        $cat_list = [];
         	if ( post_type_exists( 'portfolios' ) ) { 
          	$terms = get_terms( array(
             	'taxonomy'    => 'portfolio-category',
             	'hide_empty'  => true            
         	) );  
         	
	        foreach($terms as $post) {
	        	$cat_list[$post->slug]  = [$post->name];
	        }
    	}  
        return $cat_list;
    }
}?>