<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $title = $db->escapeString(($_POST['title']));
        $lyrics = $db->escapeString(($_POST['lyrics']));


        // get image info
        $menu_image = $db->escapeString($_FILES['god_image']['name']);
        $image_error = $db->escapeString($_FILES['god_image']['error']);
        $image_type = $db->escapeString($_FILES['god_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["god_image"]["name"]));
        $extension2 = end(explode(".", $_FILES["audio"]["name"]));
        
        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($lyrics)) {
            $error['lyrics'] = " <span class='label label-danger'>Required!</span>";
        }

       
       
        if (!empty($title) && !empty($lyrics)) {

            $result = $fn->validate_image($_FILES["god_image"]);
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['god_image']['name']);
            $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

            // upload new image
            $upload = move_uploaded_file($_FILES['god_image']['tmp_name'], 'upload/audio/' . $menu_image);

            // insert new data to menu table
            $upload_image = 'upload/audio/' . $menu_image;


            $type = $_FILES["audio"]["type"];
            $size = $_FILES["audio"]["size"];
            $menu_file = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension2;
            if(move_uploaded_file($_FILES['audio']['tmp_name'], 'upload/mp3/'.$menu_file) ) {
                $upload_file = 'upload/mp3/' . $menu_file;
                $result1=1;
            }
         
         
            $sql_query = "INSERT INTO other_music (title,image,lyrics,audio)VALUES('$title','$upload_image','$lyrics','$upload_file')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_other_music'] = "<section class='content-header'>
                                                <span class='label label-success'>other_music Added Successfully</span> </section>";
            } else {
                $error['add_other_music'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add other music <small><a href='other_music.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to other music</a></small></h1>

    <?php echo isset($error['add_other_music']) ? $error['add_other_music'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_other_music_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" required/>
                                    </div>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="fom-group">
                                    <div class="col-md-6">
                                            <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['god_image']) ? $error['god_image'] : ''; ?>
                                            <input type="file" name="god_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="god_image" required/><br>
                                            <img id="blah" src="#" alt="" />
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputFile">Audio File</label> <i class="text-danger asterik">*</i><?php echo isset($error['audio']) ? $error['audio'] : ''; ?>
                                            <input type="file" name="audio" accept="audio/mp3" id="audio" required/><br>
                                    </div>
                                </div>
                             </div>
                             <br>
                             <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                            <label for="exampleInputEmail1">Audio Lyrics</label> <i class="text-danger asterik">*</i><?php echo isset($error['lyrics']) ? $error['lyrics'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="lyrics" required></textarea>
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

            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_other_music_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            lyrics:"required",
            god_image: "required",
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
                        .width(400)
                        .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>