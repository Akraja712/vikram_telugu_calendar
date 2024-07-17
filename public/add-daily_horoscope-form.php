<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $date = $db->escapeString(($_POST['date']));
        $rasi= $db->escapeString($_POST['rasi']);
        $title= $db->escapeString($_POST['title']);
        $description= $db->escapeString($_POST['description']);
        $title_description= $db->escapeString($_POST['title_description']);
        // $lucky_number= $db->escapeString($_POST['lucky_number']);
        // $lucky_color= $db->escapeString($_POST['lucky_color']);
        // $treatment= $db->escapeString($_POST['treatment']);
        // $health= $db->escapeString($_POST['health']);
        // $wealth= $db->escapeString($_POST['wealth']);
        // $family= $db->escapeString($_POST['family']);
        // $things_love= $db->escapeString($_POST['things_love']);
        // $profession= $db->escapeString($_POST['profession']);
        // $married_life= $db->escapeString($_POST['married_life']);
        
        if (empty($date)) {
            $error['date'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($rasi)) {
            $error['rasi'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title)) {
            $error['title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($title_description)) {
            $error['title_description'] = " <span class='label label-danger'>Required!</span>";
        }
        // if (empty($lucky_number)) {
        //     $error['lucky_number'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($lucky_color)) {
        //     $error['lucky_color'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($treatment)) {
        //     $error['treatment'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($health)) {
        //     $error['health'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($wealth)) {
        //     $error['wealth'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($family)) {
        //     $error['family'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($things_love)) {
        //     $error['things_love'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($profession)) {
        //     $error['profession'] = " <span class='label label-danger'>Required!</span>";
        // }
        // if (empty($married_life)) {
        //     $error['married_life'] = " <span class='label label-danger'>Required!</span>";
        // }
       
       
       if (!empty($date) && !empty($rasi) && !empty($description)&& !empty($title)&& !empty($title_description) ) {
         
            // $sql_query = "INSERT INTO daily_horoscope (date,rasi,description,lucky_number,lucky_color,treatment,health,wealth,family,things_love,profession,married_life)VALUES('$date','$rasi','$description','$lucky_number','$lucky_color','$treatment','$health','$wealth','$family','$things_love','$profession','$married_life')";
            $sql_query = "INSERT INTO daily_horoscope (date,rasi,description,title,title_description)VALUES('$date','$rasi','$description','$title','$title_description')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }
            if ($result == 1) {
                
                $error['add_daily_horoscope'] = "<section class='content-header'>
                                                <span class='label label-success'>Daily Horoscope Added Successfully</span> </section>";
            } else {
                $error['add_daily_horoscope'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Daily Horoscope <small><a href='daily.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Daily Horoscope</a></small></h1>

    <?php echo isset($error['add_daily_horoscope']) ? $error['add_daily_horoscope'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_daily_horoscope_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Date</label> <i class="text-danger asterik">*</i><?php echo isset($error['date']) ? $error['date'] : ''; ?>
                                            <input type="date" class="form-control" name="date" required>
                                    </div>
                                    <div class='col-md-6'>
                                        <label for="">Rasi</label> <i class="text-danger asterik">*</i>
                                        <select id='rasi' name="rasi" class='form-control' required>
                                            <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * FROM `rasi_names`";
                                                $db->sql($sql);
                                                $result = $db->getResult();
                                                foreach ($result as $value) {
                                                ?>
                                                    <option value='<?= $value['rasi'] ?>'><?= $value['rasi'] ?></option>
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
                                            <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea type="text" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Title Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['title_description']) ? $error['title_description'] : ''; ?>
                                            <input type="text" class="form-control" name="title_description" required>
                                    </div>
                                </div>
                                </div>
                            <!-- <hr>
                            <h4>Lucky for Today</h4>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lucky Number</label> <i class="text-danger asterik">*</i><?php echo isset($error['lucky_number']) ? $error['lucky_number'] : ''; ?>
                                            <input type="number" class="form-control" name="lucky_number" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Lucky Color</label> <i class="text-danger asterik">*</i><?php echo isset($error['lucky_color']) ? $error['lucky_color'] : ''; ?>
                                            <input type="text" class="form-control" name="lucky_color" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Treatment</label> <i class="text-danger asterik">*</i><?php echo isset($error['treatment']) ? $error['treatment'] : ''; ?>
                                            <input type="text" class="form-control" name="treatment" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Rating for Today</h4>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Health</label> <i class="text-danger asterik">*</i><?php echo isset($error['health']) ? $error['health'] : ''; ?>
                                            <input type="text" class="form-control" name="health" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Wealth</label> <i class="text-danger asterik">*</i><?php echo isset($error['wealth']) ? $error['wealth'] : ''; ?>
                                            <input type="text" class="form-control" name="wealth" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Family</label> <i class="text-danger asterik">*</i><?php echo isset($error['family']) ? $error['family'] : ''; ?>
                                            <input type="text" class="form-control" name="family" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-4">
                                            <label for="exampleInputEmail1">Things related to love</label> <i class="text-danger asterik">*</i><?php echo isset($error['things_love']) ? $error['things_love'] : ''; ?>
                                            <input type="text" class="form-control" name="things_love" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Profession</label> <i class="text-danger asterik">*</i><?php echo isset($error['profession']) ? $error['profession'] : ''; ?>
                                            <input type="text" class="form-control" name="profession" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Married Life</label> <i class="text-danger asterik">*</i><?php echo isset($error['married_life']) ? $error['married_life'] : ''; ?>
                                            <input type="text" class="form-control" name="married_life" required>
                                    </div>
                                </div>
                            </div>
                            <br> -->

         
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
    $('#add_daily_horoscope_form').validate({

        ignore: [],
        debug: false,
        rules: {
            date: "required",
            rasi: "required",
            title: "required",
            description: "required",
            lucky_number: "required",
            lucky_color: "required",
            treatmet: "required",
            health: "required",
            wealth: "required",
            family: "required",
            things_love: "required",
            profession: "required",
            married_life: "required",
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