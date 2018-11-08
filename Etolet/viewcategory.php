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


        <h2>Category Name : <?php echo $_GET['cat'];  ?><h2><br><br>

        <?php //echo $_GET['cat'];  ?>

    <table>
       
      <tr>
        <th>Description</th>
        <th>Price</th>
        
      </tr>

      <?php 
          $catagory = $_GET['cat'];
          $query = "SELECT * FROM addinfo where catagory = '$catagory'  order by add_id DESC";
          //echo $query;
          $result = mysqli_query($conn,$query) or die(mysql_error());
          
          if(mysqli_num_rows($result) > 0)
          {
              while ($row = mysqli_fetch_array($result))
              {
                
      ?>
                  <tr>
                    <td><a href="addetails.php?add_id=<?php echo $row['add_id']?>"><?php echo $row['title']."<br>"; ?></a>
                   <?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                  </tr>
      <?php
           }
         }
       ?>

     <!--
      <tr>
        <td><a href="addetails.php">একজন চাকুরিজিবি রূমমেট আবশ্যক, ওয়ারী, ঢাকা</a><br>   
           সাবলেট। কোন ঝামেলা নাই, নিরিবিলি। খাবার নিয়া কোন টেনশন নাই। বাজার করতে হবে না। নিজের বাড়ির মত...</td>
        <td>3000 BDT</td>
        
      </tr>

      <tr>
        <td><a href="addetails.php">Apartment for Rent Banani ( i 38)</a> <br>
          Estate Agents Property News is a Prominent Real Estate Company in Bangladesh. We have Expert Team,...</td>
        <td>4000 BDT</td>
        
      </tr>

      <tr>
        <td><a href="addetails.php">Modern Apartment Rent Banani(9 12)</a><br>
           Estate Agents Property News is a Prominent Real Estate Company in Bangladesh. We have Expert Team,...</td>
        <td>10000 BDT</td>
      </tr>

      <tr>
        <td><a href="addetails.php">Attractive Flat Beside Lake For Rent</a> <br>
          Flat is adjacent to lake-park named "Jaushna Sarabar". A children's park also exists.</td>
        <td>40000 BDT</td>
      </tr>

      <tr>
        <td><a href="addetails.php">Partex Chanchala1(one)</a><br>
          Bachelor need. (Banker, Masters Student at NSU, IUB, AIUB, BRAC), Doctor, Software...</td>
        <td>30000 BDT</td>
      </tr>

      <tr>
        <td><a href="addetails.php">Sublet only for SMALL Family or Working Women 2 Members</a><br>
           We are looking for SMALL Family to rent 1 room with 2 big Windows included Varanda.</td>
        <td>5000 BDT</td>
      </tr>-->

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