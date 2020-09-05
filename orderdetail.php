<?php 

  require('dbconnect.php');
  include('Backend_Header.php');
  $voucherno = $_GET['voucherno'];


  $sql = "SELECT * FROM orders 
          JOIN users 
          ON orders.user_id = users.id
          WHERE voucherno=:voucherno";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':voucherno', $voucherno);
  $stmt->execute();

  $orderdetail = $stmt->fetch(PDO::FETCH_ASSOC);

?>
    <!-- Navbar-->


    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <?=$orderdetail['orderdate']?></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Vali Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
                </div>
                <div class="col-4">To
                  <address>Name: <strong> <?=$orderdetail['name'];?></strong><br>Address: <?=$orderdetail['address']?><br>Phone: <?=$orderdetail['phone'];?><br> Email : <?=$orderdetail['email']?> </address>
                </div>
                <div class="col-4"><b>Order ID:</b> <?=$orderdetail['id']?></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <?php 
                        $i=1;
                        $sql = "SELECT * FROM orderdetails 

                                JOIN items
                                ON orderdetails.item_id = items.id
                                WHERE voucherno=:voucherno
                                ";
                        $stmt=$conn->prepare($sql);
                        $stmt->bindParam(':voucherno', $voucherno);
                        $stmt->execute();
                        $items = $stmt->fetchAll();
                    ?>
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Voucher No </th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($items as $item):?>
                        <tr>
                          <td><?=$item['qty']?></td>
                          <td><?=$item['name']?></td>
                          <td><?=$item['voucherno']?></td>
                          <td><?=$item['description']?></td>
                          <td><?=$item['qty']*$item['price']?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php include('Backend_Footer.php'); ?>