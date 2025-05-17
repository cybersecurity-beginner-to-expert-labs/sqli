<?php
require('connection.php');

if (isset($_GET['id'])){

// Assigning POST values to variables.
$id = $_GET["id"];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM Songs WHERE id='$id'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//$row = mysqli_fetch_array($result);
$tempcount = $count;

if ($count >= 1){
echo "<h1 style='text-align:center;'>Welcome!</h1>";
echo "<h3 style='color:grey;text-align:center;'>Song Successfully Selected!</h3>";
echo "<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SQL Query:</b> $query";
echo "<h4 style='margin-left:50px;'>Song Details</h4>";
echo "<div style='margin-left: 50px;background-color:#000000;color:white;height:30px;width:400px;'>&nbsp; &nbsp;ID &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Title &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Artist</div>";
while ($tempcount > 0) {
	$row = mysqli_fetch_array($result);
	$tempcount=$tempcount-1;
 	if($tempcount%2==0){
	 ?>
         <div style="margin-left: 50px;background-color:#F5F5F5;height:30px;width:400px;">
	<?php
        }else {
        ?>
          <div style="margin-left: 50px;background-color:white;height:30px;width:400px;">
        <?php
        }
	echo "<span>&nbsp; &nbsp;</span>";
	echo $row['id'];
	echo "<span>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span>";
	echo $row['song_name']; 
	echo "<span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</span>";
	echo $row['artist'];
        ?>
       </div>
	<?php
}
//$row = mysqli_fetch_array($result);

//header('Location: http://localhost/LA/welcome.php?result='.$result);
//exit();

}else{

//echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
header('Location: http://localhost/sqli-union/index.php?answer=Invalid');
exit();

}





}
?>
