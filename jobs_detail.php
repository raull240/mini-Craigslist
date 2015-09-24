<body class="bg-light-gray">
<?php  
include 'core/init.php';
include 'includes/overall/header.php';
echo "<br/><br/><br/><br/><br/>";

//$uid=$_SESSION["UID"];
//var_dump($_GET);
$id= $_GET["ID"];
echo "<center><h2><font face='Kaushan Script' color='#2D0D4C'>Details</font></h2>";
$con = mysqli_connect('localhost','root','root','craigslist');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"craigslist");

$q = "SELECT * FROM jobs, users where users.UID=jobs.UID and jobs.ID=".$id;

$r = mysqli_query($con,$q);
if($r)
{	
	echo"<table>";
while($row=mysqli_fetch_array($r))
{
echo"<h4><i>";	
echo "Title: ";
echo $row['PostTitle'];
echo"</i></h4>";	
echo "</br>";
echo "<tr><td>";
echo "Description: ";
echo $row['Description'];
echo "</br>";
echo "Job Type: ";
echo $row['JobType'];
echo "</br>";
echo "</td><td>";
echo "Pay Scale: ";
echo $row['PayScale'];
echo "</br>";
echo "Company: ";
echo $row['Company'];
echo "</br>";
echo "Link: "; ?>
<a href="<?php echo $row['Link']; ?>"><?php echo $row['Link']; ?> </a>
<?php
echo "</br>";
echo "</td></tr>";
}
echo "</table>";
}
else
{
echo mysql_error();
}
echo "</center>";
echo "<br/><br/><br/><br/><br/><br/><br/>";
include 'includes/overall/footer.php';
?>