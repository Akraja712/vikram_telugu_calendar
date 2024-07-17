<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $year= $db->escapeString($_POST['year']);
        $day= $db->escapeString($_POST['day']);
        $rahukalam= $db->escapeString($_POST['rahukalam']);
        $yamangandam= $db->escapeString($_POST['yamangandam']);

        if (empty($year)) {
            $error['year'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($day)) {
            $error['day'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($rahukalam)) {
            $error['rahukalam'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($yamangandam)) {
            $error['yamangandam'] = " <span class='label label-danger'>Required!</span>";
        }
       
       if (!empty($year) && !empty($rahukalam) && !empty($yamangandam) && !empty($day)) {
         
            $sql_query = "INSERT INTO rahukalams (year,day,rahukalam,yamangandam)VALUES('$year','$day','$rahukalam','$yamangandam')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_rahukalam'] = "<section class='content-header'>
                                                <span class='label label-success'>Rahukalam Added Successfully</span> </section>";
            } else {
                $error['add_rahukalam'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Rahukalam <small><a href='rahukalam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Rahukalams</a></small></h1>

    <?php echo isset($error['add_rahukalam']) ? $error['add_rahukalam'] : ''; ?>
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
                <form name="add_rahukalam_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year' name="year" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `years`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['year'] ?>'><?= $value['year'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
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
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1"> Rahukalam</label> <i class="text-danger asterik">*</i><?php echo isset($error['rahukalam']) ? $error['rahukalam'] : ''; ?>
                                       <input type="text" name="rahukalam" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1">Yamangandam</label> <i class="text-danger asterik">*</i>
                                        <input type="text" name="yamangandam" class="form-control" required>
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
    $('#add_rahukalam_form').validate({

        ignore: [],
        debug: false,
        rules: {
            year: "required",
            rahukalam: "required",
            yamangandam:"rahukalam",
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