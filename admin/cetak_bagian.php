<?php
include '../koneksi/koneksi.php';
session_start();
include "login/ceksession.php";


$no = 1;
// if (isset($_POST['cetak'])) {
//     $tgl1 = $_POST['tgl1'];
//     $tgl2 = $_POST['tgl2'];

                     $id		= mysqli_real_escape_string($db,$_GET['id_bagian']);
                     $sql  		= "SELECT * FROM tb_bagian where id_bagian='".$id."'";                        
                     $query  	= mysqli_query($db, $sql);
                     $data 		= mysqli_fetch_array($query);


$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

// $mulaitgl = date('d', strtotime($tgl1)) . ' ' . $bln[date('m', strtotime($tgl1))] . ' ' . date('Y', strtotime($tgl1));
// $akhirtgl = date('d', strtotime($tgl2)) . ' ' . $bln[date('m', strtotime($tgl2))] . ' ' . date('Y', strtotime($tgl2));
// 
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>DATA PEGAWAI</title>
    
      <link rel="shortcut icon" href="../img/icon.ico">
</head>

<body>
    <img src="../img/batola.PNG" align="left" width="90">
    <p align="center"><b>

            <font size="5">PEMERINTAH KABUPATEN BARITO KUALA</font> <br>
			<font size="5">KECAMATAN ANJIR MUARA</font> <br>
			<font size="5">DESA BERINGIN JAYA</font> <br>
            <font size="2">Alamat: Jln.Trans Kalimantan KM.23 RT.001 Kode Pos 70564</font><br>
            <hr size="2px" color="black">


<p style="text-align: center; margin-top: 2%;">
    <label>
        <b style="font-size: 28;"><u>DATA PEGAWAI</u></b> <br>
        <br>
    </label>
    <table border="0" width="60%"  cellpadding=" 1">
    </table>
    <div align="center">
    <table border="0" width="60%" style="text-align: left; font-size: 15; " cellpadding=" 1">
  
                      <tbody>
                        <tr>
                          <td width="50%">Nama </td>
                          <td><?php echo $data['nama_lengkap']?></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><?php echo $data['nik_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Jabatan</td>
                          <td><?php echo $data['nama_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td><?php echo $data['tanggal_lahir_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?php echo $data['alamat']?></td>
                        </tr>
                           <tr>     
                        </tr>
                      </tbody>
                    </table> 
  
    </div>
    <br>
    <table border="0" width="60%"  cellpadding=" 1">
    </table>

                </table>

            </div>
        </div>
    </div>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
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
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>
    <br>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Anjir Muara, <?php echo tgl_indo(date('Y-m-d')); ?>
            <br>Mengetahui,Kepala Desa Beringin Jaya<br>
            <br><br><br><br><br><br>
			<U>LAJUARDI<br></U>
			NIKD 630404 2015<br>
        </h5>

    </div>


</body>

</html>