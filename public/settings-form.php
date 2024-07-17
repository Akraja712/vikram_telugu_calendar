<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$res = $db->getResult();

$sql_query = "SELECT * FROM settings WHERE id = 1";
$db->sql($sql_query);
$res= $db->getResult();

if (isset($_POST['btnAdd'])) {       

			if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
				//image isn't empty and update the image
				$old_image = $db->escapeString($_POST['old_image']);
				$extension = pathinfo($_FILES["image"]["name"])['extension'];
		
				$result = $fn->validate_image($_FILES["image"]);
				$target_path = 'upload/images/';
				
				$filename = microtime(true) . '.' . strtolower($extension);
				$full_path = $target_path . "" . $filename;
				if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
					echo '<p class="alert alert-danger">Can not upload image.</p>';
					return false;
					exit();
				}
                if (!empty($old_image)) {
					unlink($old_image);
				}
				$upload_image = 'upload/images/' . $filename;
				$sql = "UPDATE settings SET `image`='" . $upload_image . "' WHERE id = 1";
				$db->sql($sql);
			}
          //telecast_image
          if ($_FILES['telecast_image']['size'] != 0 && $_FILES['telecast_image']['error'] == 0 && !empty($_FILES['telecast_image']))
          {
              $old_telecast_image = $db->escapeString($_POST['old_telecast_image']);
              $extension = pathinfo($_FILES["telecast_image"]["name"])['extension'];              

              $result = $fn->validate_image($_FILES["telecast_image"]);
              $target_path = 'upload/images/';
              
              $filename = microtime(true) . '.' . strtolower($extension);
              $full_path = $target_path . "" . $filename;
              if (!move_uploaded_file($_FILES["telecast_image"]["tmp_name"], $full_path)) {
                  echo '<p class="alert alert-danger">Can not upload image.</p>';
                  return false;
                  exit();
              }
              if (!empty($old_telecast_image)) {
                  unlink( $old_telecast_image);
              }
              $upload_telecast_image = 'upload/images/' . $filename;
              $sql = "UPDATE settings SET telecast_image='$upload_telecast_image' WHERE id = 1";
              $db->sql($sql);
          }
          //image tab
          if ($_FILES['image_tab']['size'] != 0 && $_FILES['image_tab']['error'] == 0 && !empty($_FILES['image_tab']))
          {
              $old_image_tab = $db->escapeString($_POST['old_image_tab']);
              $extension = pathinfo($_FILES["image_tab"]["name"])['extension'];              

              $result = $fn->validate_image($_FILES["image_tab"]);
              $target_path = 'upload/images/';
              
              $filename = microtime(true) . '.' . strtolower($extension);
              $full_path = $target_path . "" . $filename;
              if (!move_uploaded_file($_FILES["image_tab"]["tmp_name"], $full_path)) {
                  echo '<p class="alert alert-danger">Can not upload image.</p>';
                  return false;
                  exit();
              }
              if (!empty($old_image_tab)) {
                  unlink( $old_image_tab);
              }
              $upload_image_tab = 'upload/images/' . $filename;
              $sql = "UPDATE settings SET image_tab='$upload_image_tab' WHERE id = 1";
              $db->sql($sql);
          }
          //video tab
          if ($_FILES['video_tab']['size'] != 0 && $_FILES['video_tab']['error'] == 0 && !empty($_FILES['video_tab']))
          {
              $old_video_tab = $db->escapeString($_POST['old_video_tab']);
              $extension = pathinfo($_FILES["video_tab"]["name"])['extension'];              

              $result = $fn->validate_image($_FILES["video_tab"]);
              $target_path = 'upload/images/';
              
              $filename = microtime(true) . '.' . strtolower($extension);
              $full_path = $target_path . "" . $filename;
              if (!move_uploaded_file($_FILES["video_tab"]["tmp_name"], $full_path)) {
                  echo '<p class="alert alert-danger">Can not upload image.</p>';
                  return false;
                  exit();
              }
              if (!empty($old_video_tab)) {
                  unlink( $old_video_tab);
              }
              $upload_video_tab = 'upload/images/' . $filename;
              $sql = "UPDATE settings SET video_tab='$upload_video_tab' WHERE id = 1";
              $db->sql($sql);
          }
        
                 //neti arti image 
                 if ($_FILES['neti_arti_image']['size'] != 0 && $_FILES['neti_arti_image']['error'] == 0 && !empty($_FILES['neti_arti_image']))
                 {
                     $old_neti_arti_image = $db->escapeString($_POST['old_neti_arti_image']);
                     $extension = pathinfo($_FILES["neti_arti_image"]["name"])['extension'];              
     
                     $result = $fn->validate_image($_FILES["neti_arti_image"]);
                     $target_path = 'upload/images/';
                     
                     $filename = microtime(true) . '.' . strtolower($extension);
                     $full_path = $target_path . "" . $filename;
                     if (!move_uploaded_file($_FILES["neti_arti_image"]["tmp_name"], $full_path)) {
                         echo '<p class="alert alert-danger">Can not upload image.</p>';
                         return false;
                         exit();
                     }
                     if (!empty($old_neti_arti_image) && file_exists($old_neti_arti_image)) {
                        unlink($old_neti_arti_image);
                    }
                     $upload_neti_arti_image= 'upload/images/' . $filename;
                     $sql = "UPDATE settings SET neti_arti_image='$upload_neti_arti_image' WHERE id = 1";
                     $db->sql($sql);
                 }

                 //old arti image 
                 if ($_FILES['old_arti_image']['size'] != 0 && $_FILES['old_arti_image']['error'] == 0 && !empty($_FILES['old_arti_image']))
                 {
                     $old_old_arti_image = $db->escapeString($_POST['old_old_arti_image']);
                     $extension = pathinfo($_FILES["old_arti_image"]["name"])['extension'];              
     
                     $result = $fn->validate_image($_FILES["old_arti_image"]);
                     $target_path = 'upload/images/';
                     
                     $filename = microtime(true) . '.' . strtolower($extension);
                     $full_path = $target_path . "" . $filename;
                     if (!move_uploaded_file($_FILES["old_arti_image"]["tmp_name"], $full_path)) {
                         echo '<p class="alert alert-danger">Can not upload image.</p>';
                         return false;
                         exit();
                     }
                     if (!empty($old_old_arti_image) && file_exists($old_old_arti_image)) {
                        unlink($old_old_arti_image);
                    }
                     $upload_old_arti_image= 'upload/images/' . $filename;
                     $sql = "UPDATE settings SET old_arti_image='$upload_old_arti_image' WHERE id = 1";
                     $db->sql($sql);
                 }

                $update_result = $db->getResult();
                if (!empty($update_result)) {
                    $update_result = 0;
                } else {
                    $update_result = 1;
                }
                if ($update_result == 1) {
                    $error['add_menu'] = "<section class='content-header'>
                                                     <span class='label label-success'>Home Banner Details Updated Successfully</span>
                                                      </section>";
                } else {
                    $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
                }
        }
