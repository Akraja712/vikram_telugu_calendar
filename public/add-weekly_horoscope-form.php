<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $rasi= $db->escapeString($_POST['rasi']);
        $year= $db->escapeString($_POST['year']);
        $month= $db->escapeString($_POST['month']);
        $description= $db->escapeString($_POST['description']);
        $week= $db->escapeString($_POST['week']);
        $title= $db->escapeString($_POST['title']);
        $title_description= $db->escapeString($_POST['title_description']);
        
     
        if (empty($rasi)) {
            $error['rasi'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($year)) {
            $error['year'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($month)) {
            $error['month'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($week)) {
            $error['week'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title_description)) {
            $error['title_description'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if ( !empty($rasi) && !empty($description)  && !empty($title)&& !empty($year) && !empty($month) && !empty($week)&& !empty($title_description))
        {
            $sql_query = "INSERT INTO weekly_horoscope (rasi,description,year,month,week,title,title_description)VALUES('$rasi','$description','$year','$month','$week','$title','$title_description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }
            if ($result == 1) {
                $error['add_weekly_horoscope'] = "<section class='content-header'>
                                                <span class='label label-success'>Weekly Horoscope Added Successfully</span> </section>";
            } else {
                $error['add_weekly_horoscope'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Weekly Horoscope <small><a href='weekly.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Weekly Horoscope</a></small></h1>

    <?php echo isset($error['add_weekly_horoscope']) ? $error['add_weekly_horoscope'] : ''; ?>
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
                <form name="add_weekly_horoscope_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                        <label for="">Rasi</label> <i class="text-danger asterik">*</i>
                                        <select id='rasi' name="rasi" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `rasi_names`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['rasi'] ?>'><?= $value['rasi'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                        <label for="">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year'  name="year" class='form-control' required>
                                            <option value="">Select Year</option>
                                                <?php
                                                $sql = "SELECT * FROM `year_count`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['year'] ?>'><?= $value['year'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class='col-md-6'>
                                        <label for="">Month</label> <i class="text-danger asterik">*</i>
                                        <select id='month' name="month" class='form-control' required>
                                            <option value="">Select Month</option>
                                                <?php
                                                $sql = "SELECT * FROM `months`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['month'] ?>'><?= $value['month'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                        <label for="">Week</label> <i class="text-danger asterik">*</i>
                                        <select id='week' name="week" class='form-control' required>
                                            <option value="">Select</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Title Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['title_description']) ? $error['title_description'] : ''; ?>
                                            <input type="text" class="form-control" name="title_description" required></textarea>
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
    $('#add_weekly_horoscope_form').validate({

        ignore: [],
        debug: false,
        rules: {
            year: "required",
            rasi: "required",
            description: "required",
            month: "required",
            title: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
<script>
    $(document).on('change', '#year', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "year=" + $('#year').val() + "&month=" + $('#month').val() + "&week=1",
            method: "POST",
            success: function(data) {
                $('#week').html("<option value=''>Select</option>" + data);
            }
        });
    });
    $(document).on('change', '#month', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "year=" + $('#year').val() + "&month=" + $('#month').val() + "&week=1",
            method: "POST",
            success: function(data) {
                $('#week').html("<option value=''>Select</option>" + data);
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