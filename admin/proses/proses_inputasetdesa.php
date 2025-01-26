<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_asetdesa					= mysqli_real_escape_string($db,$_POST['nama_asetdesa']);
	$jumlah_asetdesa	            = mysqli_real_escape_string($db,$_POST['jumlah_asetdesa']);
	$lokasi_asetdesa	            = mysqli_real_escape_string($db,$_POST['lokasi_asetdesa']);
	$tanggal_asetdesa		        = mysqli_real_escape_string($db,$_POST['tanggal_asetdesa']);
    $tahun_asetdesa			        = mysqli_real_escape_string($db,$_POST['tahun_asetdesa']);
    $kondisi_asetdesa			    = mysqli_real_escape_string($db,$_POST['kondisi_asetdesa']);
	$harga_asetdesa	   	       	    = mysqli_real_escape_string($db,$_POST['harga_asetdesa']);
	
	$nama_file_lengkap 		= $_FILES['gambar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	$tmp_file 		= $_FILES['gambar']['tmp_name'];
    $tanggal_asetdesa                  = date('Y-m-d', strtotime($tanggal_asetdesa));
	
	if (!($nama_asetdesa=='')  and !($jumlah_asetdesa=='') and !($lokasi_asetdesa=='') and !($tanggal_asetdesa =='') and !($tahun_asetdesa=='') and !($kondisi_asetdesa=='') and !($harga_asetdesa=='') and
		($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){		
		
		$nama_baru = $nama_asetdesa;
		$path = "../../admin/images/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_asetdesa(nama_asetdesa, jumlah_asetdesa, lokasi_asetdesa,tanggal_asetdesa, tahun_asetdesa, kondisi_asetdesa, harga_asetdesa, gambar)
				values ('$nama_asetdesa', '$jumlah_asetdesa', '$lokasi_asetdesa','$tanggal_asetdesa', '$tahun_asetdesa', '$kondisi_asetdesa','$harga_asetdesa', '$nama_baru')";
		$execute = mysqli_query($db, $sql);


		echo "<Center><h2><br>Terima Kasih<br>Bagian Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../dataasetdesa.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputasetdesa.php'>";
	}
	
?>
	