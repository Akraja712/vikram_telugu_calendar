<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $day= $db->escapeString($_POST['day']);
        $time= $db->escapeString($_POST['time']);
        $description= $db->escapeString($_POST['description']);

     
        if (empty($day)) {
            $error['day'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($time)) {
            $error['time'] = " <span class='label label-danger'>Required!</span>";
        }
       
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($day) && !empty($time) && !empty($description)) {
         
            $sql_query = "INSERT INTO bhargava_panchangam (day,time,description)VALUES('$day','$time','$description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_bhargava_panchangam'] = "<section class='content-header'>
                                                <span class='label label-success'>Bhargava Panchangam Added Successfully</span> </section>";
            } else {
                $error['add_bhargava_panchangam'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Bhargava Panchangam <small><a href='bhargava_panchangam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Bhargava Panchangams</a></small></h1>

    <?php echo isset($error['add_bhargava_panchangam']) ? $error['add_bhargava_panchangam'] : ''; ?>
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
                <form id="add_bhargava_panchangam_form" method="post" enctype="multipart/form-data">
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
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1">Time</label> <i class="text-danger asterik">*</i>
                                        <select id='time' name="time" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `bhargava_timeslots`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['time'] ?>'><?= $value['time'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                   
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                   <div class='col-md-8'>
                                             <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
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
    $('#add_bhargava_panchangam_form').validate({

        ignore: [],
        debug: false,
        rules: {
            day: "required",
            description: "required",
            time: "required",
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