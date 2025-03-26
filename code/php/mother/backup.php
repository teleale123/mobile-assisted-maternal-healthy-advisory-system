<?php
 

 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();
// check for post data
if (isset($_POST["usertype"])&&isset($_POST["username"]) && isset($_POST["password"])) {
	$usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // get a product from products table
    $result = mysql_query("SELECT *FROM user where usertype='$usertype' and username='$username' and password='$password'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $users = array();
            $users["user_id"] = $result["user_id"];
			$users["fullname"] = $result["fullname"];
			$users["gender"] = $result["gender"];
			$users["datebirth"] = $result["datebirth"]; 
			$users["phone"] = $result["phone"];
			$users["email"] = $result["email"];
			$users["maritalstatus"] = $result["maritalstatus"];
			$users["usertype"] = $result["usertype"];
			$users["username"] = $result["username"];
			$users["password"] = $result["password"];

            // success
            $response["success"] = 1;
 
            // user node
            $response["user"] = array();
 
            array_push($response["user"], $users);
 
            // echoing JSON response
            echo json_encode($response);
			
        } else {
            // no account found
            $response["success"] = 0;
            $response["message"] = "Error username or password";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no account found
        $response["success"] = 0;
        $response["message"] = "No such user found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>