<?php
get_header('404');
global $swipy_option;
$error_bg = !empty($swipy_option['error_bg']['url']) ? 'style="background:url('.$swipy_option['error_bg']['url'].')"': '';
$error_left = !empty($swipy_option['errir_left']) ? 'enable__text_left' : 'disable__text_left';
?>

<div class="page-error <?php if($swipy_option){ echo esc_attr('not-found-bg');}?> <?php echo wp_kses_post( $error_left ); ?>" <?php echo wp_kses_post( $error_bg ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <h2>
                                <span>
                                    
                                    <?php
                                        if(!empty($swipy_option['title_404'])){
                                            echo esc_html($swipy_option['title_404']);
                                        }
                                        else{
                                            echo esc_html__( '404', 'swipy' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($swipy_option['text_404'])){
                                      echo esc_html($swipy_option['text_404']);
                                 }
                                 else{
                                  echo esc_html__( 'Opps! the page you requested was not found.', 'swipy' ); }
                                 ?>
                            </h2>
                            <a class="readon" href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                 if(!empty($swipy_option['back_home'])){
                                     echo esc_html($swipy_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('Or back to homepage', 'swipy'); 
                                  }
                                ?>
                            </a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
get_footer('404');