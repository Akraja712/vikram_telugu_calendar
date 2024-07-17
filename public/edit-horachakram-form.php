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
        $morning= $db->escapeString($_POST['morning']);
        $day= $db->escapeString($_POST['day']);
        $time= $db->escapeString($_POST['time']);
        $night= $db->escapeString($_POST['night']);

   if (!empty($day) && !empty($time)) {
     
        $sql_query = "UPDATE hora_chakram SET morning='$morning',day='$day',time='$time',night='$night' WHERE id='$ID'";
        $db->sql($sql_query);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_horachakram'] = "<section class='content-header'>
                                            <span class='label label-success'>Hora Chakram Updated Successfully</span> </section>";
        } else {
            $error['update_horachakram'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `hora_chakram` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Hora Chakram<small><a href='horachakram.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Hora Chakram</a></small></h1>
	<small><?php echo isset($error['update_horachakram']) ? $error['update_horachakram'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Gowri</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_horachakram_form' method="post" enctype="multipart/form-data">
                <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <!-- <div class='col-md-5'>
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
                                    </div> -->
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
                                    <div class='col-md-4'>
                                        <label for="exampleInputEmail1">Time</label> <i class="text-danger asterik">*</i>
                                        <select id='time' name="time" class='form-control'>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `hora_timeslots`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
													 <option value='<?= $value['time'] ?>' <?= $value['time']==$res[0]['time'] ? 'selected="selected"' : '';?>><?= $value['time'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
                                             <label for="exampleInputEmail1">Morning</label>
                                             <input type="text" class="form-control" name="morning" value="<?php echo $res[0]['morning']; ?>">
                                    </div>
                                    <div class='col-md-4'>
                                             <label for="exampleInputEmail1">Night</label>
                                             <input type="text" class="form-control" name="night" value="<?php echo $res[0]['night']; ?>">
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