<h1>Perhitungan Holt's Double Exponential Smoothing</h1>
<?php
if(getPageSub()=='hitung' ) {
    ?><a href="?halaman=exponen" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke input Parameter</a><?php
}
?>
<hr width="85%" align="left">

<?php

switch(getPageSub()) {
    case 'hitung' :
			$awal    	= isset($_POST['input_mulai'])?$_POST['input_mulai']:'';
			$akhir		= isset($_POST['input_akhir'])?$_POST['input_akhir']:'';
			$kabupaten  = isset($_POST['input_kabupaten'])?$_POST['input_kabupaten']:'';
			$alpha      = isset($_POST['input_alpha'])?$_POST['input_alpha']:'';
			$gamma      = isset($_POST['input_gamma'])?$_POST['input_gamma']:'';

		//cek POST input_hitung	
        if(isset($_POST['input_hitung'])) {
		    // mengambil data dari database
            $string = "SELECT * FROM `pasokan` WHERE `tahun`<='$akhir' AND `tahun`>='$awal' AND nama_kab='$kabupaten' ORDER BY tahun ASC";
            $q 		= $koneksi->query($string);
           		if($q && $q->rowCount() > 0) {
			   		// mengecek nilai input alpha dan gamma
					if(($alpha<=1 && $alpha>=0) && ($gamma>=0 && $gamma<=1)) {
			    // menaruh data dari hasil fetch kedalam variabel
                $data = $q->fetchAll(PDO::FETCH_NUM);
			    // membuat var array untuk penyimpanan data perhitungan
                $array = array();
			      // menghitung jumlah tahun
				  $jmltahun	= count($data);
				  // mencari tahun terakhir dari data
				  $tahunterakhir	= $data[$jmltahun-1][2];
				  $namabulan		= array( 1 => "Januari", 2 => "februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "september", 10 => 
				  					  "Oktober", 11 => "Nopember", 12 => "Desember");
				  
                  // penghitungan jumlah bulan
				  $n = 0;
				  
				  // deklarasi var untuk menyimpan hasil Ft
				  $ftall = array();
				  // deklarasi var untuk menyimpan hasil Abs Values of Error
				  $avoeall = array();
				  // deklarasi var untuk menyimpan hasil Error
				  $erra	  = array();
				  $errall = array();
				  // deklarasi var untuk menyimpan hasil Square Error
				  $errkuall	= array();
				  // deklarasi var untuk menyimpan hasil Absolute Values of Error Devided by Actual Values
				  $avoedbavall = array();

				  $errormonth = ''; // defining error handling variable
				  foreach((array)$data as $d) {
					  $year[] = $d[2]; // var kumpulan tahun
					  // jumlah dari bulan 1 - 12
					  $jumlah[$d[2]]	= $d[3]+$d[4]+$d[5]+$d[6]+$d[7]+$d[8]+$d[9]+$d[10]+$d[11]+$d[12]+$d[13]+$d[14];
					  $array[$d[2]][1]	= array($n+1,$d[3],'','','','','','','','','' );
					  $array[$d[2]][2]	= array($n+2,$d[4],'','','','','','','','','' );
					  $array[$d[2]][3]	= array($n+3,$d[5],'','','','','','','','','' );
					  $array[$d[2]][4]	= array($n+4,$d[6],'','','','','','','','','' );
					  $array[$d[2]][5]	= array($n+5,$d[7],'','','','','','','','','' );
					  $array[$d[2]][6]	= array($n+6,$d[8],'','','','','','','','','' );
					  $array[$d[2]][7]	= array($n+7,$d[9],'','','','','','','','','' );
					  $array[$d[2]][8]	= array($n+8,$d[10],'','','','','','','','','' );
					  $array[$d[2]][9]	= array($n+9,$d[11],'','','','','','','','','' );
					  $array[$d[2]][10]	= array($n+10,$d[12],'','','','','','','','','' );
					  $array[$d[2]][11]	= array($n+11,$d[13],'','','','','','','','','' );
					  $array[$d[2]][12]	= array($n+12,$d[14],'','','','','','','','','' );
					  // hitung $n pertahun
					  $n = $n+12;
					  
					  // mengecek bila perbulan ada yang kosong
						for($e=3;$e<=14;$e++) {
							if($d[$e]==0 || $d[$e]<=0 || empty($d[$e])) {
								$errormonth	= "Bulan - ".$namabulan[$e-2]." Tahun ".$d[2];
								break;
								break;
							}
						}
				  }
				  // deklarasi var untuk menyimpan hasil Ft
				  $ftall = array();
				  $sse	 = 0;
				  $sme	 = "";

                  // mengurai var $array
				  // jika errormonth kosong maka dilanjutkan perhitungan
				  if($errormonth=='') {
				  foreach((array)$array as $ark => $ar) {
					  // jika tahun merupakan tahun awal
					  if($ark==min($year)) {
						  $j=1;
						  foreach((array)$ar as $sbrk => $sbr) {
							 $At = '';
							 $Tt = '';
							 $Ft = '';
							 $Er = '';
							  if($sbrk==1) {
								  $At	= $sbr[1];
								  $Tt	= (($array[$ark][2][1]-$array[$ark][1][1])+($array[$ark][4][1]-$array[$ark][3][1]))/2;
								  $Ft	= '';
								  $Er   = '';
							  } else {
								  $At  = $alpha*$array[$ark][$j][1]+(1-$alpha)*($array[$ark][$j-1][2]+$array[$ark][$j-1][3]);
		                          $Tt  = $gamma*($At-$array[$ark][$j-1][2])+(1-$gamma)*$array[$ark][$j-1][3];
								  $Ft  =  $array[$ark][$j-1][2]+ $array[$ark][$j-1][3];
								  $Er  = $sbr[1]-$Ft;
								  
								  $erra[]	 	 = $Er;
								  $errall[]		 = $Er;
								  $avoe			 = abs($Er);
								  $avoeall[]	 = $avoe;
								  $errkuadrat	 = pow($Er,2);
								  $errkuall[]	 = $errkuadrat;
								  $avoedbav		 = abs($Er/$sbr[1]);
								  $avoedbavall[] = $avoedbav;
							  }
							  $array[$ark][$sbrk][2] = $At;
							  $array[$ark][$sbrk][3] = $Tt;
							  $array[$ark][$sbrk][4] = $Ft;
							  $array[$ark][$sbrk][5] = $Er;
							  $sse+= $Er*$Er;
							  $j++;
						  }

					  } else {
						  $j=1;
						 foreach((array)$ar as $sbrk => $sbr) {
							 $At		= '';
							 $Tt		= '';
							 $Ft		= '';
							 $Er 	    = '';
							 if($sbrk==1) {
								 $At  = $alpha*$array[$ark][$j][1]+(1-$alpha)*($array[$ark-1][12][2]+$array[$ark-1][12][3]);
								 $Tt  = $gamma*($At-$array[$ark-1][12][2])+(1-$gamma)*$array[$ark-1][12][3];
								 $Ft  =  $array[$ark-1][12][2]+ $array[$ark-1][12][3];
								 $Er  = $sbr[1]-$Ft;
								 
							 } else {
								 $At  = $alpha*$array[$ark][$j][1]+(1-$alpha)*($array[$ark][$j-1][2]+$array[$ark][$j-1][3]);
								 $Tt  = $gamma*($At-$array[$ark][$j-1][2])+(1-$gamma)*$array[$ark][$j-1][3];
								 $Ft  =  $array[$ark][$j-1][2]+ $array[$ark][$j-1][3];
								 $Er  = $sbr[1]-$Ft;
								 
								 $erra[]	 = $Er;
								 $errall[]	 = $Er;
								 $avoe		 = abs($Er);
								 $avoeall[]	 = $avoe;
								 $errkuadrat = pow($Er,2);
								 $errkuall[] = $errkuadrat;
								 $avoedbav	 = abs($Er/$sbr[1]);
								 $avoedbavall[]	= $avoedbav;
							 }
							 $array[$ark][$sbrk][2]	= $At;
							 $array[$ark][$sbrk][3]	= $Tt;
							 $array[$ark][$sbrk][4]	= $Ft;
							 $array[$ark][$sbrk][5]	= $Er;
							 							 							 
							 $sse += $Er*$Er;
							 $j++;
						 }
					  }

					  $mse	= $sse/$n;
                      $mape	= (array_sum($avoedbavall)/($n))*100;
				  }
				  
				    $tahunfore	 = array();
					$tahunsimpan = $tahunterakhir+1;
					

					for($ab=1;$ab<=12;$ab++) {
						$proses		    = $array[$tahunterakhir][12][2]+$array[$tahunterakhir][12][3]*($array[$tahunterakhir][$ab][0]);
						$tahunfore[$ab]	= $proses;
					}
				  
				  //simpan tahun terakhir
				  if(isset($_POST['input_save'])) {
					  //$finalyear	= $array[$tahunterakhir];
					  $finalyear	= $tahunfore;
					  $stringsave	= "INSERT INTO `hasil_eponensial` ( `kabupaten`,`tahun`,`tahunawal`,`tahunakhir`,`jan`,`feb`,`mar`,`apr`,`mei`,`jun`,`jul`,`agu`,`sep`,`okt`,`nov`,`des`,`sse`,`mse`,`alpha`,`gamma`,`mape` )
									  VALUE ( '$kabupaten','$tahunsimpan','$awal','$akhir','{$finalyear[1]}','{$finalyear[2]}','{$finalyear[3]}','{$finalyear[4]}','{$finalyear[5]}',
									  '{$finalyear[6]}','{$finalyear[7]}','{$finalyear[8]}','{$finalyear[9]}','{$finalyear[10]}','{$finalyear[11]}','{$finalyear[12]}','$sse','$mse','$alpha'
									  ,'$gamma','$mape')";

					  $q = $koneksi->query($stringsave);
					  if ($q ) {
						  $notif = "Hasil perhitungan berhasil disimpan"; 
					  } else {
						  $notif = "Hasil perhitungan gagal disimpan" ;
					  }
				  }

				  if (isset($notif)) {
				  ?>
				  <div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<center><?php echo $notif ?></center>
				  </div>
				  <?php
					}
				  //menampilkan hasil
				  ?>
				  <form action="" method="post">
				  	<div class="row">
				  		<div class="col-md-4">
							<div class="form-group">
								<label>Nama Kabupaten</label>
								<select name="input_kabupaten" class="form-control">
						  			<?php
						  			$string = "SELECT * FROM `kab`";
						 		 	$q      = $koneksi->query($string);
						  			$kab	= $q->fetchAll(PDO::FETCH_NUM);
						  			foreach((array)$kab as $kb) {
									?>
									<option value="<?php echo $kb[1];?>" <?php echo ($kb[1]==$kabupaten)?'selected="selected"':'';?>><?php echo $kb[1];?></option>
									<?php
						  				}
						  			?>
						 		</select>
							</div>
						</div>
						<div class="col-md-2">
							<label>Tahun Awal</label>
								<select name="input_mulai" class="form-control">
									<?php
									for($i=2010;$i<=2025;$i++) {
							  		?>
							  	<option value="<?php echo $i;?>" <?php echo ($i==$awal)?'selected="selected"':'';?>><?php echo $i;?></option>
							  		<?php
						 				}
						 			?>
					 			</select>
				 		</div>
						<div class="col-md-2">
							<label>Tahun Akhir</label>
								<select name="input_akhir" class="form-control">
						 		<?php
						 		for($i=2010;$i<=2025;$i++) {
							  	?>
							  	<option value="<?php echo $i;?>" <?php echo ($i==$akhir)?'selected="selected"':'';?>><?php echo $i;?></option>
							  	<?php
									}
								?>
								</select>
				 		</div>
				 		<div class="col-md-2">
					  		<div class="form-group">
								<label>Alpha</label>
								<input type="text" class="form-control" name="input_alpha" value="<?php echo $alpha ?>" />
				  			</div>
				  		</div>
				  		<div class="col-md-2">	
				  			<div class="form-group">
								<label>Gamma</label>
								<input type="text" class="form-control" name="input_gamma" value="<?php echo $gamma ?>" />
				  			</div>
				  		</div>
					</div>
					<table class="table">
						<thead>
							<!-- <th>Parameter : </th> -->
						  	<th>n</th>
						  	<th>SSE</th>
						  	<th>MSE</th>
						  	<th>MAPE</th>
					 	</thead>
					<tbody>
						<tr>
							<!-- <td>&alpha; : <?php echo $alpha ?> <br /> &gamma; : <?php echo $gamma ?></td> -->
							<td><?php echo $n; ?></td>
							<td><?php echo number_format($sse,2,",","."); ?></td>
							<td><?php echo number_format($mse,2,",","."); ?></td>
							<td><?php echo ceil($mape); ?></td>
						</tr>
					</tbody>
					</table>
					<div class="panel panel-primary">
   	 			  		<div class="panel-heading">
      						Hasil Perhitungan Peramalan
    					</div>
  				   	<div class="panel-body">
    			    	<div class="dataTable_wrapper">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
						  				<th>Tahun</th>
						 				<th>Bulan</th>
										<th>Periode</th>
										<th>Permintaan</th>
						  				<th>St</th>
						  				<th>bt</th>
						  				<th>Ft</th>
						  				<!-- <th>Square Error</th> -->
										</thead>
								<tbody>
								<?php
									foreach((array)$array as $afk => $af) {
									foreach((array)$af as $amk => $am ) {
								?>
								<tr>
									<td><?php echo $afk ?></td>
									<td><?php echo $amk ?></td>
									<td><?php echo round($am[0],2) ?></td>
									<td><?php echo round($am[1],2) ?></td>
									<td><?php echo round($am[2],2) ?></td>
									<td><?php echo round($am[3],2) ?></td>
									<td><?php echo round($am[4],2) ?></td>
									<!-- <td><?php echo round($am[5],2) ?></td> -->
								</tr>
								<?php
							}
						}
						for($ab=1;$ab<=12;$ab++) {
							?>
							<tr>
								<td><?php echo $tahunterakhir+1 ?></td>
								<td><?php echo $ab+$amk ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?php echo round($tahunfore[$ab],2) ?></td>						
								</tr>
							<?php							
						}
						?>
							</tbody>
							</table>
					
			<div class="form-group">
				<input type="submit" name="input_save" value="SIMPAN HASIL" class="btn btn-primary" />
				</div>
			</div>
				<input type="hidden" name="input_hitung" value="hitung" />
			</form>
				<?php
			  
			  } else {
				  echo "Telah terjadi error pada ".$errormonth;
			  }
			  
			  } else {
				echo "Cek kembali nilai Alpha, Gammma yang anda masukan";
				}
           } else {
              ?>Data tidak ditemukan dalam database<?php
           }
        } else {
            header("Location: ?halaman=exponen&tahun=$tahun&kabupaten=$kabupaten&alpha=$alpha&gamma=$gamma");
        }
        break;
    case 'delete' :

    break;
    default   :
      $awal    	  = isset($_GET['input_awal'])?$_GET['input_awal']:'';
	  $akhir 	  = isset($_GET['input_akhir'])?$_GET['input_akhir']:'';
      $kabupaten  = isset($_GET['kabupaten'])?$_GET['Kabupaten']:'';
      $alpha   	  = isset($_GET['alpha'])?$_GET['alpha']:'';
      $gamma      = isset($_GET['gamma'])?$_GET['gamma']:'';
    ?>
    <form action="?halaman=exponen&aksi=hitung" method="post">
    <div class="container">
    	<div class="row">
    		<div class="col">
 	 			<div class="col-md-1 ">
    				<div class="form-group">
        				<label>Tahun Awal :</label>
        				<select name="input_mulai" class="form-control">
        <?php
        for($i=2016;$i<=2020;$i++) {
            ?>
            <option value="<?php echo $i;?>" <?php echo ($awal==$i)?'selected="selected"':'';?>><?php echo $i;?></option>
            <?php
        }
        ?>
        </select>
    				</div>
	 			</div>
	 		</div>
	<div class="col">
		<div class="col-md-1">
    		<div class="form-group">
        		<label>Tahun Akhir :</label>
        		<select name="input_akhir" class="form-control">
        <?php
        for($i=2016;$i<=2020;$i++) {
            ?>
            <option value="<?php echo $i;?>" <?php echo ($akhir==$i)?'selected="selected"':'';?>><?php echo $i;?></option>
            <?php
        }
        ?>
        		</select>
    		</div>
		</div>
	</div>

	<div class="col">
    	<div class="col-md-2">
        	<div class="form-group">
         		<label>Kabupaten :</label>
         		<select name="input_kabupaten" class="form-control">
         <?php
         $string = "SELECT * FROM `kab`";
         $q      = $koneksi->query($string);
         $kab    = $q->fetchAll(PDO::FETCH_NUM);
         foreach((array)$kab as $kb) {
            ?>
            <option value="<?php echo $kb[1];?>" <?php echo ($kb[1]==$kabupaten)?'selected="selected"':'';?>><?php echo $kb[1];?></option>
            <?php
        }
        ?>
        </select>
        	</div>
		</div>
	</div>
		</div>
    </form>

	<div class="row">
		<div class="col">
    		<div class="col-md-1">
        		<div class="form-group">
          			<label>Alpha :</label>
          			<input type="text" name="input_alpha" class="form-control" autocomplete="off" value="<?php echo $alpha ?>" />
        		</div>
   			</div>
   		</div>
	<div class="col">
    	<div class="col-md-1">
        	<div class="form-group">
          		<label>Gamma :</label>
          		<input type="text" name="input_gamma" class="form-control" autocomplete="off" value="<?php echo $gamma ?>" />
        	</div>
    	</div>
	</div>
	</div>
	<div class="row">
	<div class="col">
    	<div class="col-md-1">
    		<div class="form-group">
     			<button type="submit" name="input_hitung" class="btn btn-md btn-primary" value="Proses"><i class="fa fa-calculator"></i> Proses</button>
    		</div>
    	</div>
    </div>
    </div>
    </div>
    <?php

}

?>
