<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        // $year= $db->escapeString($_POST['year']);
        $day= $db->escapeString($_POST['day']);
        $time= $db->escapeString($_POST['time']);
        $morning= $db->escapeString($_POST['morning']);
        $night= $db->escapeString($_POST['night']);
        // $description= $db->escapeString($_POST['description']);

        // if (empty($year)) {
        //     $error['year'] = " <span class='label label-danger'>Required!</span>";
        // }
        if (empty($day)) {
            $error['day'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($time)) {
            $error['time'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($morning)) {
            $error['morning'] = " <span class='label label-danger'>Required!</span>";
        } 
        if (empty($night)) {
            $error['night'] = " <span class='label label-danger'>Required!</span>";
        }
        // if (empty($description)) {
        //     $error['description'] = " <span class='label label-danger'>Required!</span>";
        // }
       
       
       if (!empty($day) && !empty($time) && !empty($morning)) {
         
            $sql_query = "INSERT INTO gowri (day,time,morning,night)VALUES('$day','$time','$morning','$night')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_gowri'] = "<section class='content-header'>
                                                <span class='label label-success'>Gowri Added Successfully</span> </section>";
            } else {
                $error['add_gowri'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Gowri <small><a href='gowri.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Gowri</a></small></h1>

    <?php echo isset($error['add_gowri']) ? $error['add_gowri'] : ''; ?>
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
                                <div class="form-group">
                                    <!-- <div class='col-md-5'>
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
                                    </div> -->
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
                                    <!-- <div class='col-md-4'>
                                             <label for="exampleInputEmail1">Day</label> <i class="text-danger asterik">*</i><?php echo isset($error['day']) ? $error['day'] : ''; ?>
                                            <input type="date" class="form-control" name="day" required>
                                    </div> -->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1">Time</label> <i class="text-danger asterik">*</i>
                                        <select id='time' name="time" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `gowri_timeslots`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['time'] ?>'><?= $value['time'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
                                             <label for="exampleInputEmail1">Morning</label> <i class="text-danger asterik">*</i><?php echo isset($error['morning']) ? $error['morning'] : ''; ?>
                                            <input type="text" class="form-control" name="morning" required>
                                    </div>
                                    <div class='col-md-4'>
                                             <label for="exampleInputEmail1">Night</label> <i class="text-danger asterik">*</i><?php echo isset($error['night']) ? $error['night'] : ''; ?>
                                            <input type="text" class="form-control" name="night" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <br>
                            <div class="row">
                                <div class="form-group">
                                   <div class='col-md-8'>
                                             <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br> -->

         
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
            day: "required",
            morning: "required",
            night: "required",
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