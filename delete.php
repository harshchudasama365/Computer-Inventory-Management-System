<?php

session_start();
    // $name2=$_POST["name2"];
     $email2=$_POST["email2"];
     $password2=$_POST["password2"];
     $pass_hash= password_hash($password2,PASSWORD_DEFAULT);
     $user_id2=$_POST["user_id2"];

    $con=mysqli_connect("localhost","root","password","CSM");

    
        if($con){ 
            $test_query1="SELECT * FROM user WHERE email='$email2' and user_id='$user_id2'";
            $result1=mysqli_query($con,$test_query1);
            $num1=mysqli_num_rows($result1);
            
            if(mysqli_num_rows($result1)>0){
            	$row = $result1 -> fetch_assoc();
            	$hash=$row["password"];
            	if (password_verify($password2, $hash))
            	{
	                $query2="DELETE FROM user WHERE user_id='$user_id2'";
	                $result=mysqli_query($con,$query2);
		            $message = "User successfully deleted.";
		            echo "<script type='text/javascript'>alert('$message');</script>";
		            if($email2==$_SESSION['login'])
		            {
		            	echo "<script>window.location ='logout.php'</script>";
		            }
	                else
	                {
		              	echo "<script>window.location ='add.php'</script>";
   	                }
          		}
          		else
          		{
          			$message = "Password Incorrect";
              		echo "<script type='text/javascript'>alert('$message');</script>";
              		echo "<script>window.location ='add.php'</script>";
          		}

            } 
            else{
              $message = "No user found.";
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script>window.location ='add.php'</script>";
            } 
        }
    else{
		die("connection insuccessful ,dying.");
        }
?>
