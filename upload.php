<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	if (strlen($_SESSION['ccmsaid']==0)) {
	  header('location:logout.php');
	}

	$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;

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
	

	
	$query = mysqli_query($con,"insert into tblfarmers (img_location, farmersName, farmersLocation, farmersCoop, farmersCrop, sex, age, lga, state, size, bankName, accNo, bvn, phoneNo, referee, guarantor, longitude, disbursed, accumulated) values ('$location', '$farmName', '$farmLocation','$farmCoop', '$farmCrop','$sex', '$age', '$lga', '$state', '$size', '$bankName', '$accNo', '$bvn', '$phoneNo', '$referee', '$guarantor', '$long', '$disbursed', '$accumulated')");
	 
    if ($query) {
        echo '<script>alert("Congratulations! Farmers Detail has been Added to the Andane Database.")</script>';
    echo "<script>window.location.href ='dashboard.php'</script>";
      }
      else
        {
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
  

?>
