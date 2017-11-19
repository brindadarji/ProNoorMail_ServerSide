<?php
   include("connection.php");
   $uname = $_REQUEST['uname'];
   $result_inbox=mysql_query("SELECT * FROM tbl_mails where to_uname='$uname' && inbox='1' && read_unread='0'");
   $result_sent=mysql_query("SELECT * FROM tbl_mails where from_uname='$uname' && sent='1' && read_unread='0'");
     
	 $res1="SELECT * FROM tbl_mails where from_uname='$uname' && draft='1' && sent='0' && inbox='1'&& read_unread='0'";
     $res2="SELECT * FROM tbl_mails where to_uname='$uname' && draft='1' && inbox='0' && sent='1'&& read_unread='0'";
	 $res3="SELECT * FROM tbl_mails where from_uname='$uname' && draft='1' && sent='0' && inbox='0' && read_unread='0'";
	 $query=$res1." ".UNION." ".$res2." ".UNION." ".$res3;
   $result_draft=mysql_query($query);
    
	 $ress1="SELECT * FROM tbl_mails where from_uname='$uname' && spam='1' && read_unread='0' && sent='0' && inbox='1'";
     $ress2="SELECT * FROM tbl_mails where to_uname='$uname' && spam='1' && read_unread='0' && inbox='0' && sent='1'";
	 $query2=$ress1." ".UNION." ".$ress2;
   $result_spam=mysql_query($query2);
   
   	 $r1="SELECT * FROM tbl_mails where from_uname='$uname' && trash='1' && sent='0' && read_unread='0'";
     $r2="SELECT * FROM tbl_mails where to_uname='$uname' && trash='1' && inbox='0' && read_unread='0'";
	 $query3=$r1." ".UNION." ".$r2;
   $result_trash=mysql_query($query3);
   
   if($result_inbox && $result_sent && $result_draft && $result_spam && $result_trash)
	{ 
       $response_inbox=mysql_num_rows($result_inbox);
		$output["inbox"]= $response_inbox;
		
		$response_sent=mysql_num_rows($result_sent);
		$output["sent"]= $response_sent;
		
		$response_draft=mysql_num_rows($result_draft);
		$output["draft"]= $response_draft;
		
		$response_spam=mysql_num_rows($result_spam);
		$output["spam"]= $response_spam;
		
		$response_trash=mysql_num_rows($result_trash);
		$output["trash"]= $response_trash;
		
		$output["success"] = 1;
        $output["msg"] = "Get Board Success.";
        echo json_encode($output);
    } else {
      
	  	//echo mysql_error();
       $output["success"] = 1;
       $output["msg"] = "No Board.";
       echo json_encode($output);
    }
?>
