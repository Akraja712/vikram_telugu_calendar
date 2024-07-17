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
    $title= $db->escapeString($_POST['title']);
    $description= $db->escapeString($_POST['description']);
    if (!empty($title) && !empty($description))
     { 
        $sql = "UPDATE pushpalu SET title='$title',description='$description' WHERE id = '$ID'";
        $db->sql($sql);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_pushpalu'] = "<section class='content-header'>
                                            <span class='label label-success'>Pushpalu Updated Successfully</span> </section>";
        } else {
            $error['update_pushpalu'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `pushpalu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Pushpalu <small><a href='pushpalu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Pushpalu</a></small></h1>
    <?php echo isset($error['update_pushpalu']) ? $error['update_pushpalu'] : ''; ?>
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
                <form id="edit_pushpalu_form" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title" value="<?php echo $res[0]['title']?>"required>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description"><?php echo $res[0]['description']?></textarea>
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