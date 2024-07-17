<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {
        
        $poojalu_id = $db->escapeString(($_POST['poojalu_id']));
        $subcategory_id = $db->escapeString(($_POST['subcategory_id']));
        $title = $db->escapeString(($_POST['title']));
        $description = $db->escapeString(($_POST['description']));


        if (empty($poojalu_id)) {
            $error['poojalu_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($subcategory_id)) {
            $error['subcategory_id'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
     
       
       if (!empty($poojalu_id) && !empty($title)&& !empty($description)) {
         
                $sql_query = "INSERT INTO poojalu_tab (poojalu_id,subcategory_id,title,description)VALUES('$poojalu_id','$subcategory_id','$title','$description')";
                $db->sql($sql_query);
                $result = $db->getResult();
                if (!empty($result)) {
                    $result = 0;
                } else {
                    $result = 1;
                }
                if ($result == 1) {
                    $sql = "SELECT id FROM poojalu_tab ORDER BY id DESC LIMIT 1";
                    $db->sql($sql);
                    $res = $db->getResult();
                    $poojalu_tab_id = $res[0]['id'];
                    for ($i = 0; $i < count($_POST['sub_title']); $i++) {

                        $sub_title = $db->escapeString(($_POST['sub_title'][$i]));
                        $sub_description = $db->escapeString(($_POST['sub_description'][$i]));
                        $sql = "INSERT INTO poojalu_tab_variant (poojalu_tab_id,sub_title,sub_description) VALUES('$poojalu_tab_id','$sub_title','$sub_description')";
                        $db->sql($sql);
                        $tab_result = $db->getResult();
                    }
                    if (!empty($tab_result)) {
                        $tab_result = 0;
                    } else {
                        $tab_result = 1;
                    }
                    
                    $error['add_poojalu_tab'] = "<section class='content-header'>
                                                    <span class='label label-success'>Poojalu Tab Added Successfully</span> </section>";
                } else {
                    $error['add_poojalu_tab'] = " <span class='label label-danger'>Failed</span>";
                }
        }
        }
?>
<section class="content-header">
    <h1>Add Poojalu Tab<small><a href='poojalu_tab.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Poojalu Tab</a></small></h1>

    <?php echo isset($error['add_poojalu_tab']) ? $error['add_poojalu_tab'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_poojalu_tab_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label for="">Poojalu</label> <i class="text-danger asterik"></i>
                                        <select id='poojalu_id' name="poojalu_id" class='form-control' required>
                                            <option value="">--select--</option>
                                                <?php
                                                $sql = "SELECT id,name FROM `poojalu`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Sub Category</label> <i class="text-danger asterik"></i>
                                        <select id='subcategory_id' name="subcategory_id" class='form-control' >
                                            <option value="">--select subcategory--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="">Title</label> <i class="text-danger asterik"></i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                        <input type="text" class="form-control" name="title" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Description</label> <i class="text-danger asterik"></i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                        <textarea type="text" rows="2" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="packate_div"  >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Sub Title</label>
                                            <input type="text" class="form-control" name="sub_title[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Sub description</label>
                                            <textarea type="text" rows="2" class="form-control" name="sub_description[]"></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-1">
                                        <label>Tab</label>
                                        <a class="add_packate_variation" title="Add variation" style="cursor: pointer;color:white;"><button class="btn btn-warning">Add more</button></a>
                                    </div>
                                    <div id="variations">
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

            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_poojalu_tab_form').validate({

        ignore: [],
        debug: false,
        rules: {
            poojalu_id:"required",
            subcategory_id: "required",
            title:"required",
            description:"required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var max_fields = 8;
        var wrapper = $("#packate_div");
        var add_button = $(".add_packate_variation");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="sub_title">Sub Title</label>' +'<input type="text" class="form-control" name="sub_title[]" /></div></div>' + '<div class="col-md-6"><div class="form-group"><label for="sub_description">Sub description</label>'+'<textarea type="text" row="2" class="form-control" name="sub_description[]"></textarea></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div>');
            }
            else{
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".remove", function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
            x--;
        })
    });
</script>
<script>
     $(document).on('change', '#poojalu_id', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "poojalu_id=" + $('#poojalu_id').val() + "&change_poojalu=1",
            method: "POST",
            success: function(data) {
                $('#subcategory_id').html("<option value=''>---Select Subcategory---</option>" + data);
            }
        });
    });
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>