<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {
        $description= $db->escapeString($_POST['description']);

   if (!empty($description)) {
     
        $sql_query = "UPDATE Yogam SET description='$description' WHERE id='$ID'";
        $db->sql($sql_query);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_yogam'] = "<section class='content-header'>
                                            <span class='label label-success'>Yogam Updated Successfully</span> </section>";
        } else {
            $error['update_yogam'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `yogam` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Yogam<small><a href='yogam.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Yogam</a></small></h1>
	<small><?php echo isset($error['update_yogam']) ? $error['update_yogam'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_gowri_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class='col-md-8'>
                                <label for="exampleInputEmail1">Description</label>
                                <textarea type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description'] ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
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