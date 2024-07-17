<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $mahabharatham_id= $db->escapeString($_POST['mahabharatham_id']);
        $mahabharatham_menu_id= $db->escapeString($_POST['mahabharatham_menu_id']);
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($mahabharatham_id)) {
            $error['mahabharatham_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($mahabharatham_menu_id)) {
            $error['mahabharatham_menu_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($mahabharatham_id)&& !empty($title) && !empty($mahabharatham_menu_id) && !empty($description)) {
         
            $sql_query = "INSERT INTO mahabharatham_submenu (mahabharatham_id,mahabharatham_menu_id,title,description) VALUES ('$mahabharatham_id','$mahabharatham_menu_id','$title','$description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_mahabharatham_submenu'] = "<section class='content-header'>
                                                <span class='label label-success'>Mahabharatham Submenu Added Successfully</span> </section>";
            } else {
                $error['add_mahabharatham_submenu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Mahabharatham Submenu<small><a href='mahabharatham_submenu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Mahabharatham Submenu</a></small></h1>

    <?php echo isset($error['add_mahabharatham_submenu']) ? $error['add_mahabharatham_submenu'] : ''; ?>
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
                <form name="add_mahabharatham_submenu_form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mahabharatham</label> <i class="text-danger asterik">*</i><?php echo isset($error['mahabharatham_id']) ? $error['mahabharatham_id'] : ''; ?>
                                            <select id='mahabharatham_id' name="mahabharatham_id" class='form-control' required>
                                                <option value="">--Select Mahabharatham--</option>
                                              <?php
                                                    $sql = "SELECT id,title FROM `mahabharatham`";
                                                    $db->sql($sql);
                                                    $result = $db->getResult();
                                                    foreach ($result as $value) {
                                                ?>
                                                        <option value='<?= $value['id'] ?>'><?= $value['title'] ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mahabharatham Menu</label> <i class="text-danger asterik">*</i><?php echo isset($error['mahabharatham_menu_id']) ? $error['mahabharatham_menu_id'] : ''; ?>
                                        <select id='mahabharatham_menu_id' name="mahabharatham_menu_id" class='form-control' required>
                                           <option value="">--Select Mahabharatham Menu--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <br>
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title"required>
                                    </div>
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description" required></textarea>
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
    $('#add_mahabharatham_submenu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            description: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
<script>
      $(document).on('change', '#mahabharatham_id', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "mahabharatham_id=" + $('#mahabharatham_id').val() + "&change_mahabharatham=1",
            method: "POST",
            success: function(data) {
                $('#mahabharatham_menu_id').html("<option value=''>---Select Mahabharatham Menu---</option>" + data);
            }
        });
    });
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>