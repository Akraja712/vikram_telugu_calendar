<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $mahabharatham= $db->escapeString($_POST['mahabharatham']);
        $title= $db->escapeString($_POST['title']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($mahabharatham)) {
            $error['mahabharatham'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($mahabharatham) && !empty($title)) {
         
            $sql_query = "INSERT INTO mahabharatham_menu (mahabharatham_id,title) VALUES ('$mahabharatham','$title')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_mahabharatham_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Mahabharatham Menu Added Successfully</span> </section>";
            } else {
                $error['add_mahabharatham_menu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Mahabharatham Menu<small><a href='mahabharatham_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Mahabharatham Menu</a></small></h1>

    <?php echo isset($error['add_mahabharatham_menu']) ? $error['add_mahabharatham_menu'] : ''; ?>
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
                <form name="add_mahabharatham_menu_form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mahabharatham</label> <i class="text-danger asterik">*</i><?php echo isset($error['mahabharatham']) ? $error['mahabharatham'] : ''; ?>
                                        <select id='mahabharatham' name="mahabharatham" class='form-control' required>
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
    $('#add_mahabharatham_menu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            mahabharatham: "required",
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