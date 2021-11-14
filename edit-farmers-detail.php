<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$cmsaid=$_SESSION['ccmsaid'];
$farmName=$_POST['farmersName'];
$farmLocation=$_POST['farmersLocation'];
$farmCoop=$_POST['farmersCoop'];
$farmCrop=$_POST['farmersCrop'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$lga=$_POST['lga'];
$state=$_POST['state'];
$size=$_POST['size'];
$bankName=$_POST['bankName'];
$accNo=$_POST['accNo'];
$bvn=$_POST['bvn'];
$phoneNo=$_POST['phoneNo'];
$referee=$_POST['referee'];
$guarantor=$_POST['guarantor'];
$long=$_POST['longitude'];
$disbursed=$_POST['disbursed'];
$accumulated=$_POST['accumulated'];
$image = $_POST['img_location'];
 $query=mysqli_query($con,"update tblfarmers set farmersName='$farmName',farmersLocation='$farmLocation', farmersCoop='$farmCoop',farmersCrop='$farmCrop',sex='$sex',age='$age',lga='$lga',state='$state',size='$size',bankName='$bankName',accNo='$accNo',bvn='$bvn',phoneNo='$phoneNo',referee='$referee',guarantor='$guarantor', longitude='$long', disbursed='$disbursed',accumulated='$accumulated', img_location='$image' where  ID='$eid'");

   
    if ($query) {
        echo '<script>alert("Farmers Detail has been Updated.")</script>';
    echo "<script>window.location.href ='dashboard.php'</script>";
      }
      else
        {
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title> Update Farmers Details</title>
  
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
                        <h1>Update Farmers Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-farmers.php">Update Farmers Detail</a></li>
                            <li class="active">Update</li>
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
                            <div class="card-header"><strong>Farmers Full</strong><small> Detail</small></div>
                            <form name="package" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblfarmers where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="farmersName" class=" form-control-label">Farmers Full Name</label><input type="text" name="farmersName" value="<?php  echo $row['farmersName'];?>" class="form-control" id="farmersName" required="true"></div>
                                   
                                <div class="form-group"><label for="farmersLocation" class=" form-control-label">Farmers Location</label><input type="text" name="farmersLocation" value="<?php  echo $row['farmersLocation'];?>" id="farmersLocation" class="form-control" required="true"></div>

                                <div class="form-group"><label for="farmersCoop" class=" form-control-label">Farmers Cooperative</label><select type="text" name="farmersCoop" id="farmersCoop" value="" class="form-control" required="true">
                                                    <option value=""><?php  echo $row['farmersCoop'];?></option>
                                                    <option value="">Edit Cooperative</option>
                                                    <option value="Cooperative A">Cooperative A</option>
                                                    <option value="Cooperative B">Cooperative B</option>
                                                    <option value="Cooperative C">Cooperative C</option>
                                                    </select></div>
                            
                                <div class="form-group"><label for="city" class=" form-control-label">Farmers Crop Type (Cluster) </label><select type="text" name="farmersCrop" id="farmersCrop" value="" class="form-control" required="true">
                                                    <option value=""><?php  echo $row['farmersCrop'];?></option>
                                                    <option value="">Edit Cluster Type</option>
                                                    <option value="Cluster A">Cluster A</option>
                                                    <option value="Cluster B">Cluster B</option>
                                                    <option value="Cluster C">Cluster C</option>
                                                    </select></div>
                                                    
                                 <div class="form-group"><label for="sex" class=" form-control-label">Gender </label><select type="text" name="sex" id="sex" value="" class="form-control" required="true">
                                    <option value=""><?php  echo $row['sex'];?></option>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select></div>

                                <div class="form-group"><label for="age" class=" form-control-label">Age</label><input type="number" name="age" value="<?php  echo $row['age'];?>" id="age" class="form-control" required="true"></div>

                                <div class="form-group"><label for="lga" class=" form-control-label">Local Government Area</label><input type="text" name="lga" value="<?php  echo $row['lga'];?>" id="lga" class="form-control" required="true"></div>

                                <div class="form-group"><label for="state" class=" form-control-label">State</label><input type="text" name="state" value="<?php  echo $row['state'];?>" id="state" class="form-control" required="true"></div>

                                <div class="form-group"><label for="size" class=" form-control-label">Size of Farm</label><input type="text" name="size" value="<?php  echo $row['size'];?>" id="size" class="form-control" required="true"></div>

                                <div class="form-group"><label for="bankName" class=" form-control-label">Bank Name</label><input type="text" name="bankName" value="<?php  echo $row['bankName'];?>" id="bankName" class="form-control" required="true"></div>

                                <div class="form-group"><label for="accNo" class=" form-control-label">Account Number</label><input type="text" name="accNo" value="<?php  echo $row['accNo'];?>" id="accNo" class="form-control" required="true"></div>

                                <div class="form-group"><label for="bvn" class=" form-control-label">Bank Verification Number</label><input type="text" name="bvn" value="<?php  echo $row['bvn'];?>" id="bvn" class="form-control" required="true"></div>

                                <div class="form-group"><label for="phoneNo" class=" form-control-label">Phone Number</label><input type="text" name="phoneNo" value="<?php  echo $row['phoneNo'];?>" id="phoneNo" class="form-control" required="true"></div>

                                <div class="form-group"><label for="referee" class=" form-control-label">Referees</label><input type="text" name="referee" value="<?php  echo $row['referee'];?>" id="referee" class="form-control" required="true"></div>

                                <div class="form-group"><label for="guarantor" class=" form-control-label">Guaranntor</label><input type="text" name="guarantor" value="<?php  echo $row['guarantor'];?>" id="guarantor" class="form-control" required="true"></div>

                                <!--
                                <div class="form-group"><label for="guarantor" class=" form-control-label">Upload Image</label><input type="file" name="image" value="<?php  echo $row['image'];?>" id="image" class="form-control" required="true"></div>-->

                             
                                <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="long" class=" form-control-label">Longitude</label><input type="text" name="longitude" id="longitude" value="<?php  echo $row['longitude'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    </div>

                                <div class="form-group"><label for="disbursed" class=" form-control-label">Disbursed</label><input type="text" name="disbursed" value="<?php  echo $row['disbursed'];?>" id="disbursed" class="form-control" required="true"></div>


                                <div class="form-group"><label for="accumulated" class=" form-control-label">Accumulated</label><input type="text" name="accumulated" value="<?php  echo $row['accumulated'];?>" id="accumulated" class="form-control" required="true"></div>

<!--
                                <div class="form-group"><label for="image" class=" form-control-label">Update Image</label><input type="file" name="image" value="<?php  echo $row['img_location'];?>" id="image" class="form-control" required="true"></div>
    -->                                                
                                                   
                                                     <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Update
                                                        </button></p>
                                                       </div>  
                                                    </div>
                                                    </form>
                                                </div>
                                                
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