<?php
  global $swipy_option;
  $header_trans = '';
    if(!empty($swipy_option['header_layout'])){  
               
        $header_style = $swipy_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }
    $text_alignment = !empty($swipy_option['text_alignment']) ? $swipy_option['text_alignment'] : '';

?>

<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($header_trans);?> <?php echo esc_attr($text_alignment); ?>">
  <?php
  if(!empty($swipy_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($swipy_option['blog_banner_main']['url']);?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumbs-inner">
               <?php
                 the_archive_title( '<h1 class="page-title">', '</h1>' );
              ?>
              
             <?php 
                if(!empty($swipy_option['off_breadcrumb'])){
                    if(function_exists('bcn_display')){?>
                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                    <?php } 
                }
            ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }
  else{   
  ?>
  <div class="rs-breadcrumbs-inner">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumbs-inner">
         <?php
                 the_archive_title( '<h1 class="page-title">', '</h1>' );
              ?>
             <?php 
                if(!empty($swipy_option['off_breadcrumb'])){
                    if(function_exists('bcn_display')){?>
                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                    <?php }
                }
            ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>