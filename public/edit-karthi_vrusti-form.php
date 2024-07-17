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

	$month= $db->escapeString($_POST['month']);
	$year= $db->escapeString($_POST['year']);
	$text1 = $db->escapeString($_POST['text1']);
	$error = array();



	  if ( !empty($month) && !empty($text1)  && !empty($year))
        {
             $sql_query = "UPDATE karthi_vrusti SET month='$month',year='$year',text1='$text1' WHERE id =$ID";
			 $db->sql($sql_query);
			 $res = $db->getResult();
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1)
		   {
				for ($i = 0; $i < count($_POST['date_month']); $i++) {

					$karthi_vrusti_id = $db->escapeString(($_POST['karthi_vrusti_variant_id'][$i]));
					$date_month = $db->escapeString(($_POST['date_month'][$i]));
					$karthi = $db->escapeString(($_POST['karthi'][$i]));
					$nakshathram = $db->escapeString(($_POST['nakshathram'][$i]));
					$pravesham = $db->escapeString(($_POST['pravesham'][$i]));
					$rashi = $db->escapeString(($_POST['rashi'][$i]));
					$ganam = $db->escapeString(($_POST['ganam'][$i]));
					$karthi_result = $db->escapeString(($_POST['karthi_result'][$i]));
					$sql = "UPDATE karthi_vrusti_variant SET date_month='$date_month',karthi='$karthi',nakshathram='$nakshathram',pravesham='$pravesham',rashi='$rashi',ganam='$ganam',karthi_result='$karthi_result' WHERE id =$karthi_vrusti_id";
					$db->sql($sql);

				}
				if (
				    isset($_POST['insert_date_month'])  && isset($_POST['insert_karthi']) && isset($_POST['insert_nakshathram'])  && isset($_POST['insert_pravesham'])  && isset($_POST['insert_rashi'])  && isset($_POST['insert_ganam'])   && isset($_POST['karthi_result']) 
				) {
					for ($i = 0; $i < count($_POST['insert_date_month']); $i++) {
						$date_month = $db->escapeString(($_POST['insert_date_month'][$i]));
						$karthi = $db->escapeString(($_POST['insert_karthi'][$i]));
						$nakshathram = $db->escapeString(($_POST['insert_nakshathram'][$i]));
						$pravesham = $db->escapeString(($_POST['insert_pravesham'][$i]));
						$rashi = $db->escapeString(($_POST['insert_rashi'][$i]));
						$ganam = $db->escapeString(($_POST['insert_ganam'][$i]));
						$karthi_result = $db->escapeString(($_POST['insert_karthi_result'][$i]));
						if (!empty($date_month) || !empty($karthi)) {
							$sql = "INSERT INTO karthi_vrusti_variant (karthi_vrusti_id,date_month,karthi,nakshathram,pravesham,rashi,ganam,karthi_result) VALUES('$ID','$date_month','$karthi','$nakshathram','$pravesham','$rashi','$ganam','$karthi_result')";
							$db->sql($sql);

						}
					}
				}
                  $error['update_karthi_vrusti'] = " <section class='content-header'><span class='label label-success'>Karthi Vrusti updated Successfully</span></section>";
			} else {
				$error['update_karthi_vrusti'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM karthi_vrusti WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

$sql_query = "SELECT * FROM karthi_vrusti_variant WHERE karthi_vrusti_id =" . $ID;
$db->sql($sql_query);
$resslot = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "karthi_vrusti.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Karthi Vrusti<small><a href='karthi_vrusti.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Karthi Vrusti's</a></small></h1>
	<small><?php echo isset($error['update_karthi_vrusti']) ? $error['update_karthi_vrusti'] : ''; ?></small>
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
				<form id="edit_karthi_vrusti_form" method="post" enctype="multipart/form-data">
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
													 <option value='<?= $value['month'] ?>' <?= $value['month']==$res[0]['month'] ? 'selected="selected"' : '';?>><?= $value['month'] ?></option>
                                            <?php } ?>
                                            </select>
                                    </div>
									<div class="col-md-4">
                                        <label for="">Year</label> <i class="text-danger asterik">*</i>
                                        <input type="number" class="form-control" name="year" value="<?php echo $res[0]['year']; ?>" />
                                    </div>
									<div class="col-md-4">
                                        <label for="">Text1</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="text1" value="<?php echo $res[0]['text1']; ?>" />
                                    </div>
                                    
                                </div>
                            </div>
                            <br>
							<!-- <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Title</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Description</label> <i class="text-danger asterik">*</i>
                                        <textarea type="text" rows="2" class="form-control" name="description"><?php echo $res[0]['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br> -->
							
							<div id="variations">
							<?php
							$i=0;
							foreach ($resslot as $row) {
								?>
								<div id="packate_div">
									<div class="row">
									    <input type="hidden" class="form-control" name="karthi_vrusti_variant_id[]" id="karthi_vrusti_variant_id" value='<?= $row['id']; ?>' />
										<div class="col-md-3">
											<label for="">Telugu Date & Month</label> <i class="text-danger asterik">*</i>
											<input type="text" class="form-control" name="date_month[]" value="<?php echo $row['date_month']; ?>" />
										</div>
									    <div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Karthi</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="karthi[]" value="<?php echo $row['karthi'] ?>" required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Nakshathram</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="nakshathram[]" value="<?php echo $row['nakshathram'] ?>" required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Pravesham</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="pravesham[]" value="<?php echo $row['pravesham'] ?>" required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Rashi</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="rashi[]" value="<?php echo $row['rashi'] ?>" required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Ganam</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="ganam[]" value="<?php echo $row['ganam'] ?>" required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Karthi Result</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="karthi_result[]" value="<?php echo $row['karthi_result'] ?>" required/>
											</div>
										</div>

										<?php if ($i == 0) { ?>
												<div class='col-md-1'>
													<label>Tab</label>
													<a id="add_packate_variation" title='Add variation of Karthi Vrusti' style='cursor: pointer;color:white;'><button class="btn btn-warning">Add more</button></a>
												</div>
											<?php } else { ?>
												<div class="col-md-1">
													<label>Tab</label>
													<a class="remove_variation text-danger" data-id="data_delete" title="Remove variation of Karthi Vrusti" style="cursor: pointer;color:white;"><button class="btn btn-danger">Remove</button></a>
												</div>
											<?php } ?>
									</div>
									<br>
								</div>
								<?php $i++; 
							} ?> 
						
						</div><!-- /.box-body -->
                       
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var max_fields = 7;
        var wrapper = $("#packate_div");
        var add_button = $("#add_packate_variation");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
				$(wrapper).append('<div class="row"><div class="col-md-3"><div class="form-group"><label for="date_month">Telugu Date & Month</label>' +'<input type="text" class="form-control" name="insert_date_month[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="karthi">Karthi</label>' +'<input type="text" class="form-control" name="insert_karthi[]" /></div></div>' + '<div class="col-md-3"><div class="form-group"><label for="nakshathram">Nakshathram</label>' +'<input type="text" class="form-control" name="insert_nakshathram[]" /></div></div>' + '<div class="col-md-3"><div class="form-group"><label for="pravesham">Pravesham</label>'+'<input type="text" class="form-control" name="insert_pravesham[]"></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="rashi">Rashi</label>' +'<input type="text" class="form-control" name="insert_rashi[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="ganam">Ganam</label>' +'<input type="text" class="form-control" name="insert_ganam[]" /></div></div>'+'<div class="col-md-3"><div class="form-group"><label for="karthi_result">Karthi Result</label>' +'<input type="text" class="form-control" name="insert_karthi_result[]" /></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div><br>');
            } else {
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
<script>
    $(document).on('click', '.remove_variation', function() {
        if ($(this).data('id') == 'data_delete') {
            if (confirm('Are you sure? Want to delete this row')) {
                var id = $(this).closest('div.row').find("input[id='karthi_vrusti_variant_id']").val();
                $.ajax({
                    url: 'public/db-operation.php',
                    type: "post",
                    data: 'id=' + id + '&delete_variant=1',
                    success: function(result) {
                        if (result) {
                            location.reload();
                        } else {
                            alert("Variant not deleted!");
                        }
                    }
                });
            }
        } else {
            $(this).closest('.row').remove();
        }
    });
</script>
