<?php
if (isset($_POST["submit_address"])) {
	$address = $_POST["address"];
	?>

	<iframe width="100%" height="500" src="http://maps.google.com/maps?q=<?php echo $address; ?>&output=embeded"></iframe>

	<?php
}

 ?>

 <form method="POST">
 	<p>
 		<input type="text" name="address" placeholder="enter address">
 	</p>
 	<input type="submit" name="submit_address">
 	

 </form>