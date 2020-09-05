<?php
  include('dbconnect.php');
   include('BackEnd_Header.php');


  $sql="SELECT items.*, brands.name as brandName FROM items JOIN brands ON items.brand_id=brands.id";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $items=$stmt->fetchAll();

  //   $sql="SELECT * FROM items";
  // $stmt=$conn->prepare($sql);
  // $stmt->execute();
  // $items=$stmt->fetchAll(PDO::FETCH_ASSOC);

  //     $sql="SELECT * FROM brands";
  // $stmt=$conn->prepare($sql);
  // $stmt->execute();
  // $brands=$stmt->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($brands);

?>

         <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Lists </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="itemnew.php" class="btn btn-outline-primary">
                        <i class="icofont-plus"></i>
                    </a>
                </ul>
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
                                          <th>Name</th>
                                          <th>Brand</th>
                                          <th>Price</th>
                                          <th>Action</th>
                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $i=1;
                                       foreach ($items as $item)
                                        {
                                          $id=$item['id'];
                                          $name=$item['name'];
                                          $photo=$item['photo'];
                                          $brand=$item['brandName'];
                                          $price=$item['price'];
                                          $disscount=$item['discount'];
                                       
                                        
                                      ?>
                                        
                                 
                                        <tr>

                                            <td> <?php echo $i++; ?> </td>
                                            <td> <?= $name ?> <?php echo "<br/>"; ?>  <img src="<?= $photo?>" class="img-fluid w-25"></td> 
                                            <td><?=$brand?></td> 
                                             <td><?= $price ?> <?php echo "</br>" ?><?= $disscount ?> discount </td> 
                                              

                                            <td>
                                              <a href="itemdetail.php?id=<?=$item['id']?>" class="btn btn-primary">
                                                    <i class="icofont-exclamation-circle"></i>
                                                </a>
                                                <a href="itemedit.php?id=<?=$item['id']?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="itemdelete.php?id=<?=$item['id']?>" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
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