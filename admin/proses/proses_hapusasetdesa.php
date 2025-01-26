<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_asetdesa'])) {

	$id = $_GET['id_asetdesa'];
    	

	$sql2  		= "SELECT * FROM tb_asetdesa where id_asetdesa='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_asetdesa WHERE id_asetdesa='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../../aset desa/images/".$data2['gambar']);
                echo "<Center><h2><br>Data Aset Desa telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataasetdesa.php'>";
            }		else{
			echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataasetdesa.php'>";
	}	
}	
}						
?>   