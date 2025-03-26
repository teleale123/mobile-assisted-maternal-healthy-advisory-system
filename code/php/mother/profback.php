<?php
 

 
 
// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();


	$uid = $_GET['username'];
    
 
    $result = mysql_query("SELECT fullname,email,phone FROM user where username='$uid'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
           
			
            $users = array();

			$users["fullname"] = $result["fullname"]; 
			$users["email"] = $result["email"];
			$users["phone"] = $result["phone"];

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
            $response["message"] = "Error user id";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no account found
        $response["success"] = 0;
        $response["message"] = "No such user found";
 
        // echo no users JSON
        echo json_encode($response);
    }

?>