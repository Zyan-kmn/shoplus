<?php
  include('dbconnect.php');
  include('BackEnd_Header.php');
//get the id from address/url bar
  // $id=$_GET['id'];
  // $sql="SELECT * FROM categories WHERE id=:id";
  // $stmt=$conn->prepare($sql);
  // $stmt->bindParam(':id',$id);
  // $stmt->execute();
  // $category=$stmt->fetch(PDO::FETCH_ASSOC);

  $id=$_GET['id'];
  $sql="SELECT * FROM items WHERE id=:id";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $items=$stmt->fetch(PDO::FETCH_ASSOC);


  // $sql="SELECT * FROM brand";
  // $stmt=$conn->prepare($sql);
  // $stmt->execute();
  // $brands=$stmt->fetchAll();
    $sql="SELECT * FROM brands";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $brands=$stmt->fetchAll();

      $sql="SELECT * FROM subcategories";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $subcategories=$stmt->fetchAll();


?>

  
 <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Edit Form For Items </h1>
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
                        <form action="itemupdate.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?=$items['id']?>">
                           <input type="hidden" name="oldPhoto" value="<?=$items['photo']?>">
                  <div class="form-group row">
                       <label for="photo_id" class="col-sm-2 col-form-label" > Photo </label>
                         <div class="col-sm-10">


                           <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="home" aria-selected="true" >Old photo</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">new photo</a>
            </li>

          </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="home-tab">
              <img src="<?=$items['photo']?>" id="editphoto" width="100" height="100"></div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="photo"></div>
            
          </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> CodeNO </label>
                                    <div class="col-sm-10">
                                      <input  class="form-control text-truncate" name="codeno" value="<?= $items['codeno']?>">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?= $items['name']?>">
                                    </div>
                                </div>
                    <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Price </label>
                                    <div class="col-sm-10">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="home" aria-selected="true">Unit Price </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Disscount</a>
                        </li>

                    </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="home-tab">
                            <input type="number" class="form-control" name="unitprice" placeholder="Enter Unit Price" value="<?= $items['price']?>"></div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <input type="number" class="form-control" name="disscount" placeholder="Enetr Disscount Price" value="<?= $items['discount']?>"></div>
                        
                    </div>
                                </div></div>

                                 <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea type="text" class="form-control" id="name_id" name="description" value="<?= $items['description']?>" ></textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="Category" class="col-sm-2 col-form-label"> Brand </label>
                                    <div class="col-sm-10">
                                     <select class="form-control" name="brandid">
                                        <option>Choosen Brand</option>
                                        <?php
                                            foreach ($brands as $brand){
                                                $id=$brand['id'];
                                                $name=$brand['name'];
                       
                                        ?>
                                        
                                        <option value="<?= $id?>"
                                          <?php
                                          if($id==$items['brand_id'])
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
                                    <label for="Category" class="col-sm-2 col-form-label"> Sub-Category </label>
                                    <div class="col-sm-10">
                                     <select class="form-control" name="subcategoryid">
                                        <option>Choosen SubCategory</option>
                                        <?php
                                            foreach ($subcategories as $subcategory){
                                                $id=$subcategory['id'];
                                                $name=$subcategory['name'];
                       
                                        ?>
                                        
                                        <option value="<?= $id?>"
                                          <?php
                                          if($id==$items['subcategory_id'])
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