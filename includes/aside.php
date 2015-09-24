<aside>
<?php 
if(logged_in() === true){
include 'includes/widget/loggedin.php';
}
else{
include'includes/widget/login.php';
}
?>

</aside>