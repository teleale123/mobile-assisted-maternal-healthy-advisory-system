<?php

/*
 * Following code will register Job Seeker row
 * AllJob Seeker details are read from HTTP Post Request
 */
class RegUser {

public function reg(){
// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['datebirth'])&& isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['maritalstatus'])&& isset($_POST['usertype'])) {
 
    $fname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $dbirth = $_POST['datebirth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $marital = $_POST['maritalstatus'];
	$usertype = $_POST['usertype'];


    // include db connect class
    require_once __DIR__ . '/db_Connect.php';

    // connecting to db
    $db = new DB_CONNECT();
		 
		
            // if Email is Not Already in Use

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO user(fullname,gender,datebirth,phone,email,maritalstatus,usertype) VALUES('$fname', '$gender', '$datebirth','$phone', '$email', '$marital','$usertype')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
		//mail($email,$subject,$message,$headers);
        $response["message"] = "user Successfully Registered.";
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An Error Occurred.";
        // echoing JSON response
        echo json_encode($response);
    }
} 
}
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required Field(s) is Missing";

    // echoing JSON response
    echo json_encode($response);
}
}
}
$js=new RegUser;
$js->reg();
?>