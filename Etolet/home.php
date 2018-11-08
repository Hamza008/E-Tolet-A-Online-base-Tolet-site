<?php
session_start(); // Right at the top of your script
//$_SESSION['logged'];

if ($_SESSION == NULL) {
  $_SESSION['logged']=false;
 // first=false;
  # code...
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||Home</title>
    <link rel="stylesheet" type="text/css" href="css/csshome.css">

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
             <li><a href="#category">Category</a></li>
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

         <div>  

         <nav style="color: green ">
          
            <form action="loginProcess.php" method="Post">
               <h3><a name=login> Username: </h3>
                <input type="text" name="user_name" placeholder="Username"> <br><br>
               <h3> Password: </h3>
                <input type="password" name="password" placeholder="Password"> <br><br>

                <button formmethod="post" formaction="loginProcess.php" type="submit" name="login">Login</button>
                <button onclick="location.href='signup.php' " type="button" name="signup">Sign Up</button>

               <!-- <a href=""  style="text-decoration: none;"><h3>Forget password</h3></a><br>-->


                <?php
       
                     $feedback="";

                     if( isset($_GET['feed'])&&trim($_GET['feed'])!="")
                     {
                       $feedback=$_GET['feed'];

                     }

                 ?>

                 <p id="feedback"><h1 style="color: red"><?php echo $feedback; ?></h1></p>
                
            </form>

           
         </nav>
         </div>

          
        

       <div class="makeborder">
         
         
         <article>
            <h2>EToLet</h2>
            <p>House rent is tedious with physically observation. AnyTolet.com could be a leading letting-property portal web-site with a comprehensive search facility for property-finders to seek out a property. With our intensive property listings and our wide property search choices, the AnyTolet.com web site has created a considerably additional convenient and effective method for property finders to seek out their next property what-so-ever the standards is.<br><br>
 
            We would like our honored users to appreciate over time that AnyTolet.com is associate professional friend that will facilitate them build a number of their biggest and vital selections in life in an exceedingly quicker and easier method. Therefore, why not take a glance around our web site and if there's something we are able to assist you with.</p>
         </article>

     
          <h2><a name=category>Category</h2>

         <ul >
            <li><a href="viewcategory.php? cat=Family House"><pre>Family House     </pre></a></li>
            <li><a href="viewcategory.php? cat=Family Sublet"><pre>Family Sublet       </pre></a></li>
            <li><a href="viewcategory.php? cat=Office"><pre>Offce           </pre></a> </li>
            
         </ul >

         <ul class="ulColor">
            <li><a href="viewcategory.php? cat=Bachelor Mess"><pre>Bachelor Mess    </pre></a></li>
            <li><a href="viewcategory.php? cat=Female Mess"><pre>Female Mess        </pre></a></li>
            <li><a href="viewcategory.php? cat=Others"><pre>Others         </pre></a></li>
         </ul>

       
        


      </div>
          


         <footer>
            Copyright | Project of CSE3100.
         </footer>

</div>

   </div>


</body>
</html>