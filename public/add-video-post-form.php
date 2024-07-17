<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $video_category_id= $db->escapeString($_POST['video_category_id']);
        $name= $db->escapeString($_POST['name']);
     
        if (empty($video_category_id)) {
            $error['video_category_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
       if (!empty($video_category_id) && !empty($name)) {
            // insert new data to menu table
            $video_category_id= $db->escapeString($_POST['video_category_id']);
            $type = $_FILES["video"]["type"];
            $size = $_FILES["video"]["size"];
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["video"]["name"]));
            $menu_file = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
            if(move_uploaded_file($_FILES['video']['tmp_name'], 'upload/videos/'.$menu_file) ) {
                $upload_file = 'upload/videos/' . $menu_file;
            
            }
            $sql_query = "INSERT INTO video_post (name,video_category_id,video)VALUES('$name','$video_category_id','$upload_file')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_video'] = "<section class='content-header'>
                                                <span class='label label-success'>Video Added Successfully</span> </section>";
            } else {
                $error['add_video'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Video Post <small><a href='video-post.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Video Post</a></small></h1>

    <?php echo isset($error['add_video']) ? $error['add_video'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_video_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class='col-md-8'>
                                        <label for="exampleInputEmail1"> Name</label><i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class='col-md-8'>
                                        <label for="exampleInputEmail1"> Video Categories</label> <i class="text-danger asterik">*</i><?php echo isset($error['video_category_id']) ? $error['video_category_id'] : ''; ?>

                                        <select id='video_category_id' name="video_category_id" class='form-control' required>
                                        <option value="">Select</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `video_category`";
                                                    $db->sql($sql);
                                                    $result = $db->getResult();
                                                    foreach ($result as $value) {
                                                    ?>
                                                        <option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-8'>
                                        <label for="exampleInputEmail1"> Video</label> <i class="text-danger asterik">*</i><?php echo isset($error['video']) ? $error['video'] : ''; ?>
                                        <input type="file" accept="video/*" class="form-control" name="video" id="video" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
                    </div>

                </form>

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_video_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            link: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>