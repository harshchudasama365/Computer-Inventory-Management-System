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
<?php }else 
{ 
    $username=$_SESSION['name'];

    
if(isset($_POST['labnumber']))
{
    $labnumber = $_POST['labnumber'];
    $_SESSION['labnumber'] = $labnumber;
}
else
{
    $labnumber = $_SESSION['labnumber'];
}
$lab = "labs";
$table="product";

$con = new mysqli("localhost","root","Nnpph@1999","CSM");



if($con)
{

    if(isset($_POST['textareaedit']))
{
    $desc=$_POST['textareaedit'];
    $serial=$_POST['serial'];
    $query4="UPDATE $table SET description='$desc' WHERE serial_no='$serial';";
    $result4 = mysqli_query($con,$query4);
}

    $query3  = "SELECT name,brand,cost FROM $table INNER JOIN $lab WHERE $table.labno = $lab.id AND $table.labno='$labnumber' GROUP BY name,brand,cost;";
    $result3 = mysqli_query($con,$query3);
    $namegroup  = array();
    $brandgroup = array();
    $costgroup  = array();
    $countbrand = array();
    $brandcount = 0;
    if($result3)
    {
        
        if(mysqli_num_rows($result3) > 0)
        {
            while($row = mysqli_fetch_assoc($result3))
            {
                $datas[]=$row;
                $brandcount++;
            }
            // echo $brandcount."<br>";

            foreach ($datas as $data) 
            {   
                $namegroup[]   = $data['name'];
                $brandgroup[]  = $data['brand'];
                $costgroup[]   = $data['cost'];
            }
            for($i=0;$i<$brandcount;$i++)
            {
                $query2  = "SELECT count(brand) FROM $table WHERE $table.labno='$labnumber' AND $table.name='$namegroup[$i]' AND $table.brand='$brandgroup[$i]' AND $table.cost='$costgroup[$i]';";
                $result2 = mysqli_query($con,$query2);
                
                if($result2)
                {   
                    if(mysqli_num_rows($result2) > 0)
                    {
                        while($row=mysqli_fetch_assoc($result2))
                        {
                            $countbrand[]=$row['count(brand)'];
                            // for($j=0;$j<$brandcount;$j++)
                            // {
                            //     echo $countbrand[$j];
                            // }  
                        }
                    }  
                }

            }
        } 
    }

    
    $query1  = "SELECT * FROM $table INNER JOIN $lab WHERE $table.labno = $lab.id AND $table.labno='$labnumber' GROUP BY name,brand,cost;";
    $result1 = mysqli_query($con,$query1);
    $datas   = array();
    $serial  = array();
    $name    = array();
    $brand   = array();
    $cost    = array();
    $dop     = array();
    $desc    = array();
    $labno   = array();
    $count=0;

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
        else
        {
            $_SESSION['id']=1;
        }
        
        foreach ($datas as $data) 
        {
            $serial[] = $data['serial_no'];
            $name[]   = $data['name'];
            $brand[]  = $data['brand'];
            $cost[]   = $data['cost'];
            $dop[]    = $data['date_of_purchase'];
            $desc[]   = $data['description'];
            $labno[]  = $data['id'];

            if($data['status']==1)
            {
                $status[] = "Working";
            }
            else
            {
                $status[] = "Not Working";
            }
        }
    }
    // foreach($serial as $data)
    // {
    //     echo $data."<br>";
    // }
}
?>


    <!DOCTYPE html>
