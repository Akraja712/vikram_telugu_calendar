<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $date = $db->escapeString(($_POST['date']));
        $festival= $db->escapeString($_POST['festival']);
       
        
        if (empty($date)) {
            $error['date'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($festival)) {
            $error['festival'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($date) && !empty($festival)) {
         
            $sql_query = "INSERT INTO festivals (date,festival)VALUES('$date','$festival')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_festival'] = "<section class='content-header'>
                                                <span class='label label-success'>Festival Added Successfully</span> </section>";
            } else {
                $error['add_festival'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Festival <small><a href='festivals.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Festivals</a></small></h1>

    <?php echo isset($error['add_festival']) ? $error['add_festival'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_festival_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                            <label for="exampleInputEmail1">Date</label> <i class="text-danger asterik">*</i><?php echo isset($error['date']) ? $error['date'] : ''; ?>
                                            <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                            <label for="exampleInputEmail1">Festival</label> <i class="text-danger asterik">*</i><?php echo isset($error['festival']) ? $error['festival'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="festival" required></textarea>
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
    $('#add_festival_form').validate({

        ignore: [],
        debug: false,
        rules: {
            date: "required",
            festival: "required",
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