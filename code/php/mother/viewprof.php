<?php

// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();


	$uid = $_GET['userid'];
    
 
    $result = mysql_query("SELECT fullname,phone,email FROM user where username='$uid'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
           
			
            $users = array();

			$users["fullname"] = $result["fullname"]; 
			$users["phone"] = $result["phone"];
			$users["email"] = $result["email"];

            // success
            $response["success"] = 1;
 
            // user node
            $response["user"] = array();
 
            array_push($response["user"], $users);
 
            // echoing JSON response
            echo json_encode($response);
			
        } else {
            // no account found
            $response["success"] = 0;
            $response["message"] = "Error  id not found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no account found
        $response["success"] = 0;
        $response["message"] = "No such ID found";
 
        // echo no users JSON
        echo json_encode($response);
    }

?>