<?php
   include("connection.php");
   $id = $_REQUEST['id'];
   $result=mysql_query("update tbl_mails set inbox='0',trash='1' where id='$id'");
   if($rs)
	{ 
        $response["data"] = array();
        $response["success"] = 1;
        $response["msg"] = "Get Board Success.";
        echo json_encode($response);
		
    } else {
      
        $response["success"] = 0;
        $response["msg"] = "No Board";
        echo json_encode($response);
    }
?>