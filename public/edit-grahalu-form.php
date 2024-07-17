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
	

   
   
   if (!empty($name))
    {
		if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
			//image isn't empty and update the image
			$old_image = $db->escapeString($_POST['old_image']);
			$extension = pathinfo($_FILES["image"]["name"])['extension'];
	
			$result = $fn->validate_image($_FILES["image"]);
			$target_path = 'upload/grahalu/';
			
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
			$upload_image = 'upload/grahalu/' . $filename;
			$sql = "UPDATE grahalu SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
			$db->sql($sql);
		}

		$sql = "UPDATE grahalu SET name='$name' WHERE id=$ID";
		$db->sql($sql);
		$update_result = $db->getResult();
		if (!empty($update_result)) {
			$update_result = 0;
		} else {
			$update_result = 1;

		}
			// check update result
			if ($update_result == 1) {
				
			$error['update_grahalu'] = " <section class='content-header'><span class='label label-success'>Grahalu updated Successfully</span></section>";
			} else {
				$error['update_grahalu'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM grahalu WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "grahalu.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Grahalu<small><a href='grahalu.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Grahalu</a></small></h1>
	<small><?php echo isset($error['update_grahalu']) ? $error['update_grahalu'] : ''; ?></small>
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
				</div>
				<div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
				
				<!-- /.box-header -->
				<!-- form start -->
				<form id="edit_grahalu_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
						   <div class="row">
							    <div class="form-group">
									<div class='col-md-12'>
										<label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i>
										<input type="text" class="form-control" name="name" value="<?php echo $res[0]['name']; ?>">
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
                        .width(400)
                        .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php $db->disconnect(); ?>
