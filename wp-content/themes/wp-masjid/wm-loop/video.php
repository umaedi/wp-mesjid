<div class="wm__looppost">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				echo '<div class="wm__partition div__clear">';
				while (have_posts()): the_post(); 
				$vid_embed = get_post_meta($post->ID, '_embed', true);
				?>
			    	<div class="wm__post">
				    	<div class="in__post">
							<div class="in__img">
								<?php if ( $vid_embed !="" ) { ?>
									<iframe class="vidloop" src="https://www.youtube.com/embed/<?php echo esc_attr( $vid_embed ); ?>" frameborder="0" allowfullscreen></iframe>
						    	<?php } ?>
							</div>
							<div class="det__post">
						    	<div class="detin__post">
							    	<i class="icon-wm-clock"></i> <?php printf(__('%s', 'masjid'), get_the_time('j F Y')); ?> 
								</div>
								<h4 class="det__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							</div>
						</div>
					</div>
				<?php 
				endwhile; 
			} 
		?>
	</div>
</div>