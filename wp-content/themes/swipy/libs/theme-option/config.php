<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "swipy_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'swipy/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'page_priority'        => 8,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Swipy Options', 'swipy' ),
        'page_title'           => esc_html__( 'Swipy Options', 'swipy' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => 20,        
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'swipy Theme', 'swipy' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'swipy Theme', 'swipy' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSswipy
      
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'swipy' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
        	array(
        	    'id'       => 'enable_global',
        	    'type'     => 'switch', 
        	    'title'    => esc_html__('Enable Global Settings', 'swipy'),
        	    'subtitle' => esc_html__('If you enable global settings all option will be work only theme option', 'swipy'),
        	    'default'  => false,
        	),
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'swipy' ),
                'subtitle' => esc_html__( 'Container Size example(1440px)', 'swipy' ),
                'type'     => 'text',
                'default'  => '1200px'                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'swipy' ),
                'subtitle' => esc_html__( 'Upload your logo', 'swipy' ),
                'url'=> true                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Light', 'swipy' ),
                'subtitle' => esc_html__( 'Upload your light logo', 'swipy' ),
                'url'=> true                
            ),
            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'swipy' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'swipy' ),
                    'type'     => 'text',
                    'default'  => '30px'                    
            ), 


            array(
                'id'       => 'logo-mobile',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Mobile Logo', 'swipy' ),
                'subtitle' => esc_html__( 'Upload your mobile logo', 'swipy' ),
                'url'=> true                
            ),

            array(
                    'id'       => 'logo-height-mobile',                               
                    'title'    => esc_html__( 'Mobile Logo Height', 'swipy' ),
                    'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'swipy' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'swipy' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'swipy' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'swipy' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'swipy' ),
                'type'     => 'text',
                'default'  => '30px'
                    
            ),            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Upload Favicon', 'swipy' ),
            'subtitle' => esc_html__( 'Upload your faviocn here', 'swipy' ),
            'url'=> true            
            ),

            array(
                'id'       => 'footer_icon_animation', 
                'url'      => true,     
                'title'    => esc_html__( 'Animation Icon', 'swipy' ),                 
                'type'     => 'media',                                  
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Menu', 'swipy'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'swipy'),
                'default'  => false,
            ),
               
             array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'swipy'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'swipy'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => esc_html__('Show off Canvas', 'swipy'),
                'subtitle' => esc_html__('You can show or hide off canvas here', 'swipy'),
                'default'  => false,
            ),  
     
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'swipy'),
                'subtitle' => esc_html__('You can show or hide here', 'swipy'),
                'default'  => false,
            ), 
           
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'swipy' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'swipy')            
        ),
        
        array(
            'id'       => 'show-top',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Top Bar', 'swipy'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'swipy'),
            'default'  => false,
        ),   
       
      
        array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Social Icons at Header', 'swipy'),
                'subtitle' => esc_html__('You can select Social Icons show or hide', 'swipy'),
                'default'  => true,
            ),  
                    
          array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'swipy')            
        ),

        array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'swipy'),                  
               
                //Must provide key => value pairs for select options
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'swipy'),
                    'full'      => esc_html__('Container Fluid', 'swipy'),
                ),

                'default'          => 'container',            
        ),

        array(
            'id'       => 'gap_header',                               
            'title'    => esc_html__( 'Top Bottom Header Gap', 'swipy' ),                  
            'type'     => 'text',
            'subtitle' => esc_html__('You can add gap here ex(10px)', 'swipy'),          
                
        ),  
        array(
            'id'       => 'header_separator',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Header Bottom Seperator', 'swipy'),
            'subtitle' => esc_html__('You can show or hide header bottom seperator', 'swipy'),
            'default'  => false,
        ),

        array(
            'id'       => 'border_width_header',                               
            'title'    => esc_html__( 'Border Width', 'swipy' ),                  
            'type'     => 'text',
            'subtitle' => esc_html__('You can border width ex(2px)', 'swipy'),
            'required' => array(
                array(
                    'header_separator',
                    'equals',
                    1,
                ),
            ), 
                
        ),  

        array(
            'id'       => 'border_header_color',                               
            'title'    => esc_html__( 'Border Color', 'swipy' ),                  
            'type'     => 'color_rgba',
            'subtitle' => esc_html__( 'Pick Border Color', 'swipy' ),  
            'required' => array(
                array(
                    'header_separator',
                    'equals',
                    1,
                ),
            ),
            'output' => array(                 
                'border-color' => '.show-header-border #rs-header .menu-sticky .menu-area'
            )                
        ), 

        array(
            'id'       => 'tool_dark_color',          
            'title'    => esc_html__( 'Toolbar Dark Color', 'swipy' ),
            'subtitle' => esc_html__( 'Pick color', 'swipy' ),      
            'default'  => array(
                'color'     => '#0a0a0a',                   
            ),
            'output' => array(                 
                'color'  => '#rs-header.header-style8 .rs-address-area .info-title, #rs-header.header-style8 .rs-address-area .info-des, #rs-header.header-style8 .rs-address-area .info-des a'
            )           
        ),

        array(
                'id'       => 'phone_line',                               
                'title'    => esc_html__( ' Phone Number Pre Text', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Phone Text', 'swipy' ),
                'type'     => 'text',     
        ),

        array(
                'id'       => 'phone',                               
                'title'    => esc_html__( ' Phone Number', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Phone Number', 'swipy' ),
                'type'     => 'text',     
        ),

        array(
            'id'       => 'email__text',                               
            'title'    => esc_html__( 'Email Pre Text', 'swipy' ),
            'subtitle' => esc_html__( 'Enter Email Text', 'swipy' ),
            'type'     => 'text',     
        ),

               
        array(
            'id'       => 'top-email',                               
            'title'    => esc_html__( 'Email Address', 'swipy' ),
            'subtitle' => esc_html__( 'Enter Email Address', 'swipy' ),
            'type'     => 'text',
            'validate' => 'email',
            'msg'      => esc_html__('Email Address Not Valid', 'swipy')  
        ),  

        array(
           'id'       => 'address__text',                               
           'title'    => esc_html__( ' Address Pre Text', 'swipy' ),
           'subtitle' => esc_html__( 'Address Email Text', 'swipy' ),
           'type'     => 'text',     
        ),

        array(
            'id'       => 'top_address',                               
            'title'    => esc_html__( 'Address Address', 'swipy' ),
            'subtitle' => esc_html__( 'Enter Address Text', 'swipy' ),
            'type'     => 'text', 
        ),         

        array(
            'id'       => 'open_text',                               
            'title'    => esc_html__( 'Opening Pre Text', 'swipy' ),
            'subtitle' => esc_html__( 'Opening Hours', 'swipy' ),
            'type'     => 'text',
            
        ),         

        array(
            'id'       => 'open_hours',                               
            'title'    => esc_html__( 'Opening Hours', 'swipy' ),
            'subtitle' => esc_html__( 'Enter Opening Hours', 'swipy' ),
            'type'     => 'text',
            
        ),  

        array(
            'id'       => 'quote_btns',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Quote Button', 'swipy'),
            'subtitle' => esc_html__('You can show or hide Quote Button', 'swipy'),
            'default'  => false,
        ),
            
        array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Quote Button Text', 'swipy' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Quote Button Link', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'swipy' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'swipy' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>true,      
'fields'    => array( 
                    
    array(
        'id'       => 'header_layout',
        'type'     => 'image_select',
        'title'    => esc_html__('Header Layout', 'swipy'), 
        'subtitle' => esc_html__('Select header layout. Choose between 1 to 5 layout.', 'swipy'),
        'options'  => array(
            'style1'   => array(
                'alt'      => 'Header Style 1', 
                'img'      => get_template_directory_uri().'/libs/img/style_1.png'
            ),                        
            'style5' => array(
                'alt'    => 'Header Style 2', 
                'img'    => get_template_directory_uri().'/libs/img/style_2.png'
            ),            
        ),
            'default' => 'style5'
            ),      
        )
    ) 
);

                                   
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'swipy' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
                array(
                    'id'        => 'toolbar_bg_skew_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Skew background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'toolbar_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Icon Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'       => 'tool_dark_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Color', 'swipy' ),
                    'subtitle' => esc_html__( 'Pick color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-title, #rs-header.header-style8 .rs-address-area .info-des, #rs-header.header-style8 .rs-address-area .info-des a'
                    )           
                ),

                array(
                    'id'       => 'tool_dark_hover_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Hover Color', 'swipy' ),
                    'subtitle' => esc_html__( 'Pick color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-des a:hover'
                    )           
                ),

                array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'       => 'tool_border',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Border Color', 'swipy' ),
                    'subtitle' => esc_html__( 'Pick color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => '#rs-header .toolbar-area .toolbar-contact ul li a, #rs-header .toolbar-area .opening em'
                    )           
                ),


                array(
                    'id'       => 'tool_border2_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Border Color (Transparent)', 'swipy' ),
                    'subtitle' => esc_html__( 'Pick color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => '#rs-header.header-style5 .toolbar-area, #rs-header.header-style5 .toolbar-area .toolbar-contact ul li, #rs-header.header-style5 .toolbar-area .opening'
                    )           
                ),

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

               

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','swipy'),
                    'subtitle'  => esc_html__('Font Size', 'swipy'),    
                    'default'   => '',                                            
                ), 

                array(
                   'id'       => 'welcome-text',                               
                   'title'    => esc_html__( 'Toolbar Welcome Text', 'swipy' ),
                   'subtitle' => esc_html__( 'Welcome text here', 'swipy' ),
                   'type'     => 'text',     
                ),
                
        )
    )
); 



