<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>PHP </title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>PHP </title>
</head>
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


echo "<center><h2><font face='Kaushan Script' color='#2D0D4C'>Real Estate</font></h2>";
echo "<br/><br/>";


echo "<form action='search.php' method='POST'>";
$table="sales";
echo "<input type=\"hidden\" name=\"table\" value=\"realestate\">";
echo "<div class='form-group'>";
echo "<table cellpadding='10'> <tr> <td>";
echo "<input type='text' placeholder='search' name='search'>";
echo"</td><td>";
echo "<input type='submit' value='search' class='btn btn-success'>";
echo"</td><td>";
echo "</form>";



$q = "SELECT ID,PostTitle,DATE(TimeStamp) as Date FROM realestate order by timestamp desc";
echo "Order";
echo "<select onchange=\"location = this.options[this.selectedIndex].value;\">";
echo "<option value=''>Latest</option>";
echo "<option value='show_realestate.php'>Oldest</option>";
echo "<option value='show_realestate_image.php'>Images only</option>";
echo "</select>";
echo"</td></tr>";


$r = mysqli_query($con,$q);
if($r)
{
while($row=mysqli_fetch_array($r))
{
echo "<tr><td>";
echo $row['Date'];
echo "&nbsp";
$id=$row['ID'];
echo "</td>"
?>
<td>
<a href="realestate_detail.php?ID=<?php echo $id;?>"><?php echo $row['PostTitle']?> </a>
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