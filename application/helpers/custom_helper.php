<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
function transform_datetime($date){
	// 2018-06-02;
	$y = substr($date, 0,4);
	$m = substr($date, 5,2);
	$d = substr($date, 8,2);
	$h = substr($date, 11,2);
	$i = substr($date, 14,2);
	return $d."-".$m."-".$y." $h:$i";
} 

function encrypt_password($plain_text) { 
	return password_hash($plain_text, PASSWORD_BCRYPT);
}

function normalisasi_angka($no){
	return preg_replace('/\D/', '', $no);
}
 

function alert_sukses($teks) {
	return '$.notify("'. $teks .'", {className: "success"});';
}

function alert_warning($teks) {
	return '$.notify("'. $teks .'", {className: "warn"});';
} 

function alert_error($teks) {
	return '$.notify("'. $teks .'", {className: "error"});';
}

function alert_info($teks) {
	return '$.notify("'. $teks .'", {className: "info"});';
}

function format_rupiah($angka) {
	return 'Rp. ' . number_format($angka, 0, ',', '.');
}
function format_jam($jam) {
	return ($jam < 10) ? '0' . $jam . ':00' :  $jam . ':00' ;
}

function formatSizeUnits($bytes) {
	// Snippet from PHP Share: http://www.phpshare.org
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
    	$bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_diskon($harga, $diskon){
	return $harga - (($diskon/100) * $harga);
} 

function get_status_pemesanan($no = 0){
	switch ($no) {
		case 1:
			return '<span class="label label-default ">Belum Dibayar</span>';
			break;
		case 2:
			return '<span class="label label-warning">menunggu Konfirmasi</span>';
			break;
		case 3:
			return '<span class="label label-default">Sudah Dibayar</span>';
			break;
		case 4:
			return '<span class="label label-default">Sedang di Produksi</span>';
			break;
		case 5:
			return '<span class="label label-warning">Sedang di Packing</span>';
			break;
		case 6:
			return '<span class="label label-warning">Siap di Kirim</span>';
			break;
		case 7:
			return '<span class="label label-success">Sudah di Kirim</span>';
			break;
		case 8:
			return '<span class="label label-success">Barang sudah di terima</span>';
			break;
		case 9:
			return '<span class="label label-danger">Dibatalkan</span>';
			break;
		default:
			return '';
			break;
	}
} 

function get_status_proses_produksi($no = 0){
	switch ($no) {
		case 1:
			return '<span class="label label-default ">Belum Selesai</span>';
			break;
		case 2:
			return '<span class="label label-success">Sudah Selesai</span>';
			break; 
		default:
			return '';
			break;
	}
} 

function tanggal_lokal($tanggal, $cetak_hari = false) {
	$tanggal = date('d-m-Y', strtotime($tanggal));
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2]; 
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

function format_tanggal($tanggal){
	return date('d-m-Y', strtotime($tanggal));
} 
 
function format_tanggal_waktu($tanggal){
	return date('d-m-Y H:i', strtotime($tanggal));
} 
   

function remove_html_flash($string){
	$text = strip_tags($string);
	$text = trim(preg_replace("/[\n\r]/",'\n',$text));
	return $text;
}


function get_kode_pemesanan($kode){ 
	if($kode == null){
		return $kode;
	}
	$kode_olah = sprintf("%05d", $kode);
	return 'TR' . $kode_olah;
}

function unminus($val){
	return ($val > 0) ? $val : 0;
}

/**
 * Copy a file, or recursively copy a folder and its contents
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.1
 * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
 * @param       string   $source    Source path
 * @param       string   $dest      Destination path
 * @return      bool     Returns TRUE on success, FALSE on failure
 */
function copyr($source, $dest)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }
    
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        copyr("$source/$entry", "$dest/$entry");
    }

    // Clean up
    $dir->close();
    return true; 
}

function cek_form($name = ''){
	echo (form_error($name)) ? '<span class="help-block">' . form_error($name) . '</span>' : '';
}

function class_form_error($name = ''){
	echo (form_error($name)) ? 'has-error' : ''; 
}

function remove_symbol($number){
	return preg_replace('/[^\p{L}\p{N}\s]/u', '', $number);
}


