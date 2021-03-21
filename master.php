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

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/master.css">

  <link rel="stylesheet" type="text/css" href="css/sidebar.css">

	<title>Collapse</title>
</head>
<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<div class="wrapper">

  <nav id="sidebar">
                <div class="sidebar-header" >
                    <!-- <img src="img/computer.svg"  style="width: 100px; height: 100px;"> -->
                    <img src="img/comp.svg"  style="width: 100px; height: 100px;">
                </div>

                <ul class="list-unstyled components" style="margin-top: 40px; text-align: center;">
                    
                    <li >
                        <a href="home.php" style="background-color: transparent;">Home</a>

                    </li>
                    <li>
                        <a href="master.php"  >Master</a>
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
                        <a href="logout.php" style="color:red">Sign Out</a>
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


<div class="container py-5">
  <!-- For Demo Purpose-->
  

<br>
<div class="row">
    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-success btn-block py-2 shadow-sm with-chevron" style=" /*background-color: #f9484a;
background-image: linear-gradient(315deg,  #fbd72b 0%, #F96866 74%)*/;
 border-width: 0px;">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2" ><strong class="text-uppercase" >Lab 1</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample1" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button name="labnumber" value="L01" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2" class="btn btn-danger btn-block py-2 shadow-sm with-chevron" style="background-color: ;
 border-width: 0px;
">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 2</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample2" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button name="labnumber" value="L02" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="true" aria-controls="collapseExample3" class="btn btn-warning btn-block py-2 shadow-sm with-chevron" style="background-color: ;
 border-width: 0px;"
>
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 3</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample3" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button  name="labnumber" value="L03" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="true" aria-controls="collapseExample4" class="btn btn-primary btn-block py-2 shadow-sm with-chevron" style="background-color: /*#f9484a;
background-image: linear-gradient(315deg,  #fbd72b 0%, #F96866 74%)*/ ;
 border-width: 0px;">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 4</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample4" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button  name="labnumber" value="L04" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="true" aria-controls="collapseExample5" class="btn btn-success btn-block py-2 shadow-sm with-chevron" style="background-color:  ;
 border-width: 0px;">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 5</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample5" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button  name="labnumber" value="L05" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample6" aria-expanded="true" aria-controls="collapseExample6" class="btn btn-danger btn-block py-2 shadow-sm with-chevron" style="background-color: ;
border-width: 0px;">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 6</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample6" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button name="labnumber"  value="L06" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-5">

        <button type="button" data-toggle="collapse" href="#collapseExample7" aria-expanded="true" aria-controls="collapseExample7" class="btn btn-warning btn-block py-2 shadow-sm with-chevron" style="background-color:;
 border-width: 0px;">
        <p class="d-flex align-items justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" >Lab 7</strong><i class="fa fa-angle-down"></i></p></button>

        <div id="collapseExample7" class="collapse shadow-sm hide">
            <div class="card">
                <div class="card-body">
                    Lab Details Table
                    <form action="equipment.php" method="POST"><button name="labnumber"  value="L07" type="submit" class="btn btn-success">More Details</button></form>
                </div>
            </div>
        </div>

    </div> 

</div>

<script type="text/javascript">
function add1() 
{
    document.getElementById("addElement1").classList.toggle("shown");
}  

function add2() 
{
    document.getElementById("addElement2").classList.toggle("shown");
}   
function add3() 
{
    document.getElementById("addElement3").classList.toggle("shown");
}   
function add4() 
{
    document.getElementById("addElement4").classList.toggle("shown");
}   
function add5() 
{
    document.getElementById("addElement5").classList.toggle("shown");
}   

function add6() 
{
    document.getElementById("addElement6").classList.toggle("shown");
}   

function add7() 
{
    document.getElementById("addElement7").classList.toggle("shown");
}   


</script>

</body>
</html>

</div>

  
<script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>  


</body>
</html>

<?php } ?>