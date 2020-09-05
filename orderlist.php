<?php include('dbconnect.php');
	include('BackEnd_Header.php');

	$sql="SELECT * FROM orders";
	 $stmt=$conn->prepare($sql);
  	$stmt->execute();
  	$orders=$stmt->fetchAll();
 ?>

         <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Orde Lists </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="itemnew.php" class="btn btn-outline-primary">
                        <i class="icofont-plus"></i>
                    </a>
                </ul>
            </div>

              <div class="jumbotron jumbotron-fluid subtitle">
      <div class="container">
        <h1 class="text-center text-white"> Order List </h1>
      </div>
  </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>No.</th>
                                          <th>Date</th>
                                          <th>Voucher NO</th>
                                          <th>Total</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $i=1;
                                       foreach ($orders as $order)
                                        {
                                          $id=$order['id'];
                                          $date=$order['orderdate'];
                                          $voucherno=$order['voucherno'];
                                          $total=$order['total'];
                                          $order_status=$order['status'];
                                           if ($order_status==0)
                                            {
                                            	$status="Order";
                                               }

                                         elseif($order_status==2)

                                               {
                                               	$status="Order cancle";
                                               }else{
                                                $status="Order Confirn";
                                               } 

                                                                           
                                        
                                      ?>
                                        
                                 
                                        <tr>

                                     
                                <td><?php echo $i++; ?></td>

                                <td><?= $date; ?></td>
                                <td><?= $voucherno; ?></td>
                                <td><?= $total; ?></td>
                                <td><?= $status; ?></td>
                                 <td>

               <a href="orderdetail.php?voucherno=<?=$order['voucherno']?>" class="btn btn-primary">
                  <i class="icofont-exclamation-circle"></i>
               </a>
                <?php
                   if ($order_status==0):

                    ?>
                      <a href="orderconfirm.php?id=<?=$order['id']?>" class="btn btn-success">
                          <i class="icofont-tick-mark"></i>
                                                </a>

                          <a href="orderdelete.php?id=<?=$order['id']?>" class="btn btn-outline-danger">
                           <i class="icofont-close"></i>
                               </a>               
                        

                            <?php endif; ?>
                 
                                            </td>

                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php

  include('BackEnd_Footer.php');
?>
