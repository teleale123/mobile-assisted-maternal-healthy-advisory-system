<?php

mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$result = mysql_query("SELECT appo_id,mother_id,date,time FROM appo") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["appo"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $users = array();
        $users["appo_id"] = $row["appo_id"];
        $users["mother_id"] = $row["mother_id"];
        $users["date"] = $row["date"];
        $users["time"] = $row["time"]; 
		
      
        // push single information into final response array
        array_push($response["appo"], $users);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No appointment found ";

    // echo no users JSON
    echo json_encode($response);
}
?>