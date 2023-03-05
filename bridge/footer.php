<?php
	$bridge_qode_options = bridge_qode_return_global_options();
	$bridge_qode_page_id = bridge_qode_get_page_id();

	$logo1_svg = '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 521.8 464.04"><g id="a"/><g id="b"><g id="c"><g class="d"><g><path d="M410.99,352.75l-.3,.12c-.06,.03-.1,.05-.1,.05V111.13s.04,.02,.1,.05l.3,.12s35.95,14.74,52.61,21.92l-10-43.37c-33.92-16.56-76.27-37.23-76.27-37.23V411.42s42.35-20.67,76.27-37.23l10.01-43.38c-16.66,7.18-52.62,21.93-52.62,21.93m110.8-194.58c0-20.49-12.96-41.34-28.76-49.07-5.39-2.63-20.6-10.06-38.3-18.7l28.51,55.97,.02,.02s.06,.08,.09,.12c.17,.23,.33,.45,.49,.68,.19,.27,.38,.54,.53,.8,0,0,0,0,0,0,.32,.52,.61,1.04,.87,1.55,0,0,0,.02,0,.03,.26,.51,.48,1.02,.68,1.53,.19,.52,.37,1.03,.5,1.53,.07,.25,.14,.5,.19,.74,.05,.19,.1,.39,.13,.59,.02,.09,.04,.17,.06,.26,.02,.09,.04,.17,.06,.26,.03,.17,.05,.35,.08,.52,.03,.17,.05,.35,.06,.51,.03,.24,.06,.47,.07,.69,.04,.4,.07,.79,.08,1.18,0,.21,.02,.41,.02,.62,0,.28,0,.56,0,.82v43.08l-36.27,20.95,36.27,20.94v61.37c0,.26,0,.54,0,.82,0,.2,0,.41-.02,.62-.02,.39-.04,.78-.08,1.18-.02,.23-.05,.45-.07,.69-.02,.16-.04,.34-.06,.51-.03,.17-.06,.35-.08,.52-.04,.17-.07,.36-.11,.53-.03,.19-.08,.39-.13,.59-.05,.25-.12,.49-.19,.74-.13,.5-.31,1.01-.5,1.52-.1,.26-.21,.52-.32,.77-.11,.26-.23,.51-.37,.77,0,0,0,.02,0,.03-.26,.51-.55,1.03-.87,1.55-.16,.26-.35,.54-.54,.81-.15,.23-.32,.44-.49,.67-.03,.04-.06,.08-.09,.12l-.02,.02-23.76,46.64-4.75,9.33c17.69-8.64,32.9-16.07,38.3-18.71,15.79-7.73,28.76-28.57,28.76-49.07v-65.79l-20.76-17.19,20.76-17.2v-47.52Z"/><polygon points="368.78 48.47 368.78 150.97 320.95 150.97 320.95 91.9 283.26 76.92 319.89 24.61 368.78 48.47"/><polygon points="368.78 313.07 368.78 415.58 319.9 439.44 283.26 387.11 320.95 372.14 320.95 313.07 368.78 313.07"/><path d="M319.03,439.86l2.42,1.89-33.35,16.28c-5.53,2.7-11.34,4.49-17.25,5.36-2.85,.43-5.72,.64-8.59,.64s-5.74-.21-8.59-.64c-5.89-.88-11.71-2.67-17.24-5.36l-80.67-39.38V45.4L236.44,6.01c5.54-2.71,11.36-4.51,17.27-5.37,5.68-.85,11.45-.85,17.13,0,5.91,.88,11.73,2.68,17.27,5.38l33.35,16.28-2.42,1.89h0l-56.89,44.46h-.02l-58.52,23.26V372.14l58.52,23.25h.02l.02,.02,56.89,44.46Z"/><path d="M70.94,89.85l-10.01,43.38c7.08-2.98,39.51-16.53,39.84-16.66,7.31-3.01,13.19,1.26,13.19,9.66v211.61c0,8.4-5.88,12.67-13.19,9.66-.33-.14-32.76-13.69-39.84-16.66l10.01,43.36,76.27,37.24V52.61l-76.27,37.24Zm-29.67,227.8c-.35-.46-.68-.91-.96-1.37-.08-.12-.14-.23-.21-.34-.1-.13-.17-.26-.24-.39-.03-.04-.05-.09-.07-.13-.07-.1-.12-.19-.16-.29-.7-1.28-1.2-2.53-1.54-3.73-.07-.25-.14-.5-.19-.74-.05-.16-.08-.33-.11-.48-.05-.28-.11-.57-.15-.84-.05-.28-.1-.56-.12-.82-.03-.24-.05-.47-.07-.69-.04-.4-.07-.8-.08-1.18-.02-.49-.03-.98-.03-1.44V158.85c0-.46,0-.95,.03-1.44,.01-.39,.04-.78,.08-1.18,.02-.23,.05-.45,.07-.69,.03-.27,.08-.54,.12-.82,.04-.27,.1-.56,.15-.84,.03-.15,.07-.32,.11-.48,.05-.25,.12-.49,.19-.74,.08-.26,.15-.53,.25-.8,.08-.23,.16-.46,.26-.7,.1-.27,.21-.55,.34-.82,.1-.23,.21-.45,.32-.69,.12-.23,.24-.46,.38-.71,.05-.09,.1-.18,.16-.28,.02-.05,.04-.09,.07-.13,.07-.13,.14-.26,.24-.39,.05-.11,.13-.22,.21-.33,.28-.46,.61-.91,.96-1.38l.02-.02,28.5-55.96-35.53,17.35c-19.28,9.41-31.52,28.99-31.52,50.45v147.62c0,21.46,12.24,41.04,31.52,50.45l35.53,17.35-28.5-55.95-.02-.02Z"/><path d="M71.86,86.36l-2.07,4.04h0l-28.5,55.97-.02,.02c-.36,.47-.68,.92-.96,1.38-.08,.11-.15,.22-.21,.33-.1,.13-.17,.26-.24,.39-.03,.05-.05,.09-.07,.13-.07,.1-.12,.19-.16,.28-.14,.25-.26,.48-.38,.71-.11,.24-.22,.46-.32,.69-.13,.27-.24,.55-.34,.82-.09,.24-.17,.47-.26,.7-.09,.27-.17,.54-.25,.81-.07,.25-.14,.49-.19,.74-.05,.16-.08,.33-.11,.48-.07,.28-.12,.57-.15,.84-.05,.28-.1,.55-.12,.82-.03,.24-.05,.46-.07,.69-.04,.4-.06,.8-.08,1.18-.02,.49-.03,.98-.03,1.44v93.76H0v-94.39c0-6.04,.95-11.98,2.74-17.61,1.7-5.37,4.16-10.47,7.27-15.13,.69-1.02,1.42-2.04,2.17-3.02,.76-1,4.04-4.77,4.91-5.65,.45-.45,2.43-2.33,2.99-2.82,.55-.49,2.83-2.36,3.42-2.81,2.96-2.24,6.16-4.21,9.56-5.87l38.81-18.94Z"/><path d="M71.86,377.69l-38.81-18.94c-3.4-1.67-6.59-3.64-9.56-5.87-.59-.45-2.87-2.32-3.42-2.81-.56-.49-2.54-2.38-2.99-2.82-.87-.89-4.15-4.65-4.91-5.65-.75-.99-1.47-2-2.17-3.02-3.11-4.66-5.57-9.76-7.27-15.13-1.79-5.63-2.74-11.57-2.74-17.61v-74.08H37.33v73.45c0,.46,0,.95,.03,1.44,.02,.39,.04,.78,.08,1.18,.02,.23,.05,.45,.07,.69,.03,.27,.08,.54,.12,.82,.03,.27,.09,.56,.15,.84,.03,.15,.06,.32,.11,.48,.05,.25,.12,.49,.19,.74,.34,1.21,.83,2.45,1.54,3.74,.05,.09,.1,.18,.16,.29,.02,.05,.05,.09,.07,.13,.07,.13,.14,.26,.24,.39,.06,.11,.13,.22,.21,.34,.28,.45,.61,.91,.96,1.37l.02,.02,28.5,55.95,2.07,4.06Z"/></g></g></g></g></svg>';
	$arrow1_svg = '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.58 51.65"><g id="a"/><g id="b"><g id="c"><path class="d" d="M42.46,14.95c-4.41,4.41-8.83,8.83-13.24,13.24-6.75,6.75-13.5,13.5-20.25,20.25-2.15,2.15-4.44,4.89-7.54,1.89-3.09-2.99-.53-5.38,1.65-7.56,10.13-10.12,20.25-20.25,30.37-30.37,1.05-1.05,2.11-2.11,4-4-2.45-.11-3.95-.21-5.45-.22-4.23-.03-8.45,.01-12.68-.04-2.52-.03-4.28-1.23-4.39-3.86C14.83,1.66,16.42,.08,18.95,.06,29.69-.04,40.43,.01,51.5,.01c.03,11.27,.2,22.14-.09,33-.03,1.26-2.44,3.25-3.98,3.51-2.53,.43-3.94-1.61-3.92-4.14,.04-5.69,.24-11.38,.38-17.08l-1.42-.36Z"/></g></g></svg>';

