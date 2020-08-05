<!DOCTYPE html>
<html lang="en" style="height: 100%">
  
<!-- Mirrored from lethemes.net/umega/1.6/first-layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Nov 2017 14:09:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="<?php echo URL; ?>plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>build/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="<?php echo URL; ?>build/images/create-icon.png" id="icon" alt="User Icon" style="width: 60px; height: 60px;" />
          </div>

          <!-- Login Form -->
          <form method="POST" action="<?php echo URL; ?>CreateUser/createNewUser">
            <input type="text" class="fadeIn second" name="username" placeholder="User name">
            <input type="text" class="fadeIn third" name="document" placeholder="Document">
            <input type="text" class="fadeIn third" name="address" placeholder="Address">
            <input type="text" class="fadeIn third" name="phone" placeholder="Phone">
            <label for="ddlStatus">Document type</label>
                      <select class="form-control" name="documenttype">
                       <option value=""></option>
                       <?php foreach ($Datos as $value): ?>
                        <option value="<?= $value['documentTypeId'];?>"><?= $value['documentTypeName'];?></option>
                      <?php endforeach?>
                      </select>
            <input type="text" class="fadeIn third" name="email" placeholder="E-mail">
            <input type="text" class="fadeIn third" name="pass" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Create user">
          </form>
        </div>
      </div>
    <!-- Scripts -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- jQuery-->
    <script type="text/javascript" src="<?php echo URL; ?>plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="<?php echo URL; ?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="<?php echo URL; ?>build/js/first-layout/extra-demo.js"></script>
  </body>

<!-- Mirrored from lethemes.net/umega/1.6/first-layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Nov 2017 14:09:19 GMT -->
</html>