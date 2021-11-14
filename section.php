<?php include 'includes/connection.php';?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>Manage Farmers</title>
    
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>
 <div class="col-lg-12">
                        <div>
            <i class="fas fa-table"></i>
            </div>    
            <p>Delete Farmers Details From Database</p>
                          <br> </br>    <p><a href="manage-farmers.php">< Manage Farmers</a></p>  
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FARMERS NAME</th>
                                        <th>FARMERS LOCATION</th>
                                        <th>FARMERS COOP</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = 'SELECT * FROM tblfarmers';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['ID'].'</td>';
                            echo '<td>'. $row['farmersName'].'</td>';
                            echo '<td>'. $row['farmersLocation'].'</td>';
                            echo '<td>'. $row['farmersCoop'].'</td>';
                            echo '<td>';
                            echo ' <a  type="button" class="btn btn-xs btn-danger fa fa-trash" href="sectionDel.php?type=section&delete & id='.$row['ID'] . '"> </a> </td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                            
                        </div>

                        