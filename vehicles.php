<body class="bg-light-gray">
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

echo "<center><h2><font face='Kaushan Script' color='#2D0D4C'>Vehicles</font></h2>";


$q = "SELECT ID,PostTitle,DATE(TimeStamp) as Date FROM sales where category='vehicles'";

$r = mysqli_query($con,$q);
if($r)
{
echo "<table cellpadding='10'> <tr> <td>";
while($row=mysqli_fetch_array($r))
{

echo "<tr><td>";
echo $row['Date'];
echo "&nbsp";
$id=$row['ID'];
echo "</td>";

?>
<td>
<a href="sales_detail.php?ID=<?php echo $id;?>"><?php echo $row['PostTitle']?> </a>
</td></tr>
<?php

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