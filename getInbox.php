<?php
	include("connection.php");
	$uname = $_REQUEST['uname'];
	$inbox=$_REQUEST['inbox'];
    $result=mysql_query("SELECT * FROM tbl_mails where to_uname='$uname' && inbox='$inbox' order by id desc");
    if(mysql_num_rows($result)>0)
	{ 
       $response["data"] = array();
		while($Mails=mysql_fetch_array($result))
		{
			$MailDetail=array();
			$MailDetail['id']=$Mails['id'];
			$MailDetail['from_name']=$Mails['from_name'];
			$MailDetail['from_uname']=$Mails['from_uname'];
			$MailDetail['to_uname']=$Mails['to_uname'];
			$MailDetail['subject']=$Mails['subject'];
			$MailDetail['message']=$Mails['message'];
			$MailDetail['star']=$Mails['star'];
			$MailDetail['spam']=$Mails['spam'];
			$MailDetail['date']=$Mails['date'];
			$MailDetail['attachment']=$Mails['attachment'];
			$MailDetail['read_unread']=$Mails['read_unread'];
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
