<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
    $mother_id = $_POST['motherid'];
    $mother_name = $_POST['mothername'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $result = mysql_query("SELECT user_id FROM user WHERE user_id = '$mother_id'and usertype='mother'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
        
	//$plate=$POST['carplate'];
	$result=mysql_query("INSERT INTO appo(mother_id, appo_description, date,time) VALUES('$mother_id', '$mother_name', '$date', '$time')");
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
		}
		else{
			$response["success"] = 0;
        $response["message"] = "there is no such mother id in database.";
        // echoing JSON response
        echo json_encode($response);
        } 
	?>