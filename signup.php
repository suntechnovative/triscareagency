
<?php
session_start();
//error_reporting(0);
include('includes/config.php');

    if(isset($_POST['submit'])){


 $CategoryName=$_POST['CategoryName'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $contno=$_POST['contno'];
 $exp=$_POST['experience'];
 $dob=$_POST['dob'];
 $add=$_POST['add'];
 $desc=$_POST['desc'];
 $gender=$_POST['gender'];
 $pic=$_FILES["pic"]["name"];
 $idproof=$_FILES["idproof"]["name"];
 $extension = substr($pic,strlen($pic)-4,strlen($pic));
 $extension1 = substr($idproof,strlen($idproof)-4,strlen($idproof));
 $allowed_extensions = array(".jpg","jpeg",".png",".gif");
 $allowed_extensions1 = array(".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Pic has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$picnew=md5($pic).time().$extension;
 move_uploaded_file($_FILES["pic"]["tmp_name"],"images/".$picnew);


if(!in_array($extension1,$allowed_extensions1))
{
echo "<script>alert('Applicant CV has Invalid format. Only /pdf format allowed');</script>";
}
else
{

$idproof=md5($idproof).time().$extension1;
 move_uploaded_file($_FILES["idproof"]["tmp_name"],"idproofimages/".$idproof);
$ret="select Email from tblmaid where Email=:email || ContactNumber=:contno";
 $query= $dbh -> prepare($ret);
$query->bindParam(':contno',$contno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{

$sql="insert into tblmaid(CategoryName,Name,Email,ContactNumber,Gender,Experience,Dateofbirth,Address,Description,ProfilePic,IdProof)values(:CategoryName,:name,:email,:contno,:gender,:exp,:dob,:add,:desc,:pic,:idproof)";
$query=$dbh->prepare($sql);
$query->bindParam(':CategoryName',$CategoryName,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contno',$contno,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':exp',$exp,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':pic',$picnew,PDO::PARAM_STR);
$query->bindParam(':idproof',$idproof,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your application has been submitted.")</script>';
echo "<script>window.location.href ='signup.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
else
{

echo "<script>alert('Email-id,Employee Id or Mobile Number already exist. Please try again');</script>";
}
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
      <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script crossorigin="anonymous" src="../use.fontawesome.com/releases/v6.1.0/js/all.js"></script>
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&amp;display=swap">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
            <a href="index.html"><img src="media/udgd3uha/care-logo2.png" class="navbar-brand logo"></a>

    
<!-- Navigation-->
<nav class="navbar-expand-lg navbar-light triNav">
    <div class="container px-4 px-lg-5">

            <a class="btn btn-primary" href="signup.php"> Sign Up </a>
      
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about/index.html">About</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="services/index.html">Services</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="jobs/index.php">Jobs</a></li>    
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact/index.html">Contact</a></li>    

            </ul>
        </div>
    </div>
</nav>
   
    

<!-- Page Header-->
<header class="masthead" style="background-image: url('media/4rolacos/login.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                                      <h1>Sign in</h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="mb-6">
    <div class="container px-6 px-lg-7">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <p><strong>Register to apply and get matched to available jobs!</strong></p>



<script src="../cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.min.js"></script>


<div class="login-form">

<form method="post" enctype="multipart/form-data">
                        <fieldset>
                            
                           <div class="field">
                              <label class="label_field">Category Name</label>
                              <select type="text" name="CategoryName" value="" class="form-control" required='true'>
                                 <option value="">Select Category</option>
                                  <?php 

$sql2 = "SELECT * from tblcategory";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row2)
{          
    ?>  
   
<option value="<?php echo htmlentities($row2->CategoryName);?>"><?php echo htmlentities($row2->CategoryName
    );?></option>
 <?php } ?>
                              </select>
                           </div>

                           <br>
                           <div class="field">
                              <label class="label_field">Name</label>
                              <input type="text" name="name" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" name="email" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Gender</label>
                              <select type="text" name="gender" value="" class="form-control" required='true'>
                                 <option value="">Select Gender</option>
                                 <option value="Male">Male</option>
                                <option value="Female">Female</option>

                              </select>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Contact Number</label>
                              <input type="text" name="contno" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                           </div>
                          <br>
                           <div class="field">
                              <label class="label_field">Experience</label>
                              <input type="text" name="experience" value="" class="form-control" required='true'>
                           </div>

                           <br>
                           <div class="field">
                              <label class="label_field">Date of Birth</label>
                              <input type="date" name="dob" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Address</label>
                              <textarea type="text" name="add" value="" class="form-control" required='true'></textarea>
                           </div>
                          

                           <br>
                           
                           <div class="field">
                              <label class="label_field">Description(if any)</label>
                              <textarea type="text" name="desc" value="" class="form-control"></textarea>
                           </div>
                          

                           
                           <br>
                           <div class="field">
                              <label class="label_field">Applicant Photo</label>
                              <input type="file" name="pic" value="" class="form-control" required='true'>
                           </div>
<br>
                           <div class="field">
                              <label class="label_field">Upload CV(pdf format)</label>
                              <input type="file" name="idproof" value="" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field margin_0">
                              <!-- <label class="label_field hidden">hidden label</label> -->
                              <button type="submit" class="btn btn-primary" name="submit" id="submit">Submt to Apply</button>
                           </div>
                        </fieldset>
                     </form>    
      <p></p>
        
        
</div>


                

                </div>
        </div>
    </div>
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
    <script src="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

