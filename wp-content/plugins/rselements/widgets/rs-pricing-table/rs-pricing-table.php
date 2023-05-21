<?php
/**
 * Pricing table widget class
 *
 */
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Rsaddon_Elementor_pro_Pricing_RS_Table_Widget extends \Elementor\Widget_Base {

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
        return 'rsprices';
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
        return esc_html__( 'RS Pricing Switcher', 'rsaddon' );
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
        return [ 'pricing', 'table', 'package', 'product', 'plan' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            '_section_price',
            [
                'label' => esc_html__( 'Pricing Table', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'monthly_title',
            [
                'label' => esc_html__( 'Monthly Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Monthly',
            ]
        );

        $this->add_control(
            'yearly_title',
            [
                'label' => esc_html__( 'Yearly Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Yearly',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'monthly_options',
            [
                'label' => esc_html__( 'Monthly Pricing Here', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__( 'Basic', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '$29.00', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Perfect for Prosonal', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'features',
            [
                'label'   => esc_html__( 'Features (Use List Style)', 'rsaddon' ),
                'type'    => Controls_Manager::WYSIWYG,
                'rows'    => 10, 
                'default' => esc_html__( '1 Users', 'rsaddon' ),          
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'rsaddon' ),
                'placeholder' => esc_html__( 'Type button text here', 'rsaddon' ),
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Link', 'rsaddon' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'https://example.com/', 'rsaddon' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        //Yearly Content
        $repeater->add_control(
            'yearly_options',
            [
                'label' => esc_html__( 'Yearly Pricing Here', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'title_yearly',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__( 'Basic', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'price_yearly',
            [
                'label' => esc_html__( 'Price', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '$59.00', 'rsaddon' ),
            ]
        );

        $repeater->add_control(
            'description_yearly',
            [
                'label' => esc_html__( 'Description', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Perfect for Prosonal', 'rsaddon' ),               
            ]
        );

        $repeater->add_control(
            'features_yearly',
            [
                'label'   => esc_html__( 'Features (Use List Style)', 'rsaddon' ),
                'type'    => Controls_Manager::WYSIWYG,
                'rows'    => 10,
                'default' => esc_html__( '1 Users', 'rsaddon' ),         
            ]
        );

        $repeater->add_control(
            'button_text_yearly',
            [
                'label' => esc_html__( 'Button Text', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'rsaddon' ),
                'placeholder' => esc_html__( 'Type button text here', 'rsaddon' ),
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'button_link_yearly',
            [
                'label' => esc_html__( 'Link', 'rsaddon' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'https://example.com/', 'rsaddon' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'price_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        ); 

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_months',
            [
                'label' => esc_html__( 'Monthly & Yearly Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_colors_fie',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .pricing-switcher .fieldset',
            ]
        );

        $this->add_control(
            'switcher_bg_color',
            [
                'label' => esc_html__( 'Background Color (Switcher)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-switcher .switch' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'switcher_normal_color',
            [
                'label' => esc_html__( 'Switcher Color (Normal)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-switcher label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'switcher_active_color',
            [
                'label' => esc_html__( 'Switcher Color (Active)', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-switcher .fieldset.mnt-ac .rs-mnt, .pricing-switcher .fieldset.mnt-acs .rs-yrs' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'switcher_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}} .pricing-switcher label',
            ]
        );

        $this->add_responsive_control(
            'year_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-switcher .fieldset' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_general',
            [
                'label' => esc_html__( 'Item Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .pricing-wrapper > li',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'general_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .pricing-wrapper > li',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-wrapper > li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-wrapper > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => esc_html__( 'Header Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'headtitle_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-header h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [   
                'label' => esc_html__( 'Title Typography', 'rsaddon' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-header h3',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__( 'Price Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-header .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [   
                'label' => esc_html__( 'Price Typography', 'rsaddon' ),
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-header .price',
            ]
        );

        $this->add_responsive_control(
            'title_paddings',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'short_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_border',
            [
                'label' => esc_html__( 'Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-header:after' => 'background: {{VALUE}}; opacity:1;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_body',
            [
                'label' => esc_html__( 'Pricing Body Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'des_list_color',
            [
                'label' => esc_html__( 'Description Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body .description' => 'color: {{VALUE}}; opacity:1;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [   
                'label' => esc_html__( 'Description Typography', 'rsaddon' ),
                'name' => 'des_typography',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-body .description',
            ]
        );

        $this->add_control(
            'des_features_color',
            [
                'label' => esc_html__( 'Features Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body .features ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_features_color',
            [
                'label' => esc_html__( 'Features Icon Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body .features ul li:before' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_border_features_color',
            [
                'label' => esc_html__( 'Features Icon Border Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body .features ul li:before' => 'border-color: {{VALUE}}; opacity:1;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [   
                'label' => esc_html__( 'Features Typography', 'rsaddon' ),
                'name' => 'features_typography',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-body .features ul li',
            ]
        );
        $this->add_control(
            'item_fea_desc_margin',
            [
                'label' => esc_html__( 'Margin (Per Item)', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body .features ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'body_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__( 'Button Style', 'rsaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => esc_html__( 'Normal', 'rsaddon' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Text Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background__sd',
                'label' => __( 'Background Color', 'plugin-domain' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-footer a',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-footer a',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-footer a',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-footer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-footer a',
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__( 'Margin', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-footer a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-footer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );  

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => esc_html__( 'Hover', 'rsaddon' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-pricing-container .pricing-wrapper > li:hover .pricing-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-wrapper > li:hover .pricing-footer a',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-wrapper > li:hover .pricing-footer a',
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_btn_hover',
                'label' => __( 'Background Color', 'plugin-domain' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rs-pricing-container .pricing-wrapper > li:hover .pricing-footer a',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        

        <div class="pricing-container rs-pricing-container">
            <div class="pricing-switcher">
                <p class="fieldset mnt-ac">
                    <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
                    <label for="monthly-1" id ="rsmnt" class="rs-mnt"><?php echo wp_kses_post($settings['monthly_title']);?>  </label>
                    <input type="radio" name="duration-1" value="yearly" id="yearly-1">
                    <label for="yearly-1" id ="rsyrs" class="rs-yrs"><?php echo wp_kses_post($settings['yearly_title']);?>  </label>
                    <span class="switch"></span>
                </p>
            </div>
            <ul class="pricing-list bounce-invert">
                <?php foreach ( $settings['price_list'] as $items => $item ) { ?>
                    <?php 
                        $title          = !empty($item['title']) ? $item['title'] : '';                            
                        $price          = !empty($item['price']) ? $item['price'] : '';                            
                        $description    = !empty($item['description']) ? $item['description'] : '';                            
                        $features       = !empty($item['features']) ? $item['features'] : '';                            
                        $button_text    = !empty($item['button_text']) ? $item['button_text'] : '';                            
                        $target         = !empty($item['button_link']['is_external']) ? 'target=_blank' : '';  
                        $button_link    = !empty($item['button_link']['url']) ? $item['button_link']['url'] : '';


                        $title_yearly           = !empty($item['title_yearly']) ? $item['title_yearly'] : '';                            
                        $price_yearly           = !empty($item['price_yearly']) ? $item['price_yearly'] : '';                            
                        $description_yearly     = !empty($item['description_yearly']) ? $item['description_yearly'] : '';
                        $features_yearly        = !empty($item['features_yearly']) ? $item['features_yearly'] : '';                            
                        $button_text_yearly     = !empty($item['button_text_yearly']) ? $item['button_text_yearly'] : '';       
                        $target                 = !empty($item['button_link_yearly']['is_external']) ? 'target=_blank' : '';  
                        $button_link_yearly     = !empty($item['button_link_yearly']['url']) ? $item['button_link_yearly']['url'] : '';

                    ?>
                    <li class="exclusive">
                        <ul class="pricing-wrapper">                            
                            <li data-type="monthly" class="is-visible">
                                <header class="pricing-header">
                                    <h3><?php echo esc_attr ($title);?></h3>
                                    <div class="price"><?php echo esc_attr ($price);?></div>                                    
                                </header>
                                <div class="pricing-body">                                    
                                    <div class="description"><?php echo esc_attr ($description);?></div>
                                    <div class="features"><?php echo wp_kses_post ($features);?></div>
                                </div>
                                <footer class="pricing-footer">
                                    <a href="<?php echo esc_url($button_link);?>" <?php echo wp_kses_post($target);?>><?php echo esc_attr ($button_text);?></a>
                                </footer>
                            </li>

                            <li data-type="yearly" class="is-hidden">
                                <header class="pricing-header">
                                    <h3><?php echo esc_attr ($title_yearly);?></h3>
                                    <div class="price"><?php echo esc_attr ($price_yearly);?></div>                                    
                                </header>
                                <div class="pricing-body">                                    
                                    <div class="description"><?php echo esc_attr ($description_yearly);?></div>
                                    <div class="features"><?php echo wp_kses_post ($features_yearly);?></div>
                                </div>
                                <footer class="pricing-footer">
                                    <a href="<?php echo esc_url($button_link_yearly);?>" <?php echo wp_kses_post($target);?>><?php echo esc_attr ($button_text_yearly);?></a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }
}
