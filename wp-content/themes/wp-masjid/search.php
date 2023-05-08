<?php get_header(); ?>

    <section class="wm_blog">
	    <div class="wm__container">
            <div class="blog__loop div__clear">
			    <h1 class="wm__searchhead"><?php echo __( 'Cari :', 'masjid' ); ?> "<?php the_search_query(); ?>"</h1>
			    <?php
			     	if (get_post_type(get_the_ID()) == 'post') {
						get_template_part('archive/post');
						get_template_part('archive/pagination');
					} else if (get_post_type(get_the_ID()) == 'model') {
						get_template_part('archive/model');
						get_template_part('archive/pagination');
					} else {
						get_template_part('archive/404');
					}
				?>
			</div>
		</div>
	</section>
	
<?php get_footer();