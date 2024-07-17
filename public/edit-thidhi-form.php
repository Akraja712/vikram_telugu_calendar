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


	$year = $db->escapeString(($_POST['year']));
	$month= $db->escapeString($_POST['month']);
	$error = array();
   if (!empty($year)  && !empty($month)) {
				$sql_query = "UPDATE thidhi SET year='$year',month = '$month' WHERE id =$ID";
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
				for ($i = 0; $i < count($_POST['title']); $i++) {
					$thidhi_id = $db->escapeString(($_POST['thidhi_variant_id'][$i]));
					$title = $db->escapeString(($_POST['title'][$i]));
					$description = $db->escapeString(($_POST['description'][$i]));
					$sql = "UPDATE thidhi_variant SET title='$title',description='$description' WHERE id =$thidhi_id";
					$db->sql($sql);

				}
				if (
					isset($_POST['insert_title']) && isset($_POST['insert_description'])
				) {
					for ($i = 0; $i < count($_POST['insert_title']); $i++) {
						$title = $db->escapeString(($_POST['insert_title'][$i]));
						$description = $db->escapeString(($_POST['insert_description'][$i]));
						if (!empty($title) || !empty($description)) {
							$sql = "INSERT INTO thidhi_variant (thidhi_id,title,description) VALUES('$ID','$title','$description')";
							$db->sql($sql);

						}
					}
				}
					$error['update_thidhi'] = " <section class='content-header'><span class='label label-success'>Thidhi updated Successfully</span></section>";
			} else {
				$error['update_thidhi'] = " <span class='label label-danger'>Failed to update</span>";
			}
			}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM thidhi WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

$sql_query = "SELECT * FROM thidhi_variant WHERE thidhi_id =" . $ID;
$db->sql($sql_query);
$resslot = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "thidhi.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Thidhi<small><a href='thidhi.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Thidhi</a></small></h1>
	<small><?php echo isset($error['update_thidhi']) ? $error['update_thidhi'] : ''; ?></small>
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
				<form id="edit_thidhi_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                        <label for="exampleInputEmail1">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year' name="year" class='form-control' required>
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
									<div class='col-md-5'>
                                        <label for="exampleInputEmail1"> month</label> <i class="text-danger asterik">*</i>
                                        <select id='month' name="month" class='form-control' >
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
                                </div>
                            </div>
						   <br>
						   <div id="variations">
							<?php
							$i=0;
							foreach ($resslot as $row) {
								?>
								<div id="packate_div">
									<div class="row">
									    <input type="hidden" class="form-control" name="thidhi_variant_id[]" id="thidhi_variant_id" value='<?= $row['id']; ?>' />
									    <div class="col-md-4">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="title[]" value="<?php echo $row['title'] ?>" required/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1"> Description</label> <i class="text-danger asterik">*</i>
												<textarea type="text" rows="2" class="form-control" name="description[]" required><?php echo $row['description'] ?></textarea>
											</div>
										</div>

										<?php if ($i == 0) { ?>
												<div class='col-md-1'>
													<label>Tab</label>
													<a id="add_packate_variation" title='Add variation' style='cursor: pointer;color:white;'><button class="btn btn-warning">Add more</button></a>
												</div>
											<?php } else { ?>
												<div class="col-md-1">
													<label>Tab</label>
													<a class="remove_variation text-danger" data-id="data_delete" title="Remove variation of panchangam" style="cursor: pointer;color:white;"><button class="btn btn-danger">Remove</button></a>
												</div>
											<?php } ?>
									</div>
								</div>
								<?php $i++; 
							} ?> 
						
						
						</div>
						<!-- /.box-body -->
                       
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
				$(wrapper).append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="title">title</label>' +'<input type="text" class="form-control" name="insert_title[]" /></div></div>'+'<div class="col-md-6"><div class="form-group"><label for="description">Description</label>'+'<textarea type="text" rows="2" class="form-control" name="insert_description[]"></textarea></div></div>'+'<div class="col-md-1" style="display:grid;"><label>Tab</label><a class="remove text-danger" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div>');
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
                var id = $(this).closest('div.row').find("input[id='thidhi_variant_id']").val();
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