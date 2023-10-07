<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
        $name=$_POST['full_name'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
            $user_id = random_num(20);
			$query = "insert into users (user_id,name,user_name,password) values ('$user_id','$name','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
            function_alert("Enter Valid Information !!");
		}
	}
?>


<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/CreateAccount_page.css">
</head>
<body>
    <div id="wrapper">
    <div id="left">
        <div id="signin">
            <div class="logo">
                <img src="header/logo.jpg" alt="BOOKWALA">
            </div>
            <form method="post">
                <div>
                    <label>Full Name</label>
                    <input id="text" type="text" class="text-input" placeholder="Full Name" name="full_name">
                </div> 
                <div>
                    <label> Email or Username</label>
                    <input id="text" type="email" class="text-input" placeholder="Username" name="user_name">
                </div> 
                <div>
                    <label>Password</label>
                    <input id="text" type="password" class="text-input" placeholder="Password" name="password">
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input type="password" class="text-input" placeholder="Confirm Password">
                </div>
                <a href="Login_Signup_page.html"><button class="primary-btn" style="width: 610px;margin-bottom:20px;" type="submit">Create Account</button></a>
            </form>
            <a href="login.php"><button class="primary-btn">Login</button></a>
            <div class="links">
                Sign in with <a href="https://accounts.google.com/ServiceLogin/signinchooser?elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img src="header/google.png" class="social-icon" style="padding-left:5px; padding-right:5px;"></a>  or <a href="https://www.facebook.com/login/"><img src="header/facebook.png" class="social-icon" style="width:26px;"></a>
            </div>
        <footer id="main-footer">
            <p>Copyright &copy; 2022 ,BOOKWALA All Rights Reserved</p>
            <div>
                <a href="#">terms of use</a>| <a href="#">Privacy Policy</a>
            </div>
        </footer>
     </div>
    </div>

</body>
</html>