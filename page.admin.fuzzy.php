<h1>Perhitungan Fuzzy Mamdani</h1>
<?php
if(getPageSub()=='hitung' ) {
    ?><a href="?halaman=fuzzy" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke input Parameter</a><?php
}
?>
<hr width="85%" align="left">

<?php

switch(getPageSub()) {
	case 'hitung'	:
		$A1		= isset($_POST['A1'])?$_POST['A1']:'';
		$A2		= isset($_POST['A2'])?$_POST['A2']:'';
		$A3		= isset($_POST['A3'])?$_POST['A3']:'';
		$B1		= isset($_POST['B1'])?$_POST['B1']:'';
		$B2		= isset($_POST['B2'])?$_POST['B2']:'';
		$B3		= isset($_POST['B3'])?$_POST['B3']:'';
		$C1		= isset($_POST['C1'])?$_POST['C1']:'';
		$C2		= isset($_POST['C2'])?$_POST['C2']:'';
		$C3		= isset($_POST['C3'])?$_POST['C3']:'';
		$X		= isset($_POST['X'])?$_POST['X']:'';
		$Y		= isset($_POST['Y'])?$_POST['Y']:'';

		if(!empty($A1) && !empty($A2) && !empty($A3) && !empty($B1) && !empty($B2) && !empty($B3) && !empty($C1) && !empty($C2) && !empty($C3)&& !empty($X) && !empty($Y)) {
			// permintaan rendah
			if($X<=$A1) {
				$permrendah	= 1;
			} else if($A1<$X && $X<=$A2) {
				$permrendah	= round(($A2 - $X) /($A2 - $A1),3);;
			} else if($X>$A2) {
				$permrendah	= 0;
			}
			// permintaan sedang
			if($X<$A1 || $X>$A3) {
				$permsedang	= 0;
			} else if($A1<=$X && $X<=$A2) {
				$permsedang	= round( ($X-$A1) / ($A2-$A1),3);
			} else if($A2<=$X && $X<=$A3) {
				$permsedang	= round( ($A3-$X) / ($A3-$A2),3);
			}
			// permintaan tinggi
			if($X<$A2) {
				$permtinggi	= 0;
			} else if($X>=$A2 && $X<=$A3) {
				$permtinggi	= round( ($A3-$X) / ($A3-$A2),3);
			} else if($X>$A3) {
				$permtinggi	= 1;
			}

			// Persediaan rendah
			if($Y<=$B1) {
				$persrendah	= 1;
			} else if($B1<$Y && $Y<=$B2) {
				$persrendah	= round(($B2 - $Y) /($B2 - $B1),3);;
			} else if($Y>$B2) {
				$persrendah	= 0;
			}
			// persediaan sedang.
			if($Y<$B1 || $Y>$B3) {
				$perssedang	= 0;
			} else if($B1<=$Y && $Y<=$B2) {
				$perssedang	= round( ($Y-$B1) / ($B2-$B1),3);
			} else if($B2<=$Y && $Y<=$B3) {
				$perssedang	= round( ($B3-$Y) / ($B3-$B2),3);
			}
			// persedian tinggi
			if($Y<$B2) {
				$perstinggi	= 0;
			} else if($Y>=$B2 && $Y<=$B3) {
				$perstinggi	= round( ($B3-$Y) / ($B3-$B2),3);
			} else if($Y>$B3) {
				$perstinggi	= 1;
			}

			/*
			If ( permintaan is Rendah ) and ( persediaan is sedikit ) then ( stok sedikit )
			If ( permintaan is Rendah ) and ( persedian is sedang ) then ( stok sedikit )
			If ( permintaan is Rendah ) and ( persediaan is banyak ) then ( stok sedikit )
			If ( permintaan is Sedang ) and ( persediaan is sedikit ) then ( stok sedang )
			If ( permintaan is Sedang ) and ( persediaan is sedang ) then ( stok sedang )
			If ( permintaan is Sedang ) and ( persediaan is banyak ) then ( stok sedikit )
			If ( permintaan is Tinggi ) and ( persediaan is sedikit ) then ( stok banyak )
			If ( permintaan is Tinggi ) and ( persediaan is sedang ) then ( stok banyak )
			If ( permintaan is Tinggi ) and ( persediaan is banyak ) then ( stok sedang )
			*/
			//Aplikasi aturan fuzzy
			$P1	= min($permrendah,$persrendah);
			$P2	= min($permrendah,$perssedang);
			$P3	= min($permrendah,$perstinggi);
			$P4	= min($permsedang,$persrendah);
			$P5	= min($permsedang,$perssedang);
			$P6	= min($permsedang,$perstinggi);
			$P7	= min($permtinggi,$persrendah);
			$P8	= min($permtinggi,$perssedang);
			$P9	= min($permtinggi,$perstinggi);

		   //Aturan fungsi implikasi
			$a1	= abs(($P1*($C2-$C1))-$C1);
			$a2	= abs(($P1*($C2-$C1))-$C1);
			$a3	= abs(($P1*($C2-$C1))-$C1);
			$a4	= abs(($P4*($C2-$C1))-$C1);
			$a5	= abs(($P5*($C2-$C1))-$C1);
			$a6	= abs(($P6*($C2-$C1))-$C1);
			$a7	= abs(($P7*($C3-$C2))-$C2);
			$a8	= abs(($P8*($C3-$C2))-$C2);
			$a9	= abs(($P9*($C3-$C2))-$C2);

			if(($P1+$P2)>0) {
				$z = (($P1*$a1)+($P2*$a2)+($P3*$a3)+($P4*$a4)+($P5*$a5)+($P6*$a6)+($P7*$a7)+($P8*$a8)+($P9*$a9))/($P1+$P2+$P3+$P4+$P5+$P6+$P7+$P8+$P9);
			} else {
				$z = "Periksa kembali angka yang anda masukan";
			}

			?>
	<div class="panel panel-primary">
    	<div class="panel-heading">
      	HASIL PERHITUNGAN FUZZY MAMDANI
    	</div>
  	<div class="panel-body">
    	<div class="dataTable_wrapper">
			<div class="row">
				<div class="col">
					<div class="col-md-4">
						<p style="text-align:center">Variabel Permintaan</p>
					<div class="form-group">
						<label>Rendah :</label>
						<input type="text" name="A1" class="form-control" value="<?php echo $permrendah ?>" />
					</div>
					<div class="form-group">
						<label>Sedang :</label>
						<input type="text" name="A2" class="form-control" value="<?php echo $permsedang ?>" />
					</div>
					<div class="form-group">
						<label>Tinggi :</label>
						<input type="text" name="A3" class="form-control" value="<?php echo $permtinggi ?>" />
					</div>
					</div>
				</div>
			<div class="col">
				<div class="col-md-4">
					<p style="text-align:center">Variabel Persediaan</p>
						<div class="form-group">
							<label>Sedikit :</label>
							<input type="text" name="B1" class="form-control" value="<?php echo $persrendah ?>" />
						</div>
						<div class="form-group">
							<label>Sedang :</label>
							<input type="text" name="B2" class="form-control" value="<?php echo $perssedang ?>" />
						</div>
						<div class="form-group">
							<label>Banyak :</label>
							<input type="text" name="B3" class="form-control" value="<?php echo $perstinggi ?>" />
						</div>
				</div>
				<div class="col">
					<div class="col-md-4">
						<p style="text-align:center">Jumlah Pasokan</p>
							<div class="form-group">
								<label> Hasil :</label>
								<input type="text" class="form-control" value="<?php echo ceil($z) ?>" />
							</div>
					</div>
				</div>
			</div>
		</div>
			<?php

		} else {
			echo "Nilai masih kosong";
		}


		break;
	default	:
		?>
		<form method="POST" action="?halaman=fuzzy&aksi=hitung" autocomplete="off">
			<div class="row">
				<div class="col-md-3 col-sd-12">
					<p style="text-align:center">Variabel Permintaan</p>
						<div class="form-group">
							<label>Rendah :</label>
							<input type="text" name="A1" class="form-control" value="" />
						</div>
						<div class="form-group">
							<label>Sedang :</label>
							<input type="text" name="A2" class="form-control" value="" />
						</div>
						<div class="form-group">
							<label>Tinggi :</label>
							<input type="text" name="A3" class="form-control" value="" />
						</div>
				</div>
			<div class="col-md-3 col-sd-12">
				<p style="text-align:center">Variabel Persediaan</p>
					<div class="form-group">
						<label>Sedikit :</label>
						<input type="text" name="B1" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label>Sedang :</label>
						<input type="text" name="B2" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label>Banyak :</label>
						<input type="text" name="B3" class="form-control" value="" />
					</div>
			</div>
			<div class="col-md-3 col-sd-12">
				<p style="text-align:center">Variabel Pasokan</p>
					<div class="form-group">
						<label>Sedikit :</label>
						<input type="text" name="C1" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label>Sedang :</label>
						<input type="text" name="C2" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label>Banyak :</label>
						<input type="text" name="C3" class="form-control" value="" />
					</div>
			</div>
			<div class="col-md-3">
				<p style="text-align: center;">Permintaan dan Persediaan</p>
					<div class="form-group">
						<label>Permintaan :</label>
						<input type="text" name="X" class="form-control" value="" />
					</div>
					<div>
						<label>Persediaan :</label>
						<input type="text" name="Y" class="form-control" value="" />
					</div>
			</div>
			</div>
		</div>
		</div>	
		<div class="row">
			<div class="col">
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" name="input_hitung" class="btn btn-lg btn-primary" value="Proses"><i class="fa fa-calculator"></i> Proses</button>
					</div>
				</div>
			</div>
		</div>
			
		</form>
		<?php
}

?>
