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
    $telugu_sethakamulu= $db->escapeString($_POST['telugu_sethakamulu']);
    $title= $db->escapeString($_POST['title']);

    $sql = "UPDATE telugu_sethakamulu_menu SET telugu_sethakamulu_id='$telugu_sethakamulu',title='$title' WHERE id = '$ID'";
    $db->sql($sql);
    $result = $db->getResult();
    if (!empty($result)) {
        $error['update_telugu_sethakamulu_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['update_telugu_sethakamulu_menu'] = " <span class='label label-success'>Telugu Sethakamulu Menu Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `telugu_sethakamulu_menu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Telugu Sethakamulu  Menu<small><a href='telugu_sethakamulu_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Telugu Sethakamulu  Menu</a></small></h1>
    <?php echo isset($error['update_telugu_sethakamulu_menu']) ? $error['update_telugu_sethakamulu_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_ramaynam_menu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Telugu Sethakamulu </label> <i class="text-danger asterik">*</i><?php echo isset($error['telugu_sethakamulu']) ? $error['telugu_sethakamulu'] : ''; ?>
                                        <select id='telugu_sethakamulu' name="telugu_sethakamulu" class='form-control'>
                                            <?php
                                                $sql = "SELECT id,title FROM `telugu_sethakamulu`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                            ?>
                                              <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['telugu_sethakamulu_id'] ? 'selected="selected"' : '';?>><?= $value['title'] ?></option>
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
                                            <input type="text" class="form-control" name="title" id = "title" value="<?php echo $res[0]['title']?>"required>
                                    </div>
                                </div>
                            </div>
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