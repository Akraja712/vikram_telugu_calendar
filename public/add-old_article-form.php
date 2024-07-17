<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $title = $db->escapeString(($_POST['title']));
        $description = $db->escapeString(($_POST['description']));


        // get image info
        $menu_image = $db->escapeString($_FILES['article_image']['name']);
        $image_error = $db->escapeString($_FILES['article_image']['error']);
        $image_type = $db->escapeString($_FILES['article_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["article_image"]["name"]));
        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($title) && !empty($description)) {

            $result = $fn->validate_image($_FILES["article_image"]);
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['article_image']['name']);
            $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

            // upload new image
            $upload = move_uploaded_file($_FILES['article_image']['tmp_name'], 'upload/articles/' . $menu_image);

            // insert new data to menu table
            $upload_image = 'upload/articles/' . $menu_image;

         
            $sql_query = "INSERT INTO old_articles (title,description,image)VALUES('$title','$description','$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_old_article'] = "<section class='content-header'>
                                                <span class='label label-success'>Festivals Info Added Successfully</span> </section>";
            } else {
                $error['add_old_article'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Festivals Info <small><a href='old_articles.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Old Articles</a></small></h1>

    <?php echo isset($error['add_old_article']) ? $error['add_old_article'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_old_article_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" required>
                                     </div>
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
                                     </div>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="fom-group">
                                    <div class="col-md-5">
                                            <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['article_image']) ? $error['article_image'] : ''; ?>
                                            <input type="file" name="article_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="article_image" required/><br>
                                            <img id="blah" src="#" alt="" />
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
    $('#add_old_article_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            article_image: "required",
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