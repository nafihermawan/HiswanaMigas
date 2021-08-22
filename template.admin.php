<?php
$koneksi    = koneksi();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/dua.png" type="image/dua.png" />

    <title>HISWANA MIGAS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center><a href="#" class="site_title">HISWANA MIGAS</a></center> <!-- menu -->
            </div>
            <div>
              <center><b style="color:white">Himpunan Wiraswasta Nasional Minyak dan Gas</b></center><br>
              <center><img src="images/logo.png" width="65%"></center><br>
              <center><a style="color:white">Jl. Parangtritis Km.3,5, Perwita Regency Blok B1 & 2 ,Yogyakarta 55187</a></center>
            </div> 
            <div class="clearfix"></div><br/>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              	<ul class="nav side-menu">
                	  <li class="<?php echo getPage()=='home'?'current-page':''; ?>"><a href="index.php"><i class="fa fa-home"></i>Beranda</a></li>
                    <li class="<?php echo getPage()=='pasokan'?'current-page':''; ?>"><a href="?halaman=pasokan"><i class="fa fa-folder-open"></i>Data Permintaan</a></li>
                    <li class="<?php echo getPage()=='persediaan'?'current-page':''; ?>"><a href="?halaman=persediaan"><i class="fa fa-folder-open"></i>Data Persediaan</a></li>
                    <li class="<?php echo getPage()=='hasilexponen'?'current-page':''; ?>"><a href="?halaman=hasilexponen"><i class="fa fa-folder-open"></i>Hasil Double Exponensial</a></li>
                    <li class="<?php echo getPage()=='exponen'?'current-page':''; ?>"><a href="?halaman=exponen"><i class="fa fa-calculator"></i>Perhitungan Holt's</a></li>
                    <li class="<?php echo getPage()=='fuzzy'?'current-page':''; ?>"><a href="?halaman=fuzzy"><i class="fa fa-calculator"></i>Perhitungan Fuzzy</a></li>
                	<li class="<?php echo getPage()=='logout'?'current-page':''; ?>"><a href="?halaman=logout"><i class="fa fa-sign-out"></i>Keluar</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
        </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" >
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right"></ul>
            </nav>
            <i class="fa fa-calendar fa-fw"></i><span> <?php echo date("D , d F Y")?> </span>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"></a> -->
                  
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12">
        	<?php //untuk memanggil file halaman ?>
			<?php include "page.".$_SESSION['login'].".".getPage().".php"; ?> 
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">

          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/icheck.min.js"></script>

<!-- datatables -->
   <script src="js/datatables.min.js"></script>
   <script>
    $(document).ready(function() {

      var dataload= $("#tabel").DataTable({
        "bPaginate" : false,
        "autoWidth" : false,
        "paging"    : false,
      });

    });
    </script>
    
    <!-- Custom Theme Scripts -->
	<script src="js/custom.min.js"></script>
	<?php
   	if($_SESSION['login']=='admin' && (getPage()=='grafikhasil') ) {
     ?>
     <script src="js/Chart.min.js"></script>
     <script src="js/highcharts.js"></script>
     <script src="js/exporting.js"></script>
     <script>
     $(document).ready(function() {
		  <?php
		  if(isset($label) && isset($jumlah)) {
			 ?>
	     var popCanvas = $("#popChart");
	     var popCanvas = document.getElementById("popChart");
	     var popCanvas = document.getElementById("popChart").getContext("2d");
	     var barChart = new Chart(popCanvas, {
									       type: 'bar',
									       data: {
										        labels: [<?php echo $label ?>],
										        datasets: [{

										         label: 'Harga Pasokan',
										         data: [<?php echo $jumlah ?>],
										         backgroundColor: [
										          'rgba(255, 99, 132, 0.6)',
										          'rgba(54, 162, 235, 0.6)',
										          'rgba(255, 206, 86, 0.6)',
										          'rgba(75, 192, 192, 0.6)',
										          'rgba(153, 102, 255, 0.6)',
										          'rgba(255, 159, 64, 0.6)',
										          'rgba(255, 99, 132, 0.6)',
										          'rgba(54, 162, 235, 0.6)',
										          'rgba(255, 206, 86, 0.6)',
										          'rgba(75, 192, 192, 0.6)',
										          'rgba(153, 102, 255, 0.6)'
										         ]
										        }]
	       		  						}
	     								});

		  <?php
	  		}
		  // iki sing nampilkan grapik halaman grapik
		  if(isset($graphlabel) && isset($grapjumlah)) {
			  ?>
			  var color = Chart.helpers.color;
			  var grapCanvas		= $("#grapChart");
			  var grapCanvas 		= document.getElementById("grapChart");
			  var grapCanvas 		= document.getElementById("grapChart").getContext("2d");
			  var grapCanvas = new Chart(grapCanvas, {
										       type: 'bar',
										       data: {
											        labels: [<?php echo $graphlabel ?>],
											        datasets: [{
														   label: 'Data Permintaan',
														   data: [<?php echo $grapjumlah[0] ?>],
															backgroundColor: 'rgba(255, 160, 65, 0.6)',
															borderColor: 'rgba(255, 207, 87, 0.6)',
															borderWidth: 1,
											        	},{
															label: 'Data Peramalan',
 														  	data: [<?php echo $grapjumlah[1] ?>],
															backgroundColor: 'rgba(255, 100, 133, 0.6)',
															borderColor: 'rgba(255, 207, 87, 0.6)',
															borderWidth: 1,
				       		  						}]
													}
												});
			  <?php
		  } else if(isset($acbahan)) {
				$array = array();
				
				foreach((array)$acbahan as $dpgk => $dpg) {
						$rtn     = "{";
                        $rtn    .= "name: '$dpgk',";
        				$rtn    .= "data: [";
						$rtn    .= implode(",",$dpg);
						$rtn    .= "]}";
						$array[] = $rtn;
				}
				?>
					var options = {
			            chart: {
			                renderTo: 'mygraph',
			                type: 'area'
			                
			            },
			            title: {
			                text: 'Prediksi Permintaan'
			            },
			            subtitle: {
			                text: ''
			            },
			            xAxis: {
			                categories: [<?php echo $tahunarray; ?>]
			            },
			            yAxis: {
			                title: {
			                    text: 'Harga Pasokan'
			                },
			            },
			            tooltip: {
			                formatter: function() {
			                        return '<b>'+ this.series.name +'</b><br/>'+
			                        this.x +': '+ this.y;
			                }
			            },
			            series: [<?php echo implode(",",$array); ?>],
						responsive: {
								rules: [{
									condition: {
										maxWidth: 500
									},
									chartOptions: {
										legend: {
											layout: 'horizontal',
											align: 'center',
											verticalAlign: 'bottom'
										}
									}
								}]
							}
			        }
					
					chart = new Highcharts.Chart(options);
				<?php
				}
		?>
		});
		</script>
		<?php
   }
   ?>
   
  </body>
</html>
