<?php include_once('includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");

include('includes/variables.php');
include_once('includes/custom-functions.php');
include_once('includes/functions.php');
$fn = new custom_functions;

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/ico" href="dist/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/custom.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link href="dist/css/multiple-select.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="plugins/select2/select2.min.css">-->
    <!--	 <link rel="stylesheet" href="plugins/select2/select2.min.css">=
        <link rel="stylesheet" href="plugins/select2/select2.css">-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart 
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha256-2kJr1Z0C1y5z0jnhr/mCu46J3R6Uud+qCQHA39i1eYo=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha256-CgrKEb54KXipsoTitWV+7z/CVYrQ0ZagFB3JOvq2yjo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var date = new Date();
            var currentMonth = date.getMonth() - 10;
            var currentDate = date.getDate();
            var currentYear = date.getFullYear() - 10;

            $('.datepicker').datepicker({
                minDate: new Date(currentYear, currentMonth, currentDate),
                dateFormat: 'yy-mm-dd',
            });
        });
    </script>
    <script language="javascript">
        function printpage() {
            window.print();
        }
    </script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/filter-control/bootstrap-table-filter-control.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>

    <!--styleing input -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="home.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <h3>Vikram Telugu Calendar</h3>
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="images/avatar.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Admin</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="images/avatar.png" class="img-circle" alt="User Image">
                                        <p>
                                            Admin
                                            <small>admin@gmail.com</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <!-- <div class="pull-left">
                                            <a href="admin-profile.php" class="btn btn-default btn-flat"> Edit Profile</a>
                                        </div> -->
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                                        </div>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                </ul>
                            </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="home.php">
                        <i class="fa fa-home" class="active"></i> <span>Home</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Main Panchangam Menu</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                <li class="treeview">
                    <a href="panchangam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Panchangam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="month_panchangam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Monthly Panchangam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Festivals</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        
                          <li><a href="month_festivals.php"><i class="fa fa-angle-right"></i>Month Festivals</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="holidays.php">
                        <i class="fa fa-calendar"></i>
                        <span>Holidays</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="important_days.php">
                        <i class="fa fa-calendar"></i>
                        <span>Important Days</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Horoscope</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="daily.php"><i class="fa fa-angle-right"></i>Daily</a></li>
                        <li><a href="weekly.php"><i class="fa fa-angle-right"></i>Weekly</a></li>
                        <li><a href="monthly.php"><i class="fa fa-angle-right"></i>Monthly</a></li>
                        <li><a href="yearly.php"><i class="fa fa-angle-right"></i>Yearly</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="child_birth.php">
                        <i class="fa fa-calendar"></i>
                        <span>Child Birth Muhurtham</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="karthi_vrusti.php">
                        <i class="fa fa-calendar"></i>
                        <span>Karthi Vrusti</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="subha_muhurtham.php">
                        <i class="fa fa-calendar"></i>
                        <span>Subha Muhurthamulu</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="gowri.php">
                        <i class="fa fa-calendar"></i>
                        <span>Gowri Panchangam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="horachakram.php">
                        <i class="fa fa-calendar"></i>
                        <span>Hora Chakram</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="bhargava_panchangam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Bhargava Panchangam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="abdhikam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Abdhikam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="moudya_dhinam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Moudya Dhinamulu </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="grahanam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Grahanam</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="nava_graha_pravesham.php">
                        <i class="fa fa-calendar"></i>
                        <span>Nava Graha Pravesham</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="rahu_yamagandam.php">
                        <i class="fa fa-calendar"></i>
                        <span>Rahu Yamagandam</span>
                    </a>
                </li> 
                </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Audio's & Live</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                <li class="treeview">
                    <a href="audio.php">
                        <i class="fa fa-headphones"></i>
                        <span>Audio</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="other_music.php">
                        <i class="fa fa-music"></i>
                        <span>Other Music</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="video.php">
                        <i class="fa fa-play"></i>
                        <span>Video</span>
                    </a>
                </li>
                </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Bakthini Chatudham</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                <li class="treeview">
                    <a href="image-category.php">
                        <i class="fa fa-calendar"></i>
                        <span>Image Category</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="images.php">
                        <i class="fa fa-calendar"></i>
                        <span>Images</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="video-category.php">
                        <i class="fa fa-calendar"></i>
                        <span>Video Category</span>
                    </a>
                </li>   
                <li class="treeview">
                    <a href="video-post.php">
                        <i class="fa fa-calendar"></i>
                        <span>Video Post</span>
                    </a>
                </li> 
                </ul>
                </li>
              
                <li class="treeview">
                    <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                        <span> Temples & Festivals info</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="neti_articles.php"><i class="fa fa-angle-right"></i>Temples</a></li>
                        <li><a href="old_articles.php"><i class="fa fa-angle-right"></i>Festivals info</a></li>

                    </ul>
                </li>
           
                <li class="treeview">
                    <a href="feedback.php">
                        <i class="fa fa-bell"></i>
                        <span>Feedback</span>
                    </a>
                </li>  
            </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
</body>

</html>