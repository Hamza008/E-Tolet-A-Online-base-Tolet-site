<?php
  include 'config.php';
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ETolet||addetails</title>
    <link rel="stylesheet" type="text/css" href="css/addetails.css">

</head>
<body>


 <?php 
      $add_id = $_GET['add_id'];
     echo $add_id;
      $ans;

      if(isset($add_id) && trim($add_id)!="")
      {
          //echo "Tik asass";

          $query = "SELECT * FROM addinfo where add_id='$add_id'";

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
                 <th>Rent : <?php echo $ans['price'];?> </th>
        
               </tr>
               <tr>
                 <td>Phone: <?php echo $ans['phone'];?> </td>
               </tr>
               <tr>
                 <td>Adress</td>
               </tr>
               <tr>
                 <td> <?php echo $ans['house_no']." , ".$ans['city']."<br>" ;
                            echo $ans['state']." , ".$ans['country'];

                       ?> 
                 </td>
               </tr>
               <tr>
                 <td>Posted</td>
               </tr>
               <tr>
                 <td>7 July 2017</td>
               </tr>

      
             </table>
            
         </div>
             
        </nav> 

        
       

<!**************************...like as home page*****************************...>
   
  
   <div class="makeborder">


       <!-- <img src="image/img2.jpg" alt="Home" style="width:500px; height:400px;border:2;">-->

       <h2>Title : <?php echo $ans['title']; ?></h2>

        <?php echo'<img height="400" width="500" src="data:image;base64,'.$ans['image'].' ">'; ?>

        
        <h2>Description</h2>
        <article>
          <p><h3> <?php echo $ans['description']?> </h3><br><br><br> 

          <h2>Contract With</h2>
           
           <?php 
             echo "Name : ".$ans['name']."<br>";
             echo "Phone : ".$ans['phone']."<br>";
             echo "Email : ".$ans['email']."<br>";
             echo "Address: <br>";
             echo $ans['house_no']." , ".$ans['state']." <br>";
             echo $ans['city']." , ".$ans['zip_code']." <br>";
             echo $ans['country']."<br>";



           ?>

          </p><br><br><br><br>

          <form action="reviewprocess.php" method="post" enctype="multipart/form-data">
              <fieldset>
                  <h2>Comment here: </h2>
                  <textarea name="comment" rows="5" cols="100" placeholder="White about Your add"> </textarea>
                  <br><button formmethod="post" formaction="reviewprocess.php?add_id=<?php echo $add_id?>" type="submit", name="post">Post it</button><br><br>
              </fieldset>
          </form>

            <br><h2>Review : </h2>

          <table>
       
              <tr>
                <th>User Name</th>
                <th>Comment</th>
                
              </tr>

                    <?php 
                       // $catagory = $_GET['cat'];
                        $query = "SELECT * FROM review where add_id='$add_id' ";
                       // echo $query;
                        $result = mysqli_query($conn,$query) or die(mysql_error());
                        if(mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                    ?>
                                <tr>
                                  <td><?php echo $row['user_name']; ?></td>
                                  <td><?php echo $row['comment']; ?></td>
                                </tr>
                    <?php
                         }
                       }
                     ?>
              </table>

        </article><br><br><br><br>



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