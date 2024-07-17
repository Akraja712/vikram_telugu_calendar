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
    $title = $db->escapeString($fn->xss_clean($_POST['title']));
    $link = $db->escapeString($fn->xss_clean($_POST['link']));

    $sql = "UPDATE video SET title='$title',link='$link' WHERE id = '$ID'";
    $db->sql($sql);
    $categories_result = $db->getResult();
    if (!empty($categories_result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Video Updated Successfully</span>";
    }
    if (isset($_FILES['image']['size']) && $_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
        // The "image" file is not empty, and there is no error in the file upload
        if (isset($_POST['old_image'])) {
            $old_image = $db->escapeString($_POST['old_image']);
        } else {
            $old_image = '';
        }
    
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
    
        if (!empty($old_image) && file_exists($old_image)) {
            unlink($old_image);
        }
    
        $upload_image = 'upload/images/' . $filename;
        $sql = "UPDATE video SET `image`='$upload_image' WHERE `id`='$ID'";
        $db->sql($sql);
    
        $update_result = $db->getResult();
        if (!empty($update_result)) {
            $update_result = 0;
        } else {
            $update_result = 1;
        }
    
        if ($update_result == 1) {
            $error['update_menu'] = " <section class='content-header'><span class='label label-success'>video updated Successfully</span></section>";
        } else {
            $error['update_menu'] = " <span class='label label-danger'>Failed to update</span>";
        }
    }
}    

$data = array();

$sql_query = "SELECT * FROM `video` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();
foreach ($res as $row)
$data = $row;

?>
<section class="content-header">
<h1>Edit video <small><a href='video.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to video</a></small></h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_video_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-8'>
                                    <label for="exampleInputEmail1"> Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                    <input type="text" class="form-control" name="title" value="<?php echo $data['title']?>" required>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-8'>
                                    <label for="exampleInputEmail1"> Link</label> <i class="text-danger asterik">*</i><?php echo isset($error['link']) ? $error['link'] : ''; ?>
                                    <input type="text" class="form-control" name="link" value="<?php echo $data['link']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                                <div class="col-md-8">
                                    <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['image']) ? $error['image'] : ''; ?>
                                    <input type="file" name="image" onchange="readURL(this);" accept="image/png, image/jpeg" id="image" /><br>
                                    <img id="blah" src="<?php echo $res[0]['image']; ?>" alt="" width="150" height="200" <?php echo empty($res[0]['image']) ? 'style="display: none;"' : ''; ?> />
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                        <!-- <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" /> -->
                        <!--<div  id="res"></div>-->
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
                    .width(150)
                    .height(200)
                    .css('display', 'block');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>