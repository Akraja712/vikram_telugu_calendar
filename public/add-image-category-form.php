<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $name = $db->escapeString($_POST['name']);
        
        // get image info
        $menu_image = $db->escapeString($_FILES['category_image']['name']);
        $image_error = $db->escapeString($_FILES['category_image']['error']);
        $image_type = $db->escapeString($_FILES['category_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["category_image"]["name"]));
        

        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($status)) {
            $error['status'] = " <span class='label label-danger'>Required!</span>";
        }
       

      

        if (!empty($name)) {
            $result = $fn->validate_image($_FILES["category_image"]);
                // create random image file name
                $string = '0123456789';
                $file = preg_replace("/\s+/", "_", $_FILES['category_image']['name']);
                $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
        
                // upload new image
                $upload = move_uploaded_file($_FILES['category_image']['tmp_name'], 'upload/images/' . $menu_image);
        
                // insert new data to menu table
                $upload_image = 'upload/images/' . $menu_image;

            
           
            $sql_query = "INSERT INTO image_category (name,image,status)VALUES('$name','$upload_image',0)";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                $error['add_category'] = " <section class='content-header'><span class='label label-success'>Image Added Successfully</span></section>";
            } else {
                $error['add_category'] = " <span class='label label-danger'>Failed add category</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Image Category<small><a href='image-category.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Category</a></small></h1>

    <?php echo isset($error['add_category']) ? $error['add_category'] : ''; ?>
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

                </div><!-- /.box-header -->
                <!-- form start -->
                <form name="add_category" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Name</label><i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label><i class="text-danger asterik">*</i><?php echo isset($error['category_image']) ? $error['category_image'] : ''; ?>
                            <input type="file" name="category_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="category_image" required/>
                        </div>
                        <div class="form-group">
                            <img id="blah" src="#" alt="" />

                        </div>
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset"  onClick="refreshPage()" class="btn-warning btn" value="Clear" />
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
<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>
<?php $db->disconnect(); ?>