?>
<?php 
$bridge_qode_content_bottom_area = "yes";
if(get_post_meta($bridge_qode_page_id, "qode_enable_content_bottom_area", true) != ""){
	$bridge_qode_content_bottom_area = get_post_meta($bridge_qode_page_id, "qode_enable_content_bottom_area", true);
} else{
	if (isset($bridge_qode_options['enable_content_bottom_area'])) {
		$bridge_qode_content_bottom_area = $bridge_qode_options['enable_content_bottom_area'];
	}
}
$bridge_qode_content_bottom_area_sidebar = ""; 
if(get_post_meta($bridge_qode_page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
	$bridge_qode_content_bottom_area_sidebar = get_post_meta($bridge_qode_page_id, 'qode_choose_content_bottom_sidebar', true);
} else {
	if(isset($bridge_qode_options['content_bottom_sidebar_custom_display'])) {
		$bridge_qode_content_bottom_area_sidebar = $bridge_qode_options['content_bottom_sidebar_custom_display'];
	}
}
$bridge_qode_content_bottom_area_in_grid = true;
if(get_post_meta($bridge_qode_page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
	if(get_post_meta($bridge_qode_page_id, 'qode_content_bottom_sidebar_in_grid', true) == "yes") {
		$bridge_qode_content_bottom_area_in_grid = true;
	} else {
		$bridge_qode_content_bottom_area_in_grid = false;
	} 
}
else {
	if(isset($bridge_qode_options['content_bottom_in_grid'])){if ($bridge_qode_options['content_bottom_in_grid'] == "no") $bridge_qode_content_bottom_area_in_grid = false;}
}
$bridge_qode_content_bottom_background_color = '';
if(get_post_meta($bridge_qode_page_id, "qode_content_bottom_background_color", true) != ""){
	$bridge_qode_content_bottom_background_color = get_post_meta($bridge_qode_page_id, "qode_content_bottom_background_color", true);
}
?>
	<?php if($bridge_qode_content_bottom_area == "yes") { ?>
	<?php if($bridge_qode_content_bottom_area_in_grid){ ?>
		<div class="container">
			<div class="container_inner clearfix">
	<?php } ?>
		<div class="content_bottom" <?php if($bridge_qode_content_bottom_background_color != ''){ echo 'style="background-color:'.$bridge_qode_content_bottom_background_color.';"'; } ?>>
			<?php dynamic_sidebar($bridge_qode_content_bottom_area_sidebar); ?>
		</div>
		<?php if($bridge_qode_content_bottom_area_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	<?php } ?>
	
	</div>
</div>

<?php
if(isset($bridge_qode_options['paspartu']) && $bridge_qode_options['paspartu'] == 'yes'){?>
        <?php if(isset($bridge_qode_options['vertical_area']) && $bridge_qode_options['vertical_area'] == "yes" && isset($bridge_qode_options['vertical_menu_inside_paspartu']) && $bridge_qode_options['vertical_menu_inside_paspartu'] == 'no') { ?>
        </div> <!-- paspartu_middle_inner close div -->
        <?php } ?>
    </div> <!-- paspartu_inner close div -->
    <?php if((isset($bridge_qode_options['paspartu_on_bottom']) && $bridge_qode_options['paspartu_on_bottom'] == 'yes') ||
        (isset($bridge_qode_options['vertical_area']) && $bridge_qode_options['vertical_area'] == "yes" && isset($bridge_qode_options['vertical_menu_inside_paspartu']) && $bridge_qode_options['vertical_menu_inside_paspartu'] == 'yes')){ ?>
        <div class="paspartu_bottom"></div>
    <?php }?>
    </div> <!-- paspartu_outer close div -->
<?php
}
?>

<?php

$bridge_qode_footer_classes_array = array();
$bridge_qode_footer_classes = '';

$bridge_qode_paspartu = false;
if(isset($bridge_qode_options['paspartu']) && $bridge_qode_options['paspartu'] == 'yes'){
    $bridge_qode_paspartu = true;
}

if(isset($bridge_qode_options['paspartu']) && $bridge_qode_options['paspartu'] == 'yes' && isset($bridge_qode_options['paspartu_footer_alignment']) && $bridge_qode_options['paspartu_footer_alignment'] == 'yes'){
    $bridge_qode_footer_classes_array[]= 'paspartu_footer_alignment';
}

if(isset($bridge_qode_options['uncovering_footer']) && $bridge_qode_options['uncovering_footer'] == "yes" && $bridge_qode_paspartu == false){
    $bridge_qode_footer_classes_array[] = 'uncover';
}

$bridge_qode_display_footer_top = true;

/*$footer_top_per_page_option = get_post_meta($bridge_qode_page_id, "footer_top_per_page", true);
if(!empty($footer_top_per_page_option)){
	$footer_top_per_page = $footer_top_per_page_option;
}


if (isset($bridge_qode_options['show_footer_top'])) {
	if ($bridge_qode_options['show_footer_top'] == "no" && $footer_top_per_page_option == 'no') $bridge_qode_display_footer_top = false;
}*/

$bridge_qode_display_footer_text = true;

/*if (isset($bridge_qode_options['footer_text'])) {
	if ($bridge_qode_options['footer_text'] == "yes") $bridge_qode_display_footer_text = true;
}*/

//is some class added to footer classes array?
if(is_array($bridge_qode_footer_classes_array) && count($bridge_qode_footer_classes_array)) {
    //concat all classes and prefix it with class attribute
    $bridge_qode_footer_classes = esc_attr(implode(' ', $bridge_qode_footer_classes_array));
}

?>



<?php if($bridge_qode_display_footer_top || $bridge_qode_display_footer_text) { ?>
	<footer <?php echo bridge_qode_get_inline_attr($bridge_qode_footer_classes, 'class'); ?>>
		<div class="footer_inner clearfix">
		<?php
		$bridge_qode_footer_in_grid = true;
		if(isset($bridge_qode_options['footer_in_grid'])){
			if ($bridge_qode_options['footer_in_grid'] != "yes") {
				$bridge_qode_footer_in_grid = false;
			}
		}

		
		$bridge_qode_footer_top_columns = 4;
		if (isset($bridge_qode_options['footer_top_columns'])) {
			$bridge_qode_footer_top_columns = $bridge_qode_options['footer_top_columns'];
		}

        $bridge_qode_footer_top_border_color = !empty($bridge_qode_options['footer_top_border_color']) ? $bridge_qode_options['footer_top_border_color'] : '';
        $bridge_qode_footer_top_border_width = isset($bridge_qode_options['footer_top_border_width']) && $bridge_qode_options['footer_top_border_width'] !== '' ? $bridge_qode_options['footer_top_border_width'].'px' : '1px';
        $bridge_qode_footer_top_border_in_grid = 'no';
        $bridge_qode_footer_top_border_in_grid_class = '';

        if(isset($bridge_qode_options['footer_top_border_in_grid'])) {
            $bridge_qode_footer_top_border_in_grid = $bridge_qode_options['footer_top_border_in_grid'];
            $bridge_qode_footer_top_border_in_grid_class = $bridge_qode_footer_top_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $bridge_qode_footer_top_border_style = array();
        if($bridge_qode_footer_top_border_color !== '') {
            $bridge_qode_footer_top_border_style[] = 'background-color: '.$bridge_qode_footer_top_border_color;
        }

        if($bridge_qode_footer_top_border_width !== '') {
            $bridge_qode_footer_top_border_style[] = 'height: '.$bridge_qode_footer_top_border_width;
        }

		if($bridge_qode_display_footer_top) { ?>
		<div class="footer_top_holder">
            <?php if($bridge_qode_footer_top_border_color !== '') { ?>
                <div <?php bridge_qode_inline_style($bridge_qode_footer_top_border_style); ?> <?php bridge_qode_class_attribute('footer_top_border '.$bridge_qode_footer_top_border_in_grid_class); ?>></div>
            <?php } ?>
			<div class="footer_top<?php if(!$bridge_qode_footer_in_grid) {echo " footer_top_full";} ?>">
				<?php if($bridge_qode_footer_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
						<?php switch ($bridge_qode_footer_top_columns) { 
							case 6:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_1' ); ?>
										</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
											<div class="column2 footer_col3">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_3' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 5:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="column2 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="column2 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 4:
						?>
							<div class="four_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4 footer_col4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 3:
						?>
							<div class="three_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 2:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 1:
								dynamic_sidebar( 'footer_column_1' );
							break;
						}
						?>
				<?php if($bridge_qode_footer_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if (isset($bridge_qode_options['footer_angled_section'])  && $bridge_qode_options['footer_angled_section'] == "yes"){ ?>
				<svg class="angled-section svg-footer-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
					<?php if(isset($bridge_qode_options['footer_angled_section_direction']) && $bridge_qode_options['footer_angled_section_direction'] == 'from_left_to_right'){ ?>
						<polygon points="0,0 0,86 86,86" />
					<?php }
					if(isset($bridge_qode_options['footer_angled_section_direction']) && $bridge_qode_options['footer_angled_section_direction'] == 'from_right_to_left'){ ?>
						<polygon points="0,86 86,0 86,86" />
					<?php } ?>
				</svg>
			<?php } ?>
		</div>
		<?php } ?>
		<?php


		$bridge_qode_footer_bottom_columns = 1;
		if (isset($bridge_qode_options['footer_bottom_columns'])) {
			$bridge_qode_footer_bottom_columns = $bridge_qode_options['footer_bottom_columns'];
		}

		$bridge_qode_footer_bottom_in_grid = false;
		if(isset($bridge_qode_options['footer_bottom_in_grid'])){
			if ($bridge_qode_options['footer_bottom_in_grid'] == "yes") {
				$bridge_qode_footer_bottom_in_grid = true;
			}
		}

        $bridge_qode_footer_bottom_border_color = !empty($bridge_qode_options['footer_bottom_border_color']) ? $bridge_qode_options['footer_bottom_border_color'] : '';
        $bridge_qode_footer_bottom_border_width = isset($bridge_qode_options['footer_bottom_border_width']) && $bridge_qode_options['footer_bottom_border_width'] !== '' ? $bridge_qode_options['footer_bottom_border_width'].'px' : '1px';
        $bridge_qode_footer_bottom_border_in_grid = 'no';
        $bridge_qode_footer_bottom_border_in_grid_class = '';

        if(isset($bridge_qode_options['footer_bottom_border_in_grid'])) {
            $bridge_qode_footer_bottom_border_in_grid = $bridge_qode_options['footer_bottom_border_in_grid'];
            $bridge_qode_footer_bottom_border_in_grid_class = $bridge_qode_footer_bottom_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $bridge_qode_footer_bottom_border_style = array();
        if($bridge_qode_footer_bottom_border_color !== '') {
            $bridge_qode_footer_bottom_border_style[] = 'background-color: '.$bridge_qode_footer_bottom_border_color;
        }

        if($bridge_qode_footer_bottom_border_width !== '') {
            $bridge_qode_footer_bottom_border_style[] = 'height: '.$bridge_qode_footer_bottom_border_width;
        }

		if($bridge_qode_display_footer_text){ ?>
			<div class="footer_bottom_holder">
                <?php if($bridge_qode_footer_bottom_border_color !== '') { ?>
                    <div <?php bridge_qode_inline_style($bridge_qode_footer_bottom_border_style); ?> <?php bridge_qode_class_attribute('footer_bottom_border '.$bridge_qode_footer_bottom_border_in_grid_class); ?>></div>
                <?php } ?>
				<?php if($bridge_qode_footer_bottom_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
		<?php
			switch ($bridge_qode_footer_bottom_columns) {
			case 1:
			?>
			<div class="footer_bottom">
				<?php dynamic_sidebar( 'footer_text' ); ?>
			</div>
		<?php
			break;
			case 2:
		?>
				<div class="two_columns_50_50 footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			break;
			case 3:
		?>
				<div class="three_columns footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
					</div>
					<div class="column3 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
		<?php
			break;
			default:
		?>
				<div class="footer_bottom">
					<?php dynamic_sidebar( 'footer_text' ); ?>
				</div>
		<?php break; ?>
		<?php } ?>
			<?php if($bridge_qode_footer_bottom_in_grid) { ?>
				</div>
			</div>
			<?php } ?>
			</div>
		<?php } ?>
		</div>
	</footer>
	<?php } ?>
	
</div>
</div>

</main>
</div>



<!-- FOOTER MENU START -->

<?php 
global $post;
$post_id = $post->ID;
$post_slug = $post->post_name;
$leftBottomTxt1 = get_field('left_bottom_corner_txt1', $post_id);
$leftBottomTxt2 = get_field('left_bottom_corner_txt2', $post_id);

$email = trim(get_field('ocb_sa_email', $post_id));
$canShowEmail = (($email != '') && filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;

$linkedin = trim(get_field('ocb_sa_linkedin', $post_id));
$canShowLinkedin = (($linkedin != '') && preg_match("/https?:\/\/(www.)?linkedin.com(\/in(\/\w+))?/i", $linkedin)) ? true : false;
	
$instagram = get_field('ocb_sa_instagram', $post_id);
$canShowInstagram = (($instagram != '') && preg_match("/https?:\/\/(www.)?instagram.com(\/\w+)?/i", $instagram)) ? true : false;

$vimeo = get_field('ocb_sa_vimeo', $post_id);
$canShowVimeo = (($vimeo != '') && preg_match("/https?:\/\/(www.)?vimeo.com(\/\w+)?/i", $vimeo)) ? true : false;

$facebook = get_field('ocb_sa_facebook', $post_id);
$canShowFacebook = (($facebook != '') && preg_match("/https?:\/\/(www.)?facebook.com(\/\w+)?/i", $facebook)) ? true : false;
?>
<div id="mainFooter">
    <div class="_null1">
        <div class="_left1">
			<a href="/ocb/contact" class="_arrowLink1"><?php echo $leftBottomTxt1;  ?>  <b><?php echo $leftBottomTxt2; ?></b><span class="_arrow1"><?php echo $arrow1_svg; ?> </span></a>
		</div>
        <div class="_center1"></div>
        <div class="_right1">
			<?php if($canShowEmail) { ?>
			<a class="_arrowLink1" href="mailto:<?php echo $email; ?>?subject=Hi OCB!">
				<span class="_arrow1"><?php echo $arrow1_svg; ?> </span>
				Email
			</a>
			
			<?php } 
				if($canShowLinkedin) {
			?>
			
			<a class="_arrowLink1" href="<?php echo $linkedin; ?>" target="_blank">
				<span class="_arrow1"><?php echo $arrow1_svg; ?> </span>
				Linkedin
			</a>
			
			<?php } 
				if($canShowInstagram) {
			?>
			
			<a class="_arrowLink1" href="<?php echo $instagram; ?>" target="_blank">
				<span class="_arrow1"><?php echo $arrow1_svg; ?> </span>
				Instagram
			</a>
			
			<?php } 
				if($canShowVimeo) {
			?>
			
			<a class="_arrowLink1" href="<?php echo $vimeo; ?>" target="_blank">
				<span class="_arrow1"><?php echo $arrow1_svg; ?> </span>
				Vimeo
			</a>
			
			<?php } ?>
			
		</div>
    </div>
</div>
	
<!-- FOOTER MENU END -->



<?php wp_footer(); ?>
</body>
</html>