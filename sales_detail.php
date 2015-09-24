<body class="bg-light-gray">
<?php  
include 'core/init.php';
include 'includes/overall/header.php';
echo "<br/><br/><br/><br/><br/>";

$id= $_GET["ID"];
echo "<center><h2><font face='Kaushan Script' color='#2D0D4C'>Details</font></h2>";
$con = mysqli_connect('localhost','root','root','craigslist');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"craigslist");

$q = "SELECT * FROM sales, users where users.UID=sales.UID and sales.ID=".$id;

$r = mysqli_query($con,$q);
if($r)
{	
	echo"<table>";
while($row=mysqli_fetch_array($r))
{
	if (empty($row['Picture'])){
		echo "No image!";
	}else{
	echo '<img src="data:image/jpg;base64,' . base64_encode($row['Picture']) . '" width=500 height=300 />';
	echo "</br>";
	}
	echo "</br>";
	echo "<tr><td>";
	echo "Name:" ;
	echo $row['FirstName']." ".$row['LastName'];
	echo "</br>";
	echo "Phone No:" ;
	echo $row['PhoneNo'];
	echo "</td>";
	
		echo "<td>";
	echo "Price: ";
	echo $row['Price'];
	echo "</br>";
	echo "Address: ";
	echo $row['Address'];
	echo "</br>";
	echo "Category: ";
	echo $row['Category'];
	echo "</td></tr>";
		echo "</br>";
	echo "Description: ";
	echo $row['Description'];
	echo "</br>";
}
echo"</table>";
}
else
{
echo mysql_error();
}
echo "</center>";
echo "<br/><br/><br/><br/><br/><br/><br/>";
include 'includes/overall/footer.php';
?>