<?php if ( class_exists( 'WooCommerce' ) ) {
	global $swipy_option;
	?>
	<div class="menu-cart-area">
		<a href="<?php echo esc_url( wc_get_cart_url() );?>"><i class="fa fa-shopping-bag"></i>
			<?php if(!empty($swipy_option['cart_count'])) { ?>
				<em class="rsw-count"><?php echo WC()->cart->get_cart_contents_count();?></em>
			<?php } ?>
		</a>
		<div class="cart-icon-total-products">
			<?php the_widget( 'WC_Widget_Cart' ); ?>
		</div>
	</div>
<?php } ?>