<?php 
session_start();
include '../conexion/conexion.php';


//validacion para mostrar opciones en el panel si la validacion ==1 entonces se vera de lo contrario se ocultara
if ($_SESSION['dashboard']==1) {
	$dasboard='display:block;';
}elseif($_SESSION['dashboard']==2){
	$dasboard='display:none;';
}

if ($_SESSION['reporteCliente']==1) {
	$reporteCliente='display:block;';
}else{
	$reporteCliente='display:none;';
}


if ($_SESSION['ingresoFacturas']==1) {
	$ingresoFacturas='display:block;';
}else{
	$ingresoFacturas='display:none;';
}


if ($_SESSION['ingresoExtras']==1) {
	$ingresoExtras='display:block;';
}else{
	$ingresoExtras='display:none;';
}


if ($_SESSION['ingresoPago']==1) {
	$ingresoPagos='display:block;';
}else{
	$ingresoPagos='display:none;';
}


if ($_SESSION['pendientesPago']==1) {
	$pendientesPago='display:block;';
}else{
	$pendientesPago='display:none;';
}


if ($_SESSION['clienteyUsuarios']==1) {
	$clienteyUsuarios='display:block;';
}else{
	$clienteyUsuarios='display:none;';
}

if ($_SESSION['empresas']==1) {
	$empresas='display:block;';
}else{
	$empresas='display:none;';
}


if ($_SESSION['serviciosyPaquetes']==1) {
	$serviciosyPaquetes='display:block;';
}else{
	$serviciosyPaquetes='display:none;';
}

if ($_SESSION['privilegios']==1) {
	$privilegios='display:block;';
}else{
	$privilegios='display:none;';
}


if ($_SESSION['archivos']==1) {
	$archivos='display:block;';
}else{
	$archivos='display:none;';
}



//consultamos clientes 
$q1 = ("SELECT * FROM empresa where estado=1");
      $buscarEmpresa = $dbConn->prepare($q1);
      $buscarEmpresa->execute();



?>

<!DOCTYPE html>
<html>
<head>
	<title>Empresas- <?php echo $_SESSION['nombre']; ?></title>
	<link  rel="icon"   href="../img/logo.ico" type="image/ico" />
	    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Compiled and minified JQUERY -->
    <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>

</head>
<body>
	

	

</body>


</html>




