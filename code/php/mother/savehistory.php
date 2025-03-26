<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $moth = $_POST['moth'];
	  $desc=$_POST['desc'];
	 $phy = $_POST['phy'];
    
	//$plate=$POST['carplate'];
	$result=mysql_query("INSERT INTO history(mother_id, description, physician) VALUES('$moth', ' $desc', '$phy')");
 if ($result==true) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "successfully.";

        // echoing JSON response
        echo json_encode($response);
    } 
	else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
	?>