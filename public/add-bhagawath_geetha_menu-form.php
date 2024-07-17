<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $bhagawath_geetha= $db->escapeString($_POST['bhagawath_geetha']);
        $title= $db->escapeString($_POST['title']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($bhagawath_geetha)) {
            $error['bhagawath_geetha'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($bhagawath_geetha) && !empty($title)) {
         
            $sql_query = "INSERT INTO bhagawath_geetha_menu (bhagawath_geetha_id,title) VALUES ('$bhagawath_geetha','$title')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_bhagawath_geetha_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Bhagawath Geetha Menu Added Successfully</span> </section>";
            } else {
                $error['add_bhagawath_geetha_menu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Bhagawath Geetha Menu<small><a href='bhagawath_geetha_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Bhagawath Geetha Menu</a></small></h1>

    <?php echo isset($error['add_bhagawath_geetha_menu']) ? $error['add_bhagawath_geetha_menu'] : ''; ?>
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
                <form name="add_bhagawath_geetha_menu_form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Bhagawath Geetha</label> <i class="text-danger asterik">*</i><?php echo isset($error['bhagawath_geetha']) ? $error['bhagawath_geetha'] : ''; ?>
                                        <select id='bhagawath_geetha' name="bhagawath_geetha" class='form-control' required>
                                            <option value="">-- Select --</option>
                                                    <?php
                                                    $sql = "SELECT id,title FROM `bhagawath_geetha`";
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
    $('#add_bhagawath_geetha_menu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            bhagawath_geetha: "required",
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