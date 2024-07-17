<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {

        $rahu= $db->escapeString($_POST['rahu']);
        $day= $db->escapeString($_POST['day']);
        $yamagandam= $db->escapeString($_POST['yamagandam']);

   if (!empty($day) && !empty($rahu) && !empty($yamagandam)) {
     
        $sql_query = "UPDATE rahu_yamagandam SET rahu='$rahu',day='$day',yamagandam='$yamagandam' WHERE id='$ID'";
        $db->sql($sql_query);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_rahu_yamagandam'] = "<section class='content-header'>
                                            <span class='label label-success'>Rahu Yamagandam Updated Successfully</span> </section>";
        } else {
            $error['update_rahu_yamagandam'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `rahu_yamagandam` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Rahu Yamagandam<small><a href='rahu_yamagandam.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Rahu Yamagandam</a></small></h1>
	<small><?php echo isset($error['update_rahu_yamagandam']) ? $error['update_rahu_yamagandam'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Edit Rahu Yamagandam</h3> -->
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_rahu_yamagandam_form' method="post" enctype="multipart/form-data">
                <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1"> Day</label> <i class="text-danger asterik">*</i>
                                        <select id='day' name="day" class='form-control' >
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `days`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
													 <option value='<?= $value['day'] ?>' <?= $value['day']==$res[0]['day'] ? 'selected="selected"' : '';?>><?= $value['day'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                             <label for="exampleInputEmail1">Rahu</label>
                                             <input type="text" class="form-control" name="rahu" value="<?php echo $res[0]['rahu']; ?>">
                                    </div>
                                    <div class='col-md-6'>
                                             <label for="exampleInputEmail1">Yamagandam</label>
                                             <input type="text" class="form-control" name="yamagandam" value="<?php echo $res[0]['yamagandam']; ?>">
                                    </div>
                                </div>
                            </div>
         
                    </div>
                  
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>
<?php $db->disconnect(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>