//Preloader settings
    Redux::setSection( $opt_name, array(
      'title'  => esc_html__( 'Preloader Style', 'swipy' ),
      'desc'   => esc_html__( 'Preloader Style Here', 'swipy' ),               
      'fields' => array( 
              array(
                  'id'       => 'show_preloader',
                  'type'     => 'switch', 
                  'title'    => esc_html__('Show Preloader', 'swipy'),
                  'subtitle' => esc_html__('You can show or hide preloader', 'swipy'),
                  'default'  => false,
              ), 

              array(
                  'id'        => 'preloader_bg_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Background Color','swipy'),
                  'subtitle'  => esc_html__('Pick color', 'swipy'),    
                  'default'   => '#ffffff',                        
                  'validate'  => 'color',                        
              ), 
              
              array(
                  'id'        => 'preloader_text_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Border Color','swipy'),
                  'subtitle'  => esc_html__('Pick color', 'swipy'),    
                  'default'   => '',                        
                  'validate'  => 'color',                        
              ),  

              array(
                  'id'        => 'preloader_animate_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Animate Circle Color','swipy'),
                  'subtitle'  => esc_html__('Pick color', 'swipy'),    
                  'default'   => '',                        
                  'validate'  => 'color',                        
              ), 

              array(
                  'id'    => 'preloader_img', 
                  'url'   => true,     
                  'title' => esc_html__( 'Preloader Image', 'swipy' ),                 
                  'type'  => 'media',                                  
              ),       
        )
    )
); 


