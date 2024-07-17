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
	$festival= $db->escapeString($_POST['festival']);
	
	
	if (empty($date)) {
		$error['date'] = " <span class='label label-danger'>Required!</span>";
	}
	if (empty($festival)) {
		$error['festival'] = " <span class='label label-danger'>Required!</span>";
	}

   
   
   if (!empty($date) && !empty($festival))
    {
             $sql_query = "UPDATE festivals SET date='$date',festival='$festival' WHERE id =  $ID";
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
				
			$error['update_festival'] = " <section class='content-header'><span class='label label-success'>Festival updated Successfully</span></section>";
			} else {
				$error['update_festival'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM festivals WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "festivals.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Festival<small><a href='festivals.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Festival</a></small></h1>
	<small><?php echo isset($error['update_festival']) ? $error['update_festival'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-6">
		
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
									<div class='col-md-12'>
									          <label for="exampleInputEmail1">Date</label> <i class="text-danger asterik">*</i>
											  <input type="date" class="form-control" name="date" value="<?php echo $res[0]['date']; ?>">

									</div>
								</div>
						   </div>
						   <br>
						   <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                            <label for="exampleInputEmail1">Festival</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="3" class="form-control" name="festival"><?php echo $res[0]['festival']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>		   
						
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
