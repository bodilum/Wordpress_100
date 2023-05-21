<?php
/**
 * Image widget class
 *
 */
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;


defined( 'ABSPATH' ) || die();

class Rsaddon_pro_Image_Showcase_Widget extends \Elementor\Widget_Base {
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
        return 'rs-image';
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
        return esc_html__( 'RS Image Showcase', 'rsaddon' );
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
        return 'glyph-icon flaticon-image';
    }


    public function get_categories() {
        return [ 'rsaddon_category' ];
    }

    public function get_keywords() {
        return [ 'logo', 'clients', 'brand', 'parnter', 'image' ];
    }

	protected function register_controls() {
		$this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Image Settings', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        ); 

        $this->add_control(
            'first_image',
            [
                'label' => esc_html__( 'Choose Image', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::MEDIA,     
                'separator' => 'before',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rs-image' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        ); 

        $this->add_control(
            'popup_animation',
            [
                'label' => esc_html__( 'Popup Effect', 'rsaddon' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'image_animation',
            [
                'label' => esc_html__( 'Animation', 'rsaddon' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rsaddon' ),
                'label_off' => esc_html__( 'Hide', 'rsaddon' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'images_translate',
            [
                'label'   => esc_html__( 'Translate Position', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'veritcal',
                'options' => [                  
                    'veritcal' => esc_html__( 'Veritcal', 'rsaddon'),
                    'veritcal2' => esc_html__( 'Veritcal 2', 'rsaddon'),
                    'horizontal' => esc_html__( 'Horizontal', 'rsaddon'),
                    'horizontal2' => esc_html__( 'Horizontal 2', 'rsaddon'),
                    'rotated_style' => esc_html__( 'Rotated', 'rsaddon'),
                    'spin_style' => esc_html__( 'Spin', 'rsaddon'),
                    'scale_style' => esc_html__( 'Scale', 'rsaddon'),
                    'move_leftright' => esc_html__( 'Move Left & Right', 'rsaddon'),
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'animation_start_from',
            [
                'label'   => esc_html__( 'Start From Reverse', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [                  
                    'enable' => esc_html__( 'Enable', 'rsaddon'),
                    'disable' => esc_html__( 'Disable', 'rsaddon'),
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'spin_style',
                ],
            ]
        );

        $this->add_responsive_control(
            'rs_image_duration',
            [

                'label' => esc_html__( 'Animation Duration', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .rs-image .rs-multi-image' => 'animation-duration: {{SIZE}}s;',
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'rs_image_delay',
            [

                'label' => esc_html__( 'Animation Delay', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .rs-image .rs-multi-image' => 'animation-delay: {{SIZE}}s;',
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'popup_animation_bg_heading',
            [
                'label' => esc_html__( 'Popup Effect Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'popup_animation' => 'yes',
                ],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .rs-image .pop-wrap .pop' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => esc_html__( 'Gobal Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Image Width', 'rsaddon' ),             
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rs-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'opacity',
            [
                'label' => esc_html__( 'Opacity', 'rsaddon' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .rs-image img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>

        <div class="rs-image <?php echo esc_attr($settings['image_animation']); ?>">
            <?php if(!empty($settings['first_image']['url'])) : ?>
                <img class="rs-multi-image <?php echo esc_attr($settings['images_translate']); ?> reverse-<?php echo esc_attr($settings['animation_start_from']); ?>" src="<?php echo esc_url($settings['first_image']['url']);?>" alt="image"/>
                <?php if('yes' == $settings['popup_animation']){?>
                <div class="pop-wrap">
                    <div class="pop"></div>
                    <div class="pop"></div>
                    <div class="pop"></div>
                </div>
                <?php } ?>
            <?php endif; ?>
        </div>     
    <?php
    }
}
