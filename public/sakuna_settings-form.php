<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$res = $db->getResult();

$sql_query = "SELECT * FROM sakuna_settings WHERE id = 1";
$db->sql($sql_query);
$res= $db->getResult();

if (isset($_POST['btnAdd'])) {       



          //Sakunalu image
          if ($_FILES['sakunalu_image']['size'] != 0 && $_FILES['sakunalu_image']['error'] == 0 && !empty($_FILES['sakunalu_image']))
          {
              $old_sakunalu_image = $db->escapeString($_POST['old_sakunalu_image']);
              $extension = pathinfo($_FILES["sakunalu_image"]["name"])['extension'];              

              $result = $fn->validate_image($_FILES["sakunalu_image"]);
              $target_path = 'upload/images/';
              
              $filename = microtime(true) . '.' . strtolower($extension);
              $full_path = $target_path . "" . $filename;
              if (!move_uploaded_file($_FILES["sakunalu_image"]["tmp_name"], $full_path)) {
                  echo '<p class="alert alert-danger">Can not upload image.</p>';
                  return false;
                  exit();
              }
              if (!empty($old_sakunalu_image)) {
                  unlink( $old_sakunalu_image);
              }
              $upload_sakunalu_image= 'upload/images/' . $filename;
              $sql = "UPDATE sakuna_settings SET sakunalu_image='$upload_sakunalu_image' WHERE id = 1";
              $db->sql($sql);
          }

          //Balli image
            if ($_FILES['balli_image']['size'] != 0 && $_FILES['balli_image']['error'] == 0 && !empty($_FILES['balli_image']))
            {
                $old_balli_image = $db->escapeString($_POST['old_balli_image']);
                $extension = pathinfo($_FILES["balli_image"]["name"])['extension'];              

                $result = $fn->validate_image($_FILES["balli_image"]);
                $target_path = 'upload/images/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["balli_image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_balli_image)) {
                    unlink( $old_balli_image);
                }
                $upload_balli_image= 'upload/images/' . $filename;
                $sql = "UPDATE sakuna_settings SET balli_image='$upload_balli_image' WHERE id = 1";
                $db->sql($sql);
            }

              //Kaki image
            if ($_FILES['kaki_image']['size'] != 0 && $_FILES['kaki_image']['error'] == 0 && !empty($_FILES['kaki_image']))
            {
                $old_kaki_image = $db->escapeString($_POST['old_kaki_image']);
                $extension = pathinfo($_FILES["kaki_image"]["name"])['extension'];              

                $result = $fn->validate_image($_FILES["kaki_image"]);
                $target_path = 'upload/images/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["kaki_image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_kaki_image)) {
                    unlink( $old_kaki_image);
                }
                $upload_kaki_image= 'upload/images/' . $filename;
                $sql = "UPDATE sakuna_settings SET kaki_image='$upload_kaki_image' WHERE id = 1";
                $db->sql($sql);
            }

              //Kukuta image
            if ($_FILES['kukuta_image']['size'] != 0 && $_FILES['kukuta_image']['error'] == 0 && !empty($_FILES['kukuta_image']))
            {
                $old_kukuta_image= $db->escapeString($_POST['old_kukuta_image']);
                $extension = pathinfo($_FILES["kukuta_image"]["name"])['extension'];              

                $result = $fn->validate_image($_FILES["kukuta_image"]);
                $target_path = 'upload/images/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["kukuta_image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_kukuta_image)) {
                    unlink( $old_kukuta_image);
                }
                $upload_kukuta_image= 'upload/images/' . $filename;
                $sql = "UPDATE sakuna_settings SET kukuta_image='$upload_kukuta_image' WHERE id = 1";
                $db->sql($sql);
            }
            
              //Sasthram  image
            if ($_FILES['sasthram_image']['size'] != 0 && $_FILES['sasthram_image']['error'] == 0 && !empty($_FILES['sasthram_image']))
            {
                $old_sasthram_image = $db->escapeString($_POST['old_sasthram_image']);
                $extension = pathinfo($_FILES["sasthram_image"]["name"])['extension'];              

                $result = $fn->validate_image($_FILES["sasthram_image"]);
                $target_path = 'upload/images/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["sasthram_image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_sasthram_image)) {
                    unlink( $old_sasthram_image);
                }
                $upload_sasthram_image= 'upload/images/' . $filename;
                $sql = "UPDATE sakuna_settings SET sasthram_image='$upload_sasthram_image' WHERE id = 1";
                $db->sql($sql);
            }

            //pilli image
            if ($_FILES['pilli_image']['size'] != 0 && $_FILES['pilli_image']['error'] == 0 && !empty($_FILES['pilli_image']))
            {
                $old_pilli_image = $db->escapeString($_POST['old_pilli_image']);
                $extension = pathinfo($_FILES["pilli_image"]["name"])['extension'];              
  
                $result = $fn->validate_image($_FILES["pilli_image"]);
                $target_path = 'upload/images/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["pilli_image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_pilli_image)) {
                    unlink( $old_pilli_image);
                }
                $upload_pilli_image = 'upload/images/' . $filename;
                $sql = "UPDATE sakuna_settings SET pilli_image='$upload_pilli_image' WHERE id = 1";
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
                    <input type="hidden" id="old_sakunalu_image" name="old_sakunalu_image"  value="<?= $res[0]['sakunalu_image']; ?>">
                    <input type="hidden" id="old_balli_image" name="old_balli_image"  value="<?= $res[0]['balli_image']; ?>">
                    <input type="hidden" id="old_kaki_image" name="old_kaki_image"  value="<?= $res[0]['kaki_image']; ?>">
                    <input type="hidden" id="old_kukuta_image" name="old_kukuta_image"  value="<?= $res[0]['kukuta_image']; ?>">
                    <input type="hidden" id="old_pilli_image" name="old_pilli_image"  value="<?= $res[0]['pilli_image']; ?>">

                        <h3 class="text-center">Sakuna Sasthram Banners:</h3>
                        <br>
                        <div class="row">    
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Sakunalu Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="sakunalu_image" id="sakunalu_image">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['sakunalu_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Balli Sasthram Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="balli_image" id="balli_image">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['balli_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Kaki Sasthram Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"  name="kaki_image" id="kaki_image">
                                        <p class="help-block"><img id="blad" src="<?php echo $res[0]['kaki_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                                 <div class="form-group col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputFile">Kukuta Sasthram Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"   name="kukuta_image" id="kukuta_image">
                                        <p class="help-block"><img id="blan" src="<?php echo $res[0]['kukuta_image']; ?>" style="max-width:50%;padding:4px;" /></p>
                                
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Pilli Sasthram Banner Image</label>
                                        <input class="form-control" type="file" accept="image/png,  image/jpeg"  name="pilli_image" id="pilli_image">
                                        <p class="help-block"><img id="blad" src="<?php echo $res[0]['pilli_image']; ?>" style="max-width:50%;padding:4px;" /></p>
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
