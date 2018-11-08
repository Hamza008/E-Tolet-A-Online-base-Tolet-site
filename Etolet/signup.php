<?php
include 'config.php';
session_start();
   //include 'signupProcess.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/csssignup.css">
        <link rel="stylesheet" type="text/css" href="css/viewcategory.css">

</head>
<body>

   

     <div class="logo">

      <a href="home.php">
         <img src="logo/logo2.jpg" alt="Home" style="width:1000px; height:100px;border:2;">
      </a>
    </div>

<div style="border: 2px solid #ca13c6 ;">
          
            <marquee scrollamount="10" direction="left" behavior="scroll">
                      <img src="image/img1.jpg" />
                      <img src="image/img2.jpg" />
                      <img src="image/img3.jpg" />
                      <img src="image/img4.jpg" />
                      <img src="image/img5.jpg" />
            </marquee>

         </div>

       
      <div>
         <ul>
             <li><pre>          </pre></li>
           <li><a href="home.php">Home</a></li>
           <li><a href="home.php#category">Category</a></li>
           <li><a href="about.php">About Us</a></li>
           <li><a href="contact.php">Contact Us</a></li>
           <li><a href="terms.php">Terms And Condition</a></li>
           <li><pre>                                 </pre></li>
            <li><a href="add.php">Post New Ad</a></li>
            <li><pre>          </pre></li>
             <!--<li><a href="userinfo.php" title="Username">...</a></li>-->
             <li>
                <?php 
                    if($_SESSION['logged']==true)
                      { 
                        echo '<a href="userinfo.php"><span>'.$_SESSION["username"].'</span></a>';
                        echo '<a href="logout.php"><span>Logout</span></a></li>';
                      }
                    elseif($_SESSION['logged']==false)
                      {
                        echo '<a href="home.php#login"><span>Login/Register</span></a></li>';
                      }
              ?>

             </li>
         </ul>
      </div>
      
      <div class="container">
         <div style="background-color: #EDDECD"> 
        <nav>
         <div class="div">
             <table>
       
              <tr>
                <th>Recent Post:</th>
                
                
              </tr>

                  <?php 
                       // $catagory = $_GET['cat'];
                        $query = "SELECT * FROM addinfo order by add_id DESC";
                       // echo $query;
                        $result = mysqli_query($conn,$query) or die(mysql_error());
                        $cont=0;
                        if(mysqli_num_rows($result) > 0)
                        {
                             //array_reverse($result);
                            while ($row = mysqli_fetch_array($result))
                            {
                              $cont=$cont+1;
                              if($cont==9)break;
                    ?>
                                <tr>
                                  <td><a href="addetails.php?add_id=<?php echo $row['add_id']?>"><?php echo $row['title']."<br>"; ?></a>
                                  
                                </tr>
                    <?php
                         }
                       }
                     ?>
              </table>
            
 
           </div>  
        </nav> 
       

<!**************************...like as home page*****************************...>

     <?php
       
       $feedback="";

       if( isset($_GET['feed'])&&trim($_GET['feed'])!="")
       {
         $feedback=$_GET['feed'];

       }
   
      



     ?>
   
  
     <div class="makeborder">
          <h1>Enter Your Information:</h1>
        
            <p id="feedback"><h1 style="color: red"><?php echo $feedback; ?></h1></p>

         <form action="addprocess.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <br><h3>Add Your profile picture:</h3>
                <input type="file" name="image" />
                <!--<input type="submit" value="enter">-->


              </fieldset>


              

              <fieldset>
                <h1>Your information</h1>
                <h3>Name </h3>
                <input type="text" name="name" placeholder="name">
                <h3>User Name</h3>
                <input type="text" name="user_name" placeholder="username" ><br>
                <h3>Email Address</h3>
                <input type="email" name="email" placeholder="email">
                <h3>Phone number </h3>
                <input type="text" name="phone" placeholder=" phone">
                <h3> Password: </h3>
                <input type="password" name="password" placeholder="Password">
                <h3> Re Enter Password: </h3>
                <input type="password" name="repassword" placeholder="Re Password"> <br><br>



        </fieldset>

              <fieldset>

                 <h2>Address:</h2> 
                 <!--<input type="text" name="Street address" placeholder="street address" ><br>-->
                <input type="text" name="city" placeholder="city" ><br>

                <input type="text" name="state" placeholder="state" ><br>

                <input type="text" name="zip_code" placeholder="zip code" ><br>
                <input type="text" name="country" placeholder="country" ><br>
               <!-- <br><input type="submit" name="ok" value="ok" ><br>-->


              </fieldset>

          
            <!--onclick="location.href='home.php' " -->
            <br><button formmethod="post" formaction="signupProcess.php" type="submit", name="post">Submit</button><br><br>
           <br><br><br><br><br>

           <!--<input type="submit" name="submit"/>-->
         

         </form>


     </div>


         <footer>
            Copyright | Project of CSE3100.
         </footer>

</div>
   </div>


</body>
</html>