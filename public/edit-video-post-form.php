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
	$video_category_id= $db->escapeString($_POST['video_category_id']);
	$name= $db->escapeString($_POST['name']);
     
        
        
	if (empty($video_category_id)) {
		$error['video_category_id'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($name)) {
		$error['name'] = " <span class='label label-danger'>Required!</span>";
	}
	if (!empty($video_category_id)  && !empty($name)) {
		if ($_FILES['video']['size'] != 0 && $_FILES['video']['error'] == 0 && !empty($_FILES['video'])) {
			//image isn't empty and update the image
			$old_video = $db->escapeString($_POST['old_video']);
			$extension = pathinfo($_FILES["video"]["name"])['extension'];
			$target_path = 'upload/videos/';
			
			$filename = microtime(true) . '.' . strtolower($extension);
			$full_path = $target_path . "" . $filename;
			if (!move_uploaded_file($_FILES["video"]["tmp_name"], $full_path)) {
				echo '<p class="alert alert-danger">Can not upload video.</p>';
				return false;
				exit();
			}
			if (!empty($old_video)) {
				unlink($old_video);
			}
			$upload_video = 'upload/videos/' . $filename;
			$sql = "UPDATE video_post SET `video`='" . $upload_video . "' WHERE `id`=" . $ID;
			$db->sql($sql);
		}
		$sql = "UPDATE video_post SET video_category_id='$video_category_id',name='$name' WHERE id=$ID";
		$db->sql($sql);
		$update_result = $db->getResult();
		if (!empty($update_result)) {
			$update_result = 0;
		} else {
			$update_result = 1;

		}
		// check update result
		if ($update_result == 1) {
			
			$error['update_audio'] = " <section class='content-header'><span class='label label-success'>Video updated Successfully</span></section>";
		} else {
			$error['update_audio'] = " <span class='label label-danger'>Failed to update</span>";
		}
	}
} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM video_post WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "images.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
	Edit Video Post<small><a href='video-post.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Video Post</a></small></h1>
	<small><?php echo isset($error['update_audio']) ? $error['update_audio'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-12">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_images_form" method="post" enctype="multipart/form-data">
				<input type="hidden" id="old_video" name="old_video"  value="<?= $res[0]['video']; ?>">
				<div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-8'>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Name</label><i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                        <input type="text" class="form-control" name="name" value="<?php echo $res[0]['name']?>" required>
                                    </div>
									<label for="exampleInputEmail1"> Video Categories</label> <i class="text-danger asterik">*</i><?php echo isset($error['video_category_id']) ? $error['video_category_id'] : ''; ?>
									

                                    <select id='video_category_id' name="video_category_id" class='form-control' required>
                                    <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `video_category`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
												<option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['video_category_id'] ? 'selected="selected"' : '';?>><?= $value['name'] ?></option>
                                    
                                            <?php } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-8'>
                                        <label for="exampleInputEmail1"> Video</label> <i class="text-danger asterik">*</i><?php echo isset($error['video']) ? $error['video'] : ''; ?>
                                        <input type="file" accept="video/*" class="form-control" name="video" id="video">
										<p><?php echo $res[0]['video'] ?></p>
                                    </div>
                                </div>
                            </div>
                    </div>
                       
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
