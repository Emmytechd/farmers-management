<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    $cid=$_GET['upid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $outtime=$_POST['outtime'];
      $totalhrs=$_POST['totalhrs'];
      $fees=$_POST['fees'];
      $spent=$_POST['spent'];
    
   $query=mysqli_query($con, "update  tblusers set Remark='$remark',Status='$status',Fees='$fees' where ID='$cid'");
    if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-olduser.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
} 

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title> New Users</title>
    

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
                        <h1>View Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="view-user-detail.php">View Users</a></li>
                            <li class="active">Users</li>
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
                            <div class="card-header"><strong>View</strong><small> Users</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['upid'];
$ret=mysqli_query($con,"select * from tblusers where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Entry ID</th>
                                   <td><?php  echo $row['EntryID'];?></td>
                                   </tr>                             
<tr>
                                <th>Full Name</th>
                                   <td><?php  echo $row['UserName'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>User Address</th>
                                   <td><?php  echo $row['UserAddress'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Mobile Number</th>
                                      <td><?php  echo $row['MobileNumber'];?></td>
                                  </tr>
                                      <tr>  
                                       <th>Email</th>
                                        <td><?php  echo $row['Email'];?></td>
                                    </tr>
                                <tr>
                       <th>ID Proof</th>
                         <td><?php  echo $row['IDProof'];?></td>

                         </tr>                          
           
                     <tr>
       <th>In Time</th>
       <td><?php  echo $row['InTime'];?></td>
</tr>

 

    <tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}
if($row['Status']=="Out")
{
  echo "Check Out";
}

     ;?></td>
  </tr>
</table>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                </table>
<table class="table mb-0">

<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>

<tr>
<th>Fees Disbursed </th>
<td>
  <input type="text" name="fees" id="fees" class="form-control wd-450" >
</td></tr>

<tr>
<th>Total Amount Spent </th>
<td>
  <input type="text" name="spent" id="spent" class="form-control wd-450" >
</td></tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Out">Check Out</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button></td>
   
     ?>
  </tr>
  </form>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr> 
   <tr>
    <th>Out Time</th>
    <td><?php echo $row['OutTime']; ?></td>
  </tr>

  
 <tr>
    <th>Fees Disbursed</th>
    <td><?php echo $row['Fees']; ?></td>
  </tr>
  <tr>
    <th>Fees Spent</th>
    <td><?php echo $row['spent']; ?></td>
  </tr>

  <tr>
    <th>Fees Left</th>
    <td><?php echo $row['$answer']; ?></td>
  </tr>

<tr>
<th>Updation Date</th>
<td><?php echo $row['UpdationDate']; ?>  </td></tr>
<?php } ?>
</table>


  

  

<?php } ?>

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
