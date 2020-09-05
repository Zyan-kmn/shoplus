<?php
	include('FrontEnd_Header.php');
	include ('dbconnect.php');
?>
<?php
	include('FrontEnd_Nav.php');
?>

<div class="container mt-5">
		</div>
	<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 
			        		$sql="SELECT * FROM items where discount !=''  order by rand()  limit 10";
			        		$stmt=$conn->prepare($sql);
			        		$stmt->execute();
			        		$items=$stmt->fetchAll();

			        		foreach ($items as $item) :
			        			$itid=$item['id'];
			        			$itname=$item['name'];
			        			$itphoto=$item['photo'];
			        			$itprice=$item['price'];
			        			$itdiscount=$item['discount'];
						?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $itphoto; ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $itname;?></p>
		                        <p class="item-price">
		                        	<?php if($itdiscount): ?>
		                        	<strike><?= $itprice;?> KS</strike> 
		                        	<span class="d-block"><?= $itdiscount?>KS</span>
		                        	<?php else: ?>
		                        		<span class="d-block"><?= $itprice?>KS</span>
		                        	<?php endif ?>

		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

		                    </div>
		                </div>
		                <?php endforeach ?>
		               
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

	

	<?php

	include ('FrontEnd_Footer.php')
?>
