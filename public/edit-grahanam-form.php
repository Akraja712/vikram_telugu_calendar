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
        $title= $db->escapeString($_POST['title']);
        $error = array();

    if (!empty($description) && !empty($title)) {
     
        $sql_query = "UPDATE grahanam SET title='$title',description='$description' WHERE id='$ID'";
        $db->sql($sql_query);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_grahanam'] = "<section class='content-header'>
                                            <span class='label label-success'>Grahanam Updated Successfully</span> </section>";
        } else {
            $error['update_grahanam'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `grahanam` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
	<h1>
		Edit Grahanam<small><a href='grahanam.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Grahanam</a></small></h1>
	<small><?php echo isset($error['update_grahanam']) ? $error['update_grahanam'] : ''; ?></small>
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
                <form id='edit_grahanam_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                       <div class="row">
                            <div class='col-md-6'>
                                    <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
                                    <input type="text" class="form-control" name="title" value="<?php echo $res[0]['title'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class='col-md-8'>
                                <label for="exampleInputEmail1">Description</label><i class="text-danger asterik">*</i>
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