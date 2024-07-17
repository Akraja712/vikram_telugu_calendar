<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $ramayanam_id= $db->escapeString($_POST['ramayanam_id']);
        $ramayanam_menu_id= $db->escapeString($_POST['ramayanam_menu_id']);
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($ramayanam_id)) {
            $error['ramayanam_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($ramayanam_menu_id)) {
            $error['ramayanam_menu_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($ramayanam_id)&& !empty($title) && !empty($ramayanam_menu_id) && !empty($description)) {
         
            $sql_query = "INSERT INTO ramayanam_submenu (ramayanam_id,ramayanam_menu_id,title,description) VALUES ('$ramayanam_id','$ramayanam_menu_id','$title','$description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_ramayanam_submenu'] = "<section class='content-header'>
                                                <span class='label label-success'>Ramayanam Submenu Added Successfully</span> </section>";
            } else {
                $error['add_ramayanam_submenu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Ramayanam Submenu<small><a href='ramayanam_submenu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Ramayanam Submenu</a></small></h1>

    <?php echo isset($error['add_ramayanam_submenu']) ? $error['add_ramayanam_submenu'] : ''; ?>
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
                <form name="add_ramayanam_submenu_form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Ramayanam</label> <i class="text-danger asterik">*</i><?php echo isset($error['ramayanam_id']) ? $error['ramayanam_id'] : ''; ?>
                                            <select id='ramayanam_id' name="ramayanam_id" class='form-control' required>
                                                <option value="">--Select Ramayanam--</option>
                                              <?php
                                                    $sql = "SELECT id,title FROM `ramayanam`";
                                                    $db->sql($sql);
                                                    $result = $db->getResult();
                                                    foreach ($result as $value) {
                                                ?>
                                                        <option value='<?= $value['id'] ?>'><?= $value['title'] ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Ramayanam Menu</label> <i class="text-danger asterik">*</i><?php echo isset($error['ramayanam_menu_id']) ? $error['ramayanam_menu_id'] : ''; ?>
                                        <select id='ramayanam_menu_id' name="ramayanam_menu_id" class='form-control' required>
                                           <option value="">--Select Ramayanam Menu--</option>
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
    $('#add_ramayanam_submenu_form').validate({

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
      $(document).on('change', '#ramayanam_id', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "ramayanam_id=" + $('#ramayanam_id').val() + "&change_ramayanam=1",
            method: "POST",
            success: function(data) {
                $('#ramayanam_menu_id').html("<option value=''>---Select Ramayanam Menu---</option>" + data);
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