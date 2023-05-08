<?php
/**
 * Custom WP iwm template tags
 * Fungsi pendukung tema WP iwm
 */

if ( ! function_exists( 'wm_custom_logo' ) ) :
    function wm_custom_logo() {
    	if ( function_exists( 'the_custom_logo' ) ) {
			    the_custom_logo();
	    }
    }
endif;

if ( ! function_exists( 'wm_head_meta_property' ) ) :
    function wm_head_meta_property() {
        get_template_part('wm-header/meta-tag');
	}
endif;

if ( ! function_exists( 'wm_head_meta_desc' ) ) :
    function wm_head_meta_desc() {
		if (is_front_page()) {
			bloginfo('description');
		} else if (is_singular()) {
			if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 60);
		} else {
			echo '';
		}
	}
endif;

function refresh_jadwalshalat() {
	wm_city_prayer();
}
if ( ! function_exists( 'wm_city_prayer' ) ) :
	function wm_city_prayer() {
		if ( get_theme_mod('city_id') != "" ) {
	    	echo '<script type="text/javascript" src="https://www.muslimpro.com/muslimprowidget.js?cityid=' .esc_attr( get_theme_mod( 'city_id' ) ). '&language=id&timeformat=24" async></script>'; 
		} else {
			echo '<script type="text/javascript" src="https://www.muslimpro.com/muslimprowidget.js?cityid=1637532&language=id&timeformat=24" async></script>'; 
		}
	}
endif;

function refresh_subuhimam() {
	petugas_harian();
}
function refresh_subuhmuadzin() {
	petugas_harian();
}
function refresh_dzuhurimam() {
	petugas_harian();
}
function refresh_dzuhurmuadzin() {
	petugas_harian();
}
function refresh_asharimam() {
	petugas_harian();
}
function refresh_asharmuadzin() {
	petugas_harian();
}
function refresh_maghribimam() {
	petugas_harian();
}
function refresh_maghribmuadzin() {
	petugas_harian();
}
function refresh_isyaimam() {
	petugas_harian();
}
function refresh_isyamuadzin() {
	petugas_harian();
}
if ( ! function_exists( 'petugas_harian' ) ) :
	function petugas_harian() {
		echo '<div class="item shalat_time"><div class="shalat_in">';
		echo '<span class="shalat_name">Subuh</span>';
		if ( get_theme_mod('subuh_imam') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'subuh_imam'). '</span><span class="pt_right">Imam</span></div>'; 
		} else {
			echo '';
		}
		if ( get_theme_mod('subuh_muadzin') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'subuh_muadzin'). '</span><span class="pt_right">Muadzin</span></div>'; 
		} else {
			echo '';
		}
		echo '</div></div>';
		echo '<div class="item shalat_time"><div class="shalat_in">';
		echo '<span class="shalat_name">Dzuhur</span>';
		if ( get_theme_mod('dzuhur_imam') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'dzuhur_imam'). '</span><span class="pt_right">Imam</span></div>'; 
		} else {
			echo '';
		}
		if ( get_theme_mod('dzuhur_muadzin') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'dzuhur_muadzin'). '</span><span class="pt_right">Muadzin</span></div>'; 
		} else {
			echo '';
		}
		echo '</div></div>';
		echo '<div class="item shalat_time"><div class="shalat_in">';
		echo '<span class="shalat_name">Ashar</span>';
		if ( get_theme_mod('ashar_imam') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'ashar_imam'). '</span><span class="pt_right">Imam</span></div>'; 
		} else {
			echo '';
		}
		if ( get_theme_mod('ashar_muadzin') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'ashar_muadzin'). '</span><span class="pt_right">Muadzin</span></div>'; 
		} else {
			echo '';
		}
		echo '</div></div>';
		echo '<div class="item shalat_time"><div class="shalat_in">';
		echo '<span class="shalat_name">Maghrib</span>';
		if ( get_theme_mod('maghrib_imam') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'maghrib_imam'). '</span><span class="pt_right">Imam</span></div>'; 
		} else {
			echo '';
		}
		if ( get_theme_mod('maghrib_muadzin') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'maghrib_muadzin'). '</span><span class="pt_right">Muadzin</span></div>'; 
		} else {
			echo '';
		}
		echo '</div></div>';
		echo '<div class="item shalat_time"><div class="shalat_in">';
		echo '<span class="shalat_name">Isya</span>';
		if ( get_theme_mod('isya_imam') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'isya_imam'). '</span><span class="pt_right">Imam</span></div>'; 
		} else {
			echo '';
		}
		if ( get_theme_mod('isya_muadzin') != "" ) {
	    	echo '<div class="shalat_petugas div__clear"><span class="pt_left">' .get_theme_mod( 'isya_muadzin'). '</span><span class="pt_right">Muadzin</span></div>'; 
		} else {
			echo '';
		}
		echo '</div></div>';
	}
