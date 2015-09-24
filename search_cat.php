
<?php
include 'core/init.php';
include 'includes/overall/header.php';
echo "<br/><br/><br/><br/><br/>";
$con = mysqli_connect('localhost','root','root','craigslist');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"craigslist");
//$uid=$_SESSION["UID"];

$table=$_POST['table'];
$search=$_POST['search'];
$cat=$_POST['cat'];

$q = "SELECT ID ,PostTitle ,DATE(TimeStamp) as Date  FROM ".$table." where PostTitle like \"%".$search."%\" and category= ".$cat;

$r = mysqli_query($con,$q);

if($r)
{
while($row=mysqli_fetch_array($r))
{
	
echo "</br>";
echo $row['Date'];
echo "&nbsp";
$id=$row['ID'];

?>

<a href="jobs_detail.php?ID=<?php echo $id;?>"><?php echo $row['PostTitle']?> </a>
<?php

echo "</br>";
}
}
else
{
//echo mysql_error();
echo "The search did not match with records in our database. Please modify you search.";
}
echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
include 'includes/overall/footer.php';
?>