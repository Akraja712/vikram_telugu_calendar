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
    $star= $db->escapeString($_POST['star']);
    $winning= $db->escapeString($_POST['winning']);
    $lossing= $db->escapeString($_POST['lossing']);

    if (!empty($title) && !empty($description) && !empty($star)&& !empty($winning)&& !empty($lossing))
     { 
        $sql = "UPDATE kukutasasthram_menu SET title='$title',description='$description',star='$star',winning='$winning',lossing='$lossing' WHERE id = '$ID'";
        $db->sql($sql);
        $result = $db->getResult();
        if (!empty($result)) {
            $result = 0;
        } else {
            $result = 1;
        }

        if ($result == 1) {
            
            $error['update_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>Kukuta Sasthram Menu Updated Successfully</span> </section>";
        } else {
            $error['update_menu'] = " <span class='label label-danger'>Failed</span>";
        }
        }
    }

$data = array();

$sql_query = "SELECT * FROM `kukutasasthram_menu` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();

?>
<section class="content-header">
    <h1>Edit Kukuta Sasthram Menu <small><a href='kukutasasthram_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Kukuta Sasthram Menu</a></small></h1>
    <?php echo isset($error['update_menu']) ? $error['update_menu'] : ''; ?>
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
                <form id="edit_kukutasasthram_menu_form" method="post" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Star</label> <i class="text-danger asterik">*</i><?php echo isset($error['star']) ? $error['star'] : ''; ?>
                                            <input type="text" class="form-control" name="star"  value="<?php echo $res[0]['star']?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Winning</label> <i class="text-danger asterik">*</i><?php echo isset($error['winning']) ? $error['winning'] : ''; ?>
                                            <input type="text" class="form-control" name="winning"  value="<?php echo $res[0]['winning']?>">
                                    </div> 
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lossing</label> <i class="text-danger asterik">*</i><?php echo isset($error['lossing']) ? $error['lossing'] : ''; ?>
                                            <input type="text" class="form-control" name="lossing"  value="<?php echo $res[0]['lossing']?>">
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