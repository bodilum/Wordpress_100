<?php
/*
     Footer Social
*/
     global $swipy_option;
?>
<?php 
      if(!empty($swipy_option['show-social2'])){
            $footer_social = $swipy_option['show-social2'];
            if($footer_social == 1){?>
                  <ul class="footer_social">  
                        <?php
                         if(!empty($swipy_option['facebook'])) { ?>
                         <li> 
                              <a href="<?php echo esc_url($swipy_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                         </li>
                        <?php } ?>
                        <?php if(!empty($swipy_option['twitter'])) { ?>
                        <li> 
                              <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($swipy_option['rss'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['pinterest'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['linkedin'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['google'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['google']);?> " target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['instagram'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($swipy_option['vimeo'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['tumblr'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($swipy_option['youtube'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($swipy_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
                        </li>
                        <?php } ?>     
                  </ul>
       <?php } 
}?>
