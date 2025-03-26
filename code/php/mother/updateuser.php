<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $userid = $_POST['fullname'];
   
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $marital = $_POST['maritalstatus'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
    $password = md5($_POST['password']);
	$result=mysql_query("UPDATE user SET phone='$phone',email= '$email',maritalstatus='$marital',usertype='$usertype',username='$username',password='$password' where user_id='$userid'");
    if (mysql_affected_rows()>=1) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "successfully modified.";
        // echoing JSON response
        echo json_encode($response);
      } 
	else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "there is no such user id.";
        
        // echoing JSON response
        echo json_encode($response);
    }
	
	?>