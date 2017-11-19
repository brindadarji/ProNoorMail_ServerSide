<?php
	include("connection.php");
	
	$response=array();
	
	$from_name=$_REQUEST["from_name"];
	$from_uname=$_REQUEST["from_uname"];
	$to_uname=$_REQUEST["to_uname"];
	$Subject=$_REQUEST["Subject"];
	$Message=$_REQUEST["Message"];
	$Star=$_REQUEST["Star"];
	$Spam=$_REQUEST["Spam"];
	$Draft=$_REQUEST["Draft"];
	$Inbox=$_REQUEST["Inbox"];
	$Sent=$_REQUEST["Sent"];
	$Trash=$_REQUEST["Trash"];
	$Date=$_REQUEST["Date"];
	$Attachment=$_REQUEST["Attachment"];
	$Read_Unread=$_REQUEST["Read_Unread"];
	
	
	$q="insert into tbl_mails(from_name,from_uname,to_uname,subject,message,star,spam,draft,inbox,sent,trash,date,attachment,read_unread) values('$from_name','$from_uname','$to_uname','$Subject','$Message','$Star','$Spam','$Draft','$Inbox','$Sent','$Trash','$Date','$Attachment','$Read_Unread')";
	$b=mysql_query($q);

	if($b)
	{
		$response["success"]=1;
		$response["msg"]="Registered Successfully..";
		echo json_encode($response);
	}else{
		echo mysql_error();
		$response["success"]=0;
		$response["msg"]="Not registered successfully..";
		echo json_encode($response);
	}

?>
