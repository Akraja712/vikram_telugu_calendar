<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

      
        $description= $db->escapeString($_POST['description']);

        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($description)) {
         
            $sql_query = "INSERT INTO yogam (description)VALUES('$description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_yogam'] = "<section class='content-header'>
                                                <span class='label label-success'>Yogam Added Successfully</span> </section>";
            } else {
                $error['add_yogam'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Yogam <small><a href='yogam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Yogam</a></small></h1>

    <?php echo isset($error['add_yogam']) ? $error['add_yogam'] : ''; ?>
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
                <form name="add_gowri_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class='col-md-8'>
                                    <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                    <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
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
    $('#add_gowri_form').validate({

        ignore: [],
        debug: false,
        rules: {
            year: "required",
            description: "required",
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