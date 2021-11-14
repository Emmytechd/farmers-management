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
$farmersName=$_POST['farmersName'];
$farmersLocation=$_POST['farmersLocation'];
$farmersCoop=$_POST['farmersCoop'];
$farmersCrop=$_POST['farmersCrop'];
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
$image=$_POST['image'];
$long=$_POST['longitude'];
$results=$_POST['result'];
 $query=mysqli_query($con,"update tblfarmers set farmersName='$farmersName',farmersLocation='$farmersLocation', farmersCoop='$farmersCoop',farmersCrop='$farmersCrop',sex='$sex',age='$age',lga='$lga',state='$state',size='$size',bankName='$bankName',accNo='$accNo',bvn='$bvn',phoneNo='$phoneNo',referee='$referee',guarantor='$guarantor', image='$image', longitude='$long',  disbursed=$n1, accumulated=$n2 where  ID='$eid'");

    /*if ($query) {
    $msg="Farmers Detail has been update.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }*/
    if ($query) {
        echo '<script>alert("farmers Detail has been added.")</script>';
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
   
    <title> Farmers Details</title>
  
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
                        <h1>Farmers Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="view-all-farmers.php">View All Farmers</a></li>
                            <li class="active">Details</li>
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

?><div class="img">
<img src="<?php  echo $row['img_location'];?> "height="200px" width="200px"; align: center;></td></p>
</div>
<table>

                  <tr><th>S.NO</th><td><?php echo $cnt;?></td></tr>
                 <tr> <th>EntryID</th> <td><?php  echo $row['ID'];?></td></tr>
                 <tr> <th><label>Farmers Name</label></th> <td><?php  echo $row['farmersName'];?></td></tr>
                 <tr> <th><label>Farmers Location</label></th> <td><?php  echo $row['farmersLocation'];?></td></tr>
                 <tr> <th>Farmers Cooperative</th> <td><?php  echo $row['farmersCoop'];?></td></tr>
                 <tr> <th>Farmers Crop Type(Cluster)</th> <td><?php  echo $row['farmersCrop'];?></td></tr>
                 <tr> <th>Sex</th> <td><?php  echo $row['sex'];?></td></tr>
                 <tr> <th>Age</th> <td><?php  echo $row['age'];?></td></tr>
                 <tr> <th>Local Government Area</th> <td><?php  echo $row['lga'];?></td></tr>
                 <tr> <th>State</th> <td><?php  echo $row['state'];?></td></tr>
                 <tr> <th>Size</th> <td><?php  echo $row['size'];?></td></tr>
                  <tr><th>Bank Name</th> <td><?php  echo $row['bankName'];?></td></tr>
                  <tr><th>Account Number</th> <td><?php  echo $row['accNo'];?></td></tr>
                  <tr><th>Bank Verification Number</th> <td><?php  echo $row['bvn'];?></td></tr>
                  <tr><th>Phone Number</th> <td><?php  echo $row['phoneNo'];?></td></tr>
                  <tr><th>Referee</th> <td><?php  echo $row['referee'];?></td></tr>
                  <tr><th>Guarantor</th> <td><?php  echo $row['guarantor'];?></td></tr>
                  <tr><th>Amount Disbursed</th> <td><?php  echo $row['disbursed'];?></td></tr>
                  <tr><th>Value of Product Sold</th> <td><?php  echo $row['accumulated'];?></td></tr>
                  <tr><th>Profit</th> <td><?php echo ($row['accumulated']- $row['disbursed']);?></td></tr>
                  <tr><th>Date Of Registration</th> <td><?php  echo $row['EntryDate'];?></td></tr>
                  <tr><th>Live Farm View</th> <td><?php  echo $row['longitude'];?></td></tr>
</table>


                                                     <?php } ?>   

                                                    </div>
                                                
                                            </div>


                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
                                <iframe src="<?php echo $row['longitude']; ?>" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                <?php
                               // include 'geoplugin/index2.php';

                                ?>


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>