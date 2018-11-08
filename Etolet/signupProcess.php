<?php
session_start(); // Right at the top of your script
//$_SESSION['logged'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


		<?php
			include 'config.php';
		    
		   

			$user_name=$_POST['user_name'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['name'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip_code = $_POST['zip_code'];
			$country = $_POST['country'];

			if($password!=$repassword)
			{

			}

			if(!isset($user_name)||trim($user_name)==''||!isset($name)||trim($name)==''||!isset($email)||trim($email)==''||!isset($phone)||trim($phone)==''||!isset($password)||trim($password)==''||!isset($repassword)||trim($repassword)==''||!isset($city)||trim($city)==''||!isset($state)||trim($state)=='')
			{
				$feedback='You should fill all field';
				echo $feedback;

				header("Location: signup.php? feed=$feedback");
			    exit;


			}{



					$done =false;

					$image = addslashes($_FILES['image']['tmp_name']); //SQL Injection defence!
					$image = file_get_contents($image);
					$image = base64_encode($image);

					$image_name = addslashes($_FILES['image']['name']);
					echo "name is : ".$image_name;



				  $sql = "INSERT INTO userinfo (user_name, name,email,phone,password,city,state,zip_code,country,image_name,image) VALUES ('$user_name', '$name','$email','$phone','$password','$city','$state','$zip_code','$country','$image_name','$image')";

				  if ($conn->query($sql) === TRUE) 
				  {
				      echo "New record created successfully";

				     $done = TRUE;
				     

		        
				  } else {
				        echo "Error: " . $sql . "<br>" . $conn->error;
				  } 


				  //for sign in


				  $query = "SELECT user_id FROM userinfo order by user_id desc ";

                 $test_resutl = mysqli_query($conn,$query) or die(mysqli_error());

               // $done = false;

                 $userid =0;

               if(mysqli_num_rows($test_resutl)>0)
                {
	           	while ($row = mysqli_fetch_array($test_resutl)) {

		              
		                $userid=$row['user_id'];
		                
		              	$done = true;
		              	break;


              	}
             }  


				   if ($done)
				    {
				    	//$userid=$userid+1;
                        $_SESSION['logged']=true;
                        $_SESSION['username']=$user_name;
                        $_SESSION['userid']=$userid;
						 header("Location: home.php");
						 exit;
					} 


		}    
			

			


			include 'close.php';



			//'signup.php?$feedback='.urlencode($_GET['text']);
			
		?>

	<input type="submit" name="submit">

</body>
</html>