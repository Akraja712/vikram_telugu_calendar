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
    $mahabharatham= $db->escapeString($_POST['mahabharatham']);
    $title= $db->escapeString($_POST['title']);

    $sql = "UPDATE mahabharatham_menu SET mahabharatham_id='$mahabharatham',title='$title' WHERE id = '$ID'";
    $db->sql($sql);
    $result = $db->getResult();
    if (!empty($result)) {
        $error['update_mahabharatham_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['update_mahabharatham_menu'] = " <span class='label label-success'>Mahabharatham Menu Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `mahabharatham_menu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Mahabharatham Menu<small><a href='mahabharatham_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Mahabharatham Menu</a></small></h1>
    <?php echo isset($error['update_mahabharatham_menu']) ? $error['update_mahabharatham_menu'] : ''; ?>
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
                <form id="edit_mahabharatham_menu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mahabharatham</label> <i class="text-danger asterik">*</i><?php echo isset($error['mahabharatham']) ? $error['mahabharatham'] : ''; ?>
                                        <select id='mahabharatham' name="mahabharatham" class='form-control'>
                                            <?php
                                                $sql = "SELECT id,title FROM `muhurtham`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                            ?>
                                              <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['mahabharatham_id'] ? 'selected="selected"' : '';?>><?= $value['title'] ?></option>
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