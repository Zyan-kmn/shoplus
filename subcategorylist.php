<?php
  include('dbconnect.php');
  include('BackEnd_Header.php');


  $sql="SELECT subcategories.*, categories.name as categoryName FROM subcategories JOIN categories ON subcategories.category_id=categories.id";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $subcategories=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

         <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> SubCategory </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategorynew.php" class="btn btn-outline-primary">
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
                                          <th>Category Name</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $i=1;

                                        foreach ($subcategories as $subcategory)
                                        {
                                          
                                          $name=$subcategory['name'];
                                           $category=$subcategory['categoryName'];
                                          
                                      ?>
                                        <tr>

                                            <td> <?php echo $i++; ?> </td>
                                            <td><?= $name ?> </td> 
                                            <td><?= $category ?> </td> 

                                            <td>
                                                <a href="subcategoryedit.php?id=<?=$subcategory['id']?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="subcategorydelete.php?id=<?=$subcategory['id']?>" class="btn btn-outline-danger">
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