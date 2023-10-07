<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $name=$_POST['full_name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
 
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "./image/" . $filename;         
        

		if(!empty($name))
		{
			$query = "UPDATE users set  name='$name', phone ='$phone',address='$address',filename ='$filename'  where user_name='$user_data[user_name]' ";
			mysqli_query($con, $query);
            function_alert("Successfully updated!!");       

            header("Location: profile.php");
			die;
		}
        else
		{
            function_alert("Enter Valid Information !!");
        }
       
	}
?>




    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User_Profile</title>
        <link rel="stylesheet" href="CSS/Edit_profile.css">
    </head>
    <body>
        <div class="header">
            &nbsp;&nbsp;&nbsp;
            <a href="index.php">Home</a> &nbsp;&nbsp;/&nbsp;&nbsp;
            <a href="profile.php">User_profile</a> &nbsp;&nbsp;/&nbsp;&nbsp;
            <a href="#">User_profile_Edit</a>
        </div>
        <div class="edit" >
            <form method="post" enctype="multipart/form-data">
                <label for="name">Full Name</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="full_name" id="name" placeholder="Name"> <hr><br><br>
                <label for="phone">Phone</label>&nbsp;&nbsp;&nbsp;
                <input type="tel" name="phone" id="phone" placeholder="Phone" ><hr><br><br>
                <label for="address">Address</label>&nbsp;&nbsp;&nbsp;
                <input type="text" id="address" name="address" placeholder="Address"><hr><br><br>
                <label for="address">Profile_Pic</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="file" name="image" accept=".jpg,.jpeg,.png"><hr><br><br>
                <center><button type="submit" class="update_button" name="submit" value="upload">Update</button></center>
            </form>
        </div>
    </body>
    </html>