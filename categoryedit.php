<?php
  include('dbconnect.php');
  include('BackEnd_Header.php');
//get the id from address/url bar
  $id=$_GET['id'];
  $sql="SELECT * FROM categories WHERE id=:id";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $category=$stmt->fetch(PDO::FETCH_ASSOC);


?>


 <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="categorylist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="categoryupdate.php" method="POST" enctype="multipart/form-data">
                            	<input type="hidden" name="id" value="<?=$category['id']?>">
                            	<input type="hidden" name="oldPhoto" value="<?=$category['photo']?>">
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?= $category['name']?>">
                                    </div>
                                </div>

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
							<img src="<?=$category['photo']?>" id="editphoto" width="100" height="100"></div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="photo"></div>
						
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