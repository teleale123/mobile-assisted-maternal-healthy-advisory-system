<?php

mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$result = mysql_query("SELECT fullname,gender,phone,email,usertype FROM user") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["user"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $users = array();

        $users["fullname"] = $row["fullname"];
        $users["gender"] = $row["gender"];
		$users["phone"] = $row["phone"];
        $users["email"] = $row["email"];
        $users["usertype"] = $row["usertype"];
      
        // push single information into final response array
        array_push($response["user"], $users);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No users found";

    // echo no users JSON
    echo json_encode($response);
}
?>