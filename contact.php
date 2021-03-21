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

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="css/contact.css">

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
                    <li style="color: red;">
                        <a href="logout.php">Sign Out</a>
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
       


<!--------------------------------------------------------------->

<div class="container row" id="contact" style="font-family: 'Roboto Mono', monospace;">

  <div class="text"></div>
<span></span>
  
</div>
<div class="pic row ">
    <a href="mailto:harshattax@gmail.com?cc=sameerpinjari440@gmail.com,ymb1@somaiya.edu">
      <img src="img/gmail.svg" > </a>
</div>


<!--------------------------------------------------------------->





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
         <script  src="js/contact.js"></script>
    </body>
</html>

<?php } ?>