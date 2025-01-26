<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				     	            = mysqli_real_escape_string($db,$_POST['id_asetdesa']);
    $nama_asetdesa	                    = mysqli_real_escape_string($db,$_POST['nama_asetdesa']);
	$jumlah_asetdesa			    	= mysqli_real_escape_string($db,$_POST['jumlah_asetdesa']);
	$lokasi_asetdesa			    	= mysqli_real_escape_string($db,$_POST['lokasi_asetdesa']);
	$tanggal_asetdesa 	                = mysqli_real_escape_string($db,$_POST['tanggal_asetdesa']);
	$tahun_asetdesa	                    = mysqli_real_escape_string($db,$_POST['tahun_asetdesa']);
	$kondisi_asetdesa	                = mysqli_real_escape_string($db,$_POST['kondisi_asetdesa']);
	$harga_asetdesa		   	            = mysqli_real_escape_string($db,$_POST['harga_asetdesa']);
	$gambar			            	    = $_FILES['gambar']['name'];
    $tanggal_asetdesa                   = date('Y-m-d', strtotime($tanggal_asetdesa));
	
	$sql  		= "SELECT * FROM tb_asetkantor where id_asetkantor='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($gambar == ''){
		$ext			= substr($gambar['gambar'], strripos($gambar['gambar'], '.'));	
		$gambar  		= $gambar . $ext;
		rename("../../bagian/images/".$gambar['gambar'], "../../bagian/images/".$gambar);
		$sql = "UPDATE tb_asetdesa set 
						nama_asetdesa  		        = '$nama_asetdesa',
						jumlah_asetdesa	    		= '$jumlah_asetdesa',
						lokasi_asetdesa	    		= '$lokasi_asetdesa',
						tanggal_asetdesa            = '$tanggal_asetdesa',
						tahun_asetdesa  	 		= '$tahun_asetdesa',
						kondisi_asetdesa		    = '$kondisi_asetdesa',
						harga_asetdesa	    		= '$harga_asetdesa',
						gambar						= '$nama_b' 
				where id_asetkantor = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-asetdesa.php?id_asetdesa=".$id."'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../../admin/images/".$gambar['gambar']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$sql = "UPDATE tb_asetdesa set 
						nama_asetdesa		            = '$nama_asetdesa',
						jumlah_asetdesa		    		= '$jumlah_asetdesa',
						lokasi_asetdesa		    		= '$lokasi_asetdesa',
						tanggal_asetdesa	   			= '$tanggal_asetdesa ',
						tahun_asetdesa                  = '$tahun_asetdesa',
						kondisi_asetdesa		 		= '$kondisi_asetdesa',
						harga_asetdesa  				= '$harga_asetdesa',
						gambar				        	= '$gambar' 
				where id_asetdesa = $id";
				


			$execute = mysqli_query($db, $sql);
			$execute = mysqli_query($db, $sql);	
			if ($execute) {	
				$nama_baru = $gambar;
				$path = "../../bagian/images/".$nama_baru;
				move_uploaded_file($tmp_file, $path);
				# code...
			}			
		
			echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-asetdesa.php?id_asetdesa=".$id."'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editasetdesa.php?id_asetdesa=".$id."'>";
		}
	
	}
	?>
	