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
        $year= $db->escapeString($_POST['year']);
        $day= $db->escapeString($_POST['day']);
        $rahukalam= $db->escapeString($_POST['rahukalam']);
        $yamangandam= $db->escapeString($_POST['yamangandam']);

   if (!empty($year) && !empty($rahukalam) && !empty($yamangandam)&& !empty($day)) {
     
        $sql_query = "UPDATE rahukalams SET year='$year',day='$day',rahukalam='$rahukalam',yamangandam='$yamangandam' WHERE id='$ID'";
        $db->sql($sql_query);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_rahukalam'] = "<section class='content-header'>
                                            <span class='label label-success'>Rahuklam Updated Successfully</span> </section>";
        } else {
            $error['update_rahukalam'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `rahukalams` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Rahukalam<small><a href='rahukalam.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Rahukalam</a></small></h1>
	<small><?php echo isset($error['update_rahukalam']) ? $error['update_rahukalam'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_gowri_form' method="post" enctype="multipart/form-data">
                <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year' name="year" class='form-control' >
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `years`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
													 <option value='<?= $value['year'] ?>' <?= $value['year']==$res[0]['year'] ? 'selected="selected"' : '';?>><?= $value['year'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
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
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1"> Rahukalam</label> <i class="text-danger asterik">*</i>
                                        <input type="text" name="rahukalam" class="form-control" value="<?php echo $res[0]['rahukalam']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                    <label for="exampleInputEmail1">Yamangandam</label> <i class="text-danger asterik">*</i>
                                        <input type="text" name="yamangandam" class="form-control" value="<?php echo $res[0]['yamangandam']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>

         
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