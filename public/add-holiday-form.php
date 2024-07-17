<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $year= $db->escapeString($_POST['year']);
        $month= $db->escapeString($_POST['month']);
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);

       if (!empty($month) && !empty($year) && !empty($title) && !empty($description)) {
         
            $sql_query = "INSERT INTO holidays (month,year,title,description)VALUES('$month','$year','$title','$description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_holiday'] = "<section class='content-header'>
                                                <span class='label label-success'>Holiday Added Successfully</span> </section>";
            } else {
                $error['add_holiday'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Holiday<small><a href='holidays.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Holidays</a></small></h1>

    <?php echo isset($error['add_holiday']) ? $error['add_holiday'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_holiday_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
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
                                    <div class='col-md-6'>
                                        <label for="">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year' name="year" class='form-control' required>
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
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <textarea  type="text" rows="1" class="form-control" name="title" required></textarea>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description" required></textarea>
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
    $('#add_holiday_form').validate({

        ignore: [],
        debug: false,
        rules: {
            year: "required",
            month: "required",
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

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>