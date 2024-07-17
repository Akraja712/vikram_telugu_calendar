<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
?>
<?php

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}
if (isset($_POST['btnEdit'])) {

		$name = $db->escapeString(($_POST['name']));
		$error = array();

		if (empty($name)) {
			$error['name'] = " <span class='label label-danger'>Required!</span>";
		}
		if (empty($status)) {
			$error['status'] = " <span class='label label-danger'>Required!</span>";
		}

		

		if (!empty($name)) {
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
				$sql = "UPDATE image_category SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
				$db->sql($sql);
			}
			
             $sql_query = "UPDATE image_category SET name='$name' WHERE id =  $ID";
			 $db->sql($sql_query);
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1) {
				$error['update_category'] = " <section class='content-header'><span class='label label-success'>Image Category updated Successfully</span></section>";
			} else {
				$error['update_category'] = " <span class='label label-danger'>Failed update category</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM image_category WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "image-category.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Image Category<small><a href='image-category.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Image Category</a></small></h1>
	<small><?php echo isset($error['update_category']) ? $error['update_category'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-6">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_category_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
						<div class="form-group">
							<label for="exampleInputEmail1">Image Category Name</label><?php echo isset($error['name']) ? $error['name'] : ''; ?><i class="text-danger asterik">*</i>
							<input type="text" class="form-control" name="name" value="<?php echo $res[0]['name']; ?>">
						</div>
					        <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label><i class="text-danger asterik">*</i>
                                        
                                        <input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
                                        <p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="max-width:100%" /></p>
                                    </div>
                                </div>
                            </div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
					
					</div>
				</form>
			</div><!-- /.box -->
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
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php $db->disconnect(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
