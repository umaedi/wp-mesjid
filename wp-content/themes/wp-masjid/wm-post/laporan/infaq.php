<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'infaq',		
	array(			
	    'menu_icon' => 'dashicons-book-alt',
		'labels' => array(				
	        'name'               => __( 'Laporan Infaq', 'masjid' ),
			'singular_name'      => __( 'Laporan Infaq', 'masjid' ),
			'add_new'            => __( 'Tambah Laporan Infaq?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Laporan Infaq', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Laporan Infaq', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Laporan Infaq', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Laporan Infaq ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Laporan Infaq di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'lap_infaq', 1);
	function lap_infaq() {
	    add_meta_box('masjid_infaq', 'Laporan Infaq', 'masjid_infaq', 'infaq', 'normal', 'default');
	}

	function masjid_infaq() {
	    global $post;
	    echo '<input type="hidden" name="infaqmeta_noncename" id="infaqmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
        $status    = get_post_meta($post->ID, '_status', true);
	    $tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
	    $juminfaq  = get_post_meta($post->ID, '_juminfaq', true);
		$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
		$ketinfaq  = get_post_meta($post->ID, '_ketinfaq', true);
		?>
		
		<div class="wm_metaabox">
			<p><strong style="color: #f33;">KETERANGAN</strong> : Lengkapi data laporan infaq dibawah ini, Laporan Infaq terbaru akan ditampilkan di halaman Beranda<br/></p>
			<div class="div__clear">
		    	<input type="radio" name="_status" <?php checked($status, 'masuk') ?> value="masuk"/><span class="stt" style="margin: 0 50px 0 0;"><?php _e('Dana Masuk', 'masjid'); ?></span>
				<input type="radio" name="_status" <?php checked($status, 'keluar'); ?> value="keluar"/><span class="stt"><?php _e('Dana Keluar', 'masjid'); ?></span>
			</div>
			<p>Tanggal Pemasukan/Pengeluaran</p>
	        <input type="date" name="_tanginfaq" value="<?php echo esc_attr( $tanginfaq ); ?>" class="tanggal widefat" />
	        <p>Jumlah Dana (masukkan angka, misal : <em>1.000.000</em></p>
	        <input type="text" name="_juminfaq" value="<?php echo esc_attr( $juminfaq ); ?>" class="widefat" />
			<p>Daerah Asal (masukkan nama daerah, misal : <em>Lampung)</em></p>
	        <input type="text" name="_asalinfaq" value="<?php echo esc_attr( $asalinfaq ); ?>" class="widefat" />
			<p>Keterangan (<span style="color: #dd2222;">disini hanya jika laporan Dana Keluar</span>)</p>
	        <input type="text" name="_ketinfaq" value="<?php echo esc_attr( $ketinfaq ); ?>" class="widefat" />
		</div>
		
		<?php	
	}

	function masjid_infaq_meta($post_id, $post) {
	    if ( !isset( $_POST['infaqmeta_noncename'] ) || !wp_verify_nonce( $_POST['infaqmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

	    $events_meta['_status']    = $_POST['_status'];
		$events_meta['_tanginfaq'] = $_POST['_tanginfaq'];
		$events_meta['_juminfaq']  = $_POST['_juminfaq'];
		$events_meta['_asalinfaq'] = $_POST['_asalinfaq'];
		$events_meta['_ketinfaq']  = $_POST['_ketinfaq'];

	    foreach ($events_meta as $key => $value) {         
		    if( $post->post_type == 'revision' ) return; 
	        $value = implode(',', (array)$value); 
	        if(get_post_meta($post->ID, $key, FALSE)) { 
	            update_post_meta($post->ID, $key, $value);
	        } else { 
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); 
	    }
	}

	add_action('save_post', 'masjid_infaq_meta', 1, 2); 