<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $month= $db->escapeString($_POST['month']);
        $year= $db->escapeString($_POST['year']);
        $text1 = $db->escapeString($_POST['text1']);
        $error = array();

        
     
        if (empty($month)) {
            $error['month'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($year)) {
            $error['year'] = " <span class='label label-danger'>Required!</span>";
        }
        // if (empty($title)) {
        //     $error['title'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($description)) {
        //     $error['description'] = " <span class='label label-danger'>Required!</span>";
        // }
        if (empty($text1)) {
            $error['text1'] = " <span class='label label-danger'>Required!</span>";
        }
       


        if ( !empty($month)  && !empty($text1) && !empty($year))
        {
                $sql_query = "INSERT INTO child_birth (month,text1,year)VALUES('$month','$text1','$year')";
                $db->sql($sql_query);
                $result = $db->getResult();
                if (!empty($result)) {
                    $result = 0;
                } else {
                    $result = 1;
                }
                if ($result == 1) {
                    $sql = "SELECT id FROM child_birth ORDER BY id DESC LIMIT 1";
                    $db->sql($sql);
                    $res = $db->getResult();
                    $child_birth_id = $res[0]['id'];
                    for ($i = 0; $i < count($_POST['date_month']); $i++) {
                        
                        $date_month = $db->escapeString(($_POST['date_month'][$i]));
                        $sub_title = $db->escapeString(($_POST['sub_title'][$i]));
                        $sub_description = $db->escapeString(($_POST['sub_description'][$i]));
                        $sql = "INSERT INTO child_birth_variant (child_birth_id,date_month,sub_title,sub_description) VALUES('$child_birth_id','$date_month','$sub_title','$sub_description')";
                        $db->sql($sql);
                        $child_birth_variant_result = $db->getResult();
                    }
                    if (!empty($child_birth_variant_result)) {
                        $child_birth_variant_result = 0;
                    } else {
                        $child_birth_variant_result = 1;
                    }
                    
                    $error['add_child_birth'] = "<section class='content-header'>
                                                    <span class='label label-success'>Child Birth Muhurtham Added Successfully</span> </section>";
                } else {
                    $error['add_child_birth'] = " <span class='label label-danger'>Failed</span>";
                }
                }
                
            }
?>
<section class="content-header">
    <h1>Add Child Birth Muhurtham<small><a href='child_birth.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Child Birth Muhurthams</a></small></h1>

    <?php echo isset($error['add_child_birth']) ? $error['add_child_birth'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_child_birth_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
                                        <label for="">Month</label> <i class="text-danger asterik">*</i>
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
                                    <div class="col-md-4">
                                        <label for="">Year</label> <i class="text-danger asterik">*</i><?php echo isset($error['year']) ? $error['year'] : ''; ?>
                                        <input type="number" class="form-control" name="year" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Text1</label> <i class="text-danger asterik">*</i><?php echo isset($error['text1']) ? $error['text1'] : ''; ?>
                                        <input type="text" class="form-control" name="text1" required />
                                    </div>
                                   
                                   
                                </div>
                            </div>
                            <br>
                            <!-- <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                        <input type="text" class="form-control" name="title" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                        <textarea type="text" rows="2" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                            </div> -->
                            <br>
                            <div id="packate_div"  >
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Telugu Date & Month</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="date_month[]" required />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Rashi</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="sub_title[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Nakshatram</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="sub_description[]" required></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-1">
                                        <label>Tab</label>
                                        <a class="add_packate_variation" title="Add variation of Child Birth" style="cursor: pointer;color:white;"><button class="btn btn-warning">Add More</button></a>
                                    </div>
                                    <div id="variations">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Submit</button>
                        <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
                    </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_child_birth_form').validate({

        ignore: [],
        debug: false,
        rules: {
            month: "required",
            title:"required",
            description:"required",
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
                $(wrapper).append('<div class="row"><div class="col-md-3"><div class="form-group"><label for="date_month">Telugu Date & Month</label>' +'<input type="text" class="form-control" name="date_month[]" /></div></div>' + '<div class="col-md-4"><div class="form-group"><label for="sub_title">Rashi</label>' +'<input type="text" class="form-control" name="sub_title[]" /></div></div>' + '<div class="col-md-4"><div class="form-group"><label for="sub_description">Nakshatram</label>'+'<textarea type="text" row="2" class="form-control" name="sub_description[]"></textarea></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div>');
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