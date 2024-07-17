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
    $bhagawath_geetha= $db->escapeString($_POST['bhagawath_geetha']);
    $title= $db->escapeString($_POST['title']);

    $sql = "UPDATE bhagawath_geetha_menu SET bhagawath_geetha_id='$bhagawath_geetha',title='$title' WHERE id = '$ID'";
    $db->sql($sql);
    $result = $db->getResult();
    if (!empty($result)) {
        $error['update_bhagawath_geetha_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['update_bhagawath_geetha_menu'] = " <span class='label label-success'>Bhagawath Geetha Menu Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `bhagawath_geetha_menu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Bhagawath Geetha Menu<small><a href='bhagawath_geetha_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Bhagawath Geetha Menu</a></small></h1>
    <?php echo isset($error['update_bhagawath_geetha_menu']) ? $error['update_bhagawath_geetha_menu'] : ''; ?>
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
                <form id="edit_bhagawath_geetha_menu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Bhagawath Geetha</label> <i class="text-danger asterik">*</i><?php echo isset($error['bhagawath_geetha']) ? $error['bhagawath_geetha'] : ''; ?>
                                        <select id='bhagawath_geetha' name="bhagawath_geetha" class='form-control'>
                                            <?php
                                                $sql = "SELECT id,title FROM `bhagawath_geetha`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                            ?>
                                              <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['bhagawath_geetha_id'] ? 'selected="selected"' : '';?>><?= $value['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
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