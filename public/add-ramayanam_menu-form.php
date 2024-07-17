<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $ramayanam= $db->escapeString($_POST['ramayanam']);
        $title= $db->escapeString($_POST['title']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($ramayanam)) {
            $error['ramayanam'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($ramayanam) && !empty($title)) {
         
            $sql_query = "INSERT INTO ramayanam_menu (ramayanam_id,title) VALUES ('$ramayanam','$title')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_ramayanam_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Ramayanam Menu Added Successfully</span> </section>";
            } else {
                $error['add_ramayanam_menu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Ramayanam Menu<small><a href='ramayanam_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Ramayanam Menu</a></small></h1>

    <?php echo isset($error['add_ramayanam_menu']) ? $error['add_ramayanam_menu'] : ''; ?>
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
                <form name="add_ramayanam_menu_form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Ramayanam</label> <i class="text-danger asterik">*</i><?php echo isset($error['ramayanam']) ? $error['ramayanam'] : ''; ?>
                                        <select id='ramayanam' name="ramayanam" class='form-control' required>
                                            <option value="">-- Select --</option>
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
                                </div>
                            </div>
                             <br>
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-10">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title"required>
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
    $('#add_ramayanam_menu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            ramayanam: "required",
            title: "required",
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