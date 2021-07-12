<?php
include '../aksi/halau.php';
include '../config/koneksi.php';

//PERINTAH UNTUK MENGEDIT DATA BERDASARKAN ID DATA
if (isset($_GET['no'])) {
	$data = $conn->prepare("SELECT * FROM dataservis WHERE no = ? ");
	$no = $_GET['no'];
	$data->bind_param('i', $no);
	$data->execute();

	$result = $data->get_result();
	$row= $result->fetch_row();
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Aplikasi</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="seniman koding">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css2/font.css">
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->

	<!--Tanggal Kalender-->
	
	
		
		
</head>

<body>

		<!-- start: Header -->
	<?php include 'navbar.php'; ?>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
				<div class="row-fluid">
						
					<!-- start: Main Menu -->
					<?php include 'sidebarr.php'; ?>
					<!-- end: Main Menu -->
					<!-- start: Content -->
						<div id="content" class="span10">
								
								
								<ul class="breadcrumb">
									<li>
										<i class="icon-home"></i>
										<a href="dashboard.php">Home</a> 
										<i class="icon-angle-right"></i>
									</li>
									<li><a href="dataservis.php">Data Servis</a></li>
								</ul>

		<?php
		  	if (isset ($_GET['alert'])){
		  		$alert = $_GET['alert'];
		  		if ($alert == "insert"){
		  			?>
		  			<?php echo '<div class="alert alert-success"><strong>Success!</strong>Data Berhasil disimpan</div>';?>
		  			<?php
		  		} elseif ($alert == "hapus"){
		  			?>
		  			<?php echo '<div class="alert alert-info"><strong>Success!</strong>Data Berhasil dihapus</div>';?>
		  			<?php
		  		} elseif ($alert == "update"){
		  			?>
		  			<?php echo '<div class="alert alert-warning"><strong>Success!</strong>Data Berhasil diupdate</div>';?>
		  			<?php
		  		} elseif ($alert == "gagal"){
		  			?>
		  			<?php echo '<div class="alert alert-danger"><strong>Gagal!</strong>Data Gagal di eksekusi</div>';?>
		  			<?php
		  		}
		  	}
		  	?>

		  	
		  	
		<div class="row-fluid sortable">		
		
			  


			 	
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Edit Data</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

			<div class="box-content">
			  	<form class="form-horizontal" action="../aksi/transaksi_update.php?update" method="post">
			  		 <div class="form-group">
					    <label class="control-label col-sm-2" for="no">No. NOTA:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="no" value="<?php echo $row ['0']; ?>" readonly>
					    </div>
					  </div><br>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="nmbarang">Nama Barang:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="nmbarang" value="<?php echo $row ['1']; ?>" required>
					    </div>
					  </div><br>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="nmpemilik">Nama Konsumen:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="nmpemilik" value="<?php echo $row ['2']; ?>" required>
					    </div>
					  </div><br>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="alamat">Alamat:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="alamat" value="<?php echo $row ['3']; ?>" required>
					    </div>
					  </div><br>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="tlpn">No.Tlpn:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="tlpn" value="<?php echo $row ['4']; ?>" required>
					    </div>
					  </div><br>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="kerusakan">Kerusakan:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="kerusakan" value="<?php echo $row ['5']; ?>" required>
					    </div>
					  </div><br>

					  <!-- <div class="form-group">
					    <label class="control-label col-sm-2" for="kelengkapan">Kelengkapan:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="kelengkapan" value="<?php echo $row ['6']; ?>" required>
					    </div>
					  </div><br> -->

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="tglditerima">Tgl. Diterima:</label>
					    <div class="col-sm-10"> 
					      <input type="date" class="form-control" name="tglditerima" value="<?php echo $row ['7']; ?>" readonly><span style="color:#0573fb";> bln/tgl/thn</span>
					    </div>
					  </div><br>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="penerimabarang">Penerima Barang:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="penerimabarang" value="<?php echo $row ['8']; ?>" required>
					    </div>
					  </div><br>

					   <div class="form-group">
					    <label class="control-label col-sm-2" for="teknisi">Teknisi:</label>
					    <div class="col-sm-10"> 
						<select name="teknisi" class="form-control" required> 
						<?php
						    include '../config/koneksi.php';

						    $data = $conn->query("SELECT * FROM teknisi ORDER BY nm_teknisi desc");
						    
						    while ($result = $data->fetch_assoc()){
						    	?>
								<option value="<?= $result['nm_teknisi']; ?>"><?= $result['nm_teknisi']; ?></option>
								<?php
						      }
						      $data->close();
						      $conn->close();
								?>
						</select>
					    </div>
					  </div><br>

					   <!-- <div class="form-group">
					    <label class="control-label col-sm-2" for="kondisibrg">Kondisi Barang:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="kondisibrg" value="<?php echo $row ['10']; ?>" >
					    </div>
					  </div><br> -->

					 <div class="form-group">
					    <label class="control-label col-sm-2" for="tglambil">Tanggal Ambil:</label>
					    <div class="col-sm-10"> 
					      <input type="date" class="form-control" name="tglambil" value="<?php echo $row ['11']; ?>" ><span style="color:#0573fb";> bln/tgl/thn</span>
					    </div>
					  </div><br> 

					   <div class="form-group">
					    <label class="control-label col-sm-2" for="qty">QTY:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="qty" value="<?php echo $row ['12']; ?>" >
					    </div>
					  </div><br> 

					   <div class="form-group">
					    <label class="control-label col-sm-2" for="biaya">Jumlah:</label>
					    <div class="col-sm-10"> 
					      <input type="text" class="form-control" name="biaya" value="<?php echo $row ['13']; ?>" >
					    </div>
					  </div><br>

					 <div class="form-group">
						<label class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-6">
							<input type="submit" name="update" class="btn btn-sm btn-info" value="tambah">
							<a href="" class="btn btn-sm btn-danger"><b>Batal</b></a>
						</div>
					</div>
				</form><br>

				  	<div class="modal fade" id="modal-id">
				  		<div class="modal-dialog">
				  			<div class="modal-content">
				  				<div class="modal-header">
				  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  					<h4 class="modal-title">Modal title</h4>
				  				</div>
				  				<div class="modal-body">
				  					
				  				</div>
				  				<div class="modal-footer">
				  					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  					<button type="button" class="btn btn-primary">Save changes</button>
				  				</div>
				  			</div>
				  		</div>
				  	</div>

			    </div>
			  </div>
			  </div>
					
				</div><!--/span-->
			
			</div><!--/row-->

		
		
	
	
	<div class="clearfix"></div>
	
	<?php include 'footer.php';?>
	
	<!-- start: JavaScript-->

	
</body>
</html>

<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="../js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="../js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="../js/jquery.ui.touch-punch.js"></script>
	
		<script src="../js/modernizr.js"></script>
	
		<script src="../js/bootstrap.min.js"></script>
	
		<script src="../js/jquery.cookie.js"></script>
	
		<script src='../js/fullcalendar.min.js'></script>
	
		<script src='../js/jquery.dataTables.min.js'></script>

		<script src="../js/excanvas.js"></script>
	<script src="../js/jquery.flot.js"></script>
	<script src="../js/jquery.flot.pie.js"></script>
	<script src="../js/jquery.flot.stack.js"></script>
	<script src="../js/jquery.flot.resize.min.js"></script>
	
		<script src="../js/jquery.chosen.min.js"></script>
	
		<script src="../js/jquery.uniform.min.js"></script>
		
		<script src="../js/jquery.cleditor.min.js"></script>
	
		<script src="../js/jquery.noty.js"></script>
	
		<script src="../js/jquery.elfinder.min.js"></script>
	
		<script src="../js/jquery.raty.min.js"></script>
	
		<script src="../js/jquery.iphone.toggle.js"></script>
	
		<script src="../js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="../js/jquery.gritter.min.js"></script>
	
		<script src="../js/jquery.imagesloaded.js"></script>
	
		<script src="../js/jquery.masonry.min.js"></script>
	
		<script src="../js/jquery.knob.modified.js"></script>
	
		<script src="../js/jquery.sparkline.min.js"></script>
	
		<script src="../js/counter.js"></script>
	
		<script src="../js/retina.js"></script>

		<script src="../js/custom.js"></script>
	<!-- end: JavaScript-->
	