<?php
session_start(); // Right at the top of your script
//$_SESSION['logged'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||Contact</title>
    <link rel="stylesheet" type="text/css" href="css/csscontact.css">

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
         <div>
            <h2 style="color: green">Our Address: </h2>
            
            <h4>111, Gulshan Link Road</h4>
            <h4>Middle Badda.</h4>
            <h4>Dhaka.</h4>
            

            <h2 style="color: green">Phone: </h2>
            <h4>01798888888</h4>
            <h4>01833333333</h4>

            
            
 
           </div>  
        </nav> 
       

<!**************************...like as home page*****************************...>
   
  
     <div class="makeborder">
         
        
    

          <form >
              
     

     

       
          <fieldset>
              <h1>Your information</h1>
              <h3>Name </h3>
              <input type="text" name="name" placeholder="name">
              <h3>Email Address</h3>
              <input type="email" name="email" placeholder="email">
              <h3>Subject </h3>
              <input type="text" name="subject" placeholder="Subject">
              <h3>Message </h3>
             
               <textarea name="text" rows="5" cols="100" placeholder="White about Your Openion" > </textarea>


        </fieldset>

           <br><button type="button", name="post">Submit</button><br><br>
         

         </form>


     </div>


         <footer>
            Copyright | Project of CSE3100.
         </footer>

   </div>
   </div>


</body>
</html>