<?php

mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$uid = $_GET['sender_user'];

$result = mysql_query("SELECT reciever_user,messcontent,sent_time FROM advisory where sender_user='$uid'");

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["advisory"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $info = array();
       
        $info["reciever_user"] = $row["reciever_user"];
        $info["messcontent"] = $row["messcontent"];
        $info["sent_time"] = $row["sent_time"];
      
        // push single message into final response array
        array_push($response["advisory"], $info);
    }
    // success
    $response["success"] = 1;
    $response["message"] = "successfully";
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No outbox found";

    // echo no users JSON
    echo json_encode($response);
}
?>