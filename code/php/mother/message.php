<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $sen= $_POST['send'];
	  $rec=$_POST['reciev'];
	 $mes = $_POST['mess'];
     $stat    ="unread";
	//$plate=$POST['carplate'];
	$check=mysql_query("SELECT * FROM user where username='$rec'");
	if(mysql_num_rows ($check) > 0){
	
	$result=mysql_query("INSERT INTO advisory(sender_user, messcontent,reciever_user,status) VALUES('$sen', ' $mes', '$rec','$stat')");
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
	}else{
		
		  $response["success"] = 0;
        $response["message"] = "there is no such user.";
        
        // echoing JSON response
        echo json_encode($response);
	}
	?>