<?php
  include 'config.php';
  session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>ETolet||Terms & Condition</title>
    <link rel="stylesheet" type="text/css" href="css/cssterms.css">
    <link rel="stylesheet" type="text/css" href="css/viewcategory.css">

</head>
<body>

 <div>  

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
   
  
     <div class="makeborder">


        <article>
            <h2>EToLet</h2>
            You can publish any type of your advertisement at anytolet.com. You will get the full access of adverstise system. If you want to publish a featured advertise, contact with site administrator. According to diffrent cyber rules and our service policy there are few instructions/rules from us. Please try to follow the rules and regulations for better experience.<br><br><br>

            1. All free advertisements will published for two months without free of charges. <br><br><br>

            2. Strictly porhibitted to write irrelevent text as advertise description. If you violet this rules your ad will be delete and user account will block without any prior notification. <br><br><br>

            3. If we got any fake or spam advertise at anytolet.com, this account and advertise will remove permanently and the email account will block at this system. <br><br><br>

            4. If you face any technical difficulties, contact with us as soon as possible. Anytolet development team may reply.<br><br><br>
        </article> 
          
         
     </div>

      <footer>
            Copyright | Project of CSE3100.
    </footer>
         

   </div>

  </div> 

</div>

</body>
</html>

<?php
  include 'close.php';
?>