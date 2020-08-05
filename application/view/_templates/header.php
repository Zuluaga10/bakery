 <!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from lethemes.net/umega/1.6/first-layout/forms-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Nov 2017 14:08:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bakery Pegaso</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/PACE/themes/blue/pace-theme-flash.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>build/images/favicon" />
    <script type="text/javascript" src="<?php echo URL; ?>plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/themify-icons/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/animo.js/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>build/css/first-layout.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>plugins/sweetalert2/sweetalert2.min.css">
    
  </head>

        <?php
              session_start();
              $Email = $_SESSION["email"];
              $UserName = $_SESSION["name"];
              $Document = $_SESSION["document"];

                    if ($_SESSION["email"] != null) {
                          
                      }else 
                      {
                        header('location: ' . URL . 'Login');
                      }
          ?>

<?php  if ($_SESSION["Rol"] == 3): ?>
  <!-- VENDEDOR (ROL 3) -->
  <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <header style="background-color: #272972">
      <div class="search-bar closed">
        <form>
          <div class="input-group input-group-lg">
            <input type="text" placeholder="Buscar por..." class="form-control"><span class="input-group-btn">
              <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
          </div>
        </form>
      </div><a href="<?php echo URL; ?>Products" class="brand pull-left"><img src="<?php echo URL; ?>build/images/logo/111.png" width="150" height="64"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="search-form pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
          </span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
      </form>
      <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
              <div class="media-left avatar"><img src="data:image/jpeg;base64,<?php echo base64_encode($Fotico);?>" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
              <div class="media-right media-middle pl-0">
                <p class="fs-12 mb-0">Hola, <?php echo $UserName; ?> </p>
              </div>
            </div></a>
          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="<?php echo URL; ?>Perfil"><i class="ti-user mr-5"></i> Mi Perfíl</a></li>
            <li><a href="<?php echo URL; ?>Configuracion"><i class="ti-settings mr-5"></i> Configuración</a></li>
            <li><a href="<?php echo URL; ?>Login/salir"><i class="ti-power-off mr-5"></i> Salir</a></li>
          </ul>
        </li>
    </header>
    <!-- Header end-->
     <div class="main-container">
      <!-- Main Sidebar start-->
       <aside style="background-image: url(<?php echo URL; ?>build/images/backgrounds/106.jpg)" class="main-sidebar mCustomScrollbar">
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-category">Menu</li>
          
          <li class="panel"><a href="<?php echo URL; ?>Home">Home</a>
          </li>

            <li class="panel"><a href="<?php echo URL; ?>Orders/Orders">Orders</a>
            <ul id="collapse7" class="list-unstyled collapse">
              
            </ul>
          </li>
         <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">Products</span></a>
            <ul id="collapse3" class="list-unstyled collapse">
              <li><a href="<?php echo URL; ?>Products">New product</a></li>
              <li><a href="<?php echo URL; ?>Products/TableProducts">Products list</a></li>
            </ul>
          </li>

           <BR><BR><BR><BR><BR><BR>

        
 
        
        </ul>
        
      </aside>
    </div>

      <!-- Main Sidebar end-->
      <div class="page-container">

        <div class="page-content container-fluid">

        <?php endif ?>

<!-- ....................................................TERMINA VENDEDOR................................. -->

  <?php  if ($_SESSION["Rol"] == 5): ?>
  <!-- CLIENTE ROL(5) -->
  <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <header style="background-color: #272972">
      <div class="search-bar closed">
        <form>
          <div class="input-group input-group-lg">
            <input type="text" placeholder="Buscar por..." class="form-control"><span class="input-group-btn">
              <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
          </div>
        </form>
      </div><a href="<?php echo URL; ?>Products" class="brand pull-left"><img src="<?php echo URL; ?>build/images/logo/111.png" width="150" height="64"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="search-form pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
          </span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
      </form>
      <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
              <div class="media-left avatar"><img src="data:image/jpeg;base64,<?php echo base64_encode($Fotico);?>" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
              <div class="media-right media-middle pl-0">
                <p class="fs-12 mb-0">Hola, <?php echo $UserName; ?> </p>
              </div>
            </div></a>
          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="<?php echo URL; ?>Perfil"><i class="ti-user mr-5"></i> Mi Perfíl</a></li>
            <li><a href="<?php echo URL; ?>Configuracion"><i class="ti-settings mr-5"></i> Configuración</a></li>
            <li><a href="<?php echo URL; ?>Login/salir"><i class="ti-power-off mr-5"></i> Salir</a></li>
          </ul>
        </li>
    </header>
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
      <aside style="background-image: url(<?php echo URL; ?>build/images/backgrounds/106.jpg)" class="main-sidebar mCustomScrollbar">
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-category">Menu</li>
          
          <li class="panel"><a href="<?php echo URL; ?>Home">Home</a>
          </li>

            <li class="panel"><a href="<?php echo URL; ?>Orders">Orders</a>
            <ul id="collapse7" class="list-unstyled collapse">
              
            </ul>
          </li>

        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">Products</span></a>
            <ul id="collapse3" class="list-unstyled collapse">
              <li><a href="<?php echo URL; ?>Products/TableProductsCustomer">Products list</a></li>
            </ul>
          </li>


          <li class="panel"><a href="<?php echo URL; ?>pay">Pay</a>
          </li>
          
          <li class="panel"><a href="<?php echo URL; ?>cart">Cart</a>
          </li>
 
        
        </ul>
        
      </aside>
    </div>


      <!-- Main Sidebar end-->
      <div class="page-container">

        <div class="page-content container-fluid">
  <?php endif ?>

<!-- ........................................FIN CLIENTE........................... -->


<!-- DUEÑO ROL(2) -->
<?php  if ($_SESSION["Rol"] == 2): ?>
 <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <header style="background-color: #272972">
      <div class="search-bar closed">
        <form>
          <div class="input-group input-group-lg">
            <input type="text" placeholder="Buscar por..." class="form-control"><span class="input-group-btn">
              <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
          </div>
        </form>
      </div><a href="<?php echo URL; ?>Products" class="brand pull-left"><img src="<?php echo URL; ?>build/images/logo/111.png" width="150" height="64"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="search-form pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
          </span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
      </form>
      <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
              <div class="media-left avatar"><img src="data:image/jpeg;base64,<?php echo base64_encode($Fotico);?>" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
              <div class="media-right media-middle pl-0">
                <p class="fs-12 mb-0">Hola, <?php echo $UserName; ?> </p>
              </div>
            </div></a>
          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="<?php echo URL; ?>Login/salir"><i class="ti-power-off mr-5"></i> Salir</a></li>
          </ul>
        </li>
    </header>
    <!-- Header end-->
     <div class="main-container">
      <!-- Main Sidebar start-->
       <aside style="background-image: url(<?php echo URL; ?>build/images/backgrounds/106.jpg)" class="main-sidebar mCustomScrollbar">
        <ul class="list-unstyled navigation mb-0">
          
          <li class="panel"><a href="<?php echo URL; ?>Home">Dashboard</a>
          </li>
          </li>

        </ul>
        
      </aside>
    </div>
    <?php endif ?>

      <!-- Main Sidebar end-->
       <div class="">

        <div class="page-content container-fluid">