endif;


if ( ! function_exists( 'wm_big_slider_home' ) ) :
    function wm_big_slider_home() {
		if (is_front_page()) {  
	        get_template_part('wm-header/slider');
		}
	}
endif;

function refresh_namamasjid() {
	wm_nama_masjid();
}
if ( ! function_exists( 'wm_nama_masjid' ) ) :
	function wm_nama_masjid() {
		if ( get_theme_mod('nama_masjid') != "" ) {
	    	echo get_theme_mod( 'nama_masjid'); 
		} else {
			echo 'Masjid At-Taqwa';
		}
	}
endif;

function refresh_luastanah() {
	hidden_info();
}
function refresh_luasbang() {
	hidden_info();
}
function refresh_statustanah() {
	hidden_info();
}
function refresh_tahunberdiri() {
	hidden_info();
}
function refresh_masjidmaps() {
	hidden_info();
}
if ( ! function_exists( 'hidden_info' ) ) :
	function hidden_info() {
		if ( get_theme_mod('masjid_maps') != "" ) {
	    	echo '<div class="info__maps">' .get_theme_mod('masjid_maps'). '</div>';
		} 
		echo '<table>';
		if ( get_theme_mod('luas_tanah') != "" ) {
	    	echo '<tr><td>Luas Tanah</td><td class="info__right">' .get_theme_mod('luas_tanah'). '</td></tr>';
		}
		if ( get_theme_mod('luas_bang') != "" ) {
	    	echo '<tr><td>Luas Bangunan</td><td class="info__right">' .get_theme_mod('luas_bang'). '</td></tr>';
		}
		if ( get_theme_mod('status_tanah') != "" ) {
	    	echo '<tr><td>Status Lokasi</td><td class="info__right">' .get_theme_mod('status_tanah'). '</td></tr>';
		}
		if ( get_theme_mod('tahun_masjid') != "" ) {
	    	echo '<tr><td>Tahun Berdiri</td><td class="info__right">' .get_theme_mod('tahun_masjid'). '</td></tr>';
		}
		echo '</table>';
		echo '<span class="close_info"><i class="icon-wm-plus"></i></span>';
	}
endif;

function refresh_alamatmasjid() {
	wm_alamat_masjid();
}
if ( ! function_exists( 'wm_alamat_masjid' ) ) :
	function wm_alamat_masjid() {
		if ( get_theme_mod('alamat') != "" ) {
	    	echo get_theme_mod( 'alamat'); 
		} else {
			echo 'Jl Raya Lintas Liwa, Wonosari II, Simpang Sari, Sumber Jaya, Lampung Barat';
		}
	}
endif;

function refresh_telponmasjid() {
	wm_telp_masjid();
}
if ( ! function_exists( 'wm_telp_masjid' ) ) :
	function wm_telp_masjid() {
		if ( get_theme_mod('masjid_telpon') != "" ) {
	    	echo '<a href="tel:' .get_theme_mod( 'masjid_telpon'). '">' .get_theme_mod( 'masjid_telpon'). '</a>'; 
		} else {
			echo '<a href="tel:">08123456789</a>';
		}
	}
endif;

