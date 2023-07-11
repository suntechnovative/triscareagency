
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$comment=$_POST['comment'];
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Booked Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
      <link rel="icon" type="image/x-icon" href="assets/favicon.html" />
    <!-- Font Awesome icons (free version)-->
    <script crossorigin="anonymous" src="../../use.fontawesome.com/releases/v6.1.0/js/all.js"></script>
    
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&amp;display=swap">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../css/styles.css" />
    <style>
        /*-- holiday --*/
.holiday {
    padding: 5em 0;
}
.holiday h3 {
    font-size: 2em;
    font-weight: 700;
    color: #34ad00;
}
.holiday p {
    font-size: 1.2em;
    line-height: 1.8em;
    margin: 1em 0;
    color: #999;
}
.rom-btm {
    margin-top: 2em;
	box-shadow: 0px 0px 5px -1px rgba(0, 0, 0, 0.37);
}
.rom-btm h4 {
    font-size: 1.5em;
    font-weight: 700;
    color: #34ad00;
}
.rom-btm p {
    font-size: 15px;
    color: #999;
}
.rom-btm h6 {
    font-size: 1em;
    font-weight: 700;
    margin: 0.5em 0;
}
.room-right {
    text-align: right;
    padding: 3em 2em;
}
.room-midle {
    padding: 1em;
}
.rom-btm h5 {
    font-size: 1.2em;
    font-weight: 700;
    color: #999;
}
.room-left {
    float: left;
    width: 30%;
}
.room-left {
    width: 29%;
}
.room-left {
    width: 27%;
}
.room-left {
    width: 100%;
    padding: 0;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-top: 20px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-md-3 {
    width: 25%;
  }
@media (min-width: 992px) {
  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
}
/*-- /holiday --*/
    </style>
 
</head>
<body>
            <a href="../index.html"><img src="../media/udgd3uha/tca-logo.png" class="navbar-brand logo"></a>

    
<!-- Navigation-->
<nav class="navbar-expand-lg navbar-light triNav">
    <div class="container px-4 px-lg-5">

            <a class="btn btn-primary" href="../login.php"> Login </a>
      
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../index.html">Home</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../about/index.html">About</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../services/index.html">Services</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Jobs</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../contact/index.html">Contact</a></li>    

            </ul>
        </div>
    </div>
</nav>
   
    

<!-- Page Header-->
<header class="masthead" style="background-image: url('../media/k2jjd410/ypandlt.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                                      <h1>Jobs</h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

 <main class="mb-4">
    <div class="container px-4 px-lg-5">
        


    View our latest jobs available.  If you are interested in any of the jobs below email us your CV with a statement telling us why you want to join our team.&#xA;&#xA;


<p><h3>Job List</h3></p>
	
	

<?php $sql = "SELECT * from tbltourpackages";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			


  <div class="row">
    <div class="col-sm-2" style="background-color:#f9f7f7;"><img src="../admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" width="120px" alt=""></div>
    <div class="col-sm-7" style="background-color:#f9f7f7;"><h4>Job Title: <?php echo htmlentities($result->PackageName);?></h4>
					<h6>Job Type : <?php echo htmlentities($result->PackageType);?></h6>
					<p><b>Job Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p></div>
    <div class="col-sm-2" style="background-color:#f9f7f7;"><h5>USD <?php echo htmlentities($result->PackagePrice);?></h5>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a></div>
  </div>

<?php }} ?>
			
		
<div><a href="package-list.php" class="view">View More Packages</a></div>
</div>
			<div class="clearfix"></div>
	
</main>    

   
    

   
   
<!-- Footer-->
<footer class="border-top" style="background:#000;">
    <div class="container my-5 px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                   <ul class="list-inline text-center">
                         <li class="list-inline-item">
                        <a href="https://facebook.com/#">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>    
                         <li class="list-inline-item">
                        <a href="https://instagram.com/#">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>    
                   </ul>  
               
                <div class="small text-center text-muted fst-italic py-3">Copyright &copy; Tristar Care Agency 2023</div>
            </div>
        </div>
    </div>
</footer>

    <!-- Bootstrap core JS-->
    <script src="../../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>
</html>


