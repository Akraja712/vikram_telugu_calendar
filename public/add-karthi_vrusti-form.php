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
       
        if (empty($text1)) {
            $error['text1'] = " <span class='label label-danger'>Required!</span>";
        }
       


        if ( !empty($month)  && !empty($text1) && !empty($year) )
        {
                $sql_query = "INSERT INTO karthi_vrusti (month,text1,year)VALUES('$month','$text1','$year')";
                $db->sql($sql_query);
                $result = $db->getResult();
                if (!empty($result)) {
                    $result = 0;
                } else {
                    $result = 1;
                }
                if ($result == 1) {
                    $sql = "SELECT id FROM karthi_vrusti ORDER BY id DESC LIMIT 1";
                    $db->sql($sql);
                    $res = $db->getResult();
                    $karthi_vrusti_id = $res[0]['id'];
                    for ($i = 0; $i < count($_POST['karthi']); $i++) {

                        $date_month = $db->escapeString(($_POST['date_month'][$i]));
                        $karthi = $db->escapeString(($_POST['karthi'][$i]));
                        $nakshathram = $db->escapeString(($_POST['nakshathram'][$i]));
                        $pravesham = $db->escapeString(($_POST['pravesham'][$i]));
                        $rashi = $db->escapeString(($_POST['rashi'][$i]));
                        $ganam = $db->escapeString(($_POST['ganam'][$i]));
                        $karthi_result = $db->escapeString(($_POST['karthi_result'][$i]));
                        $sql = "INSERT INTO karthi_vrusti_variant (karthi_vrusti_id,date_month,karthi,nakshathram,pravesham,rashi,ganam,karthi_result) VALUES('$karthi_vrusti_id','$date_month','$karthi','$nakshathram','$pravesham','$rashi','$ganam','$karthi_result')";
                        $db->sql($sql);
                        $karthi_vrusti_variant_result = $db->getResult();
                    }
                    if (!empty($karthi_vrusti_variant_result)) {
                        $karthi_vrusti_variant_result = 0;
                    } else {
                        $karthi_vrusti_variant_result = 1;
                    }
                    
                    $error['add_karthi_vrusti'] = "<section class='content-header'>
                                                    <span class='label label-success'>Karthi Vrusti Added Successfully</span> </section>";
                } else {
                    $error['add_karthi_vrusti'] = " <span class='label label-danger'>Failed</span>";
                }
                }
                
            }
?>
<section class="content-header">
    <h1>Add Karthi Vrusti<small><a href='karthi_vrusti.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Karthi Vrusti</a></small></h1>

    <?php echo isset($error['add_karthi_vrusti']) ? $error['add_karthi_vrusti'] : ''; ?>
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
                <form name="add_karthi_vrusti_form" method="post" enctype="multipart/form-data">
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
                                    <div class="col-md-3">
                                        <label for="">Karthi</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="karthi[]" required />
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Nakshathram</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="nakshathram[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Pravesham</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="pravesham[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Rashi</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="rashi[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Ganam</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="ganam[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Karthi Result</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="karthi_result[]" required />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-1">
                                        <label>Tab</label>
                                        <a class="add_packate_variation" title="Add variation of Child Birth" style="cursor: pointer;color:white;"><button class="btn btn-warning">Add More</button></a>
                                    </div>
                                    <div id="variations">
                                    </div>
                                </div>
                                <br>
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
    $('#add_karthi_vrusti_form').validate({

        ignore: [],
        debug: false,
        rules: {
            month: "required",
            year:"required",
            date_month:"required",
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
                $(wrapper).append('<div class="row"><div class="col-md-3"><div class="form-group"><label for="date_month">Telugu Date & Month</label>' +'<input type="text" class="form-control" name="date_month[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="karthi">Karthi</label>' +'<input type="text" class="form-control" name="karthi[]" /></div></div>' + '<div class="col-md-3"><div class="form-group"><label for="nakshathram">Nakshathram</label>' +'<input type="text" class="form-control" name="nakshathram[]" /></div></div>' + '<div class="col-md-3"><div class="form-group"><label for="pravesham">Pravesham</label>'+'<input type="text" class="form-control" name="pravesham[]"></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="rashi">Rashi</label>' +'<input type="text" class="form-control" name="rashi[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="ganam">Ganam</label>' +'<input type="text" class="form-control" name="ganam[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="karthi_result">Karthi Result</label>' +'<input type="text" class="form-control" name="karthi_result[]" /></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div><br>');
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