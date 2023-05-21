<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.  
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			


$homePostID = 2;

 ////////////////////// GET HOME PAGE SUBSCRIBE SECTION VALUES //////////////////////
// edit_home_subscribe_section
$subscribe = get_field('edit_home_subscribe_section', $homePostID);
$sub_heading = $subscribe["heading"];
$sub_description = $subscribe["description"];
$sub_more_text = $subscribe["more_text"];
////////////////////// GET HOME PAGE SUBSCRIBE SECTION VALUES //////////////////////

////////////////////// GET HOME PAGE FOOTER SECTION VALUES //////////////////////
// edit_home_footer_section
$footer = get_field('edit_home_footer_section', $homePostID);

$footer_img = $footer['footer_logo'];
$footer_about_text = $footer['footer_about_text'];
$footer_socials = $footer['footer_socials'];
$social_links = '';
foreach($footer_socials as $link) {
	$social_links .= '<a href="' . $link['social_account_url'] . '">' . $link['social_account_item'] . '</a>';
}
////////////////////// GET HOME PAGE FOOTER SECTION VALUES //////////////////////



 ?>
					
				<!-- <footer class="footer" role="contentinfo">
					
					<div class="inner-footer grid-x grid-margin-x grid-padding-x">
						
						<div class="small-12 medium-12 large-12 cell">
							<nav role="navigation">
	    						<?php joints_footer_links(); ?>
	    					</nav>
	    				</div>				
					
					</div> 
				
				</footer>  -->
				<!-- end .footer -->


<div class="pgSection subscribe" id="vigorSubscription">
	<div class="section_grp">
		<div class="div1">
		<span><?php echo $sub_heading; ?></span>		
		</div>
		<div class="div2">
		<span><?php echo $sub_description; ?></span>
		</div>
		<div class="div3">
		<?php echo do_shortcode('[wpforms id="168"]'); ?>
		</div>
		<div class="div4">
		<span><?php echo $sub_more_text; ?></span>
		</div>
	</div>
</div><!-- end of pgSection -->


<div class="pgFooter">
	<div class="section_grp">
		<div class="div1">
		<a href="<?php home_url('/'); ?>"><img loading="lazy" src="<?php echo $footer_img; ?>" /></a>		
		</div>
		<div class="div2">
			<div class="title">About</div>
			<div class="txt"><?php echo $footer_about_text; ?></div>
		</div>
		<div class="div3">
			<div class="title">Sitemap</div>
			<div class="txt">
				<a href="<?php home_url( '/about' ); ?>">About</a>
				<a href="<?php home_url( '/programs' ); ?>">Programs</a>
				<a href="<?php home_url( '/careers' ); ?>">Careers</a>
				<a href="<?php home_url( '/contact' ); ?>">Contact</a>
				<a href="<?php home_url( '/store' ); ?>">Store</a>
			</div>
		</div>
		<div class="div4">
			<div class="title">Social</div>
			<div class="txt"><?php echo $social_links; ?></div>		
		</div>
	</div>
</div><!-- end of pgSection -->

				</main>




			</div><!-- end of data-scroll-container -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->