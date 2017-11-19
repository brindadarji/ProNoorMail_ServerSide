<?php
	include("connection.php");
    $uname = $_REQUEST['uname'];
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$DOB=$_REQUEST['DOB'];
	$contact=$_REQUEST['contact'];
	$country=$_REQUEST['country'];
	$state=$_REQUEST['state'];
	$city=$_REQUEST['city'];
	
   $result=mysql_query("update tbl_registration set first_name='$fname',last_name='$lname',date_birth='$DOB',contact_no='$contact',country='$country',state='$state',city='$city' where username='$uname'");
   if($rs)
	{ 
       $response["data"] = array();
        $response["success"] = 1;
        $response["msg"] = "Get Board Success.";
        echo json_encode($response);
		
    } else {
      
	  	//echo mysql_error();
        $response["success"] = 0;
        $response["msg"] = "No Board";
        echo json_encode($response);
    }
?>
