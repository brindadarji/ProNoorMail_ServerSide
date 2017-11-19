<?php
	include("connection.php");
	 $id = $_REQUEST['id'];
    $result=mysql_query("SELECT * FROM tbl_mails where id='$id'");
   if(mysql_num_rows($result)>0)
	{ 
       $response["data"] = array();
		while($board=mysql_fetch_array($result))
		{
			$ItemDetail=array();
			$ItemDetail['id']=$board['id'];
			$ItemDetail['from_name']=$board['from_name'];
			$ItemDetail['from_uname']=$board['from_uname'];
			$ItemDetail['to_uname']=$board['to_uname'];
			$ItemDetail['subject']=$board['subject'];
			$ItemDetail['message']=$board['message'];
			$ItemDetail['date']=$board['date'];
			$ItemDetail['star']=$board['star'];
			$ItemDetail['inbox']=$board['inbox'];
			$ItemDetail['sent']=$board['sent'];
			$ItemDetail['attachment']=$board['attachment'];
			array_push($response["data"], $ItemDetail);
		}
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
