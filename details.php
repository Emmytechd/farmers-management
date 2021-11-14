<?Php
////////////////////////////////////////////
// Collecting data from query string
$id=$_GET['ID'];
// Checking data it is a number or not
if(!is_numeric($id)){
echo "Data Error";
exit;
}
// MySQL connection string
require "includes/dbconnection.php"; 

$count="SELECT *  FROM tblfarmers where ID=?";

if($stmt = $connection->prepare($count)){
  $stmt->bind_param('i',$id);
  $stmt->execute();

 $result = $stmt->get_result();
 echo "No of records : ".$result->num_rows."<br>";
 $row=$result->fetch_object();
 echo "<table>";
echo "<tr ><td><b>Name</b></td><td>$row->name</td></tr>
<tr><td><b>Class</b></td><td>$row->class</td></tr>
<tr ><td><b>Mark</b></td><td>$row->mark</td></tr>
<tr><td><b>Address</b></td><td>$row->address</td></tr>
<tr ><td><b>Image</b></td><td>$row->img</td></tr>
";
echo "</table>";
}else{
echo $connection->error;
}
?>