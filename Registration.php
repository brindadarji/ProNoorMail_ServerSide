<?php
	include("connection.php");
	
	$response=array();
	
	//$usertype=$_REQUEST["Usertype"];
	$uname=$_REQUEST["Username"];
	$fname=$_REQUEST["Fname"];
	$lname=$_REQUEST["Lname"];
	$dob=$_REQUEST["DOB"];
	$contact=$_REQUEST["Contact"];
	$country=$_REQUEST["Country"];
	$state=$_REQUEST["State"];
	$city=$_REQUEST["City"];
	$altemail=$_REQUEST["Altemail"];
	$pass=$_REQUEST["Conpass"];
	$dp=$_REQUEST["dp"];
	
	
	$q="insert into tbl_registration(username,first_name,last_name,date_birth,contact_no,country,state,city,password,altemail,profile) values('$uname','$fname','$lname','$dob','$contact','$country','$state','$city','$pass','$altemail','$dp')";
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