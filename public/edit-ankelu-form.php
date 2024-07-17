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
    $error = array();
    $title1= $db->escapeString($_POST['title1']);
    $title2= $db->escapeString($_POST['title2']);

    if (!empty($title1) && !empty($title2))
     { 
        $sql = "UPDATE ankelu SET title1='$title1',title2='$title2' WHERE id = '$ID'";
        $db->sql($sql);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_ankelu'] = "<section class='content-header'>
                                            <span class='label label-success'>Ankelu Updated Successfully</span> </section>";
        } else {
            $error['update_ankelu'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `ankelu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Ankelu <small><a href='ankelu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Ankelu</a></small></h1>
    <?php echo isset($error['update_ankelu']) ? $error['update_ankelu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_ankelu_form" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title 1</label> <i class="text-danger asterik">*</i><?php echo isset($error['title1']) ? $error['title1'] : ''; ?>
                                            <input type="text" class="form-control" name="title1" id = "title1" value="<?php echo $res[0]['title1']?>"required>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title2']) ? $error['title2'] : ''; ?>
                                            <input type="text" class="form-control" name="title2" id = "title2" value="<?php echo $res[0]['title2']?>"required>
                                    </div>
                                 </div>
                            </div>
                            <br>
                    </div>
                  
                    <!-- /.box-body -->

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>