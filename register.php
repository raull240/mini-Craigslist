<?php 
include 'core/init.php';
include'includes/overall/header.php';?>

<?php
if(empty($_POST)===false){
	$required_fields=array('first_name','username','password','retype_password','phoneno','address');
	foreach($_POST as $key=>$value){
		if(empty($value)&& in_array($key,$required_fields)===true)
		{
			$errors[]='Please fill in the required fields';
			break 1;
		}
	}
	
	if(empty($errors)===true)
	{
	
	
		if(filter_var($_POST['username'],FILTER_VALIDATE_EMAIL)===false){
			$errors[]='Please enter a valid email address.';
		}
		
		if(users_exists($_POST['username'])===true){
			$errors[]='Sorry the email \''.$_POST['username'].'\' is already used for registration.';
		}
		
		if(strlen($_POST['password'])<6)
		{
			$errors[]='Please enter a password of at least 6 characters';
			
		}
		if($_POST['password']!==$_POST['retype_password'])
		{
			$errors[]='The passwords entered do not match.';
		}
		
		
	}
}

?>


<?php
if(isset($_GET['success']) && empty($_GET['success'])){
	echo 'You have successfully registered.!';
}

else{
	if(empty($_POST)===false && empty($errors)===true){
		$register_data=array(

		'FirstName' => $_POST['first_name'],
		'LastName'  => $_POST['last_name'],
		'Email'      => $_POST['username'],
		'Password'   => $_POST['password'],
		'PhoneNo' => $_POST['phoneno'],
		'Address' => $_POST['address'],
		'UserType' => "0"
		);
		register_user($register_data);
		
		
		header('Location:register.php?success');
		exit();
		
	}
	else if(empty($errors)===false){
		echo output_errors($errors);
	}
?>
 <section id="services" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">REGISTER</h2>
                    <h3 class="section-subheading text-muted">If you have not registered yet, please register here.</h3>
                </div>
            </div>
		<form action=" " method="post" enctype="multipart/form-data">
			<ul>
			<p><center>
					

					
					<input type="text" name="first_name" placeholder="First Name*">
					<br/>	<br/>				
					<input type="text" name="last_name" placeholder="Last Name">
					<br/>	<br/>				
					<label for="username">
					
					<input name="username" type="text" id="username" placeholder="Email*">
					
					<span id="user-result"></span>
					</label>
					<br/> <br/>
					<input type="password" name="password" placeholder="Password*">
					<br/> <br/>
					<input type="password" name="retype_password" placeholder="Retype Password*">
					<br/> <br/>
					<input type="text" name="phoneno" placeholder="Phone Number">
					<br/> <br/>
					<input type="text" name="address" placeholder="Address">

				<br> <br/>
					<input type="submit" value="Register">
				
			</center></p>

			</ul>


</form>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#username").keyup(function (e) {
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 4){$("#user-result").html('');return;}
		
		if(username.length >= 4){
			$("#user-result").html('<img src="imgs/ajax-loader.gif" />');
			$.post('check_email.php', {'username':username}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});

</script>
<?php
}
?>