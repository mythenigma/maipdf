<?php
    //get the email equals to variable,为什么要变成emails，因为别人会看到index2
    $email=htmlspecialchars($_GET['emails']);
	
	$conn= new mysqli("127.0.0.1","root","","record");
	if($conn->connect_error){
		die("contact it for issue");
	}
	$sql="SELECT * FROM `pdf` WHERE `mdemail`='$email'";
	//echo $sql;
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		  while($row = mysqli_fetch_assoc($result)){
		 		  $limit=$row['limit'];
		  $url=$row['url'];
		  $limit=$limit-1;
		  
		
		  }
      } else {

		  exit("you are not authorised to view");
      } 
      	// $sql="UPDATE"; 
         $conn->close();

    if($limit>0){
	header('Content-Type: application/pdf');
    $im=file_get_contents('yes'.$url);
    //imagejpeg($im);
	echo $im;
    //imagedestroy($im);
	}else{
		 exit("you are not authorised to view");
	}
   
   
    ?>
