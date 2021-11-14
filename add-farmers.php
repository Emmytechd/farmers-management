<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Farmers Details</title>
</head>
<body>
	
	<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title> Add Farmers</title>
  

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
                        <h1>Farmers Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-farmers.php">Farmers Details</a></li>
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
						<form method="POST" action="upload.php" enctype="multipart/form-data">
	<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                              <div class="form-group"><label for="company" class=" form-control-label">Farmers Full Name</label><input type="text" name="farmersName" value="" class="form-control" id="farmName" required="true"></div>
                                                                          
                                <div class="form-group"><label for="street" class=" form-control-label">Farmers Locations</label><input type="text" name="farmersLocation" value="" id="farmLocation" class="form-control" required="true"></div>

                                <div class="form-group"><label for="city" class=" form-control-label">Farmers Cooperative</label><select type="text" name="farmersCoop" id="farmersCoop" value="" class="form-control" required="true">
                                                    <option value="">Choose Cooperative</option>
                                                    <option value="Cooperative A">Cooperative A</option>
                                                    <option value="Cooperative B">Cooperative B</option>
                                                    <option value="Cooperative C">Cooperative C</option>
                                                    </select></div>
                                                   

                                <div class="form-group"><label for="city" class=" form-control-label">Farmers Crop Type (Cluster) </label><select type="text" name="farmersCrop" id="farmersCrop" value="" class="form-control" required="true">
                                                    <option value="">Choose Cluster</option>
                                                    <option value="Cluster A">Cluster A</option>
                                                    <option value="Cluster B">Cluster B</option>
                                                    <option value="Cluster C">Cluster C</option>
                                                    </select></div>
                                
                                <div class="form-group"><label for="sex" class=" form-control-label">Gender </label><select type="text" name="sex" id="sex" value="" class="form-control" required="true">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select></div>

                                <div class="form-group"><label for="age" class=" form-control-label">Age</label><input type="number" name="age" value="" id="age" class="form-control" maxlength='2' required="true"></div>

                                <div class="form-group"><label for="lga" class=" form-control-label">Local Government Area</label><input type="text" name="lga" value="" id="lga" class="form-control" required="true"></div>

                                <div class="form-group"><label for="state" class=" form-control-label">State</label><input type="text" name="state" value="" id="state" class="form-control" required="true"></div>

                                <div class="form-group"><label for="size" class=" form-control-label">Size</label><input type="text" name="size" value="" id="size" class="form-control" required="true"></div>

                                <div class="form-group"><label for="bankName" class=" form-control-label">Bank Name</label><input type="text" name="bankName" value="" id="bankName" class="form-control" required="true"></div>

                                <div class="form-group"><label for="accNo" class=" form-control-label">Account Number</label><input type="number" name="accNo" value="" id="accNo" class="form-control" maxlength='15' minlength='11'  required="true"></div>
                                
                                <div class="form-group"><label for="bvn" class=" form-control-label">Bank Verification Number</label><input type="number" name="bvn" value="" id="bvn" class="form-control" maxlength='15' minlength='11' required="true"></div>

                                <div class="form-group"><label for="phoneNo" class=" form-control-label">Phone Number</label><input type="number" name="phoneNo" value="" id="phoneNo" class="form-control" maxlength='15' minlenght='10' required="true"></div>

                                <div class="form-group"><label for="referee" class=" form-control-label">Referee</label><input type="text" name="referee" value="" id="referee" class="form-control" required="true"></div>

                                <div class="form-group"><label for="guarantor" class=" form-control-label">Guarantor</label><input type="text" name="guarantor" value="" id="guarantor" class="form-control" required="true"></div>

                                
                                <div class="row form-group"><div class="col-12">
                                                    <div class="form-group"><label for="longitude" class=" form-control-label">Longitude</label><input type="text" name="longitude" id="idadd" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    </div>
                                  <div class="row form-group"><div class="col-12">
                                                    <div class="form-group"><label for="disbursed" class=" form-control-label">Amount Disbursed</label><input type="text" name="disbursed" id="disbursed" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    </div>
                                                    <div class="row form-group"><div class="col-12">
                                                    <div class="form-group"><label for="accumulated" class=" form-control-label">Total Amt. Accumulated</label><input type="text" name="accumulated" id="accumulated" value="" class="form-control" required="true"></div>
                                                    </div>
                                                        </div>             
                                                 <label>Image:</label><input type="file" name="image"><br><br>
                                                  
	
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

	</form>
	</div>
</body>
</html>
<script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>