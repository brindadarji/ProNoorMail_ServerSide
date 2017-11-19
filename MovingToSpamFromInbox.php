<?php
	include("connection.php");
    $id = $_REQUEST['id'];
   $result=mysql_query("update tbl_mails set spam='1',inbox='0' where id='$id'");
   if($result)
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
