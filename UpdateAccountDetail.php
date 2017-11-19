<?php
	include("connection.php");
    $uname = $_REQUEST['uname'];
	$pass=$_REQUEST['pass'];
	$alt=$_REQUEST['alt'];
	
	
   $result=mysql_query("update tbl_registration set password='$pass',altemail='$alt' where username='$uname'");
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
