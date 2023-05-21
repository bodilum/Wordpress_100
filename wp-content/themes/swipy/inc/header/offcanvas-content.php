<?php 

global $swipy_option;
if(!empty($swipy_option['facebook']) || !empty($swipy_option['twitter']) || !empty($swipy_option['rss']) || !empty($swipy_option['pinterest']) || !empty($swipy_option['google']) || !empty($swipy_option['instagram']) || !empty($swipy_option['vimeo']) || !empty($swipy_option['tumblr']) ||  !empty($swipy_option['youtube'])){
?>

    <ul class="offcanvas_social">            
        <?php if(!empty($swipy_option['facebook'])) { ?>
        <li> <a href="<?php echo esc_url($swipy_option['facebook']);?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
        <?php } ?>
        <?php if(!empty($swipy_option['twitter'])) { ?>
        <li> <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
        <?php } ?>
        <?php if(!empty($swipy_option['rss'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"> <i class="fas fa-rss"></i> </a> </li>
        <?php } ?>
        <?php if (!empty($swipy_option['pinterest'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"> <i class="fab fa-pinterest-p"></i> </a> </li>
        <?php } ?>
        <?php if (!empty($swipy_option['linkedin'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"> <i class="fab fa-linkedin-in"></i> </a> </li>
        <?php } ?>
        <?php if (!empty($swipy_option['instagram'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['instagram']);?> " target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
        <?php } ?>
        <?php if(!empty($swipy_option['vimeo'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['vimeo']);?> " target="_blank"> <i class="fab fa-vimeo-v"></i> </a> </li>
        <?php } ?>
        <?php if (!empty($swipy_option['tumblr'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['tumblr']);?> " target="_blank"> <i class="fab fa-tumblr"></i> </a> </li>
        <?php } ?>
        <?php if (!empty($swipy_option['youtube'])) { ?>
        <li> <a href="<?php  echo esc_url($swipy_option['youtube']);?> " target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
        <?php } ?>
        
    </ul>
<?php }

