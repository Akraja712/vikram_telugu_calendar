<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
?>
<?php

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnEdit'])) {

	$rasi= $db->escapeString($_POST['rasi']);
	$description= $db->escapeString($_POST['description']);
	$year= $db->escapeString($_POST['year']);
	$month= $db->escapeString($_POST['month']);
	$title= $db->escapeString($_POST['title']);
	$title_description= $db->escapeString($_POST['title_description']);
	

	if (empty($rasi)) {
		$error['rasi'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($year)) {
		$error['year'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($month)) {
		$error['month'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($description)) {
		$error['description'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($title)) {
		$error['title'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($title_description)) {
		$error['title_description'] = " <span class='label label-danger'>Required!</span>";
	}
   
   
   
	if ( !empty($rasi) && !empty($description) && !empty($year) && !empty($month)&& !empty($title)&& !empty($title_description))
	{
             $sql_query = "UPDATE monthly_horoscope SET rasi='$rasi',description='$description',title='$title',year='$year',month='$month',title_description='$title_description' WHERE id =$ID";
			 $db->sql($sql_query);
			 $res = $db->getResult();
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1) {
				   $error['update_monthly_horoscope'] = " <section class='content-header'><span class='label label-success'>Monthly Horoscope updated Successfully</span></section>";
			} else {
				$error['update_monthly_horoscope'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM monthly_horoscope WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "monthly.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Monthly Horoscope<small><a href='monthly.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Monthly Horoscope</a></small></h1>
	<small><?php echo isset($error['update_monthly_horoscope']) ? $error['update_monthly_horoscope'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-10">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
				</div>
				<div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
				
				<!-- /.box-header -->
				<!-- form start -->
				<form id="edit_monthly_horoscope_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<div class="row">
                                <div class="form-group">
                                    <div class='col-md-6'>
                                        <label for="">Rasi</label> <i class="text-danger asterik">*</i>
                                        <select id='rasi' name="rasi" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `rasi_names`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
													 <option value='<?= $value['rasi'] ?>' <?= $value['rasi']==$res[0]['rasi'] ? 'selected="selected"' : '';?>><?= $value['rasi'] ?></option>
                                            <?php } ?>
                                            </select>
                                    </div>
									<div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
											<input type="title" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
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
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description'] ?></textarea>
                                    </div>
                            </div>
						
						</div><!-- /.box-body -->
						<br>
						<div class="row">
                                <div class="form-group">
                                     <div class="col-md-8">
                                            <label for="exampleInputEmail1">Title Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['title_description']) ? $error['title_description'] : ''; ?>
                                            <input type="text" class="form-control" name="title_description" value="<?php echo $res[0]['title_description'] ?>">
                                    </div>
                            </div>
												</div>
												<br>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>					
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div>
</section>

<div class="separator"> </div>
<?php $db->disconnect(); ?>