<html>
    <head>
        

        <title>Equipment</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        

        <style type="text/css">
        body {
            overflow-x:hidden;
        }
        .hidden
        {
            display:none;
        }

        .shown 
        {
            display:block;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button,
        input[type=date]::-webkit-inner-spin-button, 
        input[type=date]::-webkit-outer-spin-button 
        { 
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>
        <link rel="stylesheet" href="sidebar.css">
        <link rel="stylesheet" type="text/css" href="equipment.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            


            <div class="main">
                <div class="info" style="text-align: center;" >


                    <div class="row align-items-center" style="max-width: 1380px;padding-top: 60px"><h1 class="col-11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $labnumber; ?></h1>  <a class="col-1" style="color:black" href="master.php"><h3 title="Return to main page">&#8920;&nbsp;</h3></a></div>
                    <p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of elements:<?php echo $count ?> </p>     
                    <div class="row ">

                        <div class="container" style="max-width:1250px;">
                            <table class="table table-striped text-center table-hover">
                                <thead class="thead-dark ">
                                    <tr>
                                        <!-- <th scope="col"             >  Labno            </th> -->
                                        <!-- <th scope="col"             >  Serial No.       </th> -->
                                        <th scope="col"             >  Name             </th>
                                        <th scope="col"             >  Brand            </th>
                                        <th scope="col"             >  Count            </th>
                                        <th scope="col"             >  Cost             </th>
                                        <th scope="col"             >  Date of Purchase </th>
                                        <th scope="col"             >  Amount           </th>
                                        <th scope="col"             >  Description      </th>
                                        <th scope="col"             >  Status           </th>
                                        <th scope="col" colspan="5" >  Control          </th>
                                    </tr>
                                </thead>
                          
                            </table>
                            <a  style="text-decoration: none;"><div class="card border-success mx-auto text-center  justify-content-center"  style="height:50px" onclick="add()">Add Element</div></a>  

                            <br />

                            <div id="addElement" class="hidden" style="padding-left: 90px;">
                                <div class="container-fluid">

                                    <h2 class="text-center">Add Element</h2>
                                    <input id="table" name="table" style="display:none" value="<?php echo $table ?>">
                                    <form class="form-signin" style="max-width:1000px" action="addelement.php" required method="POST">                                        


                                            <input type="text" name="table" class="hidden" value="<?php echo $table; ?>">
                                            <input type="text" name="username" class="hidden" value="<?php echo $username; ?>">
                                                    <input id="labno"   name="labno"   style="display:none;"  value="<?php echo $labnumber   ?>"> 
                                           
                                            <div class="row">

                                            <div class="col-6 form-group">
                                                <label>Serial No:</label>
                                                <input  type="text"      name="serial"    id="serial"  required  class="form-control">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label>Name:</label>
                                                <select name="name"    id="name"    required  class="form-control">
                                                    <option value="Computer"  >Computer  </option>
                                                    <option value="Laptop"    >Laptop    </option>
                                                    <option value="Printer"   >Printer   </option>
                                                    <option value="Projector" >Projector </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Brand:</label>
                                                <input  type="varchar"  name="brand"   id="brand"   required  class="form-control">
                                            </div>
                                            <div class="col form-group">
                                                <label>Cost:</label>
                                                <input  type="decimal"  name="cost"    id="cost"    required  class="form-control">
                                            </div>                      
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Date Of Purchase:</label>
                                                <input  type="date"     name="dop"     id="dop"     required  class="form-control">
                                            </div>
                                            <div class="col form-group">
                                                <label>Description:</label>
                                                <input  type="text"     name="desc"    id="desc"    required  class="form-control">
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col form-group">
                                                <button class="btn btn-success" type="submit">SUBMIT</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div> 

                            <br /><br />

                        </div>
                    </div>
                </div>
            </div>
        </div>





    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
function add() 
{
    document.getElementById("addElement").classList.toggle("shown");
}   

function shift(ele) 
{
    var id=ele.id;
    document.getElementById(id).classList.toggle("hidden");
    document.getElementById("shiftElement/"+id).classList.toggle("shown");
    document.getElementById("buttontobshown/"+id).classList.toggle("shown");
}

function remark(ele) 
{
    var id=ele.id;
    document.getElementById("buttontobeshown/"+id).classList.toggle("shown");
}

function conf()
{
    var conf = confirm('Please Confirm for Deletion');
    return conf;
}
</script>


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