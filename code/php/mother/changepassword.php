<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");

    $username = $_POST['usertype'];
    $old = md5($_POST['username']);
    $new= md5($_POST['password']);
    
	//$plate=$POST['carplate'];
	$result=mysql_query("UPDATE user SET password= '$new' WHERE username ='$username' and password ='$old'");
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