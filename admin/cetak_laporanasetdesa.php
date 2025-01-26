<?php
include '../koneksi/koneksi.php';
session_start();
include "login/ceksession.php";


$no = 1;
// if (isset($_POST['cetak'])) {
//     $tgl1 = $_POST['tgl1'];
//     $tgl2 = $_POST['tgl2'];

$no = 1;
$sql1  		= "SELECT * FROM tb_asetdesa order by id_asetdesa asc";                      
$query1  	= mysqli_query($db, $sql1);
// }


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
    <title>LAPORAN ASET DESA</title>
    
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
        </b></p>

    <h3>
        <center>
            LAPORAN ASET DESA <br>
            <!-- <small style="font-size: 12px;"><?php echo $mulaitgl . ' s/d ' . $akhirtgl; ?></small> -->
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                        	<th style="text-align: center; font-size: 18px;">NO</th>
                            <th style="text-align: center; font-size: 18px;">Nama Aset</th>
                            <th style="text-align: center; font-size: 18px;">Jumlah Aset</th>
                            <th style="text-align: center; font-size: 18px;">Lokasi Aset</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Input</th>
                            <th style="text-align: center; font-size: 18px;">Tahun</th>
                            <th style="text-align: center; font-size: 18px;">Kondisi Aset</th>
                            <th style="text-align: center; font-size: 18px;">Harga Aset</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                         while ($data = mysqli_fetch_array($query1)) {
                            $total[] = $data['harga_asetdesa'];

                            $totalsemua = array_sum($total);
                            // $a = date_create();
                            // $b = date_create($tampil['tmt']);
                            // $c = date_create($tampil['tgl_lahir']);
                            // $diff = date_diff($a, $b);
                            // $umur = date_diff($a, $c);
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['nama_asetdesa']; ?></td>
                                <td align="center"><?php echo $data['jumlah_asetdesa']; ?></td>
                                <td align="center"><?php echo $data['lokasi_asetdesa']; ?></td>
                                <td align="center"><?php echo $data['tanggal_asetdesa']; ?></td>
                                <td align="center"><?php echo $data['tahun_asetdesa']; ?></td>
                                <td align="center"><?php echo $data['kondisi_asetdesa']; ?></td>
                                <td align="center">Rp.<?php echo number_format($data['harga_asetdesa'], 0,',', '.'); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tr>
                            <th colspan="7" align="right"> Total : </th>
                            <th align="center">Rp.
                                <?php
                                    
                                    echo number_format($totalsemua, 0,',', '.'); 
                                ?>
                            </th>
                        </tr>

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