function refresh_emailmasjid() {
	sosial_media_masjid();
}
function refresh_wamasjid() {
	sosial_media_masjid();
}
function refresh_fbmasjid() {
	sosial_media_masjid();
}
function refresh_twmasjid() {
	sosial_media_masjid();
}
function refresh_igmasjid() {
	sosial_media_masjid();
}
function refresh_ytmasjid() {
	sosial_media_masjid();
}
if ( ! function_exists( 'sosial_media_masjid' ) ) :
	function sosial_media_masjid() {
		if ( get_theme_mod('masjid_email') != "" ) {
	    	echo '<a href="mailto:' .get_theme_mod('masjid_email'). '"><i class="icon-wm-mail"></i></a>';
		} 
		if ( get_theme_mod('masjid_whatsapp') != "" ) {
			$was = get_theme_mod('masjid_whatsapp'); 
			$new_was = preg_replace("/[^A-Za-z0-9?!]/",'',$was);
	    	echo '<a class="wame" target="_blank" href="https://wa.me/send?phone='. $new_was .'"><i class="icon-wm-whatsapp"></i></a>';
			echo '<a class="wapi" target="_blank" href="https://api.whatsapp.com/send?phone='. $new_was .'"><i class="icon-wm-whatsapp"></i></a>';
		}
		if ( get_theme_mod('masjid_facebook') != "" ) {
	    	echo '<a href="' .get_theme_mod('masjid_facebook'). '"><i class="icon-wm-facebook"></i></a>';
		}
		if ( get_theme_mod('masjid_twitter') != "" ) {
	    	echo '<a href="' .get_theme_mod('masjid_twitter'). '"><i class="icon-wm-twitter"></i></a>';
		}
		if ( get_theme_mod('masjid_instagram') != "" ) {
	    	echo '<a href="' .get_theme_mod('masjid_instagram'). '"><i class="icon-wm-instagram"></i></a>';
		}
		if ( get_theme_mod('masjid_youtube') != "" ) {
	    	echo '<a href="' .get_theme_mod('masjid_youtube'). '"><i class="icon-wm-youtube"></i></a>';
		}
	}
endif;

function wm_customize_partial_head404() {
	wm_head_404();
}
if ( ! function_exists( 'wm_head_404' ) ) :
	function wm_head_404() {
		if ( get_theme_mod('head_404') != "" ) {
	    	echo get_theme_mod( 'head_404'); 
		} else {
		    echo __('Error 404 Tidak Ditemukan', 'masjid');	
		}
	}
endif;
function wm_customize_partial_text404() {
	wm_text_404();
}
if ( ! function_exists( 'wm_text_404' ) ) :
	function wm_text_404() {
		if ( get_theme_mod('text_404') != "" ) {
	    	echo get_theme_mod( 'text_404'); 
		} else {
		    echo __('Halaman yang Anda tuju tidak tersedia', 'masjid');	
		}
	}
endif;

function wm_customize_partial_runtext() {
	wm_running_text();
}
if ( ! function_exists( 'wm_running_text' ) ) :
	function wm_running_text() {
	    if ( get_theme_mod('run_text') != "" ) {
	        echo '<li>'. get_theme_mod( 'run_text' ) .'</li>'; 
	    } else {
		    echo '<li>'. __( 'Text berjalan saat ini pindah ke halaman Tampilan > Sesuaikan > WP Mssjid: Pengaturan > Layout Setting', 'masjid' ) .'</li>'; 
	    }
	}
endif;

function theme_pre_set_transient_update_iwm ( $transient ) {
		if( empty( $transient->checked['wp-masjid'] ) )
			return $transient;
		$checking = curl_init();
		curl_setopt($checking, CURLOPT_URL, 'https://update.ciuss.com/wp-content/uploads/masjid.json' );
		// 3 second timeout to avoid issue on the server
		curl_setopt($checking, CURLOPT_TIMEOUT, 3 );
		curl_setopt($checking, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($checking);
		curl_close($checking);
		// make sure that we received the data in the response is not empty
		if( empty( $result ) )
			return $transient;
		//check server version against current installed version
		if( $data = json_decode( $result ) ){
			if( version_compare( $transient->checked['wp-masjid'], $data->new_version, '<' ) )
				$transient->response['wp-masjid'] = (array) $data;
		}
		return $transient;
}
add_filter ( 'pre_set_site_transient_update_themes', 'theme_pre_set_transient_update_iwm' );

function wm_customize_partial_footcopy() {
	text_footer();
}
if ( ! function_exists( 'text_footer' ) ) :
	function text_footer() {
		echo 'WP Masjid dibuat oleh <a href="' . esc_url('https://ciuss.com') . '">Ciuss Creative</a>. Menggunakan CMS <a href="' . esc_url('https://wordpress.org') . '">WordPress</a>';
	}
endif;

function wm_customize_partial_embedmaps() {
	wm_google_maps_embed();
}

if ( ! function_exists( 'wm_google_maps_embed' ) ) :
    function wm_google_maps_embed() {
    	if ( get_theme_mod('show_maps') != "off" ) {
			if ( get_theme_mod('embedmaps') != "" ) {
			    echo get_theme_mod( 'embedmaps');  
		    }
		}
	}
endif;	
