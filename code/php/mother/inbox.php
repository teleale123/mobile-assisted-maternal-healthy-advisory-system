<?php
// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();
// check for post data

	$ui = $_GET['reciever_user'];
  //  and status='unread'
 //$s=1;
    $result = mysql_query("SELECT sender_user,messcontent,sent_time FROM advisory where reciever_user='$ui' ");
 //$read=mysql_query("INSERT INTO adisory(read) values($s) ");
     mysql_query("UPDATE advisory SET status= 'read' where reciever_user='$ui' and status='unread'");
    $count=mysql_num_rows($result);
	if (mysql_num_rows($result) > 0) {
    // looping through all results
    // information node user
    $response["advisory"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $info = array();
       
        $info["sender_user"] = $row["sender_user"];
        $info["messcontent"] = $row["messcontent"];
        $info["sent_time"] = $row["sent_time"];
      
        // push single message into final response array
        array_push($response["advisory"], $info);
    }
    // success
    $response["success"] = 1;
    $response["message"] = "successfully";
	$response["count"] = $count;
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No inbox message found";
    $response["count"] = 0;
    // echo no users JSON
    echo json_encode($response);
}
?>