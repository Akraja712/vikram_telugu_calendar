<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    return false;
    exit(0);
}

if (isset($_POST['btnEdit'])) {
    $title = $db->escapeString($_POST['title']);
    $error = array();

    if (!empty($title)) {
        $sql_query = "UPDATE kolathalu SET title='$title' WHERE id = $ID";
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
            // Update existing variations
            if (isset($_POST['sub_title']) && is_array($_POST['sub_title'])) {
                for ($i = 0; $i < count($_POST['sub_title']); $i++) {
                    $kolathalu_id = $db->escapeString($_POST['kolathalu_variant_id'][$i]);
                    $sub_title = $db->escapeString($_POST['sub_title'][$i]);
                    $sub_description = $db->escapeString($_POST['sub_description'][$i]);
                    $sql = "UPDATE kolathalu_variant SET sub_title='$sub_title', sub_description='$sub_description' WHERE id = $kolathalu_id";
                    $db->sql($sql);
                }
            }

            // Add new variations
            if (isset($_POST['insert_sub_title']) && isset($_POST['insert_sub_description'])) {
                for ($i = 0; $i < count($_POST['insert_sub_title']); $i++) {
                    $sub_title = $db->escapeString($_POST['insert_sub_title'][$i]);
                    $sub_description = $db->escapeString($_POST['insert_sub_description'][$i]);
                    if (!empty($sub_title) || !empty($sub_description)) {
                        $sql = "INSERT INTO kolathalu_variant (kolathalu_id, sub_title, sub_description) VALUES ('$ID', '$sub_title', '$sub_description')";
                        $db->sql($sql);
                    }
                }
            }

            $error['update_kolathalu'] = "<section class='content-header'><span class='label label-success'>kolathalu updated Successfully</span></section>";
        } else {
            $error['update_kolathalu'] = "<span class='label label-danger'>Failed to update</span>";
        }
    }
}

// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM kolathalu WHERE id = $ID";
$db->sql($sql_query);
$res = $db->getResult();

$sql_query = "SELECT * FROM kolathalu_variant WHERE kolathalu_id = $ID";
$db->sql($sql_query);
$resslot = $db->getResult();

if (isset($_POST['btnCancel'])) {
    echo "<script>window.location.href = 'kolathalu.php';</script>";
    exit();
}
?>

<section class="content-header">
    <h1>
        Edit kolathalu Tab
        <small><a href='kolathalu.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to kolathalu Tab</a></small>
    </h1>
    <small><?php echo isset($error['update_kolathalu']) ? $error['update_kolathalu'] : ''; ?></small>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border"></div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>
                <form id="edit_kolathalu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Title</label> <i class="text-danger asterik">*</i>
                                    <input type="text" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>" />
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
									    <input type="hidden" class="form-control" name="kolathalu_variant_id[]" id="kolathalu_variant_id" value='<?= $row['id']; ?>' />
									    <div class="col-md-4">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1">Sub_Title</label> <i class="text-danger asterik">*</i>
												<input type="text" class="form-control" name="sub_title[]" value="<?php echo $row['sub_title'] ?>" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1"> Sub_Description</label> <i class="text-danger asterik">*</i>
												<textarea type="text" rows="2" class="form-control" name="sub_description[]" required><?php echo $row['sub_description'] ?></textarea>
											</div>
										</div>

										<?php if ($i == 0) { ?>
												<div class='col-md-1'>
													<label>Tab</label>
													<a id="add_packate_variation" title='Add variation of kolathalu' style='cursor: pointer;color:white;'><button class="btn btn-warning">Add more</button></a>
												</div>
											<?php } else { ?>
												<div class="col-md-1">
													<label>Tab</label>
													<a class="remove_variation text-danger" data-id="data_delete" title="Remove variation of kolathalu" style="cursor: pointer;color:white;"><button class="btn btn-danger">Remove</button></a>
												</div>
											<?php } ?>
									</div>
								</div>
								<?php $i++; 
							} ?> 
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

<div class="separator"></div>
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
                $(wrapper).append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="sub_title">sub_title</label><input type="text" class="form-control" name="insert_sub_title[]" /></div></div><div class="col-md-4"><div class="form-group"><label for="sub_description">sub_description</label><textarea type="text" rows="2" class="form-control" name="insert_sub_description[]"></textarea></div></div><div class="col-md-1" style="display:grid;"><label>Tab</label><a class="remove text-danger" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div></div>');
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
                var id = $(this).closest('div.row').find("input[id='kolathalu_variant_id']").val();
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
<script>
     $(document).on('change', '#kolathalu_id', function() {
        $.ajax({
            url: 'public/db-operation.php',
            method: 'POST',
            data: 'grahalu_id=' + $('#grahalu_id').val() + '&find_grahalusubcategory=1',
            success: function(data) {
                $('#subcategory_id').html("<option value=''>---Select Subcategory---</option>" + data);
            }
        });
    });
</script>
<?php
$db->disconnect();
?>
