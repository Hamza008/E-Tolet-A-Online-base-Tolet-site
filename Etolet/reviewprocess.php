<?php
  include 'config.php';
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

	    $add_id = $_GET['add_id'];
	    $user_id = $_SESSION['userid'];
	    $user_name = $_SESSION['username'];
	    $comment = $_POST['comment'];
	    echo $add_id."<br>";
	    echo $user_id."<br>";
	    echo $comment."<br>";

	    $sql = "INSERT INTO review (add_id,user_name,comment) values('$add_id','$user_name','$comment') ";


	            $done = false;



	             if ($conn->query($sql) === TRUE) 
				  {
				      echo "New record created successfully";

				     $done = TRUE;
				     

		        
				  } else {
				        echo "Error: " . $sql . "<br>" . $conn->error;
				  }   


				   if ($done)
				    {
						 header("Location: addetails.php?add_id=$add_id");
						  exit;
					} 



		include 'close.php'; 

	?>

</body>
</html>