<?php
  include('dbconnect.php');
  include('BackEnd_Header.php');

  $sql="SELECT * FROM categories";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $categories=$stmt->fetchAll();

?>

         <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="categorynew.php" class="btn btn-outline-primary">
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
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $i=1;
                                        foreach ($categories as $category)
                                        {
                                          $id=$category['id'];
                                          $name=$category['name'];
                                          $photo=$category['photo'];
                                        
                                      ?>
                                        <tr>

                                            <td> <?php echo $i++; ?> </td>
                                            <td>
                                              <img src="<?= $photo?>" class="img-fluid w-25">
                                               <?= $name ?>

                                             </td> 

                                            <td>
                                                <a href="categoryedit.php?id=<?=$category['id']?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="categorydelete.php?id=<?=$category['id']?>" class="btn btn-outline-danger">
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