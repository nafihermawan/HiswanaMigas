<h1>Data Persediaan Kabupaten</h1>


<?php
if(getPageSub()=='ubah' || getPageSub()=='hapus' || getPageSub()=='tambah') {
  ?><a href="?halaman=persediaan" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke tabel data</a><?php
} else if(getPageSub()!='tambah') {
  ?><a href="?halaman=persediaan&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Input Data Persediaan</a><br>

<?php
} ?>
<hr width="85%" align="left">


<?php

switch(getPageSub()) {
  case 'tambah' :

    if(isset($_POST['input_tambah'])) { 
        $nama     = $_POST['input_nama'];
        $tahun    = $_POST['tahun'];
        $jan      = $_POST['input_jan'];
        $feb      = $_POST['input_feb'];
        $mar      = $_POST['input_mar'];
        $apr      = $_POST['input_apr'];
        $mei      = $_POST['input_mei'];
        $jun      = $_POST['input_jun'];
        $jul      = $_POST['input_jul'];
        $agu      = $_POST['input_agu'];
        $sep      = $_POST['input_sep'];
        $okt      = $_POST['input_okt'];
        $nop      = $_POST['input_nop'];
        $des      = $_POST['input_des'];
        $string   = "INSERT INTO `persediaan`( `nama_kab`,`tahun`,`jan`,`feb`,`mar`,`apr`,`mei`,`jun`,`jul`,`agu`,`sep`,`okt`,`nov`,`des` )
                          VALUE ( '$nama','$tahun','$jan','$feb','$mar','$apr','$mei','$jun','$jul','$agu','$sep','$okt','$nop','$des' )";
        $q          = $koneksi->query($string);
        if ($q ) {
            header("Location: index.php?halaman=persediaan");
        } else {
            $notif   = "Gagal menambahkan data";
        }
    }
    if (isset($notif)) {
    ?>
    <h1>Data Persediaan Kabupaten</h1>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <center><?php echo $notif ?></center>
    </div>
    <?php }

    ?>
    <form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label>Nama Kabupaten</label>
            <select name="input_nama" class="form-control">
            <?php
            $string       = "SELECT * FROM `kab`";
            $q            = $koneksi->query($string);
            $kab					= $q->fetchAll(PDO::FETCH_NUM);
            foreach((array)$kab as $kb) {
                ?>
            <option value="<?php echo $kb[1];?>"><?php echo $kb[1];?></option>
            <?php
        }
        ?>
            </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        
            <div class="form-group">
                <label>Tahun</label>
                <select name="tahun" class="form-control">
                <?php
                for($i=2010;$i<=2025;$i++) {
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
        }
        ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">    
            <div class="form-group">
                <label>Bulan Januari</label>
                <input type="text" name="input_jan" class="form-control" value="<?php echo (isset($_POST['input_jan']))?$_POST['input_jan']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Februari</label>
                <input type="text" name="input_feb" class="form-control" value="<?php echo (isset($_POST['input_feb']))?$_POST['input_feb']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Maret</label>
                <input type="text" name="input_mar" class="form-control" value="<?php echo (isset($_POST['input_mar']))?$_POST['input_mar']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan April</label>
                <input type="text" name="input_apr" class="form-control" value="<?php echo (isset($_POST['input_apr']))?$_POST['input_apr']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Mei</label>
                <input type="text" name="input_mei" class="form-control" value="<?php echo (isset($_POST['input_mei']))?$_POST['input_mei']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Juni</label>
                <input type="text" name="input_jun" class="form-control" value="<?php echo (isset($_POST['input_jun']))?$_POST['input_jun']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Juli</label>
                <input type="text" name="input_jul" class="form-control" value="<?php echo (isset($_POST['input_jul']))?$_POST['input_jul']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Agustus</label>
                <input type="text" name="input_agu" class="form-control" value="<?php echo (isset($_POST['input_agu']))?$_POST['input_agu']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan September</label>
                <input type="text" name="input_sep" class="form-control" value="<?php echo (isset($_POST['input_sep']))?$_POST['input_sep']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Oktober</label>
                <input type="text" name="input_okt" class="form-control" value="<?php echo (isset($_POST['input_okt']))?$_POST['input_okt']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan November</label>
                <input type="text" name="input_nop" class="form-control" value="<?php echo (isset($_POST['input_nop']))?$_POST['input_nop']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Desember</label>
                <input type="text" name="input_des" class="form-control" value="<?php echo (isset($_POST['input_des']))?$_POST['input_des']:'' ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <button type="submit" name="input_tambah" class="btn btn-success"><i class="fa fa-save" ></i> Tambah</button>
            </div>
        </div>
    </div>
    </form>
    <?php
    break;
	case 'ubah'		:
        if(isset($_POST['input_ubah'])) {
          $nama   = $_POST['input_nama'];
          $tahun  = $_POST['input_tahun'];
          $jan    = $_POST['input_jan'];
          $feb    = $_POST['input_feb'];
          $mar    = $_POST['input_mar'];
          $apr    = $_POST['input_apr'];
          $mei    = $_POST['input_mei'];
          $jun    = $_POST['input_jun'];
          $jul    = $_POST['input_jul'];
          $agu    = $_POST['input_agu'];
          $sep    = $_POST['input_sep'];
          $okt    = $_POST['input_okt'];
          $nop    = $_POST['input_nop'];
          $des    = $_POST['input_des'];
          $id       = getID();
          $string   = "UPDATE `persediaan` SET `tahun`='$tahun',`nama_kab`='$nama', `jan`='$jan', `feb`='$feb', `mar`='$mar', `apr`='$apr', `mei`='$mei',`jun`='$jun',
                          `jul`='$jul',`agu`='$agu',`sep`='$sep',`okt`='$okt',`nov`='$nop',`des`='$des'
                          WHERE `id_persediaan`='$id'";
        $q          = $koneksi->query($string);
        if ($q ) {
            $notif   = "Berhasil mengubah data";
        } else {
            $notif   = "Gagal mengubah data";
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

    $string       = "SELECT * FROM `persediaan` WHERE `id_persediaan`='".getID()."'";
    $q            = $koneksi->query($string);
    if ($q && $q->rowCount () > 0) {
        $all 	  = $q->fetchAll(PDO::FETCH_NUM);
        $d        = $all[0];
    ?>
    <form action="" method="post">
    <div class="row"> 
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Kabupaten</label>
                <select name="input_nama" class="form-control">
                <?php
                $string       = "SELECT * FROM `kab`";
                $q            = $koneksi->query($string);
                $kab					= $q->fetchAll(PDO::FETCH_NUM);
                foreach((array)$kab as $kb) {
                ?>
                <option value="<?php echo $kb[1];?>" <?php echo ($kb[1]==$d[1])?'selected="selected"':'';?>><?php echo $kb[1];?></option>
                <?php
        }
        ?>
        </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <select name="input_tahun" class="form-control">
            <?php
        for($i=2010;$i<=2020;$i++) {
            ?>
            <option value="<?php echo $i;?>" <?php echo ($i==$d[2])?'selected="selected"':'';?>><?php echo $i;?></option>
            <?php
        }
        ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Januari</label>
                <input type="text" name="input_jan" class="form-control" value="<?php echo $d[3] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        
            <div class="form-group">
                <label>Bulan Februari</label>
                <input type="text" name="input_feb" class="form-control" value="<?php echo $d[4] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Maret</label>
                <input type="text" name="input_mar" class="form-control" value="<?php echo $d[5] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan April</label>
                <input type="text" name="input_apr" class="form-control" value="<?php echo $d[6] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Mei</label>
                <input type="text" name="input_mei" class="form-control" value="<?php echo $d[7] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Juni</label>
                <input type="text" name="input_jun" class="form-control" value="<?php echo $d[8] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Juli</label>
                <input type="text" name="input_jul" class="form-control" value="<?php echo $d[9] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Agustus</label>
                <input type="text" name="input_agu" class="form-control" value="<?php echo $d[10] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan September</label>
                <input type="text" name="input_sep" class="form-control" value="<?php echo $d[11] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan Oktober</label>
                <input type="text" name="input_okt" class="form-control" value="<?php echo $d[12] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan November</label>
                <input type="text" name="input_nop" class="form-control" value="<?php echo $d[13] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Desember</label>
                <input type="text" name="input_des" class="form-control" value="<?php echo $d[14] ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" name="input_ubah" class="form-control" value="UBAH DATA" />
            </div>
        </div>
    </div>    
    </form>
    <?php
    } else {
        echo "Data tidak ditemukan";
    }
  break;
case 'hapus'    :
    if(isset($_POST['input_hapus'])) {
        $id       = getID();
        $string   = "DELETE FROM `persediaan` WHERE `id_persediaan`='$id'";
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

    $string       = "SELECT * FROM `persediaan` WHERE `id_persediaan`=".getID();
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
        <a href="?halaman=persediaan" class="form-control center" style="text-align:center">Tidak</a>
    </div>
    </form>
    <?php
    } else {
        echo "Data tidak ditemukan";
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

  $string     = "SELECT * FROM `persediaan`";
  $q          = $koneksi->query($string);
  if ($q && $q->rowCount () > 0) {
      $all 	  = $q->fetchAll(PDO::FETCH_NUM);
  } else {
      $all    = array();
  }
  ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
      DAFTAR PERSEDIAAN KABUPATEN
    </div>
  <div class="panel-body">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tabel">
                <thead>
                    <tr>
                        <th scope="col"><center>No</center></th>
                        <th scope="col"><center>Nama Kabupaten</center></th>
                        <th scope="col"><center>Tahun</center></th>
                        <th scope="col"><center>Januari</center></th>
                        <th scope="col"><center>Februari</center></th>
                        <th scope="col"><center>Maret</center></th>
                        <th scope="col"><center>April</center></th>
                        <th scope="col"><center>Mei</center></th>
                        <th scope="col"><center>Juni</center></th>
                        <th scope="col"><center>Juli</center></th>
                        <th scope="col"><center>Agustus</center></th>
                        <th scope="col"><center>September</center></th>
                        <th scope="col"><center>Oktober</center></th>
                        <th scope="col"><center>Nopember</center></th>
                        <th scope="col"><center>Desember</center></th>
                        <th scope="col"><center>Aksi</center></th>
                    </tr>
                </thead>
        <tbody>
		<?php
		$i	= 1;
        foreach((array)$all as $d) {
        ?>
            <tr>
               <th scope="row"><center><?php echo $i++ ?></center></th>
                <td><center><?php echo $d[1] ?></center></td>
                <td><center><?php echo $d[2] ?></center></td>
                <td><center><?php echo number_format($d[3]); ?></center></td>
                <td><center><?php echo number_format($d[4]); ?></center></td>
                <td><center><?php echo number_format($d[5]); ?></center></td>
                <td><center><?php echo number_format($d[6]); ?></center></td>
                <td><center><?php echo number_format($d[7]); ?></center></td>
                <td><center><?php echo number_format($d[8]); ?></center></td>
                <td><center><?php echo number_format($d[9]); ?></center></td>
                <td><center><?php echo number_format($d[10]); ?></center></td>
                <td><center><?php echo number_format($d[11]); ?></center></td>
                <td><center><?php echo number_format($d[12]); ?></center></td>
                <td><center><?php echo number_format($d[13]); ?></center></td>
                <td><center><?php echo number_format($d[14]); ?></center></td>
                <td>
                <center>    
                	<a href="?halaman=persediaan&aksi=ubah&id=<?php echo $d[0] ?>" class=""><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i> </button>
                    <a href="?halaman=persediaan&aksi=hapus&id=<?php echo $d[0] ?>" class=""><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
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
