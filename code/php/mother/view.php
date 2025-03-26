<?php

mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$result = mysql_query("SELECT inforname,infortype,infordesc FROM information") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["information"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $info = array();
        
        $info["inforname"] = $row["inforname"];
        $info["infortype"] = $row["infortype"];
        $info["infordesc"] = $row["infordesc"];
      
        // push single information into final response array
        array_push($response["information"], $info);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No information found";

    // echo no users JSON
    echo json_encode($response);
}
?>