//End Preloader settings  
    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Style', 'swipy' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'swipy' ),
        'desc'   => esc_html__( 'Style your theme', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','swipy'),
                            'subtitle'  => esc_html__('Pick body background color', 'swipy'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '#3E3E3E',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','swipy'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'swipy'),
                            'default'   => '#FF7425',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','swipy'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'swipy'),
                            'default'   => '#6722B5',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'third_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Third Color','swipy'),
                            'subtitle'  => esc_html__('Select Third Color.', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Link Color','swipy'),
                            'subtitle'  => esc_html__('Pick Link color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Link Hover Color','swipy'),
                            'subtitle'  => esc_html__('Pick link hover color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'gradient_first_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('First Gradient Color','swipy'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),  
                        array(
                            'id'        => 'gradient_snd_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Second Gradient Color','swipy'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),    
                       
                 ) 
            ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'swipy' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array( 

                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'swipy'),                                           
                        ),

                        array(
                            'id'       => 'main_menu_center',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Center', 'swipy' ),
                            'on'       => esc_html__( 'Enabled', 'swipy' ),
                            'off'      => esc_html__( 'Disabled', 'swipy' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Icon Hide', 'swipy' ),
                            'on'       => esc_html__( 'Enabled', 'swipy' ),
                            'off'      => esc_html__( 'Disabled', 'swipy' ),
                            'default'  => false,
                        ),

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '#3B4052',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Hover Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Active Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '#372748',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Hover Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),           
                            'default'   => '#6722B5',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),
                            'default'   => '#6722B5',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_phone_number_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Phone Number Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','swipy'),   
                            'default'   => '',                             
                        ), 
                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','swipy'),   
                            'default'   => '42px',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','swipy'),   
                            'default'   => '42px',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'swipy' ),
                            'on'       => esc_html__( 'Enabled', 'swipy' ),
                            'off'      => esc_html__( 'Disabled', 'swipy' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'swipy'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','swipy'),
                            'subtitle'  => esc_html__('Pick bg color', 'swipy'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',
                            'title'     => esc_html__('Dropdown Menu Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '#3B4052',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '#6722B5',
                            'validate'  => 'color',                        
                        ),  

                         array(
                            'id'        => 'drop_text_hover_color-bg',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover BG Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',  
                            'output' => array(                 
                                'background'  => '.menu-area .navbar ul li .sub-menu li a:hover'
                            )                       
                        ),                               
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'swipy' ),
                            'on'       => esc_html__( 'Enabled', 'swipy' ),
                            'off'      => esc_html__( 'Disabled', 'swipy' ),
                            'default'  => false,
                        ),

                        array(
                             'id'        => 'dropdown_menu_item_gap',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Left Right Gap','swipy'),   
                             'default'   => '20px',                             
                         ), 

                        array(
                             'id'        => 'dropdown_menu_item_separate',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Middle Gap','swipy'),   
                             'default'   => '10px',                             
                         ), 
                         array(
                             'id'        => 'dropdown_menu_item_gap2',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Boxes Top Bottom Gap','swipy'),   
                             'default'   => '21px',                             
                         ),
                         array(
                             'id'     => 'notice_critical3',
                             'type'   => 'info',
                             'notice' => true,
                             'style'  => 'success',
                             'title'  => esc_html__('Mega Menu Settings', 'swipy'),                                           
                         ),

                          array(
                            'id'        => 'meaga_menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Left Right Gap','swipy'),   
                            'default'   => '40px',                             
                        ), 

                         array(
                            'id'        => 'mega_menu_item_separate',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Middle Gap','swipy'),   
                            'default'   => '10px',                             
                        ),  
                        array(
                            'id'        => 'mega_menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Boxes Top Bottom Gap','swipy'),   
                            'default'   => '21px',                             
                        ),                       
                        
                        
                )
            )
        ); 

     //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu', 'swipy' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array(                       

                        array(
                            'id'        => 'stiky_menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Sticky Menu Area Background Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'stikcy_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                       

                        array(
                            'id'        => 'sticky_menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Hover Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),           
                            'default'   => '',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'stikcy_menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),
                                               
                        array(
                            'id'        => 'sticky_drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','swipy'),
                            'subtitle'  => esc_html__('Pick bg color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'stikcy_drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'sticky_drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','swipy'),
                            'subtitle'  => esc_html__('Pick text color', 'swipy'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'swipy' ),      
        'subsection' =>true,  
        'fields' => array(
                    array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show off Breadcrumb', 'swipy'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'swipy'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ),                     

                     array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'swipy' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'swipy' ),                  
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ),

                    array(
                        'id'        => 'breadcrumb_seperator_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Seperator Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ),

                    array(
                        'id'        => 'breadcrumb_border_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Border Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ),

                    array(
                        'id'        => 'breadcrumb_icon_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Icon Color (Posts Single)','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ),  
                    
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','swipy'),                          
                        'default'   => '',                      
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','swipy'),                          
                        'default'   => '',                   
                    ),

                    array(
                        'id'        => 'breadcrumb_top_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Mobile Top Gap','swipy'),                          
                        'default'   => '',                      
                    ), 
                    array(
                        'id'        => 'breadcrumb_bottom_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Mobile Bottom Gap','swipy'),                          
                        'default'   => '',                   
                    ), 

                    array(
                        'id'               => 'text_alignment',
                        'type'             => 'select',
                        'title'            => esc_html__('Meta Text Alignment', 'swipy'), 
                        'options'          => array(  
                            'text-left'    => esc_html__('Left', 'swipy'),
                            'text-center'  => esc_html__('Center', 'swipy'),
                            'text-right'   => esc_html__('Right', 'swipy')
                        ),
                        'default'          => 'text-left',            
                    ),   
                      
                    array(
                        'id'        => 'breadcrumb_max_width',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Max Width','swipy'),                          
                        'default'   => '1200px',                   
                    ),   
                )
            )
        );

    //Button settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Button Style', 'swipy' ),
        'desc'       => esc_html__( 'Button Style Here', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array( 

                    array(
                        'id'        => 'btn_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_border',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Border Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),                       
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_icon_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Icon Background Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Background','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover_border',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Border Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),                      
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_txt_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Text Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '',                        
                        'validate'  => 'color',                        
                    ), 
                    array(
                        'id'        => 'btn_border_radius',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Button Border Radius','swipy'),
                        'subtitle'  => esc_html__('Border Radius example(5px)', 'swipy'),                                             
                    ),  
                )
            )
        );
    
    //offcanvas  settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Offcanvas Style', 'swipy' ),
        'desc'   => esc_html__( 'Offcanvas Style Here', 'swipy' ),        
        'subsection' =>true,  
        'fields' => array( 

                array(
                    'id'       => 'offcanvas_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Offcanvas Logo', 'swipy' ),
                    'subtitle' => esc_html__( 'Upload your logo', 'swipy' ),                  
                ), 

                
                array(
                    'id'       => 'offcanvas_logo_height',                               
                    'title'    => esc_html__( 'Logo Height', 'swipy' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'swipy' ),
                    'type'     => 'text',
                    'default'  => ''                    
                ),

                array(
                    'id'        => 'offcan_bgs_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 
   

                array(
                    'id'        => 'offcan_link_social_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'offcan_txt_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
                 
                array(
                    'id'        => 'offcan_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  
                array(
                    'id'        => 'offcan_link_hovers_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link hover Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

          
                array(
                    'id'        => 'offcanvas_background_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 
          
                array(
                    'id'        => 'offcanvas_icons_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Icon Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'offcanvas_dots_close_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Close Color','swipy'),
                    'subtitle'  => esc_html__('Pick color', 'swipy'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
            )
        )
    );
    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'swipy' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','swipy'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'swipy' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'swipy' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Poppins',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'swipy' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'swipy' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#19082D',                    
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '16px',                    
                    'font-weight' => '600',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'swipy' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '42px',
                    'line-height' => '58px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'swipy' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '46px'
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'swipy' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '28px',
                    'line-height' => '38px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'swipy' ),                
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'swipy' ),                
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'swipy' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'swipy' ),
                'default'     => array(
                    'color'       => '#19082D',
                    'font-style'  => '700',
                    'font-family' => 'Jost',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '26px'
                ),
            ),
                
        )
    )                     
);

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'swipy' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
    );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'swipy' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                array(
                    'id'    => 'blog_banner_main', 
                    'url'   => true,     
                    'title' => esc_html__( 'Blog Page Banner', 'swipy' ),                 
                    'type'  => 'media',                                  
                ),  

                array(
                    'id'        => 'blog_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Body Backgroud Color','swipy'),
                    'subtitle'  => esc_html__('Pick body background color', 'swipy'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),
                
                array(
                    'id'       => 'blog_title',                               
                    'title'    => esc_html__( 'Blog Page Custom Title', 'swipy' ),
                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'swipy' ),
                    'type'     => 'text',                                   
                ),

                 array(
                    'id'       => 'blog_desc',                               
                    'title'    => esc_html__( 'Blog  Banner Description', 'swipy' ),
                    'subtitle' => esc_html__( 'Enter Blog  Description Here', 'swipy' ),
                    'type'     => 'textarea',                                   
                ),
                
                array(
                    'id'               => 'blog-layout',
                    'type'             => 'image_select',
                    'title'            => esc_html__('Select Blog Layout', 'swipy'), 
                    'subtitle'         => esc_html__('Select your blog layout', 'swipy'),
                    'options'          => array(
                    'full'             => array(
                    'alt'              => 'Blog Style 1', 
                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                ),
                    '2right'           => array(
                    'alt'              => 'Blog Style 2', 
                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                ),
                '2left'            => array(
                'alt'              => 'Blog Style 3', 
                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                ),                                  
                ),
                'default'          => '2right'
                ),                      
                
                array(
                    'id'               => 'blog-grid',
                    'type'             => 'select',
                    'title'            => esc_html__('Select Blog Gird', 'swipy'),                   
                    'desc'             => esc_html__('Select your blog gird layout', 'swipy'),
                    'options'          => array(
                        '12'           => esc_html__('1 Column','swipy'), 
                        '6'            => esc_html__('2 Column', 'swipy'),     
                        '4'            => esc_html__('3 Column', 'swipy'),
                        '3'            => esc_html__('4 Column', 'swipy'),
                    ),
                    'default'       => '12',                                  
                ),  
                

                array(
                   'id'       => 'blogpage-blog-author',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Author', 'swipy'),
                   'subtitle' => esc_html__('You can show or hide Author', 'swipy'),
                   'default'  => false,
                ),

                array(
                   'id'       => 'blog-date',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Date', 'swipy'),
                   'subtitle' => esc_html__('You can show or hide Date', 'swipy'),
                   'default'  => false,
                ),

                array(
                   'id'       => 'blogpage-category',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Hide Category', 'swipy'),
                   'subtitle' => esc_html__('You can show or hide Category', 'swipy'),
                   'default'  => false,
                ),            

                array(
                    'id'               => 'blog_readmore',                               
                    'title'            => esc_html__( 'Blog  ReadMore Text', 'swipy' ),
                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'swipy' ),
                    'type'             => 'text',                                   
                ),
                
            )
        ) 
                
    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'swipy' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                'id'       => 'blog_banner', 
                                'url'      => true,     
                                'title'    => esc_html__( 'Blog Single page banner', 'swipy' ),                  
                                'type'     => 'media',
                            ),  
                           
                            array(
                               'id'       => 'blog-author',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Author', 'swipy'),
                               'subtitle' => esc_html__('You can show or hide Author', 'swipy'),
                               'default'  => false,
                            ),

                            array(
                               'id'       => 'blog-comments',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Comment', 'swipy'),
                               'subtitle' => esc_html__('You can show or hide Comment', 'swipy'),
                               'default'  => false,
                            ),

                            array(
                               'id'       => 'blog-published',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Published', 'swipy'),
                               'subtitle' => esc_html__('You can show or hide Published', 'swipy'),
                               'default'  => false,
                            ), 

                            array(
                               'id'       => 'blog-categories',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Categories', 'swipy'),
                               'subtitle' => esc_html__('You can show or hide Categories', 'swipy'),
                               'default'  => false,
                            ), 

                            array(
                                'id'               => 'meta_text_alignment',
                                'type'             => 'select',
                                'title'            => esc_html__('Meta Text Alignment', 'swipy'), 
                                'options'          => array(  
                                    'text-left'    => esc_html__('Left', 'swipy'),
                                    'text-center'  => esc_html__('Center', 'swipy'),
                                    'text-right'   => esc_html__('Right', 'swipy')
                                ),
                                'default'          => 'text-left',            
                            ),    
                        )
                )    
    
    );

  
    /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team Section', 'swipy' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(

            array(
                'id'       => 'show-team-banner',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Team Page Banner', 'swipy'),
                'subtitle' => esc_html__('You can select banner show or hide', 'swipy'),
                'default'  => true,
            ), 
        
            array(
                'id'       => 'team_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Team Single page banner image', 'swipy' ),                    
                'type'     => 'media',
            ),  

            array(
                'id'       => 'show-team-biography-skill',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Team Single Biography & Professional Skills', 'swipy'),
                'subtitle' => esc_html__('You Can Show Biography & Professional Skills', 'swipy'),
                'default'  => true,
            ),
            
            array(
                'id'        => 'team_single_bg_color',
                'type'      => 'color',                           
                'title'     => esc_html__('Sinlge Team Body Backgroud Color','swipy'),
                'subtitle'  => esc_html__('Pick body background color', 'swipy'),
                'default'   => '#ffffff',
                'validate'  => 'color',                        
            ),
            array(
                'id'       => 'team_slug',                               
                'title'    => esc_html__( 'Team Slug', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Team Slug Here', 'swipy' ),
                'type'     => 'text',
                'default'  => esc_html__('teams', 'swipy'), 
            ), 
            array(
                'id'       => 'team_sigle_txt',                               
                'title'    => esc_html__( 'Team Single Banner Ttile', 'swipy' ),                  
                'type'     => 'text',      
            ), 
            array(
                'id'       => 'team_sigle_txt_desc',                               
                'title'    => esc_html__( 'Team Single Banner Text', 'swipy' ),                  
                'type'     => 'textarea',      
            ), 
            array(
                'id'       => 'team_sigle_title',                               
                'title'    => esc_html__( 'Biography', 'swipy' ),                  
                'type'     => 'text',  
                'default'  => esc_html__('Biography', 'swipy'),     
            ),    
            array(
                'id'       => 'team_sigle_skallbar',                               
                'title'    => esc_html__( 'Professional Skills', 'swipy' ),                  
                'type'     => 'text', 
                'default'  => esc_html__('Professional Skills', 'swipy'),      
            ),              
                          
        )) 
    );    


    /*Department Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'swipy' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
        
            array(
                'id'       => 'department_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Portfolio Single page banner image', 'swipy' ),                    
                'type'     => 'media',                    
            ),  

            array(
                'id'       => 'portfolio_banner_text',                               
                'title'    => esc_html__( 'Portfolio Singe Page Banner Text', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Portfolio Banner Text', 'swipy' ),
                'type'     => 'textarea',
                'default'  => '',
                    
            ), 

            array(
                'id'       => 'portfolio_slug',                               
                'title'    => esc_html__( 'Portfolio Slug', 'swipy' ),
                'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'swipy' ),
                'type'     => 'text',
                'default'  => 'portfolios',
                    
            ), 
        )
    ) 
);




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'swipy' ),
        'desc'   => esc_html__( 'Add your social icon here', 'swipy' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => esc_html__( 'Facebook Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Facebook Link', 'swipy' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => esc_html__( 'Twitter Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Twitter Link', 'swipy' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => esc_html__( 'Rss Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Rss Link', 'swipy' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => esc_html__( 'Pinterest Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Pinterest Link', 'swipy' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => esc_html__( 'Linkedin Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Linkedin Link', 'swipy' ),
                        'type'     => 'text',  
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => esc_html__( 'Instagram Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Instagram Link', 'swipy' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => esc_html__( 'Youtube Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Youtube Link', 'swipy' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => esc_html__( 'Tumblr Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Tumblr Link', 'swipy' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => esc_html__( 'Vimeo Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Vimeo Link', 'swipy' ),
                        'type'     => 'text',                       
                    ), 

                    array(
                        'id'       => 'snapchat',                               
                        'title'    => esc_html__( 'Snapchat Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Snapchat Link', 'swipy' ),
                        'type'     => 'text',                       
                    ),
                    
                     array(
                        'id'       => 'tiktok',                               
                        'title'    => esc_html__( 'Tik Tok Link', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Tik Tok Link', 'swipy' ),
                        'type'     => 'text',                       
                    ),        
            ) 
        ) 
    );
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mouse Pointer', 'swipy' ),
        'desc'   => esc_html__( 'Add your Mouse Pointer here', 'swipy' ),
        'icon'   => 'el el-hand-up',
        'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                        array(
                            'id'       => 'show_pointer',
                            'type'     => 'switch', 
                            'title'    => esc_html__('Show Pointer', 'swipy'),
                            'subtitle' => esc_html__('You can show or hide Mouse Pointer', 'swipy'),
                            'default'  => false,
                        ), 

                        array(
                            'id'        => 'pointer_border',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Border','swipy'),
                            'subtitle'  => esc_html__('Pick color', 'swipy'),    
                            'default'   => '#6722B5',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'       => 'border_width',                               
                            'title'    => esc_html__( 'Border Width', 'swipy' ),
                            'subtitle' => esc_html__( 'Enter Pointer Border Width', 'swipy' ),
                            'type'     => 'text',
                            'default'   => '2',                         
                        ), 

                        array(
                            'id'        => 'pointer_bg',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Background','swipy'),
                            'subtitle'  => esc_html__('Enter Pointer Background color', 'swipy'),    
                            'default'   => 'transparent',                        
                            'validate'  => 'color',                        
                        ),  


                        array(
                            'id'       => 'diameter',                               
                            'title'    => esc_html__( 'Diameter', 'swipy' ),
                            'subtitle' => esc_html__( 'Enter Pointer diameter Size', 'swipy' ),
                            'type'     => 'text',  
                            'default'   => '40',                    
                        ),   

                        array(
                            'id'       => 'speed',                               
                            'title'    => esc_html__( 'Pointer Speed', 'swipy' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'swipy' ),
                            'type'     => 'text',
                            'default'   => '4',                         
                        ),                     

                        array(
                            'id'       => 'scale',                               
                            'title'    => esc_html__( 'Hover Scale', 'swipy' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'swipy' ),
                            'type'     => 'text',
                            'default'   => '1.3',                         
                        ),
            ) 
        ) 
    );

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'ScrollBar', 'swipy' ),
    'desc'   => esc_html__( 'Add custom scrollbar options here', 'swipy' ),
    'icon'   => 'el el-hand-up',
    'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(
                    array(
                        'id'       => 'show_scrollbar',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show ScrollBar', 'swipy'),
                        'subtitle' => esc_html__('You can show or hide ScrollBar', 'swipy'),
                        'default'  => false,
                    ), 


                    array(
                        'id'        => 'cursorcolor',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Cursor Color','swipy'),
                        'subtitle'  => esc_html__('Pick color', 'swipy'),    
                        'default'   => '#6722B5',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'rail_bg',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Rail Background','swipy'),
                        'subtitle'  => esc_html__('Enter Rail Background color', 'swipy'),    
                        'default'   => '#010101',                        
                        'validate'  => 'color',                        
                    ),  


                    array(
                        'id'       => 'cursor_width',                               
                        'title'    => esc_html__( 'Cursor Width', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Cursor Width', 'swipy' ),
                        'type'     => 'text',
                        'default'   => '14',                         
                    ),                         

                    array(
                        'id'       => 'cursorminheight',                               
                        'title'    => esc_html__( 'Cursor Min Height', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Cursor Min Height', 'swipy' ),
                        'type'     => 'text',
                        'default'  => '120',                         
                    ),                         

                    array(
                        'id'       => 'scrollspeed',                               
                        'title'    => esc_html__( 'Scroll Speed', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Scroll Speed', 'swipy' ),
                        'type'     => 'text',
                        'default'   => '60',                         
                    ),                         


                    array(
                        'id'       => 'mousescrollstep',                               
                        'title'    => esc_html__( 'Mouse Scroll Step', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter Mouse Scroll Step', 'swipy' ),
                        'type'     => 'text',
                        'default'   => '110',                         
                    ), 

                 
            ) 
        ) 
    );
    if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'swipy' ),    
        'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Shop', 'swipy' ),
        'id'               => 'shop_layout',
        'customizer_width' => '450px',
        'subsection' =>true,      
        'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'swipy' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'swipy'), 
                    'subtitle' => esc_html__('Select your shop layout', 'swipy'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                        'right-col' => array(
                            'alt'   => 'Shop Style 2', 
                            'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => 'Shop Style 3', 
                            'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'swipy' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'swipy' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'swipy' ),
                    'on'       => esc_html__( 'Enabled', 'swipy' ),
                    'off'      => esc_html__( 'Disabled', 'swipy' ),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'cart',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Icon Color (Normal)','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.menu-cart-area i'
                    ), 
                    'required' => array('wc_cart_icon','equals', true),                       
                ),

                array(
                    'id'        => 'carts',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Icon Color (Sticky)','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.header-inner.sticky .menu-cart-area i'
                    ), 
                    'required' => array('wc_cart_icon','equals', true),                       
                ), 

                array(
                    'id'       => 'cart_count',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Count Show', 'swipy' ),
                    'on'       => esc_html__( 'Enabled', 'swipy' ),
                    'off'      => esc_html__( 'Disabled', 'swipy' ),
                    'default'  => false,
                ),

                array(
                    'id'        => 'cart_count_colors_bg',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Count Bg Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'background-color'            => '.rsw-count'
                    ), 
                    'required' => array('cart_count','equals', true),                       
                ), 

                array(
                    'id'        => 'cart_count_colors',
                    'type'      => 'color',
                    'title'     => esc_html__('Cart Count Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',
                    'output' => array(                 
                        'color'            => '.rsw-count'
                    ), 
                    'required' => array('cart_count','equals', true),                       
                ), 

                array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'swipy'),                
                'default'  => true,
            ), 
               
            )
        ) 
    );
}
   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'swipy' ),
    'desc'   => esc_html__( 'Footer style here', 'swipy' ),
    'icon'   => 'el el-th-large',   
    'fields' => array(
                array(
                    'id'       => 'footer_bg_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Footer Background Image', 'swipy' ),                 
                    'type'     => 'media',                                  
                ),

                array(
                    'id'        => 'footer_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Bg Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'               => 'header_grid2',
                    'type'             => 'select',
                    'title'            => esc_html__('Footer Area Width', 'swipy'),             
                   
                    'options'          => array(                                     
                    
                        'container' => esc_html__('Container', 'swipy'),
                        'full'      => esc_html__('Container Fluid', 'swipy')
                    ),

                    'default'          => 'container',            
                ),

                array(
                    'id'       => 'footer_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Footer Logo', 'swipy' ),
                    'subtitle' => esc_html__( 'Upload your footer logo', 'swipy' ),                  
                ), 

             
                array(
                    'id'       => 'footer-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'swipy' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'swipy' ),
                    'type'     => 'text',
                    'default'  => '50px'                    
                ), 

                array(
                    'id'       => 'footer-top-border',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Footer Top Border', 'swipy'),
                    'subtitle' => esc_html__('You can select top bar show or hide', 'swipy'),
                    'default'  => false,
                ),

                array(
                    'id'        => 'foot_social_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),               
                   

                array(
                    'id'        => 'foot_social_hover',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Hover','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),   
 

                array(
                    'id'        => 'footer_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Font Size','swipy'),
                    'subtitle'  => esc_html__('Font Size', 'swipy'),    
                    'default'   => '',                                            
                ),  

                array(
                    'id'        => 'footer_h3_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Title Font Size','swipy'),
                    'subtitle'  => esc_html__('Font Size', 'swipy'),    
                    'default'   => '',                                            
                ),  

                array(
                    'id'        => 'footer_link_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Link Font Size','swipy'),
                    'subtitle'  => esc_html__('Font Size', 'swipy'),    
                    'default'   => '',                                            
                ), 
                array(
                    'id'        => 'footer_title_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Title Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),
  

                array(
                    'id'        => 'footer_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Text Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'footer_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Icon Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'footer_link_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Link Hover Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_input_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'footer_input_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Hover Background Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                        'id'        => 'footer_input_border_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer input Bg Color','swipy'),
                        'subtitle'  => esc_html__('Pick color.', 'swipy'),
                        'default'   => '',
                        'validate'  => 'color',                        
                    ),  

                array(
                    'id'        => 'footer_input_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Text Color','swipy'),
                    'subtitle'  => esc_html__('Pick color.', 'swipy'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),                  
                       
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Footer CopyRight', 'swipy' ),
                    'subtitle' => esc_html__( 'Change your footer copyright text ?', 'swipy' ),
                    'default'  => esc_html__( '2022 All Rights Reserved', 'swipy' ),
                ),  

                array(
                    'id'       => 'copyright_bg',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Copyright Background', 'swipy' ),
                    'subtitle' => esc_html__( 'Copyright Background Color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'background'            => 'body .footer-bottom'
                    )           
                ),

                array(
                    'id'       => 'copyright__border',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Copyright Border', 'swipy' ),
                    'subtitle' => esc_html__( 'Copyright Border Color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => 'body .footer-bottom .rows'
                    )           
                ),
         
                array(
                    'id'       => 'copyright_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Text Color', 'swipy' ),
                    'subtitle' => esc_html__( 'Copyright Text Color', 'swipy' ),      
                    'default'  => '',            
                ), 
            ) 
        ) 
    );        
    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'swipy' ),
    'desc'   => esc_html__( '404 details  here', 'swipy' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                        'id'       => 'title_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Title', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter title for 404 page', 'swipy' ), 
                        'default'  => esc_html__('404', 'swipy')                
                    ),  
                
                array(
                        'id'       => 'text_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Text', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter text for 404 page', 'swipy' ),  
                        'default'  => esc_html__('Page Not Found', 'swipy')             
                    ),                      
                       
                
                array(
                        'id'       => 'back_home',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Back to Home Button Label', 'swipy' ),
                        'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'swipy' ),
                        'default'  => esc_html__('Back to Homepage', 'swipy')  
                                    
                    ), 

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'swipy' ),
                    'subtitle' => esc_html__( 'Upload your image', 'swipy' ),
                    'url'=> true                
                ),                
                
                array(
                    'id'       => 'error_text',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Text Color', 'swipy' ),
                    'subtitle' => esc_html__( 'Text Color', 'swipy' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'color'            => '.page-error .content-area h2 span, .page-error .content-area h2'
                    )           
                ),
                
                array(
                    'id'       => 'errir_left',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Enable Text Left', 'swipy'),
                    'subtitle' => esc_html__('You can enable text left', 'swipy'),
                    'default'  => false,
                ),                  
            ) 
        ) 
    );   


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";           
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'swipy' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'swipy' ),
                'icon'   => 'el el-paper-clip',              
                'fields' => array()
            );
            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );              
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }