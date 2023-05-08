<?php 
get_header();
if ( is_front_page() && !is_paged() ) {
    if ( is_active_sidebar( 'beranda' ) ) {
		echo '<div class="wm__homepage">';
		dynamic_sidebar( 'beranda' );
		echo '</div>';
	} else {
		echo '<div class="wm__homepage">';
		echo 'Tambahkan widget diarea Beranda WP Masjid';
		echo '</div>';
	}
}

get_template_part('wm-loop/post');
get_template_part('wm-loop/pagination');

get_footer();
