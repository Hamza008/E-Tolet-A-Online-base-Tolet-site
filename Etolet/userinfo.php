<?php
  include 'config.php';
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||viewcategory</title>
    <link rel="stylesheet" type="text/css" href="css/viewcategory.css">

</head>
<body>

<?php 
      
      $ans;
      $user_id =$_SESSION["userid"];

      //echo "user id = ".$user_id;

      if(isset($user_id) && trim($user_id)!="")
      {
          //echo "Tik asass";

          $query = "SELECT * FROM userinfo where user_id='$user_id'";

          $resutl = mysqli_query($conn,$query) or die(mysqli_error());

          $done = false;

          if(mysqli_num_rows($resutl)>0)
          {
              while ($row = mysqli_fetch_array($resutl)) {
                $ans=$row;

                 //echo $row['title'];

              }
          }
      }

     // echo $ans['description'];
  ?>

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
      


       <?php echo'<img height="400" width="500" src="data:image;base64,'.$ans['image'].' ">'; ?>

        <table>
       
               <tr>
                 <th>Description</th>
        
               </tr>
               <tr>
                 <td>Name: <?php echo $ans['name']; ?></td>
               </tr>
               <tr>
                 <td>Email: <?php echo $ans['email']; ?></td>
               </tr>
               <tr>
                 <td>Phone: <?php echo $ans['phone']; ?></td>
               </tr>
               <tr>
                 <td>Address:</td>
               </tr>
               <tr>
                 <td>City: <?php echo $ans['city']; ?></td>
               </tr>
               <tr>
                 <td>State: <?php echo $ans['state']; ?></td>
               </tr>
               <tr>
                 <td>Zip Code: <?php echo $ans['zip_code']; ?></td>
               </tr>
               <tr>
                 <td>Counrty: <?php echo $ans['country']; ?></td>
               </tr>

      
             </table>
            

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