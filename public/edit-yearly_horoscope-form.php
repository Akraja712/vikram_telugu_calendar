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
        $year= $db->escapeString($_POST['year']);
        $main_description= $db->escapeString($_POST['main_description']);
        $main_title= $db->escapeString($_POST['main_title']);
        $adhayam = $db->escapeString($_POST['adhayam']);
        $vyayam = $db->escapeString($_POST['vyayam']);
        $rajapujyam = $db->escapeString($_POST['rajapujyam']);
        $aavamanam= $db->escapeString($_POST['aavamanam']);
        $janma_nama_nakshathram= $db->escapeString($_POST['janma_nama_nakshathram']);
        $graha_dhashakalamu= $db->escapeString($_POST['graha_dhashakalamu']);
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);
        $janma_nama_nakshathram_title1= $db->escapeString($_POST['janma_nama_nakshathram_title1']);
        $janma_nama_nakshathram_title2= $db->escapeString($_POST['janma_nama_nakshathram_title2']);
        $janma_nama_nakshathram_title3= $db->escapeString($_POST['janma_nama_nakshathram_title3']);
        $janma_nama_nakshathram_title4= $db->escapeString($_POST['janma_nama_nakshathram_title4']);
        $janma_nama_nakshathram_description1= $db->escapeString($_POST['janma_nama_nakshathram_description1']);
        $janma_nama_nakshathram_description2= $db->escapeString($_POST['janma_nama_nakshathram_description2']);
        $janma_nama_nakshathram_description3= $db->escapeString($_POST['janma_nama_nakshathram_description3']);
        $janma_nama_nakshathram_description4= $db->escapeString($_POST['janma_nama_nakshathram_description4']);
        $error = array();
          
		if (!empty($rasi) && !empty($year) && !empty($janma_nama_nakshathram) && !empty($graha_dhashakalamu) && !empty($main_title) && !empty($main_description) && !empty($title) && !empty($description) && !empty($adhayam) && !empty($vyayam) && !empty($rajapujyam) && !empty($aavamanam) && !empty($janma_nama_nakshathram_title1) && !empty($janma_nama_nakshathram_title2) && !empty($janma_nama_nakshathram_title3)  && !empty($janma_nama_nakshathram_description1) && !empty($janma_nama_nakshathram_description2) && !empty($janma_nama_nakshathram_description3) ) 
        {

             $sql_query = "UPDATE yearly_horoscope SET rasi='$rasi',year='$year',title='$title',description='$description',adhayam='$adhayam',vyayam='$vyayam',rajapujyam='$rajapujyam',aavamanam='$aavamanam',janma_nama_nakshathram='$janma_nama_nakshathram',main_title='$main_title',main_description='$main_description',janma_nama_nakshathram_title1='$janma_nama_nakshathram_title1',janma_nama_nakshathram_title2='$janma_nama_nakshathram_title2',janma_nama_nakshathram_title3='$janma_nama_nakshathram_title3',janma_nama_nakshathram_title4='$janma_nama_nakshathram_title4',janma_nama_nakshathram_description1='$janma_nama_nakshathram_description1',janma_nama_nakshathram_description2='$janma_nama_nakshathram_description2',janma_nama_nakshathram_description3='$janma_nama_nakshathram_description3',janma_nama_nakshathram_description4='$janma_nama_nakshathram_description4',graha_dhashakalamu='$graha_dhashakalamu' WHERE id =$ID";
			 $db->sql($sql_query);
	   		 $res = $db->getResult();
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}
            if ($update_result == 1)
			{
				for ($i = 0; $i < count($_POST['graha_dhashakalamu_title']); $i++) {
					$yearly_horoscope_id = $db->escapeString(($_POST['yearly_horoscope_variant_id'][$i]));
					$graha_dhashakalamu_title = $db->escapeString(($_POST['graha_dhashakalamu_title'][$i]));
					$graha_dhashakalamu_description = $db->escapeString(($_POST['graha_dhashakalamu_description'][$i]));
					$sql = "UPDATE yearly_horoscope_variant SET graha_dhashakalamu_title='$graha_dhashakalamu_title',graha_dhashakalamu_description='$graha_dhashakalamu_description' WHERE id =$yearly_horoscope_id";
					$db->sql($sql);

				}
				if (
					isset($_POST['insert_graha_dhashakalamu_title']) && isset($_POST['insert_graha_dhashakalamu_description'])
				) {
					for ($i = 0; $i < count($_POST['insert_graha_dhashakalamu_title']); $i++) {
						$graha_dhashakalamu_title = $db->escapeString(($_POST['insert_graha_dhashakalamu_title'][$i]));
						$graha_dhashakalamu_description = $db->escapeString(($_POST['insert_graha_dhashakalamu_description'][$i]));
						if (!empty($graha_dhashakalamu_title) || !empty($graha_dhashakalamu_description)) {
							$sql = "INSERT INTO yearly_horoscope_variant (yearly_horoscope_id, graha_dhashakalamu_title, graha_dhashakalamu_description) VALUES ('$ID', '$graha_dhashakalamu_title', '$graha_dhashakalamu_description')";
							$db->sql($sql);

						}
					}
				}
			// check update result
		
			
			
                  $error['update_yearly_horoscope'] = " <section class='content-header'><span class='label label-success'>Yearly Horoscope updated Successfully</span></section>";
			} else {
				$error['update_yearly_horoscope'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM yearly_horoscope WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

$sql_query = "SELECT * FROM yearly_horoscope_variant WHERE yearly_horoscope_id =" . $ID;
$db->sql($sql_query);
$resslot = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "yearly.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Yearly Horoscope<small><a href='yearly.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Yearly Horoscope</a></small></h1>
	<small><?php echo isset($error['update_yearly_horoscope']) ? $error['update_yearly_horoscope'] : ''; ?></small>
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
				<form name="edit_yearly_horoscope_form" method="post" enctype="multipart/form-data">
				<div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class='col-md-4'>
                                        <label for="">Rasi</label> <i class="text-danger asterik">*</i>
                                        <select id="rasi" name="rasi" class='form-control' required>
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
                                    <div class='col-md-4'>
                                        <label for="">Year</label> <i class="text-danger asterik">*</i>
                                        <select id="year" name="year" class='form-control'>
                                            <option value="">Select Year</option>
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
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Main Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['main_title']) ? $error['main_title'] : ''; ?>
                                        <input type="text" class="form-control" name="main_title" value="<?php echo $res[0]['main_title']?>"  />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Main Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['main_description']) ? $error['description'] : ''; ?>
                                        <textarea type="text" rows="2" class="form-control" name="main_description" ><?php echo $res[0]['main_description']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="janma_nama_nakshathram" value="<?php echo $res[0]['janma_nama_nakshathram']?>">
                                        </div>
                                    </div>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Title1</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="janma_nama_nakshathram_title1" value="<?php echo $res[0]['janma_nama_nakshathram_title1']?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Description1</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="janma_nama_nakshathram_description1" ><?php echo $res[0]['janma_nama_nakshathram_description1']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Title2</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="janma_nama_nakshathram_title2" value="<?php echo $res[0]['janma_nama_nakshathram_title2']?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Description2</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="janma_nama_nakshathram_description2" ><?php echo $res[0]['janma_nama_nakshathram_description2']?></textarea>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Title3</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="janma_nama_nakshathram_title3" value="<?php echo $res[0]['janma_nama_nakshathram_title3']?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Description3</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="janma_nama_nakshathram_description3" ><?php echo $res[0]['janma_nama_nakshathram_description3']?></textarea>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Title4</label> <i class="text-danger asterik"></i>
                                            <input type="text" class="form-control" name="janma_nama_nakshathram_title4" value="<?php echo $res[0]['janma_nama_nakshathram_title4']?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Janma Nama Nakshathram Description4</label> <i class="text-danger asterik"></i>
                                            <textarea type="text" rows="2" class="form-control" name="janma_nama_nakshathram_description4" ><?php echo $res[0]['janma_nama_nakshathram_description4']?></textarea>
                                        </div>
                                        </div>
                                        </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="">Adhayam </label> <i class="text-danger asterik">*</i><?php echo isset($error['adhayam']) ? $error['adhayam'] : ''; ?>
                                        <input type="text" class="form-control" name="adhayam" value="<?php echo $res[0]['adhayam']?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Vyayam </label> <i class="text-danger asterik">*</i><?php echo isset($error['vyayam']) ? $error['vyayam'] : ''; ?>
                                        <input type="text" class="form-control" name="vyayam" value="<?php echo $res[0]['vyayam']?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Rajapujyam </label> <i class="text-danger asterik">*</i><?php echo isset($error['rajapujyam']) ? $error['rajapujyam'] : ''; ?>
                                        <input type="text" class="form-control" name="rajapujyam" value="<?php echo $res[0]['rajapujyam']?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Aavamanam</label> <i class="text-danger asterik">*</i><?php echo isset($error['aavamanam']) ? $error['aavamanam'] : ''; ?>
                                        <input type="text" class="form-control" name="aavamanam" value="<?php echo $res[0]['aavamanam']?>" />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="">Graha Dhashakalamu</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="graha_dhashakalamu" value="<?php echo $res[0]['graha_dhashakalamu']?>"  />
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
                    <input type="hidden" class="form-control" name="yearly_horoscope_variant_id[]" id="yearly_horoscope_variant_id"  value="<?= $row['id']; ?>" />
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Graha Dhashakalamu Title</label> <i class="text-danger asterik">*</i>
                            <input type="text" class="form-control" name="graha_dhashakalamu_title[]" value="<?php echo $row['graha_dhashakalamu_title'] ?>"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Graha Dhashakalamu Description</label> <i class="text-danger asterik">*</i>
                            <textarea type="text" rows="2" class="form-control" name="graha_dhashakalamu_description[]" ><?php echo $row['graha_dhashakalamu_description'] ?></textarea>
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
    <div class="row">
                               <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Title</label> <i class="text-danger asterik">*</i>
                                        <input type="text" class="form-control" name="title" value="<?php echo $res[0]['title']?>"  />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Description</label> <i class="text-danger asterik">*</i>
                                        <textarea type="text" rows="2" class="form-control" name="description"  ><?php echo $res[0]['description']?></textarea>
                                    </div>
                                </div>
								</div>
