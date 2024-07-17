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
    $bhagawatham_id= $db->escapeString($_POST['bhagawatham_id']);
    $bhagawatham_menu_id= $db->escapeString($_POST['bhagawatham_menu_id']);
    $title= $db->escapeString($_POST['title']);
    $description= $db->escapeString($_POST['description']);


    $sql = "UPDATE bhagawatham_submenu SET bhagawatham_id='$bhagawatham_id',bhagawatham_menu_id='$bhagawatham_menu_id',title='$title',description='$description' WHERE id = '$ID'";
    $db->sql($sql);
    $result = $db->getResult();
    if (!empty($result)) {
        $error['update_bhagawatham_submenu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['update_bhagawatham_submenu'] = " <span class='label label-success'>Bhagawatham Submenu Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `bhagawatham_submenu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Bhagawatham Submenu<small><a href='bhagawatham_submenu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Bhagawatham Submenu</a></small></h1>
    <?php echo isset($error['update_bhagawatham_submenu']) ? $error['update_bhagawatham_submenu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id="edit_bhagawatham_submenu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Bhagawatham</label> <i class="text-danger asterik">*</i><?php echo isset($error['bhagawatham_id']) ? $error['bhagawatham_id'] : ''; ?>
                                        <select id='bhagawatham_id' name="bhagawatham_id" class='form-control'>
                                            <?php
                                                $sql = "SELECT id,title FROM `bhagawatham`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                            ?>
                                              <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['bhagawatham_id'] ? 'selected="selected"' : '';?>><?= $value['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Bhagawatham Menu</label> <i class="text-danger asterik">*</i><?php echo isset($error['bhagawatham_menu_id']) ? $error['bhagawatham_menu_id'] : ''; ?>
                                        <select id='bhagawatham_menu_id' name="bhagawatham_menu_id" class='form-control'>
                                            <?php
                                                $sql = "SELECT id,title FROM `bhagawatham_menu`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                            ?>
                                              <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['bhagawatham_menu_id'] ? 'selected="selected"' : '';?>><?= $value['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title" value="<?php echo $res[0]['title']?>">
                                     </div>
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description" ><?php echo $res[0]['description']?></textarea>
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
<script>
       $(document).on('change', '#bhagawatham_id', function() {
        $.ajax({
            url: 'public/db-operation.php',
            method: 'POST',
            data: 'bhagawatham_id=' + $('#bhagawatham_id').val() + '&find_bhagawatham_menu=1',
            success: function(data) {
                $('#bhagawatham_menu_id').html("<option value=''>---Select bhagawatham Menu---</option>" + data);
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>