<h1>Halaman Data Kabupaten</h1>
<?php
if(getPageSub()=='ubah' || getPageSub()=='hapus' || getPageSub()=='tambah') {
  ?><a href="?halaman=kabupaten" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke tabel data</a><?php
} else if(getPageSub()!='tambah') {
  ?><a href="?halaman=kabupaten&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Input Data Kabupaten</a><?php
} ?>
<hr width="85%" align="left">

<?php

switch(getPageSub()) {
  case 'tambah' :
    if(isset($_POST['input_tambah'])) {
        $nama     = $_POST['input_nama'];
        $string   = "INSERT INTO `kab` ( `kabupaten` ) VALUE ( '$nama' )";
        $q          = $koneksi->query($string);
        if ($q ) {
            header("Location: index.php?halaman=kabupaten");
        } else {
            $notif   = "Gagal menambahkan data";
        }
    }
    if (isset($notif)) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <center><?php echo $notif ?></center>
    </div>
    <?php }

    ?>
    <form action="" method="post">
    <div class="form-group">
        <label>Nama kabupaten</label>
        <input type="text" name="input_nama" class="form-control" value="<?php echo (isset($_POST['input_nama']))?$_POST['input_nama']:'' ?>" />
    </div>
    <div class="form-group">
        <input type="submit" name="input_tambah" class="form-control" value="SIMPAN" />
    </div>
    </form>
    <?php
    break;
	case 'ubah'		:
      if(isset($_POST['input_ubah'])) {
          $nama     = $_POST['input_nama'];
          $id       = getID();
          $string   = "UPDATE `kab` SET `kabupaten`='$nama' WHERE `id_kabupaten`='$id'";
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

      $string       = "SELECT * FROM `kab` WHERE `id_kabupaten`=".getID();
      $q            = $koneksi->query($string);
      if ($q && $q->rowCount () > 0) {
          $all 						= $q->fetchAll(PDO::FETCH_NUM);
          $d              = $all[0];
      ?>
      <form action="" method="post">
      <div class="form-group">
          <label>Nama kabupaten</label>
          <input type="text" name="input_nama" class="form-control" value="<?php echo $d[1] ?>" />
      </div>
      <div class="form-group">
          <input type="submit" name="input_ubah" class="form-control" value="SIMPAN" />
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
        $string   = "DELETE FROM `kab` WHERE `id_kabupaten`='$id'";
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

    $string       = "SELECT * FROM `kab` WHERE `id_kabupaten`=".getID();
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
        <a href="?halaman=kabupaten" class="form-control center" style="text-align:center">Tidak</a>
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
  $string       = "SELECT * FROM `kab`";
  $q          = $koneksi->query($string);
  if ($q && $q->rowCount () > 0) {
      $all 						= $q->fetchAll(PDO::FETCH_NUM);
  } else {
      $all            = array();
  }
  ?>
  <div class="">
	<table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$i	= 1;
        foreach((array)$all as $d) {
        ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $d[1] ?></td>
                <td>
                	<a href="?halaman=kabupaten&aksi=ubah&id=<?php echo $d[0] ?>" class=""><i class="fa fa-pencil"></i> Ubah</a> |
                    <a href="?halaman=kabupaten&aksi=hapus&id=<?php echo $d[0] ?>" class=""><i class="fa fa-trash"></i> Hapus</a>
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
