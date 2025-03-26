<?php
mysql_connect("localhost","root","vertrigo") or die("No Connection");
mysql_select_db("mother") or die("No Database name");
     $infoname = $_POST['dise'];
	  $infotype=$_POST['symp'];
	 $infodesc = $_POST['med'];
    
	//$plate=$POST['carplate'];
	$result=mysql_query("INSERT INTO medical(disease, symptom, medication) VALUES('$infotype', ' $infoname', '$infodesc')");
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