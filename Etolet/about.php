<?php
session_start(); // Right at the top of your script
$_SESSION['logged'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||About Us</title>
    <link rel="stylesheet" type="text/css" href="css/about.css">

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
            <table >
       
              <tr>
                <th>Recent Post:</th>
                
                
              </tr>

                    <?php 
                    include 'config.php';
                       // $catagory = $_GET['cat'];
                        $query = "SELECT * FROM addinfo order by add_id DESC";
                       // echo $query;

                        $cont =0;
                        $result = mysqli_query($conn,$query) or die(mysql_error());
                        if(mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                              $cont=$cont+1;
                              if($cont==11)break;
                    ?>
                                <tr>
                                  <td><a href="addetails.php?add_id=<?php echo $row['add_id']?>"><?php echo $row['title']."<br>"; ?></a>
                                  
                                </tr>
                    <?php
                         }
                       }

                       include 'close.php';
                     ?>
              </table>
         </div>
             
        </nav> 
       

<!**************************...like as home page*****************************...>
   
  
     <div class="makeborder">

        
        <article>
            <h2>EToLet</h2>
            <p>House rent is tedious with physically observation. AnyTolet.com could be a leading letting-property portal web-site with a comprehensive search facility for property-finders to seek out a property. With our intensive property listings and our wide property search choices, the AnyTolet.com web site has created a considerably additional convenient and effective method for property finders to seek out their next property what-so-ever the standards is.<br><br>
 
            We would like our honored users to appreciate over time that AnyTolet.com is associate professional friend that will facilitate them build a number of their biggest and vital selections in life in an exceedingly quicker and easier method. Therefore, why not take a glance around our web site and if there's something we are able to assist you with.</p>
         </article> 
          
         <article>
           <h2>About Us</h2>
           We the strudent of Ahsanullah University of Science and Technology.
           This is a 3rd year 1st semester SD project course no CSE3100.<br><br>
           Project Members Are:<br><br>
           1. Md. Amir Hamza  15-01-04-118<br><br>
           2. Md. Masud Rana  15-01-04-138<br><br>

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