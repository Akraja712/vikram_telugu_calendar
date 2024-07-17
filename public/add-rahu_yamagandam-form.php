<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $day= $db->escapeString($_POST['day']);
        $rahu= $db->escapeString($_POST['rahu']);
        $yamagandam= $db->escapeString($_POST['yamagandam']);
        $error = array();

       
        if (empty($day)) {
            $error['day'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($rahu)) {
            $error['rahu'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($yamagandam)) {
            $error['yamagandam'] = " <span class='label label-danger'>Required!</span>";
        }

       
       if (!empty($yamagandam) && !empty($day) && !empty($rahu)) {
         
            $sql_query = "INSERT INTO `rahu_yamagandam` (yamagandam,day,rahu)VALUES('$yamagandam','$day','$rahu')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_rahu_yamagandam'] = "<section class='content-header'>
                                                <span class='label label-success'>Rahu Yamagandam Added Successfully</span> </section>";
            } else {
                $error['add_rahu_yamagandam'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Rahu Yamagandam <small><a href='rahu_yamagandam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Rahu Yamagandams</a></small></h1>

    <?php echo isset($error['add_rahu_yamagandam']) ? $error['add_rahu_yamagandam'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr/>
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
                <form name="add_rahu_yamagandam_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1"> Day</label> <i class="text-danger asterik">*</i>
                                        <select id='day' name="day" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `days`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['day'] ?>'><?= $value['day'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                            <label for="exampleInputEmail1">Rahu</label> <i class="text-danger asterik">*</i><?php echo isset($error['rahu']) ? $error['rahu'] : ''; ?>
                                            <input type="text" class="form-control" name="rahu" required>
                                    </div>
                                    <div class='col-md-6'>
                                             <label for="exampleInputEmail1">Yamagandam</label> <i class="text-danger asterik">*</i><?php echo isset($error['yamagandam']) ? $error['yamagandam'] : ''; ?>
                                            <input type="text" class="form-control" name="yamagandam" required>
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
    $('#add_rahu_yamagandam_form').validate({

        ignore: [],
        debug: false,
        rules: {
            day: "required",
            rahu: "required",
            yamagandam: "required",
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