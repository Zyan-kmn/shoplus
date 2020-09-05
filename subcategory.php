<?php
	include('FrontEnd_Header.php');


?>

<?php

	include('FrontEnd_Nav.php');

?>
<?php 

		$sid=$_GET['sid'];
		$cid=$_GET['cid'];
		$bid=$_GET['bid'];
		


 ?>
	
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Subcategory name </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">



		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					<?php $sql="SELECT * FROM subcategories where category_id=:id ";
                        	$stmt= $conn->prepare($sql);
                        	$stmt->bindParam(':id',$cid);
                        	$stmt->execute();
                        	$subcategories=$stmt->fetchAll();
                        	foreach ($subcategories as $subcategory) :
                        		$name=$subcategory['name'];
                        		$sid=$subcategory['id'];
			 ?>
				  	<li class="list-group-item">
				  		<a href="subcategory.php?sid=<?=$sid?>&&cid=<?=$cid?>" class="text-decoration-none secondarycolor"> <?= $name ?> </a>
				  	 </li>
				  	 <?php 
                           endforeach; 
				  	  ?>

				  	
				</ul>
		 </div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">
					<?php $sql="SELECT * FROM items  where subcategory_id=:id ";
                        	$stmt= $conn->prepare($sql);
                        	$stmt->bindParam(':id',$sid);
                        	$stmt->execute();
                        	$sitems=$stmt->fetchAll();
                        	foreach ($sitems as $sitem) :
                        		$id=$sitem['id'];
                        		$name=$sitem['name'];
                        		$photo=$sitem['photo'];
                        		$price=$sitem['price'];
                        		$discount=$sitem['discount'];
                        		$codeno=$sitem['codeno'];


                        		 ?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					 
						<div class="card pad15 mb-3">
						  	<img src="<?= $photo ?>" class="card-img-top" alt="...">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"><?= $name ?></h5>
						    	
						    	<p class="item-price">
		                        	<?php if($discount): ?>
		                        	<strike><<?= $price ?>KS </strike> 
		                        	<span class="d-block"><?= $discount ?>KS</span>
		                        	<?php else: ?>
		                        		<span class="d-block"><?= $price ?>KS</span>
		                        </p>
		                         <?php endif; ?>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="#" class="addtocartBtn text-decoration-none"
								 data-id="<?= $id?>" 
								 data-name="<?=$name ?>" data-codeno="<?= $codeno ?>" data-photo="<?= $photo ?>" data-price="<?= $price ?>" data-discount="<?=$discount?>">Add to Cart</a>
						  	</div>
						</div>

						
					</div>

				<?php endforeach; ?>


					

					


					

				</div>


				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
	</div>
	


	<!-- Footer -->
	<div class="container-fluid bg-light p-5 align-content-center align-items-center mt-5">
		
		<div class="row">
	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-fast-delivery serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6>Door to Door Delivery</h6>
		        		<p class="text-muted" style="font-size: 12px">On-time Delivery</p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-headphone-alt-2 serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Customer Service </h6>
		        		<p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class='bx bx-undo serviceIcon maincolor'></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6 > 100% satisfaction </h6>
		        		<p class="text-muted" style="font-size: 12px"> 3 days return </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-credit-card serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Cash on Delivery </h6>
		        		<p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
			    	</div>
			  	</div>
	  		</div>
	  	</div>
	</div>
	
	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<h1> News Letter </h1>
				<p>
					Subscribe to our newsletter and get 10% off your first purchase
				</p>

			</div>
			
			<div class="offset-2 col-8 offset-2 mt-5">
				<form>
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
					  	
					  	<div class="input-group-append">
					    	<button class="btn btn-secondary subscribeBtn" type="button" id="button-addon2"> Subscribe </button>
					  	</div>


					</div>
				</form>
			</div>

		</div>
	</div>


	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
	

  	<footer class="py-3 mt-5">
    	<div class="container">
    		<div class="text-center pb-3">
				<a href="#myPage" title="To Top" class="text-white to_top text-decoration-none">
				    <i class="icofont-rounded-up" style="font-size: 20px"></i>
				</a>
			</div>

      		<p class="m-0 text-center text-white">Copyright &copy; <img src="../logo/logo_wh_transparent.png" style="width: 30px; height: 30px"> 2019</p>
    	</div>
  	</footer>








	<script type="text/javascript" src="frontend/js/jquery.min.js"></script>
	<!-- BOOTSTRAP JS -->
    <script type="text/javascript" src="frontend/js/bootstrap.bundle.min.js"></script>
	<script src="js/slick.js"></script>
    <script type="text/javascript" src="frontend/js/custom.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="frontend/js/owl.carousel.js"></script>

</body>
</html>

<?php

	include ('FrontEnd_Footer.php')
?>