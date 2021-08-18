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



//echo $dashboard;



?>

<!DOCTYPE html>
<html>
<head>
	<title>Servicios y Paquetes - <?php echo $_SESSION['nombre']; ?></title>
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
                        <i class="material-icons">face</i> Perfil</a>
                    </li>
                    <li>
                      <a href="../controller/logout.php" class="grey-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i> Salir</a>
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

  <div class="salida"></div>


            <h4 class="center">Paquetes<br><br> <a class="btn-floating btn-large waves-effect indigo darken-4 modal-trigger" href="#modal4"><i class="material-icons" onclick="crearPaquete();">add</i></a> <a class="waves-effect waves-light btn-large" href="#aquiServicio"><i class="material-icons left">arrow_downward</i>Servicios</a>
</h4>

 <div class="row">

<?php 

      $query1 = ("SELECT * FROM paquete");
      $buscarPaquetes = $dbConn->prepare($query1);
      $buscarPaquetes->execute(); 

      while ($rowA1=$buscarPaquetes->fetch(PDO::FETCH_ASSOC)){

 ?>
              <div class="col s12 m4 l4">
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header indigo darken-1">
                      <h4 class="task-card-title"><?php echo  $rowA1['nombrePaquete'] ?></h4>
                      <p class="task-card-date">Servicios</p>
                    </li>
                      <ul class="collapsible">
          <?php
      $query22 = ("SELECT * From paquete as pa JOIN registrosPaquetes as registro on pa.idpaquete=registro.idPaquete JOIN servicio as ser on registro.idServicio=ser.idservicio where pa.idpaquete=:idPaquete");
      $buscarServices = $dbConn->prepare($query22);
      $buscarServices->bindParam(':idPaquete',$rowA1['idpaquete'] , PDO::PARAM_STR); 
      $buscarServices->execute(); 

      while ($rowA2=$buscarServices->fetch(PDO::FETCH_ASSOC)){


           ?>          
  
    <li>
      <div class="collapsible-header"><i class="material-icons" style="color:#00e676;">check_circle</i>
<?php echo $rowA2['nombre']; ?></div>
      <div class="collapsible-body"><span><?php echo $rowA2['descripcion']; ?></span></div>
    </li>
    
  
                    
            <?php } ?>    
            </ul>    
                    <li>
                  <div class="card gradient-45deg-blue-grey-blue gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0"><?php echo "Q.".$rowA1['totalPaquete']; ?></h5>
                        <p class="no-margin">Total Paquete</p>
                        <p >Descuento: <?php echo $rowA1['descuento'];  ?></p>
                      </div>
                    </div>
                  </div>

                    </li>
                    
                  </ul>

            </div>

<?php  } ?>




           </div> 

           <div id="mostrarPaquete1">
             
           </div>

<?php
//buscamos cuentasPrincipales 2
  $query26 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal6 = $dbConn->prepare($query26);
  $cuentaPrincipal6->execute();
  $hayCuentas6=$cuentaPrincipal6->rowCount();

 ?>


<!-- Modal Crear paquete -->
                      <div id="modal4" class="modal">
                        <div class="modal-content">
                          <div class="col s12 m12 l12">
                            <h5>Crear un nuevo paquete</h5>
                        <form id="insertarPaquete" >
                          <input type="text" name="accionEjecutar2" id="accionEjecutar2" value="1" style="display: none;">
                           <div class="row">
                             <div class="input-field col s12 m12 l12 ">
                              <input id="txtNombrePaquete" name="txtNombrePaquete" type="text">
                              <label for="first_name">Nombre Paquete</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtTotalPaquete" name="txtTotalPaquete" type="text">
                              <label for="first_name">Total Paquete</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtDescuento" name="txtDescuento" type="text">
                              <label for="first_name">Descuento</label>
                            </div>
                          </div>

                          <div>
                            <div>Asignar Servicio</div>
                       

                            <table>
                                <thead>
                                  <tr>
                                      <th>Servicio</th>
                                      <th>Activar</th>
                                      
                                  </tr>
                                </thead>

                                <tbody>
                             <?php 
                            $qnew111 = ("SELECT * FROM servicio");
                            $buscarServicio = $dbConn->prepare($qnew111);
                            $buscarServicio->execute(); 

                            $qnew112 = ("SELECT * FROM paquete");
                            $cantidadPaquetes = $dbConn->prepare($qnew112);
                            $cantidadPaquetes->execute(); 
                            $ultimoPaquete=$cantidadPaquetes->rowCount();
                            $idPaqueteSiguiente=$ultimoPaquete+1;

                            while ($servicio11=$buscarServicio->fetch(PDO::FETCH_ASSOC)){

                            ?>
                                  <tr>
                                    <td><?php echo $servicio11['nombre']; ?></td>
                                    <td> 
                                      <input type="text" name="<?php echo 'servicio'.$servicio11['idservicio']; ?>" value="<?php echo $servicio11['idservicio']; ?>" style="display: none;">
                                      <input type="text" name="txtidPaqueteRegistro" value="<?php echo $idPaqueteSiguiente; ?>" style="display: none;">
                                      <div class="switch">
                                      <label>
                                        Desactivar
                                        
                                        <input type="checkbox" name="<?php echo "marcado".$servicio11['idservicio']; ?>" >
                                        <span class="lever"></span>
                                        Activar
                                      </label>
                                    </div></td>
                                                                      
                                  </tr>
                                  <?php } ?> 



                                </tbody>
                              </table>
                           

                           
                          </div>

                        <p style="text-align: center; font-size: 16pt;">Seleccione la cuenta por cobrar</p>

                    <select class="form-control" name="cuentaPrincipal" id="cuentaPrincipal" required>
                           <option>Selecciona Cuenta Principal</option>

                      <?php 
                          if($hayCuentas6==0){   
                      ?>
                       <option value="0">No hay cuentas!</option>
                     <?php  }else{   ?>

                     <?php while ($datosCuentaPrincipal2=$cuentaPrincipal6->fetch(PDO::FETCH_ASSOC)){  ?>

                    <option  value="<?php echo $datosCuentaPrincipal2['idRegistro']; ?>"><?php echo $datosCuentaPrincipal2['nomenclatura'].' '.$datosCuentaPrincipal2['cuentaPrincipal']; ?></option>


                       <?php } } ?>     
                          </select><br>

                          <select class="browser-default" name="selectSubcuenta" id="selectSubcuenta" required>
                            <option>Selecciona una cuenta</option>
                          </select><br>


                          <select class="browser-default" name="conceptos" id="conceptos" required>
                                                        <option>Selecciona una Sub-Cuenta</option>

                           </select><br>




                          <div class="row">
                            <div class="row">
                              <div class="input-field col s8 m8 l8 left">
                                <a class="modal-close btn waves-effect  indigo darken-4 right" onclick="insertarPaquete();">Guardar
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


          <!--start container-->
          <div class="container" id="aquiServicio">
            <h4 class="center">Servicios</h4>

             <div class="col s12 m12 l12">

              <div class="row">
                  <ul id="projects-collection" class="collection z-depth-1" style="margin-top: 30px;">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">room_service</i>
                      <h6 class="collection-header m-0">  Servicio</h6>
                      <p class="col s5 m5 l5">Listado</p>
                      <div class="col s6 m6 l6"><a class="btn-floating btn-large waves-effect cyan lighten-2 modal-trigger" href="#modal1"><i class="material-icons" onclick="modalServicio();">add</i></a></div>
                    </li>
                    <li id="tablaServicios" class="scrollspy">
                      
                    </li>
                  </ul>
                </div>
              </div>


<!-- Modal para insertar inicio -->
                      <div id="modal1" class="modal">
                        <div class="modal-content">
                          <div class="col s12 m12 l12">
                            <h5>Crear un nuevo servicio</h5>
                        <form id="insertarServicio" >
                          <input type="text" name="accionEjecutar" id="accionEjecutar" value="1" style="display: none;">
                           <div class="row">
                             <div class="input-field col s12 m12 l12 ">
                              <input id="txtNombre" name="txtNombre" type="text">
                              <label for="first_name">Nombre</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtDescripcion" name="txtDescripcion" type="text">
                              <label for="first_name">Descripción</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtMonto" name="txtMonto" type="text">
                              <label for="first_name">Monto</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="txtCortesia" name="txtCortesia" type="text">
                              <label for="first_name">Cortesia </label>
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
                            <h5>Editar Servicio</h5>
                        <form id="actualizarServicio" >
                          
                          <input type="text" name="idActualizar" id="idActualizar" value="" style="display: none;">
                          <input type="text" name="accionEjecutar" id="accionEjecutar" value="2" style="display: none;">
                            <div class="row">
                             <div class="input-field col s12 m12 l12 ">
                              <input id="modNombre" name="modNombre" type="text" autofocus>
                              <label for="first_name">Nombre</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modDescripcion" name="modDescripcion" type="text" autofocus>
                              <label for="first_name">Descripción</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modMonto" name="modMonto" type="text" autofocus>
                              <label for="first_name">Monto</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12 ">
                              <input id="modCortesia" name="modCortesia" type="text" autofocus>
                              <label for="first_name">Cortesia </label>
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



          </div>



          <!--end container-->
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
    

<p id="uriEnviar" style="display: none;"><?php echo $_SESSION['uri']; ?></p>

    <script type="text/javascript">
      //uri general para todos los procesos
    var uri1=$("#uriEnviar").text();


    //funcion mostrar Servicios

    function tablaServicios(){
      var tabla2= $.ajax({
        url: uri1+"controller/serviciosyPaquetesC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('tablaServicios').innerHTML = tabla2;

    }
    setInterval(tablaServicios,1000);

           //modal insertar
    function modalServicio(){
      $("#modal1").modal();
     }





     function insertarDatos11(){
      //datos los traemos con el formulario y con la propiedad serialize traemos todos los datos del formulario por el name
      var datosGuardar= $("#insertarServicio").serialize();
      //alert(datosGuardar);
      $.ajax({
        type: "POST",
        url: uri1+"controller/serviciosyPaquetesC.php",
        data: datosGuardar,
        success:function(r){
          
            M.toast({html: 'Se ha creado de manera correcta :)', classes: 'rounded'});
            
        }

      });



    }



  ///funcion para insertar datos
  function eliminacionDatos(clicked_id){
    var idEliminar=clicked_id;
    var evento=3;
   
       $.ajax({
      type: "POST",
      url: uri1+"controller/serviciosyPaquetesC.php",
      data: {
        "idEliminar": idEliminar,
        "accionEjecutar": evento
      },
      success:function(r2){
        M.toast({html: 'Se ha eliminado de manera correcta :)', classes: 'rounded'});

        
      }

    });
     
     

  }



    //funcion para actualizar informacion

    function actualizarDatos(clicked_id){
      idModificar=clicked_id;
    

     //obtenemos datos de 

     servicio= $("#servicio"+idModificar).val();
     descripcion= $("#descripcion"+idModificar).val();
     monto= $("#monto"+idModificar).val();
     cortesia= $("#cortesia"+idModificar).val();
     
     //rellenar formulario para editar
     $("#idActualizar").val(idModificar); 
     $("#modNombre").val(servicio);
     $("#modDescripcion").val(descripcion);
     $('#modMonto').val(monto);
     $('#modCortesia').val(cortesia);
     
     $("#modal2").modal();


    }
  //actualizar informacion

    function actualizaDatos(){

      var datosGuardar= $("#actualizarServicio").serialize();
      //alert(datosGuardar);
      $.ajax({
        type: "POST",
        url: uri1+"controller/serviciosyPaquetesC.php",
        data: datosGuardar,
        success:function(r){
          
            M.toast({html: 'Se ha actualizado de manera correcta :)', classes: 'rounded'});
            
        }

      });

    }

  //Crear paquete

function crearPaquete(){
  $("#modal4").modal();
}

//crear paquete

function insertarPaquete(){
      var datosGuardar= $("#insertarPaquete").serialize();
    // alert(datosGuardar);
     $.ajax({
        type: "POST",
        url: uri1+"controller/serviciosyPaquetesC.php",
        data: datosGuardar,
        success:function(r){
         // $('.salida').html(r);
           M.toast({html: 'Se ha creo paquete de manera correcta :)', classes: 'rounded'});
            
        }

      });
  
      

}



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


//funciones para agregar cuenta por cobrar

                     $(document).ready(function() {
                       $("select[name=cuentaPrincipal]").change(function(){
                       var idCuentaPrincipal = $('select[name=cuentaPrincipal]').val();
                       //alert(idCuentaPrincipal);
                       buscarSubcuentas(idCuentaPrincipal,1);
                        });

                     });

                      

                       $(document).ready(function(){

                       $("select[name=selectSubcuenta]").change(function(){
                       var idSubCuenta = $('select[name=selectSubcuenta]').val();
                      // alert(idSubCuenta);
                       buscarCuentas(idSubCuenta,12);

                        });

                      }); 


                      $(document).ready(function(){

                       $("select[name=cuentaPrincipalCrearCuenta]").change(function(){
                       var idSubCuenta = $('select[name=cuentaPrincipalCrearCuenta]').val();
                     // alert(idSubCuenta+' tipoCuenta '+8);
                       buscarCuentaCuenta(idSubCuenta,8);

                        });

                      }); 

                        $(document).ready(function(){

                       $("select[name=cuentas]").change(function(){
                       var idSubCuenta = $('select[name=cuentas]').val();
                      // alert(idSubCuenta);
                       buscarSubcuentas(idSubCuenta,3);

                        });

                      }); 
  //buscamos subcuentaPrincipal

                       function buscarSubcuentas(idCuentaPrincipal,tipoCuenta){
                        //tipoCuenta  1=subCuenta 2=concepto
                        //alert('hola');
                        $.ajax({
                            type: "POST",
                            url: uri1+'controller/crudCuentasContables.php',
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $('#selectSubcuenta').html(r);
                           // $('.salida').html(r);

                         
                            }

                          });

                    }


                    function buscarCuentaCuenta(idCuentaPrincipal,tipoCuenta){

                        $.ajax({
                            type: "POST",
                            url: uri1+'controller/crudCuentasContables.php',
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $('#selectSubcuenta2').html(r);
                           //$('.salida').html(r);

                         
                            }

                          });

                    }

                       function buscarCuentas(idCuentaPrincipal,tipoCuenta){
                        //tipoCuenta  1=subCuenta 2=concepto
                        //alert('hola');


                        $.ajax({
                            type: "POST",
                            url: uri1+'controller/crudCuentasContables.php',
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $('#conceptos').html(r);

                         
                            }

                          });

                    }

                    function crearCuenta(){

                       var datosGuardar= $("#crearCuenta").serialize();
                      // alert(datosGuardar);
                       
                       $.ajax({
                            type: "POST",
                            url: uri1+'controller/crudCuentasContables.php',
                            data: datosGuardar,

                            success:function(r){

                             // $('.salida').html(r);
                              swal("Se creo la cuenta!", "felicidades!", "success");
                               $('#modal3').modal('toggle');

                                setInterval(function(){
                                location.reload();

                             },1000);

                            }

                          });
                        

                    }



    </script>









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