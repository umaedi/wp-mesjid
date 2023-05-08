<?php
class Galeri_Video extends WP_Widget {
	function __construct() {
		parent::__construct(
			'galeri_video',
			esc_html__( 'WM : Galeri Video', 'masjid' ),
			array( 'description' => esc_html__( 'Widget Galeri Video', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Galeri Video', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		?>
		
	    	<div class="widget__video">
			    <?php
					if ( $title ) {
						echo '<span class="vid__title">' . $title . '</span>';
					}
				?>
		    	<div class="box__video div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'video',
							'showposts' => 3,
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. '">';
						
						global $post;
						foreach ($layanan as $post) {
							$vid_embed = get_post_meta($post->ID, '_embed', true);
							setup_postdata($post);
							?>
							
							<div class="loop__video">
						    	<div class="inner__video">
								    <?php if ( $vid_embed !="" ) { ?>
								    	<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $vid_embed ); ?>" frameborder="0" allowfullscreen></iframe>
						        	<?php } ?>
								</div>
							</div>
							
							
							<?php 
						}
						
						echo '</div>';
						wp_reset_query();
					?>
				</div>
			</div>
		
		<?php
	    echo $args['after_widget'];
		
    }
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
	
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Galeri Video', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan pos galeri video', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
    <?php
	}
}