?>
<section class="content-header">
    <h1>Manage  Banners</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='settings_form'  method="post" enctype="multipart/form-data">
                    <div class="box-body">
                    <input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
                    <input type="hidden" id="old_telecast_image" name="old_telecast_image"  value="<?= $res[0]['telecast_image']; ?>">
                    <input type="hidden" id="old_image_tab" name="old_image_tab"  value="<?= $res[0]['image_tab']; ?>">
                    <input type="hidden" id="old_video_tab" name="old_video_tab"  value="<?= $res[0]['video_tab']; ?>">
                    <input type="hidden" id="old_neti_arti_image" name="old_neti_arti_image"  value="<?= $res[0]['neti_arti_image']; ?>">
                    <input type="hidden" id="old_old_arti_image" name="old_old_arti_image"  value="<?= $res[0]['old_arti_image']; ?>">

                        <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Home Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
                                        <p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Live Telecast Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="telecast_image" id="telecast_image">
                                        <p class="help-block"><img id="blas" src="<?php echo $res[0]['telecast_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Bhakthini Chatudham Image Tab</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"  name="image_tab" id="image_tab">
                                        <p class="help-block"><img id="blad" src="<?php echo $res[0]['image_tab']; ?>" style="max-width:50%;padding:4px;" /></p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Bhakthini Chatudham Video Tab</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="video_tab" id="video_tab">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['video_tab']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                        </div>
                        <br>
                        <h3 class="text-center">Article Images</h3>
                        <br>
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Neti Article Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"  name="neti_arti_image" id="neti_arti_image">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['neti_arti_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Old Article Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="old_arti_image" id="old_arti_image">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['old_arti_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                        </div>
                        </div><!--/.box-body -->
                      
                        <div class="box-footer">
                            <button type="submit" name="btnAdd" class="btn btn-primary">Submit</button>
                            <input type="reset" class="btn-warning btn" name="btnClear" value="Clear" />
                        </div>
                
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#settings_form').validate({

        ignore: [],
        debug: false,
        rules: {
  
         }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });

</script>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
