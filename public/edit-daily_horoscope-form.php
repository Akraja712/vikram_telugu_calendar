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

	$date = $db->escapeString(($_POST['date']));
	$rasi= $db->escapeString($_POST['rasi']);
	$title= $db->escapeString($_POST['title']);
	$description= $db->escapeString($_POST['description']);
	$title_description= $db->escapeString($_POST['title_description']);
	// $lucky_number= $db->escapeString($_POST['lucky_number']);
	// $lucky_color= $db->escapeString($_POST['lucky_color']);
	// $treatment= $db->escapeString($_POST['treatment']);
	// $health= $db->escapeString($_POST['health']);
	// $wealth= $db->escapeString($_POST['wealth']);
	// $family= $db->escapeString($_POST['family']);
	// $things_love= $db->escapeString($_POST['things_love']);
	// $profession= $db->escapeString($_POST['profession']);
	// $married_life= $db->escapeString($_POST['married_life']);
	
	if (empty($date)) {
		$error['date'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($rasi)) {
		$error['rasi'] = " <span class='label label-danger'>Required!</span>";
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
	// if (empty($lucky_number)) {
	// 	$error['lucky_number'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($lucky_color)) {
	// 	$error['lucky_color'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($treatment)) {
	// 	$error['treatment'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($health)) {
	// 	$error['health'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($wealth)) {
	// 	$error['wealth'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($family)) {
	// 	$error['family'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($things_love)) {
	// 	$error['things_love'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($profession)) {
	// 	$error['profession'] = " <span class='label label-danger'>Required!</span>";
	// }
	// if (empty($married_life)) {
	// 	$error['married_life'] = " <span class='label label-danger'>Required!</span>";
	// }
   
   
   
	if (!empty($date) && !empty($rasi) && !empty($description)&& !empty($title)&& !empty($title_description) ) {

            //  $sql_query = "UPDATE daily_horoscope SET date='$date',rasi='$rasi',description='$description',lucky_number='$lucky_number',lucky_color='$lucky_color',treatment='$treatment',health='$health',wealth='$wealth',family='$family',things_love='$things_love',profession='$profession',married_life='$married_life' WHERE id =$ID";
			$sql_query = "UPDATE daily_horoscope SET date='$date',rasi='$rasi',description='$description',title='$title',title_description='$title_description'WHERE id =$ID";
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
				
			$error['update_daily_horoscope'] = " <section class='content-header'><span class='label label-success'>Daily Horoscope updated Successfully</span></section>";
			} else {
				$error['update_daily_horoscope'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM daily_horoscope WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "daily.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Daily Horoscope<small><a href='daily.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Daily Horoscope</a></small></h1>
	<small><?php echo isset($error['update_daily_horoscope']) ? $error['update_daily_horoscope'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-8">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
				</div>
				<div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
				
				<!-- /.box-header -->
				<!-- form start -->
				<form id="edit_daily_horoscope_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Date</label> <i class="text-danger asterik">*</i><?php echo isset($error['date']) ? $error['date'] : ''; ?>
                                            <input type="date" class="form-control" name="date" value="<?php echo $res[0]['date']; ?>">
                                    </div>
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
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
											<input type="title" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>">
                                    </div>
									<div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description'] ?></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['title_description']) ? $error['title_description'] : ''; ?>
											<input type="text" class="form-control" name="title_description" value="<?php echo $res[0]['title_description']; ?>">
                                    </div>
												</div>
                            <hr>
                            <!-- <h4>Lucky for Today</h4>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lucky Number</label> <i class="text-danger asterik">*</i><?php echo isset($error['lucky_number']) ? $error['lucky_number'] : ''; ?>
                                            <input type="number" class="form-control" name="lucky_number" value="<?php echo $res[0]['lucky_number']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lucky Color</label> <i class="text-danger asterik">*</i><?php echo isset($error['lucky_color']) ? $error['lucky_color'] : ''; ?>
                                            <input type="text" class="form-control" name="lucky_color" value="<?php echo $res[0]['lucky_color']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Treatment</label> <i class="text-danger asterik">*</i><?php echo isset($error['treatment']) ? $error['treatment'] : ''; ?>
                                            <input type="text" class="form-control" name="treatment" value="<?php echo $res[0]['treatment']; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Rating for Today</h4>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Health</label> <i class="text-danger asterik">*</i><?php echo isset($error['health']) ? $error['health'] : ''; ?>
                                            <input type="text" class="form-control" name="health" value="<?php echo $res[0]['health']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Wealth</label> <i class="text-danger asterik">*</i><?php echo isset($error['wealth']) ? $error['wealth'] : ''; ?>
                                            <input type="text" class="form-control" name="wealth" value="<?php echo $res[0]['wealth']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Family</label> <i class="text-danger asterik">*</i><?php echo isset($error['family']) ? $error['family'] : ''; ?>
                                            <input type="text" class="form-control" name="family" value="<?php echo $res[0]['family']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Things related to love</label> <i class="text-danger asterik">*</i><?php echo isset($error['things_love']) ? $error['things_love'] : ''; ?>
                                            <input type="text" class="form-control" name="things_love" value="<?php echo $res[0]['things_love']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Profession</label> <i class="text-danger asterik">*</i><?php echo isset($error['profession']) ? $error['profession'] : ''; ?>
                                            <input type="text" class="form-control" name="profession" value="<?php echo $res[0]['profession']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Married Life</label> <i class="text-danger asterik">*</i><?php echo isset($error['married_life']) ? $error['married_life'] : ''; ?>
                                            <input type="text" class="form-control" name="married_life" value="<?php echo $res[0]['married_life']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br> -->
						
						</div><!-- /.box-body -->
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
