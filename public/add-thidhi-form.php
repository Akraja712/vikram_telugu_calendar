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

        if (empty($year)) {
            $error['year'] = " <span class='label label-danger'>Required!</span>";
        }

       
       
       if (!empty($year)  && !empty($month)) {
         
            $sql_query = "INSERT INTO thidhi (year,month)VALUES('$year','$month')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                $sql = "SELECT id FROM thidhi ORDER BY id DESC LIMIT 1";
                $db->sql($sql);
                $res = $db->getResult();
                $thidhi_id = $res[0]['id'];
                for ($i = 0; $i < count($_POST['title']); $i++) {

                    $title = $db->escapeString(($_POST['title'][$i]));
                    $description = $db->escapeString(($_POST['description'][$i]));
                    $sql = "INSERT INTO thidhi_variant (thidhi_id,title,description) VALUES('$thidhi_id','$title','$description')";
                    $db->sql($sql);
                    $tab_result = $db->getResult();
                }
                if (!empty($tab_result)) {
                    $tab_result = 0;
                } else {
                    $tab_result = 1;
                }
                
                $error['add_thidhi'] = "<section class='content-header'>
                                                <span class='label label-success'>Thidhi Added Successfully</span> </section>";
            } else {
                $error['add_thidhi'] = " <span class='label label-danger'>Failed</span>";
            }
    }
    }
?>
<section class="content-header">
    <h1>Add Thidhi <small><a href='thidhi.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Thidhi</a></small></h1>

    <?php echo isset($error['add_thidhi']) ? $error['add_thidhi'] : ''; ?>
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
                                    <div class='col-md-5'>
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
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1"> month</label> <i class="text-danger asterik">*</i>
                                        <select id='month' name="month" class='form-control' required>
                                            <option value="">Select</option>
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
                            <div id="packate_div"  >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="title[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="description[]" required></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-1">
                                        <label>Tab</label>
                                        <a class="add_packate_variation" title="Add variation" style="cursor: pointer;color:white;"><button class="btn btn-warning">Add more</button></a>
                                    </div>
                                    <div id="variations">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var max_fields = 8;
        var wrapper = $("#packate_div");
        var add_button = $(".add_packate_variation");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="title">Title</label>' +'<input type="text" class="form-control" name="title[]" /></div></div>' + '<div class="col-md-6"><div class="form-group"><label for="description">Description</label>'+'<textarea type="text" row="2" class="form-control" name="description[]"></textarea></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div>');
            }
            else{
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".remove", function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
            x--;
        })
    });
</script>
<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>