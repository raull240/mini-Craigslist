<?php
include 'core/init.php';
if(empty($_POST)===false){
$username=$_POST['username'];
$password=$_POST['password'];

	if(empty($username) ===true||empty($password)===true){
		$errors[]='Please enter a username and password';
		header('Location:index.php?err='.$errors);
			exit();
	} 
	else if(users_exists($username)===false){
	$errors[]='The username name entered does not seem match with our records. Please register before logging in.';
	
	} else{
		$login=login($username,$password);

		if($login==false){
		$errors[]='Either the username or the password entered is wrong. Please try to login again';
			
		
		}
		else{
			$_SESSION['user_id']=$login;
			header('Location:home.php');
			exit();
			
		}
	}

} 
else{

$errors[]='Please enter the username and password';
}

include 'includes/overall/header.php';?>

 <div class="jumbotron">
      <div class="container">
<p>
<?php if(empty($errors)===false){
echo output_errors($errors);
}?>
</p>
</div>
</div>

<?php include 'includes/overall/footer.php';
?>