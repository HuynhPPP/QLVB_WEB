<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link
          href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
          rel="stylesheet"
      >
    <link rel="stylesheet" href="<?=$base_url?>template/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/style-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <!--- CONTENT -->
    <div class="main-content-right">
    <?php require_once('view/admin/v_'.$view_name.'.php')?>
    </div>
    <!--- CONTENT -->


    <!--NAVBAR-->
    <?php require_once('view/admin/navbar.php')?>
    <!--NAVBAR-->
    
   
   
    
    <script src="<?=$base_url?>template/Script/script-pagination.js"></script>
    
    
</body>
</html>