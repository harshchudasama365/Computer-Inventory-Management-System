<?php 

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(!$_SESSION['login']){ ?>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body>
  <div class="row justify-content-center">
    <div class="container" style="padding-top: 120px;max-width: 600px;color: white">
        <div class="alert alert-danger" role="alert">PLease Login Again ! ! </div>
        <a href="login.html"><button type="button" class=" btn btn-warning">Login</button></a>
    </div>
  </div> 
</body>
</html>
<?php }else { ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Manage User</title>
    <link rel="stylesheet" type="text/css" href="css/add.css">
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/sidebar.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header" >
                    <img src="img/comp.svg" style="width: 100px; height: 100px;">
                </div>

                <ul class="list-unstyled components" style="margin-top: 40px; text-align: center;">
                    
                    <li >
                        <a href="home.php">Home</a>

                    </li>
                    <li>
                        <a href="master.php">Master</a>
                    </li>
                    <li>
                        <a href="index.php" >Equipments</a>

                    </li>
                    <li >
                        <a href="add.php">Manage users</a>

                    </li>
                    <li >
                        <a href="activitylog.php">Activity Log</a>

                    </li>                    
                    <li>
                        <a href="logout.php" style="color: red;">Sign Out</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>


            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="addm()">Add
            </button>
            <button type="button" class="toggle-btn" onclick="deletem()" style="text-align: center;">Remove
            </button>
        </div>
    

    <form id="addm" class="input-group1" name="form1" action="addit.php" method="POST">
        <input type="text" name="user_id1"class="input-field" placeholder="User id" title="Enter your ID Card Number" required>
        <input type="text" name="name1"class="input-field" placeholder="User name" required>
        <input type="email"name="email1" class="input-field" placeholder="User email" title="example@somaiya.edu" required>
        <input type="text" name="password1"class="input-field" placeholder="User password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <button type="submit" name="add" class="submit-btn" onclick=" return ValidateEmail1(document.form1.email1)" >Add</button>
    </form>

    <form id="deletem" class="input-group2" name="form2" action="delete.php" method="POST">
        <input type="text" name="user_id2"class="input-field" placeholder="User id" required>
        <input type="email" name="email2"class="input-field" placeholder="User email" title="example@somaiya.edu" required>
        <input type="text"name="password2" class="input-field" placeholder="User password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <button type="submit" name="delete" class="submit-btn"  onclick=" return ValidateEmail2(document.form2.email2)" >Delete</button>
    </form>

    </div>




        </div>

       


        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
         <script type="text/javascript">
    var x = document.getElementById("addm");
    var y = document.getElementById("deletem");
    var z= document.getElementById("btn");

    function deletem(){
    x.style.left= "-410px";
    y.style.left="10px";
    z.style.left="110px";
}

    function addm(){
    x.style.left= "10px";
    y.style.left="410px";
    z.style.left="0px";
}

</script>
    </body>
</html>
<?php } ?>