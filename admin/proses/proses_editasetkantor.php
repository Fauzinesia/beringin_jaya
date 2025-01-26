<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				     	        = mysqli_real_escape_string($db,$_POST['id_asetkantor']);
    $nama_asetkantor	            = mysqli_real_escape_string($db,$_POST['nama_asetkantor']);
	$jumlah_asetkantor				= mysqli_real_escape_string($db,$_POST['jumlah_asetkantor']);
	$tanggal_asetkantor 	        = mysqli_real_escape_string($db,$_POST['tanggal_asetkantor']);
	$nama_bagian		            = mysqli_real_escape_string($db,$_POST['nama_bagian']);
	$tahun_asetkantor	            = mysqli_real_escape_string($db,$_POST['tahun_asetkantor']);
	$kondisi_asetkantor	            = mysqli_real_escape_string($db,$_POST['kondisi_asetkantor']);
	$harga_asetkantor		   	    = mysqli_real_escape_string($db,$_POST['harga_asetkantor']);
	$gambar			            	= $_FILES['gambar']['name'];
    $tanggal_asetkantor             = date('Y-m-d', strtotime($tanggal_asetkantor));
	
	$sql  		= "SELECT * FROM tb_asetkantor where id_asetkantor='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($gambar == ''){
		$ext			= substr($gambar['gambar'], strripos($gambar['gambar'], '.'));	
		$gambar  		= $gambar . $ext;
		rename("../../bagian/images/".$gambar['gambar'], "../../bagian/images/".$gambar);
		$sql = "UPDATE tb_asetkantor set 
						nama_asetkantor		        = '$nama_asetkantor',
						jumlah_asetkantor			= '$jumlah_asetkantor',
						tanggal_asetkantor          = '$tanggal_asetkantor',
						nama_bagian			 		= '$nama_bagian',
						tahun_asetkantor	 		= '$tahun_asetkantor',
						kondisi_asetkantor		    = '$kondisi_asetkantor',
						harga_asetkantor			= '$harga_asetkantor',
						gambar						= '$nama_b' 
				where id_asetkantor = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-asetkantor.php?id_asetkantor=".$id."'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../../bagian/images/".$gambar['gambar']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$sql = "UPDATE tb_asetkantor set 
						nama_asetkantor		            = '$nama_asetkantor',
						jumlah_asetkantor				= '$jumlah_asetkantor',
						tanggal_asetkantor				= '$tanggal_asetkantor ',
						nama_bagian			 			= '$nama_bagian',
						tahun_asetkantor                = '$tahun_asetkantor',
						kondisi_asetkantor		 		= '$kondisi_asetkantor',
						harga_asetkantor				= '$harga_asetkantor',
						gambar				        	= '$gambar' 
				where id_asetkantor = $id";
				


			$execute = mysqli_query($db, $sql);
			$execute = mysqli_query($db, $sql);	
			if ($execute) {	
				$nama_baru = $gambar;
				$path = "../../bagian/images/".$nama_baru;
				move_uploaded_file($tmp_file, $path);
				# code...
			}			
		
			echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-asetkantor.php?id_asetkantor=".$id."'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editasetkantor.php?id_asetkantor=".$id."'>";
		}
	
	}
	?>
	