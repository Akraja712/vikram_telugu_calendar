<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {
    $error = array();
    $title= $db->escapeString($_POST['title']);
    $description= $db->escapeString($_POST['description']);

    if (!empty($title) && !empty($description))
     { 
        if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
			//image isn't empty and update the image
			$old_image = $db->escapeString($_POST['old_image']);
			$extension = pathinfo($_FILES["image"]["name"])['extension'];
	
			$result = $fn->validate_image($_FILES["image"]);
			$target_path = 'upload/pakshamulu/';
			
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
			$upload_image = 'upload/pakshamulu/' . $filename;
			$sql = "UPDATE pakshamulu SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
			$db->sql($sql);
		}
        $sql = "UPDATE pakshamulu SET title='$title',description='$description' WHERE id = '$ID'";
        $db->sql($sql);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_pakshamulu'] = "<section class='content-header'>
                                            <span class='label label-success'>Pakshamulu Updated Successfully</span> </section>";
        } else {
            $error['update_pakshamulu'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `pakshamulu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Pakshamulu <small><a href='pakshamulu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Pakshamulu</a></small></h1>
    <?php echo isset($error['update_pakshamulu']) ? $error['update_pakshamulu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_pakshamulu_form" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                     <input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title" value="<?php echo $res[0]['title']?>"required>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description']?></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
								<div class="fom-group">
									<div class="col-md-6">
									<label for="exampleInputFile">Image</label><i class="text-danger asterik">*</i>
											
											<input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
											<p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="height:100px;max-width:100%" /></p>
									</div>
								</div>
                            </div>   
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                    </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>