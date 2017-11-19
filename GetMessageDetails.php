<?php
	include("connection.php");
	$id=$_REQUEST['id'];
	$from=$_REQUEST['uname'];
	$query="SELECT * FROM tbl_responses where id='$id'";
	
	$result= mysql_query($query);
	
    if($result)
	{ 
       $response["data"] = array();
		while($Mails=mysql_fetch_array($result))
		{
			$MailDetail=array();
			$MailDetail['id']=$Mails['id'];
			$MailDetail['res_from']=$Mails['fromm'];
			$MailDetail['res_to']=$Mails['too'];
			$MailDetail['res_mess']=$Mails['mess'];
			$MailDetail['res_attach']=$Mails['attach'];
			$MailDetail['res_date']=$Mails['c_date'];
			array_push($response["data"], $MailDetail);
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
