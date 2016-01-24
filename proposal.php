<!DOCTYPE html>
<html>
	<head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Smart City Jabalpur</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/style-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
        <!-- Fav and touch icons -->
    </head>
    
    <body>
		<div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand"><!-- <h2>Smart City Jabalpur</h2>  -->
                        <img src="images1/logo.png" style="height:90px;width:200px;float:right" ></img>
                        <!-- This is website logo -->
                    </a>      
                      <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
					
                    

                 <!--       <ul class="nav" id="top-navigation" style="margin-top:25px;font-weight:bold">
                            <li class="active" ><a href="#home"><b>Smart City Proposal</b></a></li>
							                        
                        </ul>
-->
<div style="float:left;margin-top:40px">
<span style="margin:200px;font-size:28px;color:black;text-align:center"><b>Smart City Proposal</b></span>
   </div>           
			  <div class="nav-collapse collapse pull-right" >
			  <a href="#" style="float:right" class="brand"><!-- <h2>Smart City Jabalpur</h2>  -->
                        <img src="images1/JMC_Logo.jpg" style="height:100px;width:110px" ></img>
                        <!-- This is website logo -->
                    </a>
                    </div>
                    
                    
                    <!-- End main navigation -->
                    </div>
            </div>

        </div>
<!--
<h3 style="background-color:black;color:white;text-align:center"><b>Smart City Proposal</b></h3>

-->
<div id="proppdf" style="margin-left:180px;margin-bottom:30px" >
<iframe width="1000" height="760" src="pdf/Jabalpur_SCPFinal.pdf" style="border: 5px solid black "  ></iframe>
</div>
 
 <div class="container" style="margin-left:180px" >
     <h3>Submit Your Feedback</h3>
     <form method="get" action="">
         <input type="text" style="width:800px;height:50px" name="u_comm" placeholder="Your Comment" required ></input>
         <input type="text" style="width:390px;height:30px" name="u_name" placeholder="Full Name" required ></input>
        <input type="email" style="width:393px;height:30px;" name="u_email" placeholder="Email Id" required ></input></br>
        <input type="number" style="width:350px;height:30px" name="u_mob" placeholder="Mobile Number" required ></input></br>
     <button type="submit" style="align:center" name="insert" >Submit</button>
     </form>
 </div>
 
 	<?php
	
	   
if($_GET){
    if(isset($_GET['insert'])){
        insert();
    }
}

			$serverName = "tcp:msreg.database.windows.net,1433";
 $connectionOptions = array("Database"=>"msreg",
 "Uid"=>"deepak", "PWD"=>"123azure,./");
 //Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);

  $tsql = "SELECT [u_comm] FROM ucomments";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
  ?>
  <table class="table" >
 <tbody> 
  <?php
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
           echo "<tr>";
		echo "<td>".$row['u_comm']."</td>";
//		echo "<td>".$row['extra1']."</td>";
//		echo "<td><a href='edit.php?k=".$row['name']."'>Edit</a> | <a onclick = 'return confirm(\"Do you really want to delete????\")' href='delete.php?k=".$row['name']."'>delete</a></td>";

 
 echo("<br/>");
 echo "</tr>";
            //echo($row['g_id']);
		//	echo($row['data']);
            echo("<br/>");
    //        $productCount++;
       }
        
      
?>

</tbody>
</table>
    
<?php
	   
        sqlsrv_close($conn);
  
     function insert()
    {
			$serverName = "tcp:msreg.database.windows.net,1433";
 $connectionOptions = array("Database"=>"msreg",
 "Uid"=>"deepak", "PWD"=>"123azure,./");
 //Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);
$u_comm= $_GET['u_comm'];
$u_name= $_GET['u_name'];
$u_email= $_GET['u_email'];
$u_mob= $_GET['u_mob'];
$date = date("Y-m-d");
  
 $tisql= "insert into ucomments(u_comm, u_name, u_email, u_mob,date) values('$u_comm', '$u_name', '$u_email', '$u_mob','$date' )";
 $insert_review= sqlsrv_query($conn , $tisql);
    }

?>



  
   <?php
/*                
$servername="tcp:msreg.database.windows.net,1433";
$connectionoptions=array("Database"=>"msreg","Uid"=>"deepak","PWD"=>"123azure,./");

$conn= sqlsrv_connect($servername,$connectionoptions);	
?>

<?php
 $comment= $_POST['comment'];
 $tsql = "INSERT INTO data VALUES('$comment')" ;
 $insertReview = sqlsrv_query($conn, $tsql);


*/
?>
<?php include("includes/footer.php");
?>

<!--
<ol id="update" class="timeline">
  <?php
/*include('config.php');
//$post_id value comes from the POSTS table
$sql=mysql_query("select * from comments where post_id_fk='$post_id'");
while($row=mysql_fetch_array($sql))
{
$name=$row['com_name'];
$email=$row['com_email'];
$comment_dis=$row['com_dis'];
$lowercase = strtolower($email);
$image = md5( $lowercase );
?>
//Displaying existing or old comments
<li class="box">
<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" class="com_img">
<span class="com_name"> <?php echo $name; ?></span> <br />
<?php echo $comment_dis; ?></li>
<?php
}
?>
</ol>

*/











