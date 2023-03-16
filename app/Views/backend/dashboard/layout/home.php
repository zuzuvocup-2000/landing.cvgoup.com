<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Danh sách tài khoản - <?php echo DASHBOARD_NAME ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#" />
        <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
        <meta name="author" content="#" />
        <link rel="icon" href="{{ASSET_BACKEND}}/files/assets/images/favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" />
        <?php
            $css = [
                ASSET_BACKEND.'files/bower_components/bootstrap/css/bootstrap.min.css',
                ASSET_BACKEND.'files/assets/icon/feather/css/feather.css',
                ASSET_BACKEND.'files/assets/icon/font-awesome/css/font-awesome.min.css',
                ASSET_BACKEND.'files/assets/css/style.css',
                ASSET_BACKEND.'files/assets/css/jquery.mCustomScrollbar.css',
            ];

            foreach($css as $key => $val){
                echo '<link href="'.$val.'" rel="stylesheet">';
            } 
        ?>

        <script type="text/javascript" src="/public/backend/files/bower_components/jquery/js/jquery.min.js"></script>
        <script type="text/javascript">
            var BASE_URL = '<?php echo BASE_URL ?>';
            var SUFFIX = '<?php echo HTSUFFIX ?>';
        </script>
    </head>

    <body>
        <?php echo view('backend/dashboard/common/loading') ?>
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <?php echo view('backend/dashboard/common/nav') ?>

                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <?php echo view('backend/dashboard/common/sidebar') ?>
                        <?php 
                            if($template){
                                echo view($template);
                            }
                        ?>
                        
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>




        <?php  
            $script = [
                ASSET_BACKEND.'files/bower_components/jquery-ui/js/jquery-ui.min.js',
                ASSET_BACKEND.'files/bower_components/popper.js/js/popper.min.js',
                ASSET_BACKEND.'files/bower_components/bootstrap/js/bootstrap.min.js',
                ASSET_BACKEND.'files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
                ASSET_BACKEND.'files/bower_components/modernizr/js/modernizr.js',
                ASSET_BACKEND.'files/bower_components/chart.js/js/Chart.js',
                ASSET_BACKEND.'files/assets/pages/widget/amchart/amcharts.js',
                ASSET_BACKEND.'files/assets/pages/widget/amchart/serial.js',
                ASSET_BACKEND.'files/assets/pages/widget/amchart/light.js',
                // ASSET_BACKEND.'files/assets/js/jquery.mCustomScrollbar.concat.min.js',
                ASSET_BACKEND.'files/assets/js/SmoothScroll.js',
                ASSET_BACKEND.'files/assets/js/pcoded.min.js',
                ASSET_BACKEND.'files/assets/js/vartical-layout.min.js',
                ASSET_BACKEND.'files/assets/js/script.min.js',
                ASSET_BACKEND.'library.js',
            ];
            if(isset($module) && !empty($module)){
                if(file_exists('public/backend/libraries/'.$module.'.js')){
                    $script[] = ASSET_BACKEND.'libraries/'.$module.'.js';
                }
            }
        ?>
        <?php foreach($script as $key => $val){
            echo '
            <script src="'.$val.'"></script>
            ';
        } ?>
        
    </body>
</html>
