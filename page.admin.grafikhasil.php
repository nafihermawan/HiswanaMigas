<center><h3>Grafik Perbandingan Data </h3></center>
<hr width="50%" align="left">

<?php
if(isset($_GET['tahun']) && isset($_GET['kab'])) {
	$kab		= $_GET['kab'];
	$tahun		= $_GET['tahun'];
	$graphlabel	= "'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'";

	$string = "SELECT * FROM `pasokan` WHERE `nama_kab`='$kab' AND tahun ='$tahun'";
    $q      = $koneksi->query($string);
	if($q && $q->rowCount()>0) {
		$bah   = $q->fetchAll(PDO::FETCH_NUM);
		$kabar = array();
		foreach($bah as $a) {
			for($i=3;$i<=14;$i++) {
				$kabar[] = $a[$i];
			}
		}
		$kabar		   = implode(",",$kabar);
		$grapjumlah[0] = $kabar;
	} else {
		$kabar = array();
		for($i=1;$i<=12;$i++) {
			$kabar[] = 0;
		}
		$kabar = implode(",",$kabar);
		$grapjumlah[0] = $kabar;
	}

	$string1 = "SELECT * FROM `hasil_eponensial` WHERE `kabupaten`='$kab' AND `tahunakhir`='$tahun'";
    $q1      = $koneksi->query($string1);
	if($q1 && $q1->rowCount()>0) {
		$bah   = $q1->fetchAll(PDO::FETCH_NUM);
		$perar = array();
		foreach($bah as $a) {
			for($j=5;$j<=16;$j++) {
				$perar[] = round($a[$j],2);
			}
		}
		$perar = implode(",",$perar);
		$grapjumlah[1] = $perar;
	} else {
		$perar = array();
		for($i=1;$i<=12;$i++) {
			$perar[] = 0;
		}
		$perar         = implode(",",$perar);
		$grapjumlah[1] = $kabar;
	}

	?>
	<canvas id="grapChart" width="500" height="200"></canvas>
	<?php
} else {
	echo "Masukan permintaan dan tahun salah";
}
