<?php
 
 
// array for JSON response
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
$response = array();
// check for post data

	$usertype = $_GET['usertype'];
    $username = $_GET['username'];
    $password = md5($_GET['password']);
 
    // get a product from products table
      $result = mysql_query("SELECT usertype,username,password FROM user where usertype='$usertype' and username='$username' and password='$password'")or die(mysql_error());

     if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
           
			
            $users = array();

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
            $response["message"] = "wrong password or user name";
 
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
    

?>