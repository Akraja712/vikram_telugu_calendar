<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $title1= $db->escapeString($_POST['title1']);
        $title2= $db->escapeString($_POST['title2']);

        if (empty($title1)) {
            $error['title1'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title2)) {
            $error['title2'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($title1) && !empty($title2)) {
         
            $sql_query = "INSERT INTO ankelu (title1,title2)VALUES('$title1','$title2')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_ankelu'] = "<section class='content-header'>
                                                <span class='label label-success'>Ankelu Added Successfully</span> </section>";
            } else {
                $error['add_ankelu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Ankelu<small><a href='ankelu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Ankelu</a></small></h1>

    <?php echo isset($error['add_ankelu']) ? $error['add_ankelu'] : ''; ?>
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
                <form name="add_ankelu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title 1</label> <i class="text-danger asterik">*</i><?php echo isset($error['title1']) ? $error['title1'] : ''; ?>
                                            <input type="text" class="form-control" name="title1" id = "title1" required>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title 2</label> <i class="text-danger asterik">*</i><?php echo isset($error['title2']) ? $error['title2'] : ''; ?>
                                            <input type="text" class="form-control" name="title2" id = "title2" required>
                                    </div>
                                 </div>
                            </div>
                            <br>

         
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
    $('#add_ankelu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title1: "required",
            title2: "required",
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