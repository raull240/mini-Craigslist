<?php
$connect_error="Sorry we are experiencing unexpected connection problems!";
mysql_connect('localhost','root','root') or die($connect_error);
mysql_select_db('craigslist')  or die($connect_error);
?>
