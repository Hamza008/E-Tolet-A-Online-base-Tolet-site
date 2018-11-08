<?php
session_start(); // Right at the top of your script
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
		$password = $_POST['password'];
    $userid ;

		echo $user_name;
		echo "<br>";
		echo $password."<br>";

         $feedback = "";

         if(!isset($user_name)||trim($user_name)=="" || !isset($password) || trim($password)=="")
         {
         	$feedback = "please fill all field";
         	header("Location: home.php? feed=$feedback");
			exit;
         }

		$query = "SELECT user_id, user_name , password FROM userinfo";

        $test_resutl = mysqli_query($conn,$query) or die(mysqli_error());

        $done = false;

        if(mysqli_num_rows($test_resutl)>0)
        {
           	while ($row = mysqli_fetch_array($test_resutl)) {

              if($user_name== $row['user_name'] && $password==$row['password'])
              {
                $userid=$row['user_id'];
                
              	$done = true;
              	break;

              }


           	}
        }

        if($done==false)
        {
        	$feedback = "Unknown user";
          $_SESSION['logged']=false;
        	header("Location: home.php? feed=$feedback");
        	echo "Fail";
		    exit;

        }else{
        	$feedback = "Wellcome  ".$user_name;
          $_SESSION['logged']=true;
          $_SESSION['username']=$user_name;
          $_SESSION['userid']=$userid;
        	header("Location: home.php? feed=$feedback");
        	echo "Sucess";
			exit;

        }


		include 'close.php';


	?>

</body>
</html>