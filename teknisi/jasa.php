<?php
include '../aksi/halau.php';
include '../config/koneksi.php';

//PERINTAH UNTUK MENGEDIT DATA BERDASARKAN ID DATA
if (isset($_GET['kd_jasa'])) {
	$data = $conn->prepare("SELECT * FROM jasa WHERE kd_jasa = ? ");
	$no = $_GET['kd_jasa'];
	$data->bind_param('i', $kd_jasa);
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
	<title>List Data Jasa</title>
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
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
				
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
									<li><a href="jasa.php">Data Jasa</a></li>
								</ul>

		 
			  <div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header">
							<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Form Data Jasa </h2>
							
						</div>
                        <div class="clearfix">
                            <button class="width-35 pull-right btn btn-sm btn-success" onclick="location.href='tambahjasa.php'">
                                <i class="ace-icon fa fa-add"></i>
                                <span class="bigger-110"> + Tambah Data</span>
                                
                            </button>
                        </div>
						<div class="box-content">
							
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
						    <thead>
						      <tr>
						        <th><font size="2">Kode Jasa</th>
						        <th><font size="2">Kerusakan</th>
						        <th><font size="2">Harga</th>
						        <th><font size="2">Opsi</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php
						    include '../config/koneksi.php';

						    $kd_jasa ='';
						    $data = $conn->query("SELECT * FROM jasa ORDER BY kd_jasa desc");

						    
						    while ($result = $data->fetch_assoc()){
						    	?>
						      <tr>
						        <td><font size="2"><?php echo $result ['kd_jasa']; ?></td>
						        <td><font size="2"><?php echo $result ['kerusakan'] ; ?></td>
						        <td><font size="2"><?php echo $result ['harga'] ; ?></td>			
							    <td class="center">                                        
									<a class="btn btn-info" href="datajasa-1.php?kd_jasa=<?php echo $result ['kd_jasa'] ; ?>" title="Edit Data Jasa">
										<i class="halflings-icon white edit"></i></a>                                           

									<a class="btn btn-danger" href="../aksi/proses.php?kd_jasa=<?php echo $result ['kd_jasa'] ; ?>"onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"title="Hapus Data">
										<i class="halflings-icon white trash"></i></a> 		
									
								</td>
						        
						      </tr>
						      <?php
						      $kd_jasa++;
						      }
						      $data->close();
						      $conn->close();
						      ?>
						    </tbody>
			 		      </table>
						</div>
					</div><!--/span-->
					
						<!-- end: Content -->
					</div><!--/#content.span10-->
			</div><!--/fluid-row-->
					
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