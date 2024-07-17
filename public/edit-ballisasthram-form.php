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
    $description = $db->escapeString($_POST['description']);
    $sub_title1 = $db->escapeString($_POST['sub_title1']);
    $sub_title2 = $db->escapeString($_POST['sub_title2']);
    $error = array();

    if (!empty($title) && !empty($description)) {
        $sql_query = "UPDATE balli_sasthram SET title='$title',description='$description',sub_title1='$sub_title1',sub_title2='$sub_title2' WHERE id = $ID";
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
            if (isset($_POST['sub_description1']) && is_array($_POST['sub_description2'])) {
                for ($i = 0; $i < count($_POST['sub_description1']); $i++) {
                    $balli_sasthram_id = $db->escapeString($_POST['balli_sasthram_variant_id'][$i]);
                    $sub_description1 = $db->escapeString($_POST['sub_description1'][$i]);
                    $sub_description2 = $db->escapeString($_POST['sub_description2'][$i]);
                    $sql = "UPDATE balli_sasthram_variant SET sub_description1='$sub_description1', sub_description2='$sub_description2' WHERE id = $balli_sasthram_id";
                    $db->sql($sql);
                }
            }

            // Add new variations
            if (isset($_POST['insert_sub_description1']) && isset($_POST['insert_sub_description2'])) {
                for ($i = 0; $i < count($_POST['insert_sub_description1']); $i++) {
                    $sub_description1 = $db->escapeString($_POST['insert_sub_description1'][$i]);
                    $sub_description2 = $db->escapeString($_POST['insert_sub_description2'][$i]);
                    if (!empty($sub_description1) || !empty($sub_description2)) {
                        $sql = "INSERT INTO balli_sasthram_variant (balli_sasthram_id, sub_description1, sub_description2) VALUES ('$ID', '$sub_description1', '$sub_description2')";
                        $db->sql($sql);
                    }
                }
            }

                        $error['update_ballisasthram'] = " <section class='content-header'><span class='label label-success'>Balli Sasthram updated Successfully</span></section>";
                } else {
                    $error['update_ballisasthram'] = " <span class='label label-danger'>Failed to update</span>";
                }
                }
        } 
 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM balli_sasthram WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

$sql_query = "SELECT * FROM balli_sasthram_variant WHERE balli_sasthram_id =" . $ID;
$db->sql($sql_query);
$resslot = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "ballisasthram.php";
	</script>
<?php } ?>
<section class="content-header">
    <h1>Edit Balli Sasthram <small><a href='ballisasthram.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Balli Sasthram </a></small></h1>
    <?php echo isset($error['update_ballisasthram']) ? $error['update_ballisasthram'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_ballisasthram_form" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="title" id = "title" value="<?php echo $res[0]['title']?>">
                                    </div>
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i>
                                            <textarea  type="text" rows="5" class="form-control" name="description"><?php echo $res[0]['description']?></textarea>
                                    </div>
                                    <br>
                                    <div class="col-md-5">
                                            <label for="exampleInputEmail1">Sub Title1</label> <i class="text-danger asterik"></i>
                                            <textarea  type="text" rows="2" class="form-control" name="sub_title1"><?php echo $res[0]['sub_title1']?></textarea>
                                    </div>
                                    <div class="col-md-5">
                                            <label for="exampleInputEmail1">Sub Title2</label> <i class="text-danger asterik"></i>
                                            <textarea  type="text" rows="2" class="form-control" name="sub_title2"><?php echo $res[0]['sub_title2']?></textarea>
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
									    <input type="hidden" class="form-control" name="balli_sasthram_variant_id[]" id="balli_sasthram_variant_id" value='<?= $row['id']; ?>' />
										<div class="col-md-5">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1"> sub description1</label> <i class="text-danger asterik"></i>
												<textarea type="text" rows="2" class="form-control" name="sub_description1[]"><?php echo $row['sub_description1'] ?></textarea>
											</div>
										</div>
                                        <div class="col-md-5">
											<div class="form-group packate_div">
												<label for="exampleInputEmail1"> sub description2</label> <i class="text-danger asterik"></i>
												<textarea type="text" rows="2" class="form-control" name="sub_description2[]"><?php echo $row['sub_description2'] ?></textarea>
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
        <a class="remove" data-id="data_delete" style="cursor:pointer;color:white;">
            <button class="btn btn-danger">Remove</button>
        </a>
    </div>
											<?php } ?>
									</div>
								</div>
								<?php $i++; 
							} ?> 
						
						
						</div>
						<!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnEdit" />&nbsp;
                    </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var max_fields = 7;
        var wrapper = $("#variations");
        var add_button = $("#add_packate_variation");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
				$(wrapper).append('<div class="row">' +
    '<div class="col-md-5">' +
    '<div class="form-group">' +
    '<label for="sub_description1">sub_description1</label>' +
    '<input type="text" class="form-control" name="insert_sub_description1[]" />' +
    '</div>' +
    '</div>' +
    '<div class="col-md-5">' +
    '<div class="form-group">' +
    '<label for="sub_description2">sub_description2</label>' +
    '<textarea type="text" rows="2" class="form-control" name="insert_sub_description2[]"></textarea>' +
    '</div>' +
    '</div>' +
    '<div class="col-md-1" style="display: grid;">' +
    '<label>Tab</label>' +
    '<a class="remove text-danger" style="cursor:pointer;color:white;">' +
    '<button class="btn btn-danger">Remove</button>' +
    '</a>' +
    '</div>' +
    '</div>');

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
     $(document).on('change', '#grahalu_id', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "balli_sasthram_id=" + $('#balli_sasthram_id').val() + "&change_balli_sasthram=1",
            method: "POST",
            success: function(data) {
                $('#subcategory_id').html("<option value=''>---Select Subcategory---</option>" + data);
            }
        });
    });
</script>
<script>
    $(document).on('click', '.remove', function() {
        var variantDiv = $(this).closest('.row');
        var variantId = variantDiv.find("input[name='balli_sasthram_variant_id[]']").val();

        if ($(this).data('id') == 'data_delete') {
            if (confirm('Are you sure? Want to delete this row')) {
                $.ajax({
                    url: 'public/db-operation.php',
                    type: "post",
                    data: { id: variantId, delete_variant: 1 },
                    success: function(result) {
                        if (result == 1) {
                            variantDiv.remove(); // Remove the variant div from the DOM
                        } else {
                            
                        }
                    }
                });
            }
        } else {
            variantDiv.remove(); // Remove the variant div from the DOM
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>