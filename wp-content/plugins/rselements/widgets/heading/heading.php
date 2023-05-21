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

class Rsaddon_Elementor_pro_Heading_Widget extends \Elementor\Widget_Base {

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
		return 'rs-heading';
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
		return esc_html__( 'RS Heading', 'rsaddon' );
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
		return 'glyph-icon flaticon-letter';
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
				'label' => esc_html__( 'Heading Info', 'prelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Heading Style', 'prelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'prelements'),
					'style1'  => esc_html__( 'Intro Border Right', 'prelements'),
					'style2'  => esc_html__( 'Border Bottom', 'prelements'),
					'style3'  => esc_html__( 'Intro Border Left', 'prelements' ),
					'style4'  => esc_html__( 'Border Top', 'prelements' ),					
					'style6'  => esc_html__( 'Border Top Left', 'prelements' ),
					'style7'  => esc_html__( 'Border Top Right', 'prelements' ),
					'style8'  => esc_html__( 'Boder Left Vertical Style', 'prelements' ),
					'style9'  => esc_html__( 'Heading Image Style', 'prelements' ),
					'style5'  => esc_html__( 'Heading Bracket Style', 'prelements' ),
					'style10' => esc_html__( 'Heading Left Rotate Style', 'prelements' ),
					'style11' => esc_html__( 'Heading Right Rotate Style', 'prelements' ),
					'style12' => esc_html__( 'Left Vertical Border', 'prelements' ),
					
				],
			]
		);


		$this->add_control(
			'animate_style',
			[
				'label'   => esc_html__( 'Animate Border Style', 'prelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'default'  => esc_html__( 'Select', 'prelements'),
					'style1'  => esc_html__( 'Animate Border Bottom One', 'prelements'),
					'style2'  => esc_html__( 'Animate Border Bottom Two', 'prelements'),	
					'style3'  => esc_html__( 'Animate Border Left & Right One', 'prelements'),	
					'style4'  => esc_html__( 'Animate Border Left & Right Two', 'prelements'),
					'intro-move-x'  => esc_html__( 'intro Move-X', 'prelements'),
				],
			]
		);

        $this->add_control(
            'animate_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .prelements-heading .pre-heading-line' => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading .pre-heading-line1:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style2', 'style3', 'style4'],
				],
            ]
        );  

        $this->add_control(
            'animate_dot_color',
            [
                'label' => esc_html__( 'Dot Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .prelements-heading .pre-heading-line:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading .pre-heading-line1:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style2', 'style3', 'style4'],
				],
            ]
        ); 

        $this->add_control(
            'animate_border_color_hover',
            [
                'label' => esc_html__( 'Border Color (Hover)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .elementor-widget-container:hover .pre-heading-line1:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style3'],
				],
            ]
        );
        $this->add_control(
            'animated_border_color_hover',
            [
                'label' => esc_html__( 'Dot Color (Hover)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .elementor-widget-container:hover .pre-heading-line1:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style3'],
				],
            ]
        );   

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Heading Text', 'prelements' ),
				'type' => Controls_Manager::TEXTAREA,
				'description'	=> esc_html__( 'Hightlight Title Settings will be worked, If you use this <span>Text</span> format', 'prelements' ),
				'default' => esc_html__( 'Heading Style', 'prelements' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'prelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'prelements'),
					'h2' => esc_html__( 'H2', 'prelements'),
					'h3' => esc_html__( 'H3', 'prelements' ),
					'h4' => esc_html__( 'H4', 'prelements' ),
					'h5' => esc_html__( 'H5', 'prelements' ),
					'h6' => esc_html__( 'H6', 'prelements' ),					
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Sub Heading Text', 'prelements' ),
				'type'      => Controls_Manager::TEXTAREA,				
				'default'   => esc_html__( 'Sub Heading', 'prelements' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Heading Image', 'prelements' ),
				'type'  => Controls_Manager::MEDIA,					
				'condition' => [
					'style' => 'style9',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_postition',
			[
				'label'   => esc_html__( 'Select Image Position', 'prelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [						
					'top' => esc_html__( 'Top', 'prelements'),
					'bottom' => esc_html__( 'Bottom', 'prelements'),						
					
				],
				'condition' => [
					'style' => 'style9',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'watermark',
			[
				'label' => esc_html__( 'Watermark Text', 'prelements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Watermark', 'prelements' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content',
			[
				'label'   => esc_html__( 'Description', 'prelements' ),
				'type'    => Controls_Manager::WYSIWYG,
				'rows'    => 10,			
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'prelements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'prelements' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'prelements' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'prelements' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'prelements' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
	    $this->add_control(
            'title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Title', 'prelements' ),
                'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-heading .title-inner .title',
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'title_stroke_color',
            [
                'label' => esc_html__( 'Title Stroke Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title' => '-webkit-text-stroke: 1px {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'title_fill_stroke_color',
            [
                'label' => esc_html__( 'Title Stroke Fill Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title' => '-webkit-text-fill-color: {{VALUE}};',
                ],                
            ]
        );
       

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Sub Title', 'prelements' ),
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Subtitle Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-heading .title-inner .sub-text',
			]
		);

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .sub-text' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_control(
            'subtitle_bg_color',
            [
                'label' => esc_html__( 'Subtitle background', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .sub-text' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Subtitle Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .sub-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label' => esc_html__( 'Subtitle Padding', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .sub-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
        	'sub_border_radius',
        	[
        		'label' => __( 'Border Radius', 'elementor' ),
        		'type' => Controls_Manager::DIMENSIONS,
        		'size_units' => [ 'px', '%' ],
        		'selectors' => [
        			'{{WRAPPER}} .prelements-heading .title-inner .sub-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        		],
        	]
        );

        $this->add_control(
            'des_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Description', 'prelements' ),
                'separator' => 'before',
            ]
        ); 

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-heading .description p',
				'selector' => '{{WRAPPER}} .prelements-heading .description',
			]
		);

		$this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .description' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .prelements-heading .description p' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__( 'Description Padding', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .prelements-heading.style2:after '                        => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style1 .description:after '           => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style6 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style4 .title-inner h2:before'        => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style2 .title-inner .title:before'        => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style4 .title-inner .title:before'        => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style7 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style8 .title-inner:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .prelements-heading.style8 .description:after' => 'background: {{VALUE}};',
				]
            ]
        );             

		$this->end_controls_section();

		$this->start_controls_section(
			'title_highlight_style',
			[
				'label' => esc_html__( 'Highlight Title', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'highlight_color',
            [
                'label' => esc_html__( 'Highlight Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title span' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_control(
            'underline_color',
            [
                'label' => esc_html__( 'Underline Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading .title-inner .title span:not(.watermark):after' => 'background: {{VALUE}};',
                ],                
            ]
        );


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hightlight_typography',
				'label' => esc_html__( 'Hightlight Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-heading .title-inner .title span',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_image_style',
			[
				'label' => esc_html__( 'Image Settings', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style9',
				],
			]

		);

		 $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Width', 'prelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 65,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading.style9 .title-inner img' => 'width: {{SIZE}}{{UNIT}};',                    
                ],

              
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'Height', 'prelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading.style9 .title-inner .title-img > img' => 'height: {{SIZE}}{{UNIT}};',
                ],
               
            ]
        );

        
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-heading.style9 .title-inner .title-img > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$watermark_text = ($settings['watermark']) ? '<span class="watermark">'.($settings['watermark']).'</span>' : '';

		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title"><span class="watermark">'.$settings['watermark'].'</span>'.wp_kses_post($settings['title']).'</'.$settings['title_tag'].'>' : '';

		
		if( "style4"==	$settings['style'] || "style4 Lite"== $settings['style'] || "style6"== $settings['style'] || "style6 Lite"==$settings['style'] || "style7" == $settings['style'] || "style7 Lite"== $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text">'.($settings['subtitle']).'</span>' : '';
		}
		elseif ( "style5" == $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text title-upper">[ <span class="sub-text title-upper">'.($settings['subtitle']).'</span> ] </span>' : '';
		}
		elseif("style3" == $settings['animate_style']){
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text"> <span class="pre-heading-line1"></span>'.($settings['subtitle']) .'</span>' : '';
		}
		elseif("style4" == $settings['animate_style']){
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text"> <span class="pre-heading-line"></span>'.($settings['subtitle']) .'</span>' : '';
		}
		else{
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text ">'.($settings['subtitle']) .'</span>' : '';
		}

		$titleimg    = $settings['image'] ? '<img src="' . $settings['image']['url'] . '" alt="icon">' : '';

		$topimage    = $settings['image_postition'] == 'top' ? ' '.$titleimg .'' : "";

		$bottomimage = $settings['image_postition'] == 'bottom' ? '<div class="title-img bottom-img">'.$titleimg .'</div>' : "";

		

		if( "style9" == $settings['style'] ){
			$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title" ><span class="watermark">'.$settings['watermark'].'</span>'.($settings['title']).'</'.$settings['title_tag'].'>' : '';
		}

		    
        // Fill $html var with data
      ?>

        <div class="prelements-heading <?php echo esc_attr($settings['style']);?> animate-<?php echo esc_attr($settings['animate_style']);?> <?php echo esc_attr($settings['align']);?>">



        	<div class="title-inner">        		      		
	            <?php 
					echo wp_kses_post($topimage);
					if( "style4" != $settings['style'] ){
						echo wp_kses_post($sub_text);
					}
					echo wp_kses_post($main_title);
					if( "style4" == $settings['style'] ){
						echo wp_kses_post($sub_text);
					}
					echo wp_kses_post($bottomimage) ;
				?>
				<?php if( "style1" == $settings['animate_style'] ){?>
					<div class="pre-heading-line1"></div>
				<?php } ?>

				<?php if( "style2" == $settings['animate_style'] ){?>
					<div class="pre-heading-line"></div>
				<?php } ?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php if( "style12" == $settings['style'] ){ ?>
            			<div class="draw-line start-draw"></div>
            		<?php } ?>
            		<?php echo wp_kses_post($settings['content']);?>  
            	</div>
        	<?php } ?>
        </div>
        <?php 		
	}
} ?>