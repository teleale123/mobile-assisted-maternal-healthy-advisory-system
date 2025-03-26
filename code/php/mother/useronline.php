<?php

// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();


	$uid = $_GET['userid'];
    
 
    $result = mysql_query("SELECT fullname,username,usertype FROM user ");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
               $response["user"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $users = array();

        $users["fullname"] = $row["fullname"];
        $users["username"] = $row["username"];
		 $users["usertype"] = $row["usertype"];
      
        // push single information into final response array
        array_push($response["user"], $users);
    }
    // success
    $response["success"] = 1;

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