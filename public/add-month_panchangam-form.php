<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$date = new DateTime;
$date->format('h:i:s a');

?>
<?php
if (isset($_POST['btnAdd'])) {

        $year= $db->escapeString($_POST['year']);
        $month= $db->escapeString($_POST['month']);
        $text1= $db->escapeString($_POST['text1']);
        $pournami = $db->escapeString($_POST['pournami']);
        $amavasya = $db->escapeString($_POST['amavasya']);
        $akadhashi= $db->escapeString($_POST['akadhashi']);
        $pradhosha = $db->escapeString($_POST['pradhosha']);
        $shasti = $db->escapeString($_POST['shasti']);
        $chavithi = $db->escapeString($_POST['chavithi']);
        $masa_shiva_Rathri = $db->escapeString($_POST['masa_shiva_Rathri']);
        $sankatahara_chathurdhi = $db->escapeString($_POST['sankatahara_chathurdhi']);
        $festivals= $db->escapeString($_POST['festivals']);
        $holiday = $db->escapeString($_POST['holiday']);

        
        if (empty($year)) {
            $error['year'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($text1)) {
            $error['text1'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($pournami)) {
            $error['pournami'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($amavasya)) {
            $error['amavasya'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($akadhashi)) {
            $error['akadhashi'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($text1)) {
            $error['text1'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($festivals)) {
            $error['festivals'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($pradhosha)) {
            $error['pradhosha'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($chavithi)) {
            $error['chavithi'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($masa_shiva_Rathri)) {
            $error['masa_shiva_Rathri'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($sankatahara_chathurdhi)) {
            $error['sankatahara_chathurdhi'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($holiday)) {
            $error['holiday'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($shasti)) {
            $error['shasti'] = " <span class='label label-danger'>Required!</span>";
        }
       



       
       
       if ( !empty($text1) && !empty($year) && !empty($month) && !empty($pournami) && !empty($amavasya) && !empty($akadhashi) && !empty($festivals) && !empty($pradhosha) && !empty($chavithi) && !empty($masa_shiva_Rathri) && !empty($sankatahara_chathurdhi)) {
         
            // $sql = "SELECT * FROM panchangam WHERE date = '$date'";
            // $db->sql($sql);
            // $res = $db->getResult();
            // $num = $db->numRows($res);
            // if ($num >= 1){   
            //     $error['add_panchangam'] = " <span class='label label-danger'>Panchangam already in this date</span>";
            // }
            // else{
                $sql_query = "INSERT INTO month_panchangam (year,month,text1,pournami,amavasya,akadhashi,pradhosha,shasti,chavithi,masa_shiva_Rathri,sankatahara_chathurdhi,festivals,holiday) VALUES ('$year','$month','$text1','$pournami','$amavasya','$akadhashi','$pradhosha','$shasti','$chavithi','$masa_shiva_Rathri','$sankatahara_chathurdhi','$festivals','$holiday')";
                $db->sql($sql_query);
                $result = $db->getResult();
                if (!empty($result)) {
                    $result = 0;
                } else {
                    $result = 1;
                }
    
                if ($result == 1) {
                    
                    $error['add_panchangam'] = "<section class='content-header'>
                                                    <span class='label label-success'>Monthly Panchangam Added Successfully</span> </section>";
                } else {
                    $error['add_panchangam'] = " <span class='label label-danger'>Failed</span>";
                }
                }
                
            }

        // }
?>
<section class="content-header">
    <h1>Add Monthly Panchangam <small><a href='month_panchangam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Monthly Panchangam</a></small></h1>

    <?php echo isset($error['add_panchangam']) ? $error['add_panchangam'] : ''; ?>
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
                <form name="add_product" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
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
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Year</label> <i class="text-danger asterik">*</i><?php echo isset($error['year']) ? $error['year'] : ''; ?>
                                            <input type="number" class="form-control" name="year" required>
                                    </div>
                                    <div class="col-md-5">
                                            <label for="exampleInputEmail1">Text1</label> <i class="text-danger asterik">*</i><?php echo isset($error['text1']) ? $error['text1'] : ''; ?>
                                            <input type="text" class="form-control" name="text1" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Pournami</label> <i class="text-danger asterik">*</i><?php echo isset($error['pournami']) ? $error['pournami'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="pournami"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Amavasya</label> <i class="text-danger asterik">*</i><?php echo isset($error['amavasya']) ? $error['amavasya'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="amavasya"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Akadhashi</label> <i class="text-danger asterik">*</i><?php echo isset($error['akadhashi']) ? $error['akadhashi'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="akadhashi"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Pradhosha</label> <i class="text-danger asterik">*</i><?php echo isset($error['pradhosha']) ? $error['pradhosha'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="pradhosha"></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Shasti</label> <i class="text-danger asterik">*</i><?php echo isset($error['shasti']) ? $error['shasti'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="shasti"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Chavithi</label> <i class="text-danger asterik">*</i><?php echo isset($error['chavithi']) ? $error['chavithi'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="chavithi"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Masa Shiva Rathri</label> <i class="text-danger asterik">*</i><?php echo isset($error['masa_shiva_Rathri']) ? $error['masa_shiva_Rathri'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="masa_shiva_Rathri"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1"> Sankatahara Chathurdhi</label> <i class="text-danger asterik">*</i><?php echo isset($error['sankatahara_chathurdhi']) ? $error['sankatahara_chathurdhi'] : ''; ?>
                                            <textarea type="text" rows="2" class="form-control" name="sankatahara_chathurdhi"></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                   <div class="col-md-6">
                                            <label for="exampleInputEmail1">Festivals</label> <i class="text-danger asterik">*</i><?php echo isset($error['festivals']) ? $error['festivals'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="festivals"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1">Holidays</label> <i class="text-danger asterik">*</i><?php echo isset($error['holiday']) ? $error['holiday'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="holiday"></textarea>
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
    $('#add_panchangam').validate({

        ignore: [],
        debug: false,
        rules: {
            festivals: "required",
            text1: "required",
            pournami: "required",
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