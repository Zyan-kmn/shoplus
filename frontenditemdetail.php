<?php 
  
  require('dbconnect.php');
  include('Backend_Header.php');
  $id = $_GET['id'];

  $sql = "SELECT * FROM items WHERE id=:id ";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $item = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    
    <!-- main content -->
<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i>Detail </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="itemlist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                 <?php 
                                        
                                        $id = $item['id'];
                                        $name = $item['name'];
                                        $photo = $item['photo'];
                                        $codeno = $item['codeno'];
                                        $price = $item['price'];
                                        $description =  $item['description'];
                                        $brand_id = $item['brand_id'];
                                        $subcategory_id = $item['subcategory_id']
                                        
                                  ?>

                                 
                                  <span> Code-No: <?= $codeno ?> </span> | Item-Name: <label style="color:gray;"><?=$name?></label>
                                  <br>
                                  <img src="<?= $photo ?>" class="img-fluid" width="300px" style="float:left;">
                                   <br> <br><br> <br> <br> 
                                  <?php 
                                                $sql= "SELECT b.name FROM items as i 
                                                JOIN brands as b 
                                                ON i.brand_id=b.id
                                                WHERE i.brand_id=:id";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->bindParam(':id', $brand_id);
                                                $stmt->execute();
                                                $brand_name = $stmt->fetch(PDO::FETCH_ASSOC);
                                  ?> 
                                             <label>Description:</label>
                                      <label><?= $description ?></label><br>
                                     
                                              <label> Brand : <?= $brand_name['name'] ?> </label> <br>
                                  <?php 
                                                $sql= "SELECT sc.name FROM items as i 
                                                JOIN subcategories as sc 
                                                ON i.subcategory_id=sc.id
                                                WHERE sc.id=:id";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->bindParam(':id', $subcategory_id);
                                                $stmt->execute();
                                                $sc_name = $stmt->fetch(PDO::FETCH_ASSOC);
                                  ?> 

                                              <label> Sub-Category : <?= $sc_name['name'] ?> </label> <br> 


                                  Price: <label style="color:red;"> <strong><?=$price?> </strong> Kyats</label>
                                  <div class="clear" style="clear:both;">
                                     
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 </main>


<?php include('Backend_Footer.php') ?>
