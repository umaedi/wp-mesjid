<?php
class Petugas_Jumat extends WP_Widget {
	function __construct() {
		parent::__construct(
			'petugas_umat',
			esc_html__( 'WM : Petugas Jumat', 'masjid' ),
			array( 'description' => esc_html__( 'Widget Daftar Petugas Jumat', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Petugas Jumat', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		?>
		
	    	<div class="widget__jumat">
		    	<div class="box__layanan div__clear">
				    <?php
					    $friday = strtotime(date('d-m-Y'));
				    	$friday_arg = array( 
					    	'post_type' => 'jadwal-jumat',
							'posts_per_page' => 1,
							'meta_key' => '_jminus',
							'meta_query' => array(
						    	array(
							    	'key' => '_jminus',
									'value' => $friday,
									'compare' => '>='
								)
							),
							'orderby' => 'meta_value',
							'order' => 'ASC'
						);
						$fridaytime = get_posts($friday_arg);
						
						global $post;
						foreach ($fridaytime as $post) {
							$jminus = strtotime(get_post_meta($post->ID, '_jevents', true));
							$jevents = get_post_meta($post->ID, '_jevents', true);
							$jjam = get_post_meta($post->ID, '_jjam', true);
							$jimam = get_post_meta($post->ID, '_jimam', true);
							$jkhatib = get_post_meta($post->ID, '_jkhatib', true);
							$jmuadzin = get_post_meta($post->ID, '_jmuadzin', true);
							$jbilal = get_post_meta($post->ID, '_jbilal', true);
							setup_postdata($post);
							?>
							
							<div class="">
							    <div class="jumat__meta div__clear">
								    <div class="jumatdiv jumatdate">
									    <div class="dateindex"><?php
									    	if ( $title ) {
												echo $title;
											}
										?></div>
										<h4 class="dateindex"><?php echo date_i18n("d F Y", strtotime($jevents)); ?></h4>
									</div>
									<div class="jumatdiv jumatimam"><div class="jumatlabel">IMAM</div><h4><?php echo $jimam; ?></h4></div>
									<div class="jumatdiv"><div class="jumatlabel">KHATIB</div><h4><?php echo $jkhatib; ?></h4></div>
									<div class="jumatdiv"><div class="jumatlabel">MUADZIN</div><h4><?php echo $jmuadzin; ?></h4></div>
									<div class="jumatdiv jumatfour"><div class="jumatlabel">BILAL</div><h4><?php echo $jbilal; ?></h4></div>
								</div>
							</div>
							
							
							<?php 
						}
						
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
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Petugas Jumat', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan jadwal Petugas Jumat', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
		    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</div>
		
        <?php
	}
}