</div>
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
				$(wrapper).append('<div class="row">' +
    '<div class="col-md-4">' +
    '<div class="form-group">' +
    '<label for="graha_dhashakalamu_title">Graha Dhashakalamu Title</label>' +
    '<input type="text" class="form-control" name="insert_graha_dhashakalamu_title[]" />' +
    '</div>' +
    '</div>' +
    '<div class="col-md-6">' +
    '<div class="form-group">' +
    '<label for="graha_dhashakalamu_description">Graha Dhashakalamu Description</label>' +
    '<textarea type="text" rows="2" class="form-control" name="insert_graha_dhashakalamu_description[]"></textarea>' +
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.remove', function() {
        var variantDiv = $(this).closest('.row');
        var variantId = variantDiv.find("input[name='yearly_horoscope_variant_id[]']").val();

        if ($(this).data('id') == 'data_delete') {
            if (confirm('Are you sure? Want to delete this row')) {
                $.ajax({
                    url: 'public/db-operation.php',
                    type: "post",
                    data: { id: variantId, delete_variant: 10 },
                    success: function(result) {
                        console.log("AJAX response:", result);
                        if (result == 1) {
                            variantDiv.remove(); // Remove the variant div from the DOM
                        } else {
                            console.log("Deletion failed.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", error);
                    }
                });
            }
        } else {
            variantDiv.remove(); // Remove the variant div from the DOM
        }
    });
</script>

