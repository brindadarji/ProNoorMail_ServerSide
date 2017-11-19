<?php
	include("connection.php");
	 $uname = $_REQUEST['uname'];
    $result=mysql_query("SELECT * FROM tbl_registration where username='$uname'");
   if(mysql_num_rows($result)>0)
	{ 
       $response["data"] = array();
		while($board=mysql_fetch_array($result))
		{
			$RegitrationDetail=array();
			$RegitrationDetail['id']=$board['id'];
			$RegitrationDetail['username']=$board['username'];
			$RegitrationDetail['first_name']=$board['first_name'];
			$RegitrationDetail['last_name']=$board['last_name'];
			$RegitrationDetail['date_birth']=$board['date_birth'];
			$RegitrationDetail['contact_no']=$board['contact_no'];
			$RegitrationDetail['country']=$board['country'];
			$RegitrationDetail['state']=$board['state'];
			$RegitrationDetail['city']=$board['city'];
			$RegitrationDetail['password']=$board['password'];
			$RegitrationDetail['user_type']=$board['user_type'];
			$RegitrationDetail['altemail']=$board['altemail'];
			
			array_push($response["data"], $RegitrationDetail);
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
