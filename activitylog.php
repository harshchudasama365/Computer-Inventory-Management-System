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
<?php }else { 




$lab = "labs";
$table="product";

$con = new mysqli("localhost","root","Nnpph@1999","CSM");

if($con)
{
	$query1="SELECT * FROM transactions";
    $result1   = mysqli_query($con,$query1);
    $datas     = array();
    $user      = array();
    $action    = array();
    $eleid     = array();
    $elename   = array();
    $current   = array();
    $previous  = array();
    $labno     = array();
    $my_date   = array();
    if(!$result1)
    {
        die("<br>No result found ! died<br>");
    }
    else
    {
        if(mysqli_num_rows($result1) > 0)
        {
            while($row = mysqli_fetch_assoc($result1))
            {
                $datas[]=$row;
                $count++;
            }
        }
        foreach ($datas as $data) 
        {
            $user[]      = $data['user'];
            $action[]    = $data['action'];
            $eleid[]     = $data['id'];
            $elename[]   = $data['name'];
            $current[]   = $data['current'];
            $previous[]  = $data['previous'];
            $labno[]     = $data['labno'];
            $my_date[]   = $data['date_time'];
        }
    }   
}




?>


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
        <link rel="stylesheet" type="text/css" href="css/eqstyle.css">
        
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
       
<div class="container" id="con2" >
  

<!------------------------------------------------------------------------------------------>





<div class="row align-items-center" style="color:tomato;max-width: 700px;padding-top: 60px"><h1>Activity Log</h1>  </div>
<div class="row ">

<div class="container" style="max-width:850px;">
    <div class="alert alert-info text-center">Here You Can See The Last 10 Transactions occured on this Site</div>
    <table class="table table-striped text-center table-hover">
        <thead class="thead-dark ">
            <tr>

                <th scope="col"   style="color:purple">  User                </th>
                <th scope="col"   style="color:purple">  Action              </th>
                <th scope="col"   style="color:purple">  Lab No.             </th>
                <th scope="col"   style="color:purple">  Element Id          </th>
                <th scope="col"   style="color:purple">  Element Type        </th>
                <th scope="col"   style="color:purple">  Current             </th>
                <th scope="col"   style="color:purple">  Previous            </th>
                <th scope="col"   style="color:purple">  Date-Time           </th>

            </tr>
            <tbody>
                <?php for($i=0;$i<count($user);$i++){ 
                    if($i+10<count($user))
                    {
                        $i=count($user)-10;
                    }

                    ?>
                    <tr>
                        <?php  
                        if($i==count($user)-1)
                        { ?>
                            <td><strong style="color:purple"><?php echo $user[$i];     ?></strong></td>
                            <td><strong style="color:purple"><?php echo $action[$i];   ?></strong></td>
                            <td><strong style="color:purple"><?php echo $labno[$i];    ?></strong></td>
                            <td><strong style="color:purple"><?php echo $eleid[$i];    ?></strong></td>
                            <td><strong style="color:purple"><?php echo $elename[$i];  ?></strong></td>
                            <td><strong style="color:purple"><?php echo $current[$i];  ?></strong></td>
                            <td><strong style="color:purple"><?php echo $previous[$i]; ?></strong></td>
                            <td><strong style="color:purple"><?php echo $my_date[$i];  ?></strong></td><!-- style="color:red" -->
                        <?php } 
                        else
                        { ?>
                            <td><?php echo $user[$i];     ?></td>
                            <td><?php echo $action[$i];   ?></td>
                            <td><?php echo $labno[$i];    ?></td>
                            <td><?php echo $eleid[$i];    ?></td>
                            <td><?php echo $elename[$i];  ?></td>
                            <td><?php echo $current[$i];  ?></td>
                            <td><?php echo $previous[$i];    ?></td>
                            <td><?php echo $my_date[$i]; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            	


            </tbody>
        </thead>
    </table>

</div>
</div>


 










<!------------------------------------------------------------------------------------------------------------>

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
    </body>
</html>

<?php } ?>