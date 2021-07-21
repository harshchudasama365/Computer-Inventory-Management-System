<?php
   $name1=$_POST["name1"];
   $email1=$_POST["email1"];
   $password1=$_POST["password1"];
   $pass_hash= password_hash($password1,PASSWORD_DEFAULT);
   $user_id1=$_POST["user_id1"];
    $con=mysqli_connect("localhost","root","password","CSM");

    if($con){
           
            $query1="SELECT * FROM user WHERE user_id='$user_id1' or  email='$email1'";
            
            $result1=mysqli_query($con,$query1);
            
            if(mysqli_num_rows($result1)==0){
                $query="INSERT INTO user VALUES('$user_id1','$name1','$email1','$pass_hash')";
                $result=mysqli_query($con,$query);
                $message = "User successfully added.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script>window.location ='add.php'</script>";
            }
            elseif(mysqli_num_rows($result1)!=0){
                $message = "User corresponding to entered Email or ID already exist.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script>window.location ='add.php'</script>"; 
            }
            
            else{
                $message = "User already exist.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script>window.location ='add.php'</script>";
            }
        }
    else{
		die("connection insuccessful ,dying.");
    }
?>
