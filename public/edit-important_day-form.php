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
    $error = array();
    $year= $db->escapeString($_POST['year']);
    $month= $db->escapeString($_POST['month']);
    $title= $db->escapeString($_POST['title']);
    $description= $db->escapeString($_POST['description']);
    $sql = "UPDATE important_days SET year='$year',month='$month',title='$title',description='$description' WHERE id = '$ID'";
    $db->sql($sql);
    $categories_result = $db->getResult();
    if (!empty($categories_result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Important Days Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `important_days` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Important Day<small><a href='important_days.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Important Days</a></small></h1>
	<small><?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_important_days_form" method="post" enctype="multipart/form-data">
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
													 <option value='<?= $value['month'] ?>' <?= $value['month']==$res[0]['month'] ? 'selected="selected"' : '';?>><?= $value['month'] ?></option>
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
													 <option value='<?= $value['year'] ?>' <?= $value['year']==$res[0]['year'] ? 'selected="selected"' : '';?>><?= $value['year'] ?></option>
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
                                            <textarea  type="text" rows="1" class="form-control" name="title"  required><?php echo $res[0]['title']?></textarea>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description"  required><?php echo $res[0]['description']?></textarea>
                                    </div>
                                 </div>
                            </div>
                    </div>
                  
                    <!-- /.box-body -->

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>