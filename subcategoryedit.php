<?php
  include('dbconnect.php');
  include('BackEnd_Header.php');
//get the id from address/url bar
  $id=$_GET['id'];
  $sql="SELECT * FROM subcategories WHERE id=:id";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $subcategory=$stmt->fetch(PDO::FETCH_ASSOC);


  $sql="SELECT * FROM categories";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $categories=$stmt->fetchAll();


?>

   <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategorylist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategoryupdate.php" method="POST" enctype="multipart/form-data">
                            	<input type="hidden" name="id" value="<?=$subcategory['id']?>">
                           
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?= $subcategory['name']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Category" class="col-sm-2 col-form-label"> Category </label>
                                    <div class="col-sm-10">
                                     <select class="form-control" name="categoryid">
                                        <option >Choosen Category</option>
                                     
                                        <?php
                                            foreach ($categories as $category){
                                                $id=$category['id'];
                                                $name=$category['name'];
                                          
									
                       
                                        ?>
                                        
                                        <option value="<?= $id?>" 
                                        	<?php
                                        	if($id==$subcategory['category_id'])
                                        		echo 'selected';
                                        	?>
                                        	>
                                            <?= $name;?>
                                        </option>
                                        <?php } ?>
                                    
                                     </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php

  include('BackEnd_Footer.php');
?>