<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        
        $poojalu = $db->escapeString(($_POST['poojalu']));
        $name = $db->escapeString(($_POST['name']));


        // get image info
        $menu_image = $db->escapeString($_FILES['poojalu_image']['name']);
        $image_error = $db->escapeString($_FILES['poojalu_image']['error']);
        $image_type = $db->escapeString($_FILES['poojalu_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["poojalu_image"]["name"]));
        
        if (empty($poojalu)) {
            $error['poojalu'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($name) && !empty($poojalu)) {

            $result = $fn->validate_image($_FILES["poojalu_image"]);
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['poojalu_image']['name']);
            $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

            // upload new image
            $upload = move_uploaded_file($_FILES['poojalu_image']['tmp_name'], 'upload/poojalu_submenu/' . $menu_image);

            // insert new data to menu table
            $upload_image = 'upload/poojalu_submenu/' . $menu_image;

         
            $sql_query = "INSERT INTO poojalu_submenu (poojalu_id,name,image)VALUES('$poojalu','$name','$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_poojalu_submenu'] = "<section class='content-header'>
                                                <span class='label label-success'>Poojalu Added Successfully</span> </section>";
            } else {
                $error['add_poojalu_submenu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Poojalu Submenu<small><a href='poojalu_submenu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Poojalu Submenu</a></small></h1>

    <?php echo isset($error['add_poojalu_submenu']) ? $error['add_poojalu_submenu'] : ''; ?>
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
                <form name="add_poojalu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label for="">Poojalu</label> <i class="text-danger asterik">*</i>
                                        <select id='poojalu' name="poojalu" class='form-control' required>
                                            <option value="">select</option>
                                                <?php
                                                $sql = "SELECT id,name FROM `poojalu`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                            <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="fom-group">
                                    <div class="col-md-6">
                                            <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['poojalu_image']) ? $error['poojalu_image'] : ''; ?>
                                            <input type="file" name="poojalu_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="poojalu_image" required/><br>
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
    $('#add_poojalu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            poojalu:"required",
            name: "required",
            poojalu_image: "required",
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