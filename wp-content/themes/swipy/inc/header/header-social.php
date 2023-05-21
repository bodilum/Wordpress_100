<?php
global $swipy_option;
$top_social = $swipy_option['show-social']; ?>
<div class="header-share">
	<ul class="clearfix">

	<?php 
		if($top_social == '1'){              
		if(!empty($swipy_option['facebook'])) { ?>
			<li> <a href="<?php echo esc_url($swipy_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
			<?php 
		}

		if(!empty($swipy_option['twitter'])) { ?>
			<li> <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
			<?php
		}

		if(!empty($swipy_option['rss'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
		<?php
		}

		if (!empty($swipy_option['pinterest'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
		<?php }

		if (!empty($swipy_option['linkedin'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
		<?php }

		if (!empty($swipy_option['google'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
		<?php }

		if (!empty($swipy_option['instagram'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
		<?php }

		if(!empty($swipy_option['vimeo'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
		<?php }

		if (!empty($swipy_option['tumblr'])) { ?>
			<li> <a href="<?php  echo esc_url($swipy_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
		<?php }

		if (!empty($swipy_option['youtube'])) { ?>
		<li> <a href="<?php  echo esc_url($swipy_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
		<?php } 
	} ?>
	</ul>
</div>