<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?> - <?php echo DASHBOARD_NAME ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#" />
        <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
        <meta name="author" content="#" />
        <link rel="icon" href="/public/backend/img/favicon-16x16.png" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/public/backend/files/bower_components/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/public/backend/files/assets/icon/themify-icons/themify-icons.css" />
        <link rel="stylesheet" type="text/css" href="/public/backend/files/assets/icon/icofont/css/icofont.css" />
        <link href="/public/backend/plugin/toastr/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/public/backend/files/assets/css/style.css" />
        <script type="text/javascript" src="/public/backend/files/bower_components/jquery/js/jquery.min.js"></script>
        <script type="text/javascript">
            var BASE_URL = '<?php echo BASE_URL ?>';
            var SUFFIX = '<?php echo HTSUFFIX ?>';
        </script>
    </head>

    <body class="fix-menu">
        <?php 
            if(isset($template)){
                echo view($template);
            }
        ?>

        
        <script src="/public/backend/plugin/toastr/toastr.min.js"></script>
        <?php echo view('backend/dashboard/common/notification') ?>
    </body>
</html>
