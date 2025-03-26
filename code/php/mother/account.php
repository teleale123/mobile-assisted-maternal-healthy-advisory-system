<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");

    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
	//$plate=$POST['carplate'];
	$result=mysql_query("UPDATE user SET password= '$password' WHERE usertype ='$usertype' and user_id ='$username'");
 if (mysql_affected_rows()>=1) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "password successfully changed.";

        // echoing JSON response
        echo json_encode($response);
    } 
	else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "there is no such user.";
        
        // echoing JSON response
        echo json_encode($response);
    }
	?>