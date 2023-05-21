<?php
	global $current_user;
?>

<div id="reset_all_tab_content" class="DBR_tabcontent">

	<div class="DBR-box-warning">
		<span class="dashicons dashicons-warning DBR-dashicons-warning" style="color:red"></span>
		<span style="color:red"><strong><?php _e('WARNING','advanced-wp-reset'); ?></strong></span>
		<ul style="list-style:disc;margin-left:20px;line-height:16px">
			<li><?php _e('The reset makes a fresh installation of your database. Therefore, ANY data in your database will be lost.','advanced-wp-reset'); ?></li>
			<li><?php _e('Please do not use this option if you want to keep your users, posts, pages, etc.','advanced-wp-reset'); ?></li>
		</ul>
	</div>

	<div class="DBR-box-info">
		<span class="dashicons dashicons-info DBR-dashicons-info" style="color:#0073AA"></span>
		<span><strong><?php _e('What will be done','advanced-wp-reset'); ?></strong></span>
		<ul style="list-style:disc;margin-left:20px">
			<li><?php _e('All the database data including users, posts, pages, options, etc. will be deleted.','advanced-wp-reset'); ?></li>
			<li><?php printf( __( 'The current user [<b>%s</b>] will be recreated with its current password. This will be the unique user in the database after the reset.', 'advanced-wp-reset' ), esc_html( $current_user->user_login ) ); ?></li>
			<li><?php _e('The reset does not delete or modify any of your plugins/themes files or server files.','advanced-wp-reset'); ?></li>
			<li><?php _e('All your plugins will be deactivated except this one. You should activate them manually after the reset.','advanced-wp-reset'); ?></li>
		</ul>
	</div>

	<h3 style="padding-top: 10px"><?php _e('Reset database','advanced-wp-reset'); ?></h3>

	<p>
		<?php
		printf(__('Please type "<b>%s</b>" in the confirmation field below to confirm the reset and then click the reset button.','advanced-wp-reset'), "reset" );
		?>
	</p>

	<form id="DBR_form" action="" method="post">
		<input id="DBR_reset_comfirmation" type="text" name="DBR_reset_comfirmation" value="" style="width:300px"/>
		<p class="submit">
			<input id="DBR_reset_button" name="DBR_reset_button" type="submit" class="button-primary DBR-button-reset" value="<?php _e("Reset database","advanced-wp-reset"); ?>"/>
		</p>
	</form>

</div>
