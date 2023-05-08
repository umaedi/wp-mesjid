<?php
class Laporan_infaq extends WP_Widget {
	function __construct() {
		parent::__construct(
			'laporan_infaq',
			esc_html__( 'WM : Laporan Infaq', 'masjid' ),
			array( 'description' => esc_html__( 'Tampilan Laporan Infaq', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Laporan Infaq', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$mari = ( ! empty( $instance['mari'] ) ) ? $instance['mari'] : __( 'Mari Ber-Infaq', 'masjid' );
		
		echo $args['before_widget'];
		?>
		
	    	<div class="widget__laporaninfaq">
		    	<div class="box__infaq div__clear">
				    <?php
				    	global $post;
						$infaq_argument = array( 
					    	'post_type' => 'infaq',
							'meta_key' => '_status',
							'showposts' => 7,
							'meta_query' => array(
						    	array(
							    	'key' => '_status',
									'value' => 'masuk',
								)
							)
						);
						$loop_infaq = get_posts($infaq_argument);
						?>
						
						<div class="tabel__infaq">
					    	<?php
						    	if ( $title ) {
									echo '<span class="lap__title">' . $title . '</span>';
								}
							?>
							<div class="before__table">
						    	<table class="dana__infaq">
							    	<tr>
								    	<td class="aksen"><strong>JUMLAH</strong></td>
										<td class="tglnol"><strong>TGL</strong></td>
										<td><strong>DARI</strong></td>
									</tr>
									
									<?php
								    	foreach ($loop_infaq as $post) {
											$juminfaq = get_post_meta($post->ID, '_juminfaq', true);
											$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
											setup_postdata($post);
											?>
											<tr>
										    	<td class="aksen"><strong>Rp <?php echo $juminfaq; ?></strong></td>
												<td class="tglnol"><?php echo $tanginfaq; ?></td>
												<td><?php the_title(); ?></td>
											</tr>
											<?php 
										}
									?>
								</table>
							</div>
						</div><!-- end table -->
						<?php
				    	wp_reset_query();
			    	?>
					
			     	<div class="saldo__infaq">
					    <?php
					    	if ( $mari ) {
								echo '<span class="lap__title">' . $mari . '</span>';
							}
						?>
						<div class="wm__saldo">
						    <?php
						    	$total_argument = array( 
							    	'post_type' => 'infaq',
									'meta_key' => '_status',
									'showposts' => 200000,
								);
								$count_infaq = get_posts($total_argument);
								$kel = 0;
								$mas = 0;
								foreach ( $count_infaq as $post ) {
									$status = get_post_meta($post->ID, '_status', true);
									if ( $status == 'keluar' ) {
										$masuk = 0;
										$keluar = get_post_meta($post->ID, '_juminfaq', true);
									}
									if ( $status == 'masuk' ) {
										$masuk = get_post_meta($post->ID, '_juminfaq', true);
										$keluar = 0;
									}
									$masu = str_replace(".","",$masuk);
									$kelu = str_replace(".","",$keluar);
									$kel += $kelu;
									$mas += $masu;
									$final = $mas-$kel;
									
									setup_postdata($post);
								}
							?>
							
							<div class="wm__saldotitle">
						    	LAPORAN SALDO DANA INFAQ
							</div>
							<div class="wm__realsaldo">SALDO : <span>Rp <?php echo isset( $final ) ? number_format($final,0,'.','.') : 0; ?>,-</span></div>
							<div class="wm__infaqline">
						    	Salurkan infaq Anda melalui rekening berikut
							</div>
							
							<?
							wp_reset_query();
					    	?>
							
							<div class="rek__infaq">
							    <?php
								    $rek_argument = array( 
								    	'post_type' => 'rek',
										'showposts' => 20,
										'orderby'   => 'rand',
									);
									$rek_infaq = get_posts($rek_argument);
									
									echo '<div class="' .$args['widget_id']. ' owl-carousel owl-theme">';
									
									foreach ($rek_infaq as $post) {
											$namarek  = get_post_meta($post->ID, '_namarek', true);
											$koderek  = get_post_meta($post->ID, '_koderek', true);
											$nomerrek = get_post_meta($post->ID, '_nomerrek', true);
											$akunrek  = get_post_meta($post->ID, '_akunrek', true);
											setup_postdata($post);
											?>
											<div class="item">
										        <div class="rek__img">
											    	<?php 
											        	if (has_post_thumbnail()) {
													    	the_post_thumbnail('thumbnail');
												    	}
											    	?>
												</div>
												<div class="rek__list">
											    	<div class="namarek"><?php echo $namarek; ?></div>
													<div class="koderek">KODE : <?php echo $koderek; ?></div>
													<div class="nomerrek"><?php echo $nomerrek; ?></div>
													<div class="akunrek"><?php echo $akunrek; ?></div>
												</div>
											</div>
											<?php 
									}
									echo '</div>';
									wp_reset_query();
								?>
							</div>
							<div class="wm__linksaldo">
						    	<a href="<?php echo get_post_type_archive_link( 'infaq' ); ?>">
							     	Lihat Laporan
								</a>
							</div>
						</div>
					</div><!-- end saldo -->
					
				</div>
			</div>
			<script>
            jQuery(document).ready(function($) {
                var owl = $('.<?php echo $args['widget_id']; ?>');
                owl.owlCarousel({
                    loop: true,
                    nav: false,
					dots: false,
                    lazyLoad: true,
			    	autoplay: true,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					margin: 0,
					items:1,
                });
            });
		    </script>
		
		<?php
	    echo $args['after_widget'];
		
    }
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['mari'] = sanitize_text_field( $new_instance['mari'] );
		return $instance;
	}
	
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Laporan Infaq', 'masjid' );
		$mari        = isset( $instance['mari'] ) ? esc_attr( $instance['mari'] ) : __( 'Mari Ber-Infaq', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan laporan dana infaq', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul Kiri', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
	    	<label for="<?php echo $this->get_field_id( 'mari' ); ?>"><?php echo __( 'Judul Kanan', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'mari' ); ?>" name="<?php echo $this->get_field_name( 'mari' ); ?>" type="text" value="<?php echo $mari; ?>" />
		</div>
		
        <?php
	}
}