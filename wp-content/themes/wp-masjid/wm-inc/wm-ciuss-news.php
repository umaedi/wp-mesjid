<?php
 
    function wpc_dashboard_widgets() {
    	global $wp_meta_boxes;
	    unset(
		    $wp_meta_boxes['dashboard']['side']['core']['dashboard_plugins'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
		);
	    add_meta_box( 'id', 'Ciuss News', 'dashboard_custom_feed_output', 'dashboard', 'normal', 'high' );
	}
			
	function dashboard_custom_feed_output() {
		$wm = wp_get_theme();
		?>
		
		<div class="feed_widget">
		    <div class="top_feed">
			    <a target="_blank" href="<?php echo esc_url( 'https://ciuss.com/news' ); ?>"><img class="rss-image" src="<?php echo esc_url( 'https://ciuss.com/ciuss-news' ); ?>" /></a>
			</div>
			<div class="bot_feed div__clear">
			    <span><?php echo esc_html( $wm->get( 'Name' ) ) . ' versi ' .esc_html( $wm->get( 'Version' ) ); ?></span>
				<a href="https://ciuss.com/kategori/wp-masjid/" target="_blank" class="button button-primary"><?php echo __( 'Support', 'masjid' ); ?></a>
			</div>
			
			<?php
				wp_widget_rss_output(array(
			        'url' => esc_url( 'https://ciuss.com/feed' ),
			        'items' => 3,
			        'show_summary' => 0,
			        'show_author' => 0,
			        'show_date' => 1
				));
			    $current_user = wp_get_current_user();
            ?>
			
		</div> 
		
		<?php
	}
		
	add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');