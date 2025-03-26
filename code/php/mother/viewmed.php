<?php

// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();


	$uid = $_GET['symptom'];
    
 
    $result = mysql_query("SELECT symptom,medication FROM medical where disease='$uid'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
           
			
            $users = array();

			$users["symptom"] = $result["symptom"]; 
			$users["medication"] = $result["medication"];
			

            // success
            $response["success"] = 1;
 
            // user node
            $response["medical"] = array();
 
            array_push($response["medical"], $users);
 
            // echoing JSON response
            echo json_encode($response);
			
        } else {
            // no account found
            $response["success"] = 0;
            $response["message"] = "Error  such symptom not found in database";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no account found
        $response["success"] = 0;
        $response["message"] = "No such symptom found";
 
        // echo no users JSON
        echo json_encode($response);
    }

?>