<!DOCTYPE html>
<html lang="es">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Master Office</title>
    <!-- Favicons-->
    <link  rel="icon"   href="../img/logo.ico" type="image/ico" />
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="../css//materialize.css" type="text/css" rel="stylesheet">
    <link href="../css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="../css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="../vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">

  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color" style="background-color: #22088D;">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="panelControl.php" class="brand-logo darken-1" >
                    <img src="../img/logo2.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">Officient</span>
                  </a>
                </h1>
              </li>
            </ul>
           
            <ul class="right hide-on-med-and-down">
              
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">5</small>
                  </i>
                </a>
              </li>
             
              <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>
            </ul>
            <!-- translation-button -->
            
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Lock</a>
              </li>
              <li>
                <a href="../controller/logout.php" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details darken-2" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="../img/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown-nav" class="dropdown-content">
                    <li>
                      <a href="perfil.php" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Pefil</a>
                    </li>
                    
                    <li>
                      <a href="../controller/logout.php" class="grey-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i>Salir</a>
                    </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal"><?php echo $_SESSION['rolInicial']; ?></p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold" style="<?php echo $dasboard; ?>">
                  <a href="panelControl.php" class="waves-effect waves-cyan">
                      <i class="material-icons">pie_chart_outlined</i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $reporteCliente; ?>">
                  <a href="reporteCliente.php" class="waves-effect waves-cyan">
                      <i class="material-icons">trending_up</i>
                      <span class="nav-text">Reporte Cliente</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $ingresoFacturas; ?>">
                  <a href="ingresoFacturas.php" class="waves-effect waves-cyan">
                      <i class="material-icons">add_shopping_cart</i>
                      <span class="nav-text">Ingreso Facturas</span>
                    </a>
                </li>
                 <li class="bold" style="<?php echo $ingresoExtras; ?>">
                  <a href="ingresoExtras.php" class="waves-effect waves-cyan">
                      <i class="material-icons">add_shopping_cart</i>
                      <span class="nav-text">Ingreso Extras</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $ingresoPagos; ?>">
                  <a href="ingresoPagos.php" class="waves-effect waves-cyan">
                      <i class="material-icons">attach_money</i>
                      <span class="nav-text">Ingreso Pagos</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $pendientesPagos; ?>">
                  <a href="pendientesPagos.php" class="waves-effect waves-cyan">
                      <i class="material-icons">event_busy</i>
                      <span class="nav-text">Pendientes Pago</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $clienteyUsuarios; ?>">
                  <a href="clientesyUsuarios.php" class="waves-effect waves-cyan">
                      <i class="material-icons">person_pin</i>
                      <span class="nav-text">Clientes & Usuarios</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $empresas; ?>">
                  <a href="empresas.php" class="waves-effect waves-cyan">
                      <i class="material-icons">work</i>
                      <span class="nav-text">Empresas</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $serviciosyPaquetes; ?>">
                  <a href="serviciosyPaquetes.php" class="waves-effect waves-cyan">
                      <i class="material-icons">redeem</i>
                      <span class="nav-text">Servicios & paquetes</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $privilegios; ?>">
                  <a href="privilegios.php" class="waves-effect waves-cyan">
                    <i class="material-icons">phonelink_lock</i>
                    <span class="nav-text">Privilegios</span>
                  </a>
                </li>

                <li class="bold" style="<?php echo $archivos; ?>">
                  <a href="archivo.php" class="waves-effect waves-cyan">
                    <i class="material-icons">save</i>
                    <span class="nav-text">Archivo</span>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">


          
              <div class="row">

           <div class="col s12 m12 l12">


                  <ul id="projects-collection" class="collection z-depth-1" style="margin-top: 30px;">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">location_city</i>
                      <h6 class="collection-header m-0">Empresas</h6>
                      <p class="col s5 m5 l5">Listado</p>
                      <div class="col s6 m6 l6"><a class="btn-floating btn-large waves-effect cyan lighten-2 modal-trigger" href="#modal1"><i class="material-icons" onclick="modalCrearEmpresa();">add</i></a></div>
                    </li>

                    <li id="tablaEmpresa" class="scrollspy" style="overflow-x: scroll;">
                      
                    </li>
                  </ul>
                </div>
              </div>
           


 <!-- Modal para insertar inicio -->
                      <div id="modal1" class="modal">
                        <div class="modal-content">
                          <div class="col s12 m12 l12">
                            <h5>Crear una nueva empresa </h5>
                        <form id="insertPrivilegios" >
                          <input type="text" name="accionEjecutar" id="accionEjecutar" value="1" style="display: none;">
                           <div class="row">
                             <div class="input-field col s12 m12 l12 ">
                              <input id="txtRazonSocial" name="txtRazonSocial" type="text">
                              <label for="first_name">Razon Social</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtDireccionFiscal" name="txtDireccionFiscal" type="text">
                              <label for="first_name">Dirección Fisca</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtNit" name="txtNit" type="text">
                              <label for="first_name">Nit</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtNombreCliente" name="txtNombreCliente" type="text">
                              <label for="first_name">Nombre Cliente</label>
                            </div>
                          </div>

                           <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtTelefono" name="txtTelefono" type="number">
                              <label for="first_name">Teléfono</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtPbx" name="txtPbx" type="number">
                              <label for="first_name">PBX</label>
                            </div>
                          </div>
                            <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtFechaCorte" name="txtFechaCorte" type="date" >
                              <label for="first_name">Fecha Corte</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtPeriodo" name="txtPeriodo" type="number" >
                              <label for="first_name">Periodo 1=mensual,2=bimensual,3=trimestral hasta 12=anual</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtDeposito" name="txtDeposito" type="number" >
                              <label for="first_name">Deposito</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtEstado" name="txtEstado" type="number" >
                              <label for="first_name">Estado  1=activo, 2=Inactivo</label>
                            </div>
                          </div>

                         <div class="row">
                             <div class="input-field col s12">
                                  <select name="txtPaquete">
                                    <option value="" disabled selected>Seleccione Paquete</option>
                                    <?php 
                                      $query2 = ("SELECT * FROM paquete");
                                      $buscarPaquetes1 = $dbConn->prepare($query2);
                                      $buscarPaquetes1->execute(); 
                                        while ($paquete2=$buscarPaquetes1->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <option value="<?php echo $paquete2['idpaquete']; ?>"><?php echo $paquete2['nombrePaquete']; ?></option>
                                   <?php } ?>
                                  </select>
                                  <label>Paquetes</label>
                                  <a class="waves-effect blue btn" href="serviciosyPaquetes.php" target="_blank">Ver Paquetes</a>
                                </div>
                          </div>



                          <div class="row">
                            <div class="row">
                              <div class="input-field col s8 m8 l8 left">
                                <a class="modal-close btn waves-effect  indigo darken-4 right" onclick="insertarDatos11();">Guardar
                                  <i class="material-icons right">send</i>
                                </a>
                              </div>
                              <div class="col s1 m1 l1"></div>
                              <div class="input-field col s3 m3 l3">
                                <a href="#!" class="modal-close btn waves-effect waves-light right">Cerra
                                  <i class="material-icons right">close</i>
                                </a>
                               
                              </div>
                            </div>
                          </div>
                        </form>



                  </div>
                </div>
              </div>
             <!-- Modal para insertar fin  -->


<!-- Modal para actualizar inicio -->
                      <div id="modal2" class="modal">
                        <div class="modal-content">
                          <div class="col s12 m12 l12">
                            <h5>Editar Empresa</h5>
                        <form id="actualizarEmpresas" >
                          
                          <input type="text" name="idActualizar" id="idActualizar" value="" style="display: none;">
                          <input type="text" name="accionEjecutar" id="accionEjecutar" value="2" style="display: none;">
                           <div class="row">
                             <div class="input-field col s12 m12 l12 ">
                              <input id="modRazonSocial" name="modRazonSocial" type="text" autofocus>
                              <label for="first_name">Razon Social</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modDireccionFiscal" name="modDireccionFiscal" type="text" autofocus>
                              <label for="first_name">Dirección Fisca</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modNit" name="modNit" type="text" autofocus>
                              <label for="first_name">Nit</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modNombreCliente" name="modNombreCliente" type="text" autofocus>
                              <label for="first_name">Nombre Cliente</label>
                            </div>
                          </div>

                           <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modTelefono" name="modTelefono" type="number" autofocus>
                              <label for="first_name">Teléfono</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modPbx" name="modPbx" type="number" autofocus>
                              <label for="first_name">PBX</label>
                            </div>
                          </div>
                            <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modFechaCorte" name="modFechaCorte"  type="text" autofocus >
                              <label for="first_name">Fecha Corte</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modPeriodo" name="modPeriodo" type="number" autofocus >
                              <label for="first_name">Periodo 1=mensual,2=bimensual,3=trimestral hasta 12=anual</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modDeposito" name="modDeposito" type="number" autofocus>
                              <label for="first_name">Deposito</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modEstado" name="modEstado" type="number" autofocus>
                              <label for="first_name">Estado  1=activo , 2=inactivo, 3=ocacional, 4=suspendido, 5=fraude</label>
                            </div>
                          </div>

                          <div class="row">
                             <div class="input-field col s12">
                                  <select name="modPaquete">
                                    <option value="" disabled selected>Seleccione Paquete</option>
                                    <?php 
                                      $query1 = ("SELECT * FROM paquete");
                                      $buscarPaquetes = $dbConn->prepare($query1);
                                      $buscarPaquetes->execute(); 
                                        while ($paquete=$buscarPaquetes->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <option value="<?php echo $paquete['idpaquete']; ?>"><?php echo $paquete['nombrePaquete']; ?></option>
                                   <?php } ?>
                                  </select>
                                  <label>Paquetes</label>
                                  <a class="waves-effect blue btn" href="serviciosyPaquetes.php" target="_blank">Ver Paquetes</a>
                                </div>
                          </div>


                          <div class="row">
                            <div class="row">
                              <div class="input-field col s8 m8 l8 left">
                                <a class="modal-close btn waves-effect  indigo darken-4 right" onclick="actualizaDatos();">Actualizar
                                  <i class="material-icons right">send</i>
                                </a>
                              </div>
                              <div class="col s1 m1 l1"></div>
                              <div class="input-field col s3 m3 l3">
                                <a href="#!" class="modal-close btn waves-effect waves-light right">Cerra
                                  <i class="material-icons right">close</i>
                                </a>
                               
                              </div>
                            </div>
                          </div>
                        </form>



                  </div>
                </div>
              </div>




 <!-- modal para modificar fin-->




          <!--start container cards empresas inicio-->
         
      

          
            
          </script>

            <!--card stats start-->

            
            <!--card widgets end-->
            
            <!--work collections start-->
            
            <!--work collections end-->
            
            <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container cards empresas fin-->
        </section>
        <!-- END CONTENT -->
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
          <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
              <div class="row">
                <div class="col s12 border-bottom-1 mt-5">
                  <ul class="tabs">
                    <li class="tab col s4">
                      <a href="#activity" class="active">
                        <span class="material-icons">graphic_eq</span>
                      </a>
                    </li>
                    <li class="tab col s4">
                      <a href="#chatapp">
                        <span class="material-icons">call</span>
                      </a>
                    </li>

                  </ul>
                </div>
                
                <div id="chatapp" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">REGISTRO LLAMADAS</h6>
                  <div id="registroLllamadasMostrar" class="collection border-none">
                   <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color blue lighten-1">info_outline</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">No hay llamadas!</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small"></p>
                    </div>
                    
                  </div>
                </div>
                <div id="activity" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">EVENTOS RECIENTES</h6>
                  <div class="activity" id="registroEventos11">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-purple lighten-2">info_outline</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">Aun no hay eventos!</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small"></p>
                    </div>
                    

                  </div>
                </div>
              </div>
            </li>
          </ul>
        </aside>
        <!-- END RIGHT SIDEBAR NAV-->
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer" style="background-color: #22088D; ">
        <div class="footer-copyright">
          <div class="container">
            <span>Copyright ©
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> <a class="grey-text text-lighten-2" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Officient</a> Todos los derechos reservados.</span>
          
          </div>
        </div>
    </footer>


<p id="uriEnviar" style="display: block;"><?php echo $_SESSION['uri']; ?></p>

<script type="text/javascript">
    




   //uri general para todos los procesos
    var uri1=$("#uriEnviar").text();


    // modal materialize jquery --------------------------------------
       $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  }); 

       //modal insertar
    function modalCrearEmpresa(){
      $("#modal1").modal();
     }

     //modal mostrar tabla sincrona

       //funcion para mostrar la tabla privilegio----------------------------------
    function tablaEmpresa(){
      var tabla2= $.ajax({
        url: uri1+"controller/empresasC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('tablaEmpresa').innerHTML = tabla2;

    }
    setInterval(tablaEmpresa,1000);



    ///funcion para insertar datos

    function insertarDatos11(){
      //datos los traemos con el formulario y con la propiedad serialize traemos todos los datos del formulario por el name
      var datosGuardar= $("#insertarPagos").serialize();
      //alert(datosGuardar);
      $.ajax({
        type: "POST",
        url: uri1+"controller/empresasC.php",
        data: datosGuardar,
        success:function(r){
          
            M.toast({html: 'Se ha creado de manera correcta :)', classes: 'rounded'});
            
        }

      });



    }


    //funcion para actualizar informacion

    function actualizarDatos(clicked_id){
      idModificar=clicked_id;
    

     //obtenemos datos de 

     razonSocial= $("#razonSocial"+idModificar).val();
     direccionFiscal= $("#direccionFiscal"+idModificar).val();
     nit= $("#nit"+idModificar).val();
     nombreCliente= $("#nombreCliente"+idModificar).val();
     telefono= $("#telefono"+idModificar).val();
     pbx= $("#pbx"+idModificar).val();
     fechaCorte= $("#fechaCorte"+idModificar).val();
     periodo= $("#periodo"+idModificar).val();
     deposito= $("#deposito"+idModificar).val();
     estado= $("#estado"+idModificar).val();
     //rellenar formulario para editar
     $("#idActualizar").val(idModificar); 
     $("#modRazonSocial").val(razonSocial);
     $("#modDireccionFiscal").val(direccionFiscal);
     $('#modNit').val(nit);
     $('#modNombreCliente').val(nombreCliente);
     $('#modTelefono').val(telefono);
     $('#modPbx').val(pbx);
     $('#modFechaCorte').val(fechaCorte);
     $('#modPeriodo').val(periodo);
     $('#modDeposito').val(deposito);
     $('#modEstado').val(estado);

     $("#modal2").modal();


    }


  ///funcion para insertar datos
  function eliminacionDatos(clicked_id){
    var idEliminar=clicked_id;
    var evento=3;
   
       $.ajax({
      type: "POST",
      url: uri1+"controller/empresasC.php",
      data: {
        "idEliminar": idEliminar,
        "accionEjecutar": evento
      },
      success:function(r2){
        M.toast({html: 'Se ha eliminado de manera correcta :)', classes: 'rounded'});

        
      }

    });
     
     

  }


    //actualizar informacion

    function actualizaDatos(){

      var datosGuardar= $("#actualizarEmpresas").serialize();
      //alert(datosGuardar);
      $.ajax({
        type: "POST",
        url: uri1+"controller/empresasC.php",
        data: datosGuardar,
        success:function(r){
          
            M.toast({html: 'Se ha actualizado de manera correcta :)', classes: 'rounded'});
            
        }

      });

    }



 $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
        

   function mostrarRegistroLlamadas(){
      var registroLlamadas= $.ajax({
        url: uri1+"controller/staticLateralIzquierdoC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('registroLllamadasMostrar').innerHTML = registroLlamadas;

    }
    setInterval(mostrarRegistroLlamadas,1000);


 function mostrarEventos(){
      var registroEventos= $.ajax({
        url: uri1+"controller/staticLateralDerechoEventoC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('registroEventos11').innerHTML = registroEventos;

    }
    setInterval(mostrarEventos,1000);

</script>






    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="../vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="../js/custom-script.js"></script>
  </body>
</html>