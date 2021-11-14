<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['ccmsaid'];
 $username=$_POST['username'];
$uadd=$_POST['uadd'];
$mobilenumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$fname=$_POST['farmersName'];
$idproof=$_POST['idproof'];
$entryid=mt_rand(100, 999);

 $query=mysqli_query($con,"insert into tblusers(EntryID,UserName,UserAddress,MobileNumber,Email,farmersName,IDProof) value('$entryid','$username','$uadd','$mobilenumber','$email','$fname','$idproof')");

    if ($query) {
echo '<script>alert("User Detail has been added.")</script>';
echo "<script>window.location.href ='add-users.php'</script>";

  }
  else
    {
 echo '<script>alert("Something Went Wrong. Please try again.")</script>';       
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title> User Details</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-users.php">User Detail</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>User</strong><small> Details</small></div>
                            <form name="farmers" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">User Name</label><input type="text" name="username" value="" class="form-control" id="username" required="true"></div>
                                                                          
                                        <div class="form-group"><label for="street" class=" form-control-label">User Address</label><textarea type="text" name="uadd" value="" id="uadd" class="form-control" required="true"></textarea></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Mobile Number</label><input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="11" pattern="[0-9]+"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Email</label><input type="email" name="email" id="email" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Farmers Name</label><select type="text" name="cname" id="cname" value="" class="form-control" required="true">
                                                    <option value="">Choose Farmers</option>
                                <?php $query=mysqli_query($con,"select * from  tblfarmers");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['FarmersName'];?>"><?php echo $row['farmersName'];?></option>
                  <?php } ?>  
                                                    </select></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">ID Proof</label><input type="text" name="idproof" id="idproof" value="" class="form-control" required="true"></div>
                                                    </div>
                                                
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>