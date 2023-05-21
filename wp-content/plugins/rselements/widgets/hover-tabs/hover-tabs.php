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

class Rsaddon_Elementor_Pro_HoverTabs_Widget extends \Elementor\Widget_Base {

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
        return 'rshovertabs';
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
        return esc_html__( 'RS Hover Tabs', 'rsaddon' );
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
            'top_title',
            [
                'label'       => esc_html__( 'Top Title', 'rsaddon' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Top Title', 'rsaddon' ),
                'separator'   => 'before',
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Subtitle here', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Title here', 'rsaddon' ),
            ]
        );


        $repeater->add_control(
            'selected_image',
            [
                'label' => esc_html__( 'Choose Image', 'rsaddon' ),
                'type'  => Controls_Manager::MEDIA,             
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
                        'text' => esc_html__( 'Analysis', 'rsaddon' ),
                        'title' => esc_html__( 'Research & Wireframs', 'rsaddon' ),
                    ],
                    [
                        'text' => esc_html__( 'Randall', 'rsaddon' ),
                        'title' => esc_html__( 'Wireframs & Research', 'rsaddon' ),
                    ],
                    [
                        'text' => esc_html__( 'Development', 'rsaddon' ),
                        'title' => esc_html__( 'Test & Lunch Project', 'rsaddon' ),
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
                'selector' => '{{WRAPPER}} ul#rs-hover-tabs-nav li',
            ]
        );       

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'general_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} ul#rs-hover-tabs-nav li'
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
                    '{{WRAPPER}} ul#rs-hover-tabs-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} ul#rs-hover-tabs-nav li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
      
       $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'list_item_border',
                'selector' => '{{WRAPPER}} ul#rs-hover-tabs-nav li'                
            ]
        );

       $this->add_responsive_control(
            'features_title_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} ul#rs-hover-tabs-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );
       $this->add_control(
            'top_title_color',
            [
                'label' => esc_html__( 'Top Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav .top-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav .top-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'top_title_typography',
                'selector' => '{{WRAPPER}} #rs-hover-tabs-nav .top-title',
            ]
        );
        $this->end_controls_section();   

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => esc_html__( 'Subtitle, Title', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_color_active',
            [
                'label' => esc_html__( 'Active Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li.active a span.title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_dot_color',
            [
                'label' => esc_html__( 'Title Dots Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.title:before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} #rs-hover-tabs-nav li a span.title',
            ]
        ); 
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.subtitle' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'subtitle_dot_color',
            [
                'label' => esc_html__( 'Subtitle Dots Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.subtitle:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Subtitle Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #rs-hover-tabs-nav li a span.subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();  
     
    }

  

	protected function render() {
        $settings = $this->get_settings_for_display();?> 

        <div class="rs-hover-tabs">
            <?php if ( is_array( $settings['features_list'] ) ) : ?>
            <ul id="rs-hover-tabs-nav">
                <?php if(!empty($settings['top_title'])) { ?>
                    <h3 class="top-title"><?php echo esc_html($settings['top_title']);?> </h3>  
                <?php } ?>
                <?php 
                 $x = 0;
                foreach ( $settings['features_list'] as $index => $feature ) :
                    $x++;
                    $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                    $this->add_inline_editing_attributes( $name_key, 'basic' );
                    $this->add_render_attribute( $name_key, 'class', 'rs-feature-text' ); ?>
                    <li>
                        <a href="#tab<?php echo esc_html($x);?>">
                            <span class="subtitle"><?php echo wp_kses_post( $feature['text'] ); ?></span>
                            <span class="title"><?php echo wp_kses_post( $feature['title'] ); ?></span>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul> 
            <?php endif; ?>

            <?php if ( is_array( $settings['features_list'] ) ) : 
            $y = 0;    
                ?>

            <div id="rs-hover-tabs-content">
                 <?php  foreach ( $settings['features_list'] as $index => $feature ) :
                    $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                    $this->add_inline_editing_attributes( $name_key, 'basic' );
                    $this->add_render_attribute( $name_key, 'class', 'rs-feature-text' ); 
                    $y++;
                    ?>
                        <div id="tab<?php echo esc_html($y);?>" class="tab-content">
                            <?php if ( $feature['selected_image'] ) : ?>
                                <img src="<?php echo esc_url( $feature['selected_image']['url'] );?>" alt="">
                            <?php endif; ?>
                        </div>
                <?php  endforeach; ?>
            </div>
            <?php endif; ?>
        </div> 
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#rs-hover-tabs-nav li:first-child').addClass('active');
                $('.tab-content').hide();
                $('.tab-content:first').show();

                // Click function
                $('#rs-hover-tabs-nav li').mouseenter(function(){
                  $('#rs-hover-tabs-nav li').removeClass('active');
                 $(this).addClass('active');
                  $('.tab-content').hide();
                  
                  var activeTab = $(this).find('a').attr('href');
                  $(activeTab).fadeIn();
                  return false;
                });
            });
        </script>
        <?php
    }
}
