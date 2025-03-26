<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $fname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $datebirth= $_POST['datebirth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $marital = $_POST['maritalstatus'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
    $password = md5($_POST['password']);
	
   	$result = mysql_query("SELECT username FROM user WHERE username = '$username'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
        $response["success"] = 2;
        $response["message"] = "The the username You Entered is Already in Use.";
        // echoing JSON response
        echo json_encode($response);
        } 
	else {
	$result=mysql_query("INSERT INTO user(fullname,gender,datebirth,phone,email,maritalstatus,usertype,username,password) VALUES('$fname', '$gender', '$datebirth','$phone', '$email', '$marital','$usertype', '$username','$password')");
 if ($result==true) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "successfully.";

        // echoing JSON response
        echo json_encode($response);
    } 
	else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
	}
	?>