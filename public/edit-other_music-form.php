<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

// Check if the ID is provided in the URL parameters
if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // If ID is not provided, return false and exit the script
    return false;
    exit(0);
}

$error = array();

if (isset($_POST['btnEdit'])) {
    // Get and escape form input values
    $title = $db->escapeString($_POST['title']);
    $lyrics = $db->escapeString($_POST['lyrics']);

    // Validate required fields
    if (empty($title)) {
        $error['title'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($lyrics)) {
        $error['lyrics'] = " <span class='label label-danger'>Required!</span>";
    }

    // Check if required fields are not empty
    if (!empty($title) && !empty($lyrics)) {
        // Handle image upload and update
        if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
            // Image isn't empty, update the image
            $old_image = $db->escapeString($_POST['old_image']);
            $extension = pathinfo($_FILES["image"]["name"])['extension'];
    
            $result = $fn->validate_image($_FILES["image"]);
            $target_path = 'upload/audio/';
            
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
            $upload_image = 'upload/audio/' . $filename;
            $sql = "UPDATE other_music SET `image`='$upload_image' WHERE `id`=$ID";
            $db->sql($sql);
        }

        // Handle audio file upload and update
        if ($_FILES['audio']['size'] != 0 && $_FILES['audio']['error'] == 0 && !empty($_FILES['audio'])) {
            // Audio file isn't empty, update the audio file
            $old_audio = $db->escapeString($_POST['old_audio']);
            $extension = pathinfo($_FILES["audio"]["name"])['extension'];
            $target_path = 'upload/mp3/';
            
            $filename = microtime(true) . '.' . strtolower($extension);
            $full_path = $target_path . "" . $filename;
            if (!move_uploaded_file($_FILES["audio"]["tmp_name"], $full_path)) {
                echo '<p class="alert alert-danger">Can not upload audio.</p>';
                return false;
                exit();
            }
            if (!empty($old_audio)) {
                unlink($old_audio);
            }
            $upload_audio = 'upload/mp3/' . $filename;
            $sql = "UPDATE other_music SET `audio`='$upload_audio' WHERE `id`=$ID";
            $db->sql($sql);
        }

        // Update title and lyrics in the database
        $sql = "UPDATE other_music SET title='$title', lyrics='$lyrics' WHERE id=$ID";
        $db->sql($sql);
        $update_result = $db->getResult();
        if (!empty($update_result)) {
            $update_result = 0;
        } else {
            $update_result = 1;
        }

        // Check update result and display appropriate message
        if ($update_result == 1) {
            $error['update_other_music'] = " <section class='content-header'><span class='label label-success'>Other music updated Successfully</span></section>";
        } else {
            $error['update_other_music'] = " <span class='label label-danger'>Failed to update</span>";
        }
    }
}

// Get previous data from the database
$data = array();
$sql_query = "SELECT * FROM other_music WHERE id = $ID";
$db->sql($sql_query);
$res = $db->getResult();
?>

<!-- The HTML and Form for displaying and editing the other music entry -->

<section class="content-header">
    <h1>Edit other music<small><a href='other_music.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to other music</a></small></h1>
    <small><?php echo isset($error['update_other_music']) ? $error['update_other_music'] : ''; ?></small>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
</section>
<section class="content">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_other_music_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" id="old_image" name="old_image" value="<?= $res[0]['image']; ?>">
                        <input type="hidden" id="old_audio" name="old_audio" value="<?= $res[0]['audio']; ?>">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
                                    <input type="text" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>">
                                    <!-- Display error message if title is empty -->
                                    <?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="fom-group">
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Image</label><i class="text-danger asterik">*</i>
                                    <input type="file" accept="image/png, image/jpeg" onchange="readURL(this);" name="image" id="image">
                                    <p class="help-block">
                                        <img id="blah" src="<?php echo $res[0]['image']; ?>" style="height:100px;max-width:100%" />
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Audio File</label><i class="text-danger asterik">*</i>
                                    <input type="file" accept="audio/mp3, audio/wcc" name="audio" id="audio">
                                    <p><?php echo $res[0]['audio']; ?></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class='col-md-12'>
                                <label for="exampleInputEmail1">Lyrics</label> <i class="text-danger asterik">*</i>
                                <textarea type="text" rows="3" class="form-control" name="lyrics"><?php echo $res[0]['lyrics']; ?></textarea>
                                <!-- Display error message if lyrics are empty -->
                                <?php echo isset($error['lyrics']) ? $error['lyrics'] : ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
                        <!-- Add a cancel button -->
                        <button type="button" class="btn btn-default" name="btnCancel" onclick="window.location.href='other_music.php'">Cancel</button>
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
                $('#blah').attr('src', e.target.result).width(400).height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $db->disconnect(); ?>
