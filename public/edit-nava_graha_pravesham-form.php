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

	$title = $db->escapeString(($_POST['title']));
	$name= $db->escapeString($_POST['name']);
	$description= $db->escapeString($_POST['description']);
	$year= $db->escapeString($_POST['year']);
	$error = array();
   
   
	if (!empty($title) && !empty($name) && !empty($description) ) {

			$sql_query = "UPDATE nava_graha_pravesham SET title='$title',name='$name',description='$description',year='$year' WHERE id =$ID";
			$db->sql($sql_query);
			 $res = $db->getResult();
             $uptitle_result = $db->getResult();
			if (!empty($uptitle_result)) {
				$uptitle_result = 0;
			} else {
				$uptitle_result = 1;
			}

			// check uptitle result
			if ($uptitle_result == 1) {
				
			$error['update_nava_graha_pravesham'] = " <section class='content-header'><span class='label label-success'>Nava Graha Pravesham Updated Successfully</span></section>";
			} else {
				$error['update_nava_graha_pravesham'] = " <span class='label label-danger'>Failed to uptitle</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM nava_graha_pravesham WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "nava_graha_pravesham.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Nava Graha Pravesham<small><a href='nava_graha_pravesham.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Nava Graha Pravesham</a></small></h1>
	<small><?php echo isset($error['update_nava_graha_pravesham']) ? $error['update_nava_graha_pravesham'] : ''; ?></small>
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
				<form id="edit_nava_graha_pravesham_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
				        	<div class="row">
                                <div class="form-group">
								<div class='col-md-6'>
                                        <label for="">Year</label> <i class="text-danger asterik">*</i>
                                        <select id='year' name="year" class='form-control' required>
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
                                    <div class='col-md-6'>
                                        <label for="">Nava Graham</label> <i class="text-danger asterik">*</i>
                                        <select id='name' name="name" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `nava_grahams`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
													 <option value='<?= $value['name'] ?>' <?= $value['name']==$res[0]['name'] ? 'selected="selected"' : '';?>><?= $value['name'] ?></option>
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
                                            <input type="title" class="form-control" name="title" value="<?php echo $res[0]['title']; ?>">
                                    </div>
								</div>
							</div>
							<br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description'] ?></textarea>
                                    </div>
                                </div>
                            </div> 
						
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
