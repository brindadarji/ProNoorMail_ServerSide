<?php
	include("connection.php");
	
	$response=array();
	
	$id=$_REQUEST["id"];
	$from_name=$_REQUEST["from_name"];
	$from_uname=$_REQUEST["from_uname"];
	$to_uname=$_REQUEST["to_uname"];
	$Subject=$_REQUEST["Subject"];
	$Message=$_REQUEST["Message"];
	$Date=$_REQUEST["Date"];
	$Attachment=$_REQUEST["Attachment"];
	$Star="0";
	$Spam="0";
	$Draft="0";
	$Inbox="1";
	$Sent="0";
	$Trash="0";
	$Read_Unread="1";
	$query1="insert into tbl_responses(id,fromm,too,mess,attach,c_date) values('$id','$from_uname','$to_uname','$Message','$Attachment','$Date')";
	$query2="update tbl_mails set subject='$Subject' where id='$id'";
	$query3="insert into tbl_mails(from_name,from_uname,to_uname,subject,message,star,spam,draft,inbox,sent,trash,date,attachment,read_unread)      	 values('$from_name','$from_uname','$to_uname','$Subject','$Message','$Star','$Spam','$Draft','$Inbox','$Sent','$Trash','$Date','$Attachment','$Read_Unread')";
	
	$b=mysql_query($query1);
	$b1=mysql_query($query2);
	$b2=mysql_query($query3);
	if($b && $b1 && $b2)
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
