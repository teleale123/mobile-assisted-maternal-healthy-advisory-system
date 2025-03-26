<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $infoname = $_POST['infname'];
	  $infotype=$_POST['inftype'];
	 $infodesc = $_POST['infdesc'];
    
	//$plate=$POST['carplate'];
	$result=mysql_query("INSERT INTO information(inforname, infortype, infordesc) VALUES('$infoname', ' $infotype', '$infodesc')");
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
	?>