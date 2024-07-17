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
        $sub_title1= $db->escapeString($_POST['sub_title1']);
        $sub_title2= $db->escapeString($_POST['sub_title2']);
      


        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($sub_title1)) {
            $error['sub_title1'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($sub_title2)) {
            $error['sub_title2'] = " <span class='label label-danger'>Required!</span>";
        }
        if (!empty($title)&& !empty($description)&& !empty($sub_title1)&& !empty($sub_title2)) {

            $sql_query = "INSERT INTO balli_sasthram (title,description,sub_title1,sub_title2)VALUES('$title','$description','$sub_title1','$sub_title2')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }
            if ($result == 1) {
                $sql = "SELECT id FROM balli_sasthram ORDER BY id DESC LIMIT 1";
                $db->sql($sql);
                $res = $db->getResult();
                $balli_sasthram_id = $res[0]['id'];
                for ($i = 0; $i < count($_POST['sub_description1']); $i++) {

                   
                    $sub_description1 = $db->escapeString(($_POST['sub_description1'][$i]));
                    $sub_description2 = $db->escapeString($_POST['sub_description2'][$i]);
                    $sql = "INSERT INTO balli_sasthram_variant (balli_sasthram_id,sub_description1,sub_description2) VALUES('$balli_sasthram_id','$sub_description1','$sub_description2')";
                    $db->sql($sql);
                    $tab_result = $db->getResult();
                }
                if (!empty($tab_result)) {
                    $tab_result = 0;
                } else {
                    $tab_result = 1;
                }
                
                $error['add_ballisasthram'] = "<section class='content-header'>
                                                <span class='label label-success'>Balli Sasthram Added Successfully</span> </section>";
            } else {
                $error['add_ballisasthram'] = " <span class='label label-danger'>Failed</span>";
            }
    }
    }
?>
<section class="content-header">
    <h1>Add Balli Sasthram<small><a href='ballisasthram.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Balli Sasthram</a></small></h1>

    <?php echo isset($error['add_ballisasthram']) ? $error['add_ballisasthram'] : ''; ?>
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
                <form name="add_ballisasthram_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                            <input type="text" class="form-control" name="title" id = "title" required>
                                    </div>
                                    <div class="col-md-8">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea  type="text" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                    <div class="col-md-4">
                                      
                                            <label for="exampleInputEmail1">Sub Title1</label> <i class="text-danger asterik"></i>
                                            <input type="text" class="form-control" name="sub_title1" required/>
  
                                    </div>
                                    <div class="col-md-4">
                                        
                                            <label for="exampleInputEmail1">Sub Title2</label> <i class="text-danger asterik"></i>
                                            <input type="text" class="form-control" name="sub_title2" required/>
                                        
                                    </div>
                                 </div>
                            </div>
                            <hr>
                            <div id="packate_div"  >
                                <div class="row">
                                 
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Sub description1</label> <i class="text-danger asterik"></i>
                                            <textarea type="text" rows="2" class="form-control" name="sub_description1[]"required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Sub description2</label> <i class="text-danger asterik"></i>
                                            <textarea type="text" rows="2" class="form-control" name="sub_description2[]" required></textarea>
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

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_sakunalu_form').validate({

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
                $(wrapper).append(
                    '<div class="row">' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label for="sub_description1">Sub Description1</label>' +
                    '<textarea type="text" rows="2" class="form-control" name="sub_description1[]"required></textarea>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label for="sub_description2">Sub Description2</label>' +
                    '<textarea type="text" rows="2" class="form-control" name="sub_description2[]"required></textarea>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-1" style="display: grid;">' +
                    '<label>Tab</label>' +
                    '<a class="remove" style="cursor:pointer;color:white;">' +
                    '<button class="btn btn-danger">Remove</button>' +
                    '</a>' +
                    '</div>' +
                    '</div>'
                );
            } else {
                alert('You Reached the limits');
            }
        });

        $(wrapper).on("click", ".remove", function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
            x--;
        });
    });
</script>


<script>
     $(document).on('change', '#grahalu_id', function() {
        $.ajax({
            url: "public/db-operation.php",
            data: "balli_sasthram_id=" + $('#balli_sasthram_id').val() + "&change_balli_sasthram=1",
            method: "POST",
            success: function(data) {
                $('#subcategory_id').html("<option value=''>---Select Subcategory---</option>" + data);
            }
        });
    });
</script>

<?php $db->disconnect(); ?>