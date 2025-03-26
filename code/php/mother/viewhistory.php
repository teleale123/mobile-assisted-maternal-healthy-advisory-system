<?php

mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$mid = $_GET['mother_id'];

$result = mysql_query("SELECT description,physician,date  FROM history where mother_id='$mid'");

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["history"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $info = array();
       
        $info["description"] = $row["description"];
        $info["physician"] = $row["physician"];
        $info["date"] = $row["date"];
      
        // push single information into final response array
        array_push($response["history"], $info);
    }
    // success
    $response["success"] = 1;
    $response["message"] = "successfully";
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No history found";

    // echo no users JSON
    echo json_encode($response);
}
?>