<?php
	include('FrontEnd_Header.php');
	 include('dbconnect.php');
?>

<?php
	include('FrontEnd_Nav.php');
?>
	<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-5">
				<?php 
					if (isset($_SESSION['reg_success'])):?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>  🎉 Congratulations 🎊</strong><p>You have successfully❤️
  	<span class="">Sign up 🖋</span>
  </p>
  <p><?= $_SESSION['reg_success'];?></p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;?>
	<?php 
					if (isset($_SESSION['reg_fail'])):?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>  🙅 Sorry 👎 </strong><hr>
  </p>
  <p><?= $_SESSION['reg_fail'];?></p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;
unset($_SESSION['reg_fail']);
?>
				<form action="signin.php" method="POST">
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputEmailAddress">Email</label>
		      			<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
		      		</div>
		      		
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputPassword">Password</label>
		      			<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
		      		</div>
		      
		      		<div class="form-group">
		          		<div class="custom-control custom-checkbox">
		          			<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
		          			<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>


		          		</div>

		          		<a class="small" href="#">Forgot Password?</a>

		      		</div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
		      		</div>


		  		</form>

		  		<div class=" mt-3 text-center ">
		  			<a href="register.php" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
		  		</div>
			</div>
		</div>
		
	</div>
<?php 	include ('FrontEnd_Footer.php') ?>