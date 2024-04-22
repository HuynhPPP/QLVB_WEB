<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý văn bản</title>
    <link rel="stylesheet" href="<?=$base_url?>template/css/user/style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/user/style-common.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/user/style-detail.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/user/pagination-style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
  
  
    

        <!--Header-->
        <?php require_once('view/user/header.php')?>
        <!--Header-->
    
                
        <!-- Content -->
        <?php require_once('view/user/v_'.$view_name.'.php')?>
        <!-- Content -->

        <!--Footer-->
        <?php require_once('view/user/footer.php'); ?>
       <!--Footer-->
     
    <script src="<?=$base_url?>template/Script/script-pagination.js"></script>
    
</body>
</html>