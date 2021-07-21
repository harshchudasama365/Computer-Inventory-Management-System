<?php 
	session_start();
	//takes value from form
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$email=$_POST['email1'];
	$password=$_POST['password'];
	
	
	$con=new mysqli("localhost","root","password","CSM");
	if($con)
	{
		$info= "Connected Successfully.<br>";
		
		$sql="SELECT * FROM user WHERE email='$email'";

		$data = mysqli_query($con,$sql);
		


		if(!$data)
		    die("died");
		 else{
		     if(mysqli_num_rows($data)>0)
		     {
		        $row = $data -> fetch_assoc();
		        $hash=$row["password"];
		        $name=$row["name"];
		        $_SESSION["name"]=$name;
		        if (password_verify($password, $hash)) {
		        	$_SESSION['login']=$email;
		        	$_SESSION['name']=$name;
		        	$info="Logged in Successfully. ".$row["name"];
		        	$value=3;
		        	header("Location: home.php"); 
		            
		        } else {
		            $error= 'Invalid password.';
		            $info=NULL;
		            $value=1;
		        }
		     }
		    else
		    {
		    	$info=NULL;
		        $error= "No data Available. Please Contact Admin First ! !";
		        $value=0;
		    }
		}
	}

	else{
		die("connection insuccessful ,dying.");
		$inf0=NULL;
		$error= "Connection insuccessful, dying !";
		$value=0;

	}	
?>

<html>
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body>
<div class="row justify-content-center">
  	<div class="container" style="padding-top: 120px;max-width: 600px;color: white">
       <?php if(isset($error)){ ?>
        <div class="alert alert-danger" role="alert"><?php echo $error ?> </div>
        <?php } ?>
        <?php if(isset($info)){ ?>
        <div class="alert alert-info" role="alert"><?php echo $info ?></div>
        <?php } ?> 
        <?php if($value==1) {?> 
        	<a href="login.html"><button type="button" class=" btn btn-success">Login</button></a>
   		<?php } ?> 
   		<?php if($value==0) {?> 
        	<a href="login.html"><button type="button" class=" btn btn-info">Login</button></a>
   		<?php } ?>
   		<?php if($value==3) {?> 
        	<a href="home.php"><button type="button" class=" btn btn-info">Home</button></a>
   		<?php } ?>
        
	</div>
</div>
</body>
</html>
