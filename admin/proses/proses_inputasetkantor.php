<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_asetkantor					= mysqli_real_escape_string($db,$_POST['nama_asetkantor']);
    $jumlah_asetkantor	            	= mysqli_real_escape_string($db,$_POST['jumlah_asetkantor']);
	$tanggal_asetkantor			        = mysqli_real_escape_string($db,$_POST['tanggal_asetkantor']);
	$nama_bagian		            	= mysqli_real_escape_string($db,$_POST['nama_bagian']);
    $tahun_asetkantor			        = mysqli_real_escape_string($db,$_POST['tahun_asetkantor']);
    $kondisi_asetkantor				    = mysqli_real_escape_string($db,$_POST['kondisi_asetkantor']);
	$harga_asetkantor	   	       	    = mysqli_real_escape_string($db,$_POST['harga_asetkantor']);
	
	$nama_file_lengkap 		= $_FILES['gambar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	$tmp_file 		= $_FILES['gambar']['tmp_name'];
    $tanggal_asetkantor                  = date('Y-m-d', strtotime($tanggal_asetkantor));
	
	if (!($nama_asetkantor=='')  and !($jumlah_asetkantor=='') and !($tanggal_asetkantor =='') and  !($nama_bagian=='') and !($tahun_asetkantor=='') and !($kondisi_asetkantor=='') and !($harga_asetkantor=='') and
		($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){		
		
		$nama_baru = $nama_asetkantor;
		$path = "../../bagian/images/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_asetkantor(nama_asetkantor, jumlah_asetkantor, tanggal_asetkantor,  nama_bagian, tahun_asetkantor, kondisi_asetkantor, harga_asetkantor, gambar)
				values ('$nama_asetkantor', '$jumlah_asetkantor', '$tanggal_asetkantor', '$nama_bagian', '$tahun_asetkantor', '$kondisi_asetkantor','$harga_asetkantor', '$nama_baru')";
		$execute = mysqli_query($db, $sql);


		echo "<Center><h2><br>Terima Kasih<br>Bagian Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../dataasetkantor.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputasetkantor.php'>";
	}
	
?>
	