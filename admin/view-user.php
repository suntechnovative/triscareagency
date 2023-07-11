<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	$pid=intval($_GET['pid']);	
	?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Tristar Care Agency | Admin Job Creation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="js/jquery-2.1.4.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
		type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>

</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<?php include('includes/header.php');?>

				<div class="clearfix"> </div>
			</div>
			<!--heder end here-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>View User
				</li>
			</ol>
			<!--grid-->
			<div class="grid-form">

				<div class="grid-form1">


					<?php 
						$id=intval($_GET['pid']);
						$sql = "SELECT * from tblmaid where id=:id";
						$query = $dbh -> prepare($sql);
						$query -> bindParam(':id', $id, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{	?>


					<div class="container">
						<h2>View User Details</h2>
						<!-- <p>The .table-bordered class adds borders on all sides of the table and the cells:</p> -->
						<table class="table table-bordered">
							<thead>
								<tr>
									<td><strong>Name</strong></td>
									<td><?php echo htmlentities($result->Name);?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>Email</strong></td>

									<td><?php echo htmlentities($result->Email);?></td>
								</tr>
								<tr>
									<td><strong>Applying for?</strong></td>

									<td><?php echo htmlentities($result->CategoryName);?></td>
								</tr>
								<tr>
									<td><strong>Phone</strong></td>

									<td><?php echo htmlentities($result->ContactNumber);?></td>
								</tr>
								<tr>
									<td><strong>Address</strong></td>

									<td><?php echo htmlentities($result->Address);?></td>
								</tr>
								<tr>
									<td><strong>DOB</strong></td>

									<td><?php echo htmlentities($result->Dateofbirth);?></td>
								</tr>
								<tr>
									<td><strong>Gender</strong></td>

									<td><?php echo htmlentities($result->Gender);?></td>
								</tr>
								<tr>
									<td><strong>Description (If any)</strong></td>

									<td><?php echo htmlentities($result->Description);?></td>
								</tr>
								<tr>
									<td><strong>Photo</strong></td>

									<td><img src="../images/<?php echo htmlentities($result->ProfilePic);?>" width="200">
</td>
								</tr>
								<tr>
									<td><strong>CV</strong></td>

									<td><iframe src="../idproofimages/<?php echo htmlentities($result->IdProof);?>" width="90%" height="500px"></iframe></td>
								</tr>
							</tbody>
						</table>
					</div>

					<?php }} ?>





				</div>
				<!--//grid-->

				<!-- script-for sticky-nav -->
				<script>
					$(document).ready(function () {
						var navoffeset = $(".header-main").offset().top;
						$(window).scroll(function () {
							var scrollpos = $(window).scrollTop();
							if (scrollpos >= navoffeset) {
								$(".header-main").addClass("fixed");
							} else {
								$(".header-main").removeClass("fixed");
							}
						});

					});
				</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">

				</div>
				<!--inner block end here-->
				<!--copy rights start here-->
				<?php include('includes/footer.php');?>
				<!--COPY rights end here-->
			</div>
		</div>

		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include('includes/sidebarmenu.php');?>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function () {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function () {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->

</body>

</html>
<?php } ?>