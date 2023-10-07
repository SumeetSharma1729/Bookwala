<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
            function_alert("wrong username or password!");
		}else
		{
            function_alert("wrong username or password!");
		}
	}

?>


<!DOCTYPE html>
<html >
<head>
    
    <title>Login/SignUp_page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Login_page.css">
<style>
    #showcase {
background: url('header/backgroun_login2.jpg') no-repeat center center / cover;
}
</style>
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
                        <label> Email or Username</label>
                     
                        <input id="text" type="text" class="text-input"name="user_name"><br><br>
                    </div>
                    <div>
                        <label> Password</label>
                        
                        <input id="text" type="password" class="text-input" name="password"><br><br>

                    </div>
                     <a href="index.php"><input id="button" class="primary-btn" type="submit" value="Login"style="width:400px ; margin-bottom:15px"></a><br><br>
                </form>
               
                
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="#">Sign in with  <strong>Google</strong> or <strong> facebook</strong></a>
                </div>
                <div class="or">
                    <hr class="bar">
                    <span>OR</span>
                    <hr class="bar">
                </div>
                <a href="signup.php" class="secondary-btn">Create an account</a>
            </div>
            <footer id="main-footer">
                <p>Copyright &copy; 2022 ,BOOKWALA All Rights Reserved</p>
                <div>
                    <a href="#">terms of use</a>| <a href="#">Privacy Policy</a>
                </div>
            </footer>
         </div>
         <div id="right">
           <div id="showcase">
            <div class="showcase-content">
                <h1 class="showcase-text">Let's create the future <strong>together</strong> </h1>
                <a href="#" class="secondary-btn">Start a FREE 10-day trial</a>
            </div>
           </div>
         </div>
    </div>
</body>
</html>