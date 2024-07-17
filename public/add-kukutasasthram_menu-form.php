<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);
        $star= $db->escapeString($_POST['star']);
        $winning= $db->escapeString($_POST['winning']);
        $lossing= $db->escapeString($_POST['lossing']);

        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($star)) {
            $error['star'] = " <span class='label label-danger'>Required!</span>";
        } 
        if (empty($winning)) {
            $error['winning'] = " <span class='label label-danger'>Required!</span>";
        }
         if (empty($lossing)) {
            $error['lossing'] = " <span class='label label-danger'>Required!</span>";
        }

       if (!empty($title) && !empty($description) && !empty($star)&& !empty($winning)&& !empty($lossing)) {
         
            $sql_query = "INSERT INTO kukutasasthram_menu (title,description,star,winning,lossing)VALUES('$title','$description','$star','$winning','$lossing')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Kukutasasthram Menu Added Successfully</span> </section>";
            } else {
                $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Kukutasasthram Menu<small><a href='kukutasasthram_menu.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Kukuta Sasthram Menu</a></small></h1>

    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_kukutasasthram_menu_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title" required>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Star</label> <i class="text-danger asterik">*</i><?php echo isset($error['star']) ? $error['star'] : ''; ?>
                                            <input type="text" class="form-control" name="star" id = "star" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Winning</label> <i class="text-danger asterik">*</i><?php echo isset($error['winning']) ? $error['winning'] : ''; ?>
                                            <input type="text" class="form-control" name="winning" id = "winning" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lossing</label> <i class="text-danger asterik">*</i><?php echo isset($error['lossing']) ? $error['lossing'] : ''; ?>
                                            <input type="text" class="form-control" name="lossing" id = "lossing" required>
                                    </div>
                                </div>
                            </div>

         
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
                    </div>

                </form>

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_kukutasasthram_menu_form').validate({

        ignore: [],
        debug: false,
        rules: {
            title: "required",
            description: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>