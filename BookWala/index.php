<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
 <title>Bookwala.com</title>

 <link rel="stylesheet" href="CSS/header_home.css">
 <link rel="stylesheet" href="CSS/general_home.css">
 <link rel="stylesheet" href="CSS/Body_home.css">



</head>
<body>

    <div class="header">
        
        <div class="left-section">
            <img class="logo"   src="header/logo.jpg">;
        </div>

        <div class="middle-section"></div>

        <div class="right-section">
        <a href="#"><button class="header-button">Home</button></a>
        <a href="index1.php"><button class="header-button">Shop</button></a>
            <a href="#about"><button class="header-button">About</button></a>
            <a href="Contact_us.html"><button class="header-button">Contact</button></a>
            <a href="cart.php"><button class="header-button"> <img  class="cart-logo" src="header/cart.jpg"> </button></a>
            <a href="Bookwala_Home.html"><button class="header-button"> Logout</button></a>
             <?php echo $user_data['name']; ?>&nbsp&nbsp&nbsp
             <a href="profile.php">
             <?php
        if(empty($user_data['filename']))
        { echo '<img src="header/avatar.jpg" style="width:50px;"></a> ';}
        else
        {
           $query = " SELECT filename  from users where user_name='$user_data[user_name]'   ";
           $result = mysqli_query($con, $query);
   
           while ($data = mysqli_fetch_assoc($result))
            {
           ?>
               <img src="image/<?php echo $data['filename']; ?>" style="width:55px; border-radius:25px;" >
   
           <?php
           }
         }
         ?>
        </a>

     </div>
    </div>

    <div class="middle-body">
        <div class="background">
            
            <div><img class="b1" src="header/background.jpg"></div> 
            <div>
                <div class="b-text1">Welcome to BOOKWALA</div>
                <div class="b-text2">Browse our stacks</div>
                <a href="index1.php"><button class="b-signup-button">Shop Now</button></a>
            </div>

        </div>

        <div class="About">
            <center><p style="font-size:40px;" id="about">About</p></center>
            <p class="about-text">
                BOOKWALA began as an idea to help support bookstores and their communities 
                at a time when more and more people were buying their books online. We saw an opportunity
                to create an alternative to Amazon for socially-conscious online shoppers. Amazon sells
                over 60% of all books in the US and is growing. That shift threatens the future of bookstores
                and will hurt readers, authors, and publishers who rely on a diverse, healthy ecosystem for books.
                We had a better idea — give readers the convenience of online shopping while supporting independent 
                bookstores at the same time.
            </p>
        </div>
        
        <div class="bottom">
       
            <table style="width:100%;">
                <tr>
                  <td>FAQ</td>
                  <td>BOOKWALA</td>
                  <td>Subscribe to my Newsletter</td>
                </tr>
                <tr>
                  <td>Shipping & returns</td>
                  <td>Tel-123-456-789</td>
                  <td>
                        <div style="align-items:center;display:flex;">
                            <input class="search-bar" type="text" placeholder="Search">
                            <img class="social-icon" src="header/search.svg">
                        </div>
                   </td>
                </tr>
                <tr>
                    <td>Store Policy</td>
                    <td>Email-bookwala@gmail.com</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Payments</td>
                        <td><a href="http://instagram.com/harsha_.vardhan_.09._?utm_source=qr" target="_blank"><img class="social-icon" src="header/insta.png"></a>
                            <a><img class="social-icon" src="header/facebook.png"></a> </td>
                        <td>

                    </td>
                </tr>
            </table>

        </div>
    </div>




</body>
</html>