<?php 

  require('dbconnect.php');
  include('Backend_Header.php');


?>
<main class="app-content">
      <div class="row user">
   
        <div class="col-md-5">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Customers For Today</a></li>
          
            </ul>
          </div>
        </div>


                     <?php
                          $sql="SELECT * FROM orders WHERE orderdate=DATE(NOW())";
                           $stmt=$conn->prepare($sql);
                           $stmt->execute();
                           $orders= $stmt->fetchAll();

                       



                       ?>  



                <?php  
                        foreach ($orders as $order){
                           
                        $odate= $order['orderdate'];
                        $voucherno=$order['voucherno'];
                        $total=$order['total'];
                       
                      
                  


                       // $roleid=$user['role_id'];
                      //var_dump($roleid);die();
                        // $date=$orders['orderdate'];
                        
                                             # code...
                                                             
                                              
                ?>

        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media">
                  <div class="content">
                    <h5><a href="#"><?= $odate ?></a></h5>
                  </div>
                </div>
                <div class="post-content">
                  <p>VoucherNo:<?= $voucherno ?></p>
                  <p>Total:<?= $total ?></p>
            
                </div>
             
              </div>
             
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
                <form>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
       
            


      </div>
    </main>

    <?php 
        include('BackEnd_Footer.php')

    ?>