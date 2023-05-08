<?php
/*
 * Register widget (sidebar).
 */
function wm_widgets_init() {
    register_sidebar(array(
		'name' => __('Beranda WP Masjid', 'masjid'),
		'id'   => 'beranda',
		'before_widget' => '<div id="%1$s" class="%2$s widget_block"><div class="wm__container">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Sidebar Utama', 'masjid'),
		'id'   => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="%2$s widget_block">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
	require get_template_directory().'/wm-widgets/laporan-infaq.php';
	register_widget('Laporan_Infaq');
	require get_template_directory().'/wm-widgets/daftar-layanan.php';
	register_widget('Layanan_Masjid');
	require get_template_directory().'/wm-widgets/jadwal-jumat.php';
	register_widget('Petugas_Jumat');
	require get_template_directory().'/wm-widgets/agenda-pengumuman.php';
	register_widget('Agenda_Pengumuman');
	require get_template_directory().'/wm-widgets/tausiyah-terbaru.php';
	register_widget('Tausiyah_Terbaru');
	require get_template_directory().'/wm-widgets/lembaga.php';
	register_widget('Daftar_Lembaga');
	require get_template_directory().'/wm-widgets/daftar-inventaris.php';
	register_widget('Inventaris_Masjid');
	require get_template_directory().'/wm-widgets/perpustakaan.php';
	register_widget('Perpustakaan');
	require get_template_directory().'/wm-widgets/petugas-harian.php';
	register_widget('Petugas_Harian');
	require get_template_directory().'/wm-widgets/laporan-dana.php';
	register_widget('Laporan_Dana');
	require get_template_directory().'/wm-widgets/galeri-gambar.php';
	register_widget('Galeri_Gambar');
	require get_template_directory().'/wm-widgets/galeri-video.php';
	register_widget('Galeri_Video');
	
}
add_action('widgets_init', 'wm_widgets_init');