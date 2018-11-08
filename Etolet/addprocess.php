<?php
session_start(); // Right at the top of your script
//$_SESSION['logged'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>addprocess</title>
</head>
<body>

	<?php
		include 'config.php';

		

		$user_name = $_SESSION['username'];
		$catagory = $_POST['catagory'];
		$title = $_POST['title'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$house_no = $_POST['house_no'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip_code = $_POST['zip_code'];
		$country = $_POST['country'];
		$date = '2017-08-09';

		echo $description;
		echo "<br>";
		echo $zip_code;

		if($_SESSION['logged']==false || !isset($user_name)||trim($user_name)=='')
		{
			$feedback='Please Login First';
			echo $feedback;

			header("Location: add.php? feed=$feedback");

		}




		if(!isset($user_name)||trim($user_name)==''||!isset($catagory)||trim($catagory)==''||!isset($title)||trim($title)==''||!isset($price)||trim($price)==''||!isset($description)||trim($description)==''||!isset($name)||trim($name)==''||!isset($phone)||trim($phone)==''||!isset($house_no)||trim($house_no)=='' ||!isset($city)||trim($city)=='' ||!isset($state)||trim($state)=='' ||!isset($_FILES['image']) || getimagesize($_FILES['image']['tmp_name'])==false )
		{
			$feedback='You should fill all field';
			echo $feedback;

			header("Location: add.php? feed=$feedback");
			 exit;
		}else{


			$done =false;


			     
					$image = addslashes($_FILES['image']['tmp_name']); //SQL Injection defence!
					$image = file_get_contents($image);
					$image = base64_encode($image);

					$image_name = addslashes($_FILES['image']['name']);

					/*$sql = "INSERT INTO image (name,image) VALUES ('$image_name','$image')";

					if ($conn->query($sql) === TRUE) { // Error handling
					     echo "Weldone Inserted";
					}else {
						echo "Something went wrong! :( . <br>" . $conn->error;

					}*/

				



				$sql = "INSERT INTO addinfo (user_name, catagory,title,price,description,posted_date,name,phone,email,house_no,city,state,zip_code,country,image_name,image) VALUES ('$user_name', '$catagory','$title','$price','$description','$date','$name','$phone','$email','$house_no','$city','$state','$zip_code','$country','$image_name','$image')";

				  if ($conn->query($sql) === TRUE) 
				  {
				      echo "New record created successfully";

				     $done = TRUE;
				     

		        
				  } else {
				        echo "Error: " . $sql . "<br>" . $conn->error;
				  }   


				   if ($done)
				    {
						 header("Location: home.php");
						  exit;
					} 



		}


		include 'close.php';

	?>


</body>
</html>