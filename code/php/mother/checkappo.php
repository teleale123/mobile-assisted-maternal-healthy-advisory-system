<?php
  
// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();
    $username = $_GET['username'];
    $date = $_GET['date'];
    
 
    $result = mysql_query("SELECT date,time FROM appo where mother_id='$username' and date='$date'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
           
			
            $users = array();

			$users["date"] = $result["date"]; 
			$users["time"] = $result["time"];
			

            // success
            $response["success"] = 1;
 
            // user node
            $response["appo"] = array();
 
            array_push($response["appo"], $users);
 
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