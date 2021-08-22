<h1>Hasil Perhitungan Peramalan</h1>
<?php
if(getPageSub()=='hapus') {
  ?><a href="?halaman=hasilexponen" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke tabel data</a><?php
} ?>
<hr width="85%" align="left">

<?php

switch(getPageSub()) {
  case 'hapus'    :
    if(isset($_POST['input_hapus'])) {
        $id       = getID();
        $string   = "DELETE FROM `hasil_eponensial` WHERE `id_exponensial`='$id'";
        $q          = $koneksi->query($string);
        if ($q ) {
            $notif   = "Berhasil menghapus data";
        } else {
            $notif   = "Gagal menghapus data";
        }
    }

    if (isset($notif)) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <center><?php echo $notif ?></center>
    </div>
    <?php
    }

    $string       = "SELECT * FROM `hasil_eponensial` WHERE `id_exponensial`=".getID();
    $q            = $koneksi->query($string);
    if ($q && $q->rowCount () > 0) {
        $all 						= $q->fetchAll(PDO::FETCH_NUM);
        $d              = $all[0];
    ?>
    <form action="" method="post">
    <div class="form-group">
        <label>Anda yakin untuk menghapus data <?php echo $d[1];?> (<?php echo $d[0];?>) ?</label>
    </div>
    <div class="form-group">
        <input type="submit" name="input_hapus" class="form-control" value="Ya" />
    </div>
    <div class="form-group">
        <a href="?halaman=hasilexponen" class="form-control center" style="text-align:center">Tidak</a>
    </div>
    </form>
    <?php
    } else {
        echo "Data tidak ditemukan";
    }
    break;

	case 'grafik'  :
  $kab	= isset($_GET['kab'])?$_GET['kab']:''; ?>
  <div class="form-group">
	<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-control">
		<option value="">Pilih Bahan Pasokan</option>
		<?php
		$string       = "SELECT nama_kab FROM `pasokan` GROUP BY `nama_kab`";
		$q            = $koneksi->query($string);
		$bah					= $q->fetchAll(PDO::FETCH_NUM);
		foreach((array)$bah as $kb) {
			 ?>
			 <option value="?halaman=grafik&kab=<?php echo $kb[0];?>" <?php echo ($kb[0]==$kab)?'selected="selected"':'';?>><?php echo $kb[0];?></option>
			 <?php
		}
		?>
	</select>
  </div>

  <?php
  $string = "SELECT * FROM `pasokan` WHERE `nama_kab`='$kab' ORDER BY `tahun` ASC";
  $q      = $koneksi->query($string);

  if($q && $q->rowCount () > 0) {
	$label		= array();
	$jumlah		= array();
	$bah					= $q->fetchAll(PDO::FETCH_NUM);
	foreach($bah as $a) {
		$label[]		= '"'.$a[2].'"';
		$total		= 0;
		for($i=3;$i<=14;$i++) {
			$total	= $total+$a[$i];
		}
		$jumlah[]	= $total;
	}
	$label		= implode(",",$label);
	$jumlah		= implode(",",$jumlah);
	?>



  <canvas id="grapChart" width="500" height="200"></canvas>
  <?php

  } else {
	 echo "Data kosong";
  }
      break;

default         :
    if (isset($notif)) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <center><?php echo $notif ?></center>
    </div>
	  <?php }
  $string       = "SELECT * FROM hasil_eponensial ORDER BY sse ASC";
  $q            = $koneksi->query($string);

  if ($q && $q->rowCount () > 0) {
      $all 			= $q->fetchAll(PDO::FETCH_NUM);
  } else {
      $all          = array();
  }
  ?>
   <div class="panel panel-primary">
    <div class="panel-heading">
      HASIL PERHITUNGAN PERAMALAN
    </div>
  <div class="panel-body">
    <div class="dataTable_wrapper">
  <div class="table-responsive">
	<table class="table table-bordered table-striped" id="tabel">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kabupaten</th>
				        <th scope="col">Tahun Awal</th>
                <th scope="col">Tahun Akhi</th>
				        <th scope="col">Tahun </th>
				        <th scope="col">Januari</th>
                <th scope="col">Februari</th>
                <th scope="col">Maret</th>
                <th scope="col">April</th>
                <th scope="col">Mei</th>
                <th scope="col">Juni</th>
                <th scope="col">Juli</th>
                <th scope="col">Agustus</th>
                <th scope="col">September</th>
                <th scope="col">Oktober</th>
                <th scope="col">Nopember</th>
                <th scope="col">Desember</th>
				        <th scope="col">Sse</th>
				        <th scope="col">Mse</th>
				        <th scope="col">Mape</th>
				        <th scope="col">Alpha</th>
				        <th scope="col">Gamma</th>
                <th scope="col"><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
		<?php
    $i	= 1;
    foreach((array)$all as $d) {

    ?>
        <tr>
           <th scope="row"><center> <?php echo $i++ ?></center></th>
            <td><?php echo $d[1] ?></td>
                <td><center><?php echo $d[2] ?></center></td>
                <td><center><?php echo $d[3] ?></center></td>
                <td><center><?php echo $d[4] ?></center></td>
                <td><center><?php echo $d[5] ?></center></td>
                <td><center><?php echo $d[6] ?></center></td>
                <td><center><?php echo $d[7] ?></center></td>
                <td><center><?php echo $d[8] ?></center></td>
                <td><center><?php echo $d[9] ?></center></td>
                <td><center><?php echo $d[10] ?></center></td>
                <td><center><?php echo $d[11] ?></center></td>
                <td><center><?php echo $d[12] ?></center></td>
                <td><center><?php echo $d[13] ?></center></td>
                <td><center><?php echo $d[14] ?></center></td>
                <td><center><?php echo $d[15] ?></center></td>
                <td><center><?php echo $d[16] ?></center></td>
                <td><center><?php echo $d[17] ?></center></td>
                <td><center><?php echo $d[18] ?></center></td>
                <td><center><?php echo ceil ($d[19])?><?php echo "%"; ?></center></td>
                <td><center><?php echo $d[20] ?></center></td>
                <td><center><?php echo $d[21] ?></center></td>
                <td>
                  <center>
                  <a href="?halaman=hasilexponen&aksi=hapus&id=<?php echo $d[0] ?>" class=""><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					        <a href="?halaman=grafikhasil&tahun=<?php echo $d[3] ?>&kab=<?php echo $d[1] ?>" class="btn btn-primary"><i class="fa fa-bar-chart-o"></i> Grafik</a>
                  </center>
                </td>
            </tr>
		    <?php
        }
        ?>
        </tbody>
    </table>
    </div>
    <?php

}


?>
