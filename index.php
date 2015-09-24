<!doctype html>
<html lang="en">
<?php
       include 'core/init.php';
       ?> 
	   <?php include'includes/head.php';?>
<body id="page-top" class="index">
   <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Craigslist</a>
            </div>
	   <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
						
                        <a href="#services" class="page-scroll" href="#services">Sales</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Jobs</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Real Estate</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#contact">Events</a>
                    </li>
		<li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
	<p>
<?php 

if(empty($_POST)===false){
$username=$_POST['username'];
$password=$_POST['password'];

	if(empty($username) ===true||empty($password)===true){
		$errors[]='Please enter a username and password';
		
	} 
	else if(users_exists($username)===false){
	$errors[]='The username name entered is wrong.';
	
	} else{
		$login=login($username,$password);

		if($login==false){
		$errors[]='Either the username or the password entered is wrong.';
					
		}
		else{
			$_SESSION['user_id']=$login;
			header('Location:home.php');
			exit();
			
		}
	}

} 
else{

$errors[]='Please enter your username and password';
}

if(empty($errors)===false){
			$arr=output_errors($errors);
			echo "<br/>";
			echo "<font color=#fed136>".$arr."</font>";
			
}
?>
</p>
		<form action=" " method="post" enctype="multipart/form-data">
	

               <input type="text" name="username" placeholder="Username" >
      
         
               <input type="password" name="password" placeholder="Password" >
       
            <input type="submit" class="btn btn-success" value="Login" >
          </form>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Improvised Version of Craigslist</div>
                 <div class="col-lg-12 text-center">
                          <h3 class="section-subheading text-muted">If you have not registered, register here for free!</h3>
                </div>
                <a href="register.php" class="page-scroll btn btn-xl">Register</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                     <a href="show_sales_latest.php"><h2 class="section-heading">SALES</h2></a>
                    <h3 class="section-subheading text-muted">Our sales includes.</h3>
					<h4 class="service-heading"><a href="gadgets.php">Gadgets</a></h4>
					<h4 class="service-heading"><a href="clothes.php">Clothing</a></h4>
					<h4 class="service-heading"><a href="accessories.php">Accessories</a></h4>
					<h4 class="service-heading"><a href="vehicles.php">Vehicles</a><br/></h4>
                </div>
            </div>
            <div class="row text-center">
                
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="show_jobs_latest.php"><h2 class="section-heading">JOBS</h2></a>
                    <h3 class="section-subheading text-muted">Our jobs includes.</h3>
					<h4 class="service-heading"><a href="accounting.php">Accounting</a></h4>
					<h4 class="service-heading"><a href="marketing.php">Marketing</a></h4>
					<h4 class="service-heading"><a href="sales.php">Sales</a></h4>
					<h4 class="service-heading"><a href="hr.php">HR</a><br/></h4>
					<h4 class="service-heading"><a href="software.php">Software Engineering</a><br/></h4>
                 
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
					<a href="show_realestate_latest.php"><h2 class="section-heading">REAL ESTATE</h2></a>
                    <h3 class="section-subheading text-muted">Our jobs includes.</h3>
					<h4 class="service-heading"><a href="commercial.php">Commercial</a></h4>
					<h4 class="service-heading"><a href="residential.php">Residential</a></h4>
					
                </div>
            </div>
        </div>
    </section>

   
    
	 <section id="contact" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
					<a href="show_realestate_latest.php"><h2 class="section-heading">EVENTS</h2></a>
                    <h3 class="section-subheading text-muted">Our events includes.</h3>
					<h4 class="service-heading"><a href="arts.php">Arts</a></h4>
					<h4 class="service-heading"><a href="cultural.php">Cultural</a></h4>					
					<h4 class="service-heading"><a href="literary.php">Literary</a></h4>
					<h4 class="service-heading"><a href="sports.php">Sports</a></h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">TEAM</h2>
                    <h3 class="section-subheading text-muted">Meet our amazing team.</h3>
					<div class="row">
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Lakshmi Naidu</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Sanmathi Sathyanarayana Naga</h4>               
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Rahul Shantaram Rao</h4>
                        </div>
                </div>
            </div>
                </div>
            </div>
    </section>

<?php include'includes/overall/footer.php';?>