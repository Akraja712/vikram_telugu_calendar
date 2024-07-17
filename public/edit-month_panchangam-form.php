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


	
	
   
    if ( !empty($text1) && !empty($pournami) && !empty($amavasya) && !empty($akadhashi) && !empty($festivals) && !empty($pradhosha) && !empty($chavithi) && !empty($masa_shiva_Rathri) && !empty($sankatahara_chathurdhi)) {      
		    
			$sql_query = "UPDATE month_panchangam SET year='$year',month='$month',text1 = '$text1',festivals='$festivals',pournami='$pournami',amavasya='$amavasya',akadhashi='$akadhashi',pradhosha='$pradhosha',shasti='$shasti',chavithi='$chavithi',masa_shiva_Rathri='$masa_shiva_Rathri',sankatahara_chathurdhi='$sankatahara_chathurdhi',holiday='$holiday' WHERE id = $ID";
			 $db->sql($sql_query);
			 $res = $db->getResult();
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}
			if ($update_result == 1) {

	            	$error['update_panchangam'] = " <section class='content-header'><span class='label label-success'>Monthly Panchangam updated Successfully</span></section>";
			} else {
				$error['update_panchangam'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM month_panchangam WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "month_panchangam.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Monthly Panchangam<small><a href='month_panchangam.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Monthly Panchangam</a></small></h1>
	<small><?php echo isset($error['update_panchangam']) ? $error['update_panchangam'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-12">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
				</div>
				<div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
				
				<!-- /.box-header -->
				<!-- form start -->
				<form id="edit_panchangam_form" method="post" enctype="multipart/form-data">
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
													 <option value='<?= $value['month'] ?>' <?= $value['month']==$res[0]['month'] ? 'selected="selected"' : '';?>><?= $value['month'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
									<div class="col-md-3">
                                            <label for="exampleInputEmail1">Year</label> <i class="text-danger asterik">*</i>
                                            <input type="number" class="form-control" name="year" value="<?php echo $res[0]['year']; ?>">
                                    </div>
                                    <div class="col-md-5">
                                            <label for="exampleInputEmail1">Text1</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="text1" value="<?php echo $res[0]['text1']; ?>">
                                    </div>
								</div>
						   </div>
						   <br>
						   <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Pournami</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="pournami"><?php echo $res[0]['pournami']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Amavasya</label> <i class="text-danger asterik">*</i>
											<textarea type="text" rows="2" class="form-control" name="amavasya"><?php echo $res[0]['amavasya']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Akadhashi</label> <i class="text-danger asterik">*</i>
											<textarea type="text" rows="2" class="form-control" name="akadhashi"><?php echo $res[0]['akadhashi']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1"> Pradhosha</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="pradhosha"><?php echo $res[0]['pradhosha']; ?></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
								   <div class="col-md-3">
                                            <label for="exampleInputEmail1">Shasti</label> <i class="text-danger asterik">*</i>
											<textarea type="text" rows="2" class="form-control" name="shasti" ><?php echo $res[0]['shasti']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Chavithi</label> <i class="text-danger asterik">*</i>
											<textarea type="text" rows="2" class="form-control" name="chavithi" ><?php echo $res[0]['chavithi']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Masa Shiva Rathri</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="masa_shiva_Rathri"><?php echo $res[0]['masa_shiva_Rathri']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="exampleInputEmail1">Sankatahara Chathurdhi</label> <i class="text-danger asterik">*</i>
											<textarea type="text" rows="2"  class="form-control" name="sankatahara_chathurdhi"><?php echo $res[0]['sankatahara_chathurdhi']; ?></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
							<div class="row">
                                <div class="form-group">
                                   <div class="col-md-6">
                                            <label for="exampleInputEmail1">Festivals</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="3" class="form-control" name="festivals"><?php echo $res[0]['festivals']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1">Holidays</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="3" class="form-control" name="holiday"><?php echo $res[0]['holiday']; ?></textarea>
                                    </div>
                            </div>
					</div><!-- /.box-body -->
                       
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>					
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
