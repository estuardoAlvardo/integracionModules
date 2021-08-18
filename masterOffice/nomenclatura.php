<?php 
session_start();
require("../conexion/conexion.php");


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

  $q1 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal = $dbConn->prepare($q1);
  $cuentaPrincipal->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<title>masterOffice - <?php echo $_SESSION['nombre']; ?></title>
	<link  rel="icon"   href="../img/logo.ico" type="image/ico" />
	    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Compiled and minified JQUERY -->
    <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>

</head>
<body>
	

	

</body>
<style type="text/css">
  
#accesos {
  min-height: 0;
  display: inline-block;
  position: relative;
  left: 50%;
  margin: 90px 0;
  transform: translate(-50%, 0);
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  background-color: #ffffff;
  padding: 1em;

}

@media (max-width: 550px) {
  #accesos {
    box-sizing: border-box;
    transform: translate(0, 0);

    margin: 0;
    left: 0;
  }

}

h4, h5 {
  color: #2f3542;
}

h4 {
  text-transform: uppercase;
  font-size: 1.5em;
  line-height: 1.2em;
  letter-spacing: .08em;
  font-weight: 100;
}

h5 {
  font-size: 1.2em;
  line-height: 1.2em;
  font-weight: 300;
  letter-spacing: 1px;
  display: block;
  background-color: #fefffa;
  margin: 0;
  cursor: pointer;
  padding: .5em;
}

.contAcordeon {
    color: rgba(48, 69, 92, 0.8);
    line-height: 1.5em;
    letter-spacing: .05em;
    position: relative;
    overflow: hidden;
    max-height: 200em;
    opacity: 1;
    transform: translate(0, 0);
    margin-top: 1em;
    z-index: 2;
    padding: 0 .5em;
  width: 100%;
    transition: all 0.3s cubic-bezier(.25,.8,.25,1);

}

#accesos ul {
  list-style: none;
  perspective: 900;
  padding: 0;
  margin: 0;
}
#accesos ul li {
  position: relative;
  padding: 0;
  margin: 0;
  padding-bottom: 4px;
  padding-top: 0;
  border-top: 1px dotted #dce7eb;
}
#accesos ul li:nth-of-type(1) {
  animation-delay: 0.5s;
}
#accesos ul li:nth-of-type(2) {
  animation-delay: 0.75s;
}
#accesos ul li:nth-of-type(3) {
  animation-delay: 1s;
}
#accesos ul li:last-of-type {
  animation-delay: 1.25s;
  padding-bottom: 0;
}
#accesos ul li i.chevron {
    position: absolute;
    transform: translate(-18px, 0);
    margin-top: 33px;
    right: 0;
}
#accesos ul li i.chevron:before, #accesos ul li i.chevron:after {
  content: "";
  position: absolute;
  background-color: #ff6873;
  width: 3px;
  height: 9px;
}
#accesos ul li i:before {
  transform: translate(-2px, 0) rotate(45deg);
}
#accesos ul li i.chevron:after {
  transform: translate(2px, 0) rotate(-45deg);
}
#accesos ul li input[type=checkbox] {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  background-color: coral;
}
#accesos ul li input[type=checkbox] h2 i {
  background-color: teal;
  color: teal;
}
#accesos ul li input[type=checkbox]:checked ~ div {
  margin-top: 0;
  max-height: 0;
  opacity: 0;
  transform: translate(0, 50%);
}
#accesos ul li input[type=checkbox]:checked ~ i:before {
  transform: translate(2px, 0) rotate(45deg);
}
#accesos ul li input[type=checkbox]:checked ~ i:after {
  transform: translate(-2px, 0) rotate(-45deg);
}

#accesos input[type=checkbox] ~ h2 {
  background-color: #f1f1f1;
}
#accesos input[type=checkbox]:checked ~ h2 {
  background-color: white;
}

#accesos h5 > i {
    width: 50px;
    height: 30px;
    display: inline-block;
    margin-right: 1em;
    margin-top: 10px;
    text-align: center;
    float: right;
}

#accesos h5 img {
    width: 40px;
    height: 40px;
    margin-right: 1em;
    margin-top: 0px;
    float: right;
}
@keyframes flipdown {
  0% {
    opacity: 0;
    transform-origin: top center;
    transform: rotateX(-90deg);
  }
  5% {
    opacity: 1;
  }
  80% {
    transform: rotateX(8deg);
  }
  83% {
    transform: rotateX(6deg);
  }
  92% {
    transform: rotateX(-3deg);
  }
  100% {
    transform-origin: top center;
    transform: rotateX(0deg);
  }
}



#accesos .sino {
  display: flex;
  flex-flow: row;
  flex-wrap: wrap;
  border: 1px solid #f1f1f1;
  padding: .5em;
  max-width: 45em;
}
#accesos .sino > div { flex: 1 1 300px; padding: .5em}
#accesos .sino .tit {
  font-size: 2em;
      margin-bottom: 0.5em;
}
#accesos .sino .tit i {
font-size: 0.6em;
    margin-left: 0.5em;
    width: 30px;
    height: 30px;
    padding: 5px;
}
#accesos .sino .no .tit {  color: #ff6772;}
#accesos .sino .si .tit {  color: #8bc349;}

#accesos .sino .texto span {
  display: block;
}
#accesos .sino .texto span span { font-weight: bold; }



#accesos .callout {
    border-left: 5px solid coral;
    padding: 1.5em;
    margin: 0em;
}
#accesos .callout h5 {
  font-size: 1.5em;
  margin-bottom: .5em;
      margin-top: 0;
}
#accesos .destacaMucho {
    /* background-color: #ff7e50; */
    margin: 1em 0;
    padding: 1em;
    /* color: white; */
    border-left: 5px solid #8BC34A;
}


.autopista, .calle, .referencia, .alerta {
    padding: 0.2em 0.4em;
    font-size: 0.8em;  
    color: white;
    border-radius: 2px;
}

.autopista {    background-color: #2091F3; }
.calle {    background-color: #2091F3; }
.referencia {    background-color: #4CAF50; }
.alerta {     background-color: coral; }
 </style>

       <style type="text/css">
           .swal-text {
  background: linear-gradient(to right, #C6426E, #642B73);
  padding: 17px;
  display: block;
  margin: 22px;
  text-align: center;
  color: white;
  text-align: center;
  border-radius: 5px;
   box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
.swal-icon img{
  width: 200px;
  height: 200px;
}


/*estilos Navs Cursos*/

.nav-tabs{
  color: black;
  font-weight: bold;

}

.nav-tabs a{
  color: black;
  font-weight: bold;


}

  .nav-tabs .active{
  font-weight: bold;
  font-size: 18pt;

}

.portada{
  
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   height: 100%;
   width: 100% ;
   text-align: center;
   border-radius: 15px 15px 15px 15px;
   padding: 0px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);

 
}


.titleCourse{
  color: white;
  font-weight: bold;
  text-align: left;
  padding-left: 20px;
}

.btnEditarPortada{
  text-align: right;
  padding-top: 5px;
}


.vibrar:hover {
  -webkit-animation: tiembla 0.2s 1;
  -moz-animation: tiembla 0.2s 1;
  -o-animation: tiembla 0.2s 1;
 -ms-animation: tiembla 0.2s 1;
 cursor:pointer;
}

@-webkit-keyframes tiembla {
  0%  { -webkit-transform:rotateZ(-5deg); }
  50% { -webkit-transform:rotateZ( 0deg) scale(1.4); }
  100%{ -webkit-transform:rotateZ( 5deg);
}
/*menu Dropdown publicacion*/
           .swal-text {
  background: linear-gradient(to right, #C6426E, #642B73);
  padding: 17px;
  display: block;
  margin: 22px;
  text-align: center;
  color: white;
  text-align: center;
  border-radius: 5px;
   box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
.swal-icon img{
  width: 200px;
  height: 200px;
}


</style>

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

                <li class="bold" style="<?php echo $archivos; ?>">
                  <a href="archivo.php" class="waves-effect waves-cyan">
                    <i class="material-icons">save</i>
                    <span class="nav-text">Cuentas</span>
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
          <!--start container-->
          <div class="container">
           

<div class="col-md-8 col-xs-10 pag-center">




        <div class="row" >

        <div class="col s4 m4 l4" style="margin-top: 10px;"> 
        <a class="btn btn-info botonAgg-1 modal-trigger" href="#modalCuenta"  style="background-color: #0652DD; border:1px solid #0652DD;">Crear Cuenta Principal</a><br><br>
        </div>

         <div class="col s3 m3 l3" style="margin-top: 10px; "> 
        <a class="btn btn-info botonAgg-1 modal-trigger" href="#modalCuentaCuenta"  style="background-color: #0652DD; border:1px solid #0652DD;">Crear Cuenta</a><br><br>
        </div>

         <div class="col s3 m3 l3" style="margin-top: 10px;"> 
        <a class="btn btn-info botonAgg-1 modal-trigger" href="#modal1"  style="background-color: #0652DD; border:1px solid #0652DD;">Crear Sub-cuenta</a><br><br>
        </div>

           <div class="salida"></div>


<div class="col s12 m12 l12">
  <ul class="collapsible">

          <?php while ($datosCuentaPrincipal=$cuentaPrincipal->fetch(PDO::FETCH_ASSOC)){ 


          $query2 = ("SELECT * FROM contaSubcuenta where cuentaPrincipal=:cuentaPrincipal");
          $subCuentas = $dbConn->prepare($query2);
          $subCuentas->bindParam(':cuentaPrincipal',$datosCuentaPrincipal['idRegistro'], PDO::PARAM_INT);
          $subCuentas->execute(); ?>

    <li>
      <div class="collapsible-header"><i class="material-icons">settings
</i>
<?php echo $datosCuentaPrincipal['nomenclatura'].'  '.$datosCuentaPrincipal['cuentaPrincipal']; ?>
<p style="margin-left: 15%; font-weight: bold;">Editar</p>
    <input class="col s3 m3 l3" type="text" id="<?php echo 'nomenclaturaPrincipal'.$datosCuentaPrincipal['idRegistro'];?>" value="<?php echo $datosCuentaPrincipal['nomenclatura']; ?>" onchange="editarNomenclaturas(<?php echo $datosCuentaPrincipal['idRegistro'].',1';?>)" >

    <input class="col s3 m3 l3" type="text" id="<?php echo 'nombreCuentaPrincipal'.$datosCuentaPrincipal['idRegistro'];?>" value="<?php echo $datosCuentaPrincipal['cuentaPrincipal']; ?>" onchange="editarNombreCuentas(<?php echo $datosCuentaPrincipal['idRegistro'].',1';?>)" >

</div>




            <div class="collapsible-body">
              <!-- subcuenta inicio--->

<?php while ($datosSubcuentas=$subCuentas->fetch(PDO::FETCH_ASSOC)){  

          $query3 = ("SELECT * FROM contaConcepto where subCuenta=:subCuenta");
          $concepto = $dbConn->prepare($query3);
          $concepto->bindParam(':subCuenta',$datosSubcuentas['idRegistro'], PDO::PARAM_INT);
          $concepto->execute(); ?>

                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header"><i class="material-icons">settings
                      </i><?php echo $datosSubcuentas['nomenclatura'].' '.$datosSubcuentas['subCuenta']; ?>

                      <p style="margin-left: 15%; font-weight: bold;">Editar</p>
    <input class="col s3 m3 l3" type="text" id="<?php echo 'nomenclaturaCuenta'.$datosSubcuentas['idRegistro'];?>" value="<?php echo $datosSubcuentas['nomenclatura']; ?>" onchange="editarNomenclaturas(<?php echo $datosSubcuentas['idRegistro'].',2';?>)" value="<?php echo $datosSubcuentas['nomenclatura']; ?>">

    <input class="col s3 m3 l3" type="text" id="<?php echo 'nombreCuentaCuenta'.$datosSubcuentas['idRegistro'];?>"  value="<?php echo $datosSubcuentas['subCuenta']; ?>" onchange="editarNombreCuentas(<?php echo $datosSubcuentas['idRegistro'].',2';?>)">

                    </div>
                      <div class="collapsible-body">
                          <ul class="collection">
                       <?php while ($datosCuenta=$concepto->fetch(PDO::FETCH_ASSOC)){ 
          //numero de case para switch controladorModulos/crudCuentasContables.php
          $eventoEliminar=5; ?> 

                   
 <?php if($datosCuenta['cuentaCreada']==0){ ?>

                            <li class="collection-item row">

                               <input class="col s4 m4 l4" type="text" id="<?php echo 'nomenclaturaSubCuenta'.$datosCuenta['idRegistro'];?>" value="<?php echo $datosCuenta['nomenclatura']; ?>" onchange="editarNomenclaturas(<?php echo $datosCuenta['idRegistro'].',3';?>)" value="<?php echo $datosCuenta['nomenclatura']; ?>">

                            <input class="col s4 m4 l4" type="text" id="<?php echo 'nombreSubCuenta'.$datosCuenta['idRegistro'];?>" value="<?php echo $datosCuenta['concepto']; ?>" onchange="editarNomenclaturas(<?php echo $datosCuenta['idRegistro'].',3';?>)"> </li>


                           <button  type="button" class="btn btn-info botonAgg-1 " onclick="preguntarEliminarCuenta(<?php echo $datosCuenta['idRegistro'].','.$eventoEliminar;  ?>);" style="background-color:red; border:1px solid red; margin-left: 85%; margin-top: -100px;"><i class="material-icons">cancel</i></button>


                                

                              </li>

                             <?php }else{ ?>

                            <li class="collection-item row">
                              <input class="col s4 m4 l4" type="text" name="<?php echo 'nomenclatura'.$datosCuenta['idRegistro']; ?>" value="<?php echo $datosCuenta['nomenclatura']; ?>">

                              <input class="col s4 m4 l4" type="text" id="<?php echo 'nombreSubCuenta'.$datosCuenta['idRegistro'];?>" value="<?php echo $datosCuenta['concepto']; ?>" onchange="editarNomenclaturas(<?php echo $datosCuenta['idRegistro'].',3';?>)"> </li>

                           <button  type="button" class="btn btn-info botonAgg-1 " onclick="preguntarEliminarCuenta(<?php echo $datosCuenta['idRegistro'].','.$eventoEliminar;  ?>);" style="background-color:red; border:1px solid red; margin-left: 85%; margin-top: -100px;"><i class="material-icons">cancel</i></button>

                          <?php } } ?>


                          </ul>

                      </div>
                    </li>
                   

       </ul>
       <?php  } ?>  
                                <!-- subcuenta fin--->

            </div>


    </li>
   <?php } ?>
  </ul>
</div>


<div class="col s12 m12 l12 boxCard" style="min-height: 100px; margin-bottom: 50px;">
  <p style="font-size: 16pt; text-align: center;">Movimientos iniciales: selecciona empresa y agrega el movimiento inicial</p>


<?php  
//buscamos a las empresas maestras para definir los saldos iniciales de cuenta


          $activo=1;
          $bus1 = ("SELECT * FROM empresa where empresaMaestra=:empresaMaestra");
          $empresaMaestra = $dbConn->prepare($bus1);
          $empresaMaestra->bindParam(':empresaMaestra',$activo, PDO::PARAM_INT);
          $empresaMaestra->execute(); 

?>
  <div class="input-field col s12">
    <select id="empresaMasterSelected">
      <option value="" disabled selected>Selecciona la empresa</option>

<?php           while ($datosEmpresaMestra=$empresaMaestra->fetch(PDO::FETCH_ASSOC)){   ?>
      <option value="<?php echo $datosEmpresaMestra['idempresa'] ?>"><?php echo $datosEmpresaMestra['razonSocial']; ?></option>
<?php } ?>
    </select>
    <label>Empresas para registrar movimiento</label>
  </div>


<?php

          $bn1 = ("SELECT * FROM contaCuentaPrincipal");
          $cuentaPrincipalB = $dbConn->prepare($bn1);
          $cuentaPrincipalB->execute(); 



 ?>

<div class="col s12 m12 l12">
  <ul class="collapsible">

          <?php while ($datosCuentaPrincipalB=$cuentaPrincipalB->fetch(PDO::FETCH_ASSOC)){ 


          $bn2 = ("SELECT * FROM contaSubcuenta where cuentaPrincipal=:cuentaPrincipal");
          $subCuentasB = $dbConn->prepare($bn2);
          $subCuentasB->bindParam(':cuentaPrincipal',$datosCuentaPrincipalB['idRegistro'], PDO::PARAM_INT);
          $subCuentasB->execute(); ?>

    <li>
      <div class="collapsible-header"><i class="material-icons">settings
</i><?php echo $datosCuentaPrincipalB['nomenclatura'].' '.$datosCuentaPrincipalB['cuentaPrincipal']; ?></div>

            <div class="collapsible-body">
              <!-- subcuenta inicio--->

<?php while ($datosSubcuentasB=$subCuentasB->fetch(PDO::FETCH_ASSOC)){  

          $bn3 = ("SELECT * FROM contaConcepto where subCuenta=:subCuenta");
          $conceptoB = $dbConn->prepare($bn3);
          $conceptoB->bindParam(':subCuenta',$datosSubcuentasB['idRegistro'], PDO::PARAM_INT);
          $conceptoB->execute(); ?>

                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header"><i class="material-icons">settings
</i><?php echo $datosSubcuentasB['nomenclatura'].' '.$datosSubcuentasB['subCuenta']; ?></div>
                      <div class="collapsible-body">
                          <ul class="collection">
                       <?php while ($datosCuentaB=$conceptoB->fetch(PDO::FETCH_ASSOC)){ 
          //numero de case para switch controladorModulos/crudCuentasContables.php
          $eventoEliminar=5; ?> 

                   
 <?php if($datosCuentaB['cuentaCreada']==0){ ?>

                            <li class="collection-item">
                              <div class="row">
                              <div class="col s6 m6 l6">
                              <?php echo $datosCuentaB['nomenclatura'].' '.$datosCuentaB['concepto']; ?>
                                </div>
                               <input class="col s3 m3 l3" type="text" id="<?php echo 'saldoInicialAbono'.$datosCuentaB['idRegistro'] ?>" name="valorInicial" placeholder="Saldo inicial Abono" onchange="ingresarSaldoInicialAbono(<?php echo $datosCuentaPrincipalB['idRegistro'].','.$datosSubcuentasB['idRegistro'].','.$datosCuentaB['idRegistro'];  ?>);"> 
                               <input class="col s3 m3 l3" type="text" id="<?php echo 'saldoInicialCargo'.$datosCuentaB['idRegistro'] ?>" name="valorInicial" placeholder="Saldo inicial Cargo" onchange="ingresarSaldoInicialCargo(<?php echo $datosCuentaPrincipalB['idRegistro'].','.$datosSubcuentasB['idRegistro'].','.$datosCuentaB['idRegistro'];  ?>);"> 
                             </div>
                              </li>

                             <?php }else{ ?>

                            <li class="collection-item">
                              <div class="row">
                              <div class="col s6 m6 l6">
                                   <?php echo $datosCuentaB['nomenclatura'].' '.$datosCuentaB['concepto']; ?>
                              </div>
                              <input class="col s3 m3 l3" type="text" id="<?php echo 'saldoInicialAbono'.$datosCuentaB['idRegistro'] ?>"  name="valorInicial" placeholder="Saldo inicial Abono" onchange="ingresarSaldoInicialAbono(<?php echo $datosCuentaPrincipalB['idRegistro'].','.$datosSubcuentasB['idRegistro'].','.$datosCuentaB['idRegistro'];  ?>);"> 
                              <input class="col s3 m3 l3" type="text" id="<?php echo 'saldoInicialCargo'.$datosCuentaB['idRegistro'] ?>" name="valorInicial" placeholder="Saldo inicial Cargo" onchange="ingresarSaldoInicialCargo(<?php echo $datosCuentaPrincipalB['idRegistro'].','.$datosSubcuentasB['idRegistro'].','.$datosCuentaB['idRegistro'];  ?>);"> 

                              </div>
                            </li>

                         

                          <?php } } ?>


                          </ul>

                      </div>
                    </li>
                   

       </ul>
       <?php  } ?>  
                                <!-- subcuenta fin--->

            </div>


    </li>
   <?php } ?>
  </ul>
</div>

 
  


</div>

<script type="text/javascript">
  
  function editarNomenclaturas(idRegistro,tipoCuenta){
    //1 principal
    //2 cuenta
    //3 subcuenta
    var eventoEjecutar=13;
    var nomenclaturaEnviar='';

    if(tipoCuenta==1){

     nomenclaturaEnviar = $('#nomenclaturaPrincipal'+idRegistro).val();
    }


    if(tipoCuenta==2){

     nomenclaturaEnviar = $('#nomenclaturaCuenta'+idRegistro).val();
    }



    if(tipoCuenta==3){

     nomenclaturaEnviar = $('#nomenclaturaSubCuenta'+idRegistro).val();
    }
    





    //alert('idRegistro Editar-->'+idRegistro+' tipoCuenta 1=principal, 2=cuenta, 3=subcuenta -->'+ tipoCuenta+' nomenclaturaActualizar--->'+nomenclaturaEnviar);



                                 $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data:{
                                      "tipoCuenta": eventoEjecutar,
                                      "nomenclaturaActualizar":nomenclaturaEnviar,
                                      "idRegistroBuscar":idRegistro,
                                      "nivelCuenta": tipoCuenta

                                    },

                                    success:function(r){

                                     // $('.salida').html(r);
  
                                      M.toast({html: 'Se actualizo nomenclatura :)', classes: 'rounded'});

                                        setInterval(function(){
                                       // location.reload();

                                     },1000);

                                    }

                                  });

   



  }

  function editarNombreCuentas(idRegistro,tipoCuenta){
    //1 principal
    //2 cuenta
    //3 subcuenta

    //alert('idRegistro Editar-->'+idRegistro+' tipoCuenta 1=principal, 2=cuenta, 3=subcuenta -->'+ tipoCuenta);

   //   M.toast({html: 'Se actualizo nombreCuenta :)', classes: 'rounded'});



          //1 principal
    //2 cuenta
    //3 subcuenta
    var eventoEjecutar=14;
    var nombreCuenta='';

    if(tipoCuenta==1){

     nombreCuenta = $('#nombreCuentaPrincipal'+idRegistro).val();
    }


    if(tipoCuenta==2){

     nombreCuenta = $('#nombreCuentaCuenta'+idRegistro).val();
    }



    if(tipoCuenta==3){

     nombreCuenta = $('#nombreSubCuenta'+idRegistro).val();
    }
    



   // alert('idRegistro Editar-->'+idRegistro+' tipoCuenta 1=principal, 2=cuenta, 3=subcuenta -->'+ tipoCuenta+' nombreCuenta--->'+nombreCuenta);



                                 $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data:{
                                      "tipoCuenta": eventoEjecutar,
                                      "nombreCuenta":nombreCuenta,
                                      "idRegistroBuscar":idRegistro,
                                      "nivelCuenta": tipoCuenta

                                    },

                                    success:function(r){

                                     // $('.salida').html(r);
  
                                      M.toast({html: 'Se actualizo nombre cuenta :)', classes: 'rounded'});

                                        setInterval(function(){
                                       // location.reload();

                                     },1000);

                                    }

                                  });

   



  }



</script>


     <script type="text/javascript">
       function ingresarSaldoInicialAbono(idCuentaPrincipal,idCuentaCuenta,idSubCuenta){

        var valorInicialAbonoEnviar=$('#saldoInicialAbono'+idSubCuenta).val();
        var empresaMaster=$('#empresaMasterSelected').val();
        var eventoEjecutar=10;


        if(empresaMaster==null || valorInicialAbonoEnviar==null || valorInicialAbonoEnviar==0){
          //alert('necesitas seleccionar una empresa para registrar el movimiento o ingresar el valor inicial abono');

        }else{

        //alert('Empresa Master '+empresaMaster+' idCuentaPrincipal '+idCuentaPrincipal+' idCuentaCuenta '+idCuentaCuenta+' idSubCuenta '+idSubCuenta+' saldoInicialGuardarAbono '+valorInicialAbonoEnviar);

                            $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data:{
                                      "tipoCuenta": eventoEjecutar,
                                      "idCuentaPrincipal":idCuentaPrincipal,
                                      "idCuentaCuenta":idCuentaCuenta,
                                      "idSubCuenta":idSubCuenta,
                                      "saldoInicialAbono":valorInicialAbonoEnviar,
                                      "idEmpresaMaster":empresaMaster

                                    },

                                    success:function(r){

                                      $('.salida').html(r);
  
                                         swal("Se registro!", "con exito!", "success");

                                        setInterval(function(){
                                       // location.reload();

                                     },1000);

                                    }

                                  });

     }

     }



       function ingresarSaldoInicialCargo(idCuentaPrincipal,idCuentaCuenta,idSubCuenta){

                var valorInicialCargoEnviar=$('#saldoInicialCargo'+idSubCuenta).val();
                var empresaMaster=$('#empresaMasterSelected').val();
                var eventoEjecutar=11;


        if(empresaMaster==null || valorInicialCargoEnviar==null || valorInicialCargoEnviar==0){
          alert('necesitas seleccionar una empresa para registrar el movimiento o ingresar el valor inicial abono');

        }else{
                alert('Empresa Master  '+empresaMaster+' idCuentaPrincipal '+idCuentaPrincipal+' idCuentaCuenta '+idCuentaCuenta+' idSubCuenta '+idSubCuenta+' saldoInicialGuardarCargo '+valorInicialCargoEnviar);
            

                                            $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data:{
                                      "tipoCuenta": eventoEjecutar,
                                      "idCuentaPrincipal":idCuentaPrincipal,
                                      "idCuentaCuenta":idCuentaCuenta,
                                      "idSubCuenta":idSubCuenta,
                                      "saldoInicialCargo":valorInicialCargoEnviar,
                                      "idEmpresaMaster":empresaMaster
                                    },

                                    success:function(r){

                                      $('.salida').html(r);
  
                                         swal("Se registro!", "con exito!", "success");

                                        setInterval(function(){
                                       // location.reload();

                                     },1000);

                                    }

                                  });

              }

       }
     </script>  


<!-- ingreso de cuentas tomando en cuenta la nomenclatura inicial dada por contabilidad ----->
<?php
//buscamos cuentasPrincipales 2
  $query26 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal6 = $dbConn->prepare($query26);
  $cuentaPrincipal6->execute();
  $hayCuentas6=$cuentaPrincipal6->rowCount();

 ?>





  <div id="modal1" class="modal">
    <div class="modal-content">
            <h5 class="modal-title" id="exampleModalLongTitle">Crear Sub-Cuenta</h5>

      <form id="crearCuenta">
                      <input type="text" name="tipoCuenta" value="3" style="display: none;">
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
                            <option>Selecciona una SubCuenta</option>
                          </select><br>


                          <div id="conceptos" style="text-align: left;">

                          </div>


                     </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
       <a type="button" class="btn btn-info botonAgg-1" onclick="crearCuenta();" style="background-color: #0652DD; border:1px solid #0652DD;">Crear SubCuenta</a>
    </div>
  </div>


<?php
//buscamos cuentasPrincipales 
  $query23 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal3 = $dbConn->prepare($query23);
  $cuentaPrincipal3->execute();
  $hayCuentas3=$cuentaPrincipal3->rowCount();

 ?>


  <div id="modalCuenta" class="modal">
    <div class="modal-content">
            <h5 class="modal-title" id="exampleModalLongTitle">Crear Cuenta Principal</h5>


        <?php 
                          if($hayCuentas3==0){   
                      ?>
                       <option value="0">No hay cuentas!</option>
                     <?php  }else{   ?>

                     <?php while ($datosCuentaPrincipal3=$cuentaPrincipal3->fetch(PDO::FETCH_ASSOC)){  ?>

                    <p  value="<?php echo $datosCuentaPrincipal3['idRegistro']; ?>"><?php echo $datosCuentaPrincipal3['nomenclatura'].' '.$datosCuentaPrincipal3['cuentaPrincipal']; ?></p>


                       <?php } } ?>   
  <form id="crearCuentaPrincipal">

  <div class="col s6 m6 l6">
      <input type="text" name="nomenclaturaIngresar" class="form-control" placeholder="Ingrese nomenclatura">
  </div>
  <div class="col s6 m6 l6">
      <input type="text" name="cuentaIngresar" class="form-control" placeholder="Ingrese el nombre de la cuenta principal">
  </div>

        <input type="text" name="tipoCuenta" class="form-control" value="7" style="display: none;">

    </form>     

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
       <a type="button" class="btn btn-info botonAgg-1" onclick="crearCuentaPrincipal();" style="background-color: #0652DD; border:1px solid #0652DD;">Crear cuenta</a>
    </div><br><br>
  </div>


<?php
//buscamos cuenta 
  $query29= ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal9 = $dbConn->prepare($query29);
  $cuentaPrincipal9->execute();
  $hayCuentas9=$cuentaPrincipal9->rowCount();

 ?>


    <div id="modalCuentaCuenta" class="modal">
    <div class="modal-content">
            <h5 class="modal-title" id="exampleModalLongTitle">Crear Cuenta</h5>
              <select class="browser-default" name="cuentaPrincipalCrearCuenta" id="cuentaPrincipal" required>
                             <option>Selecciona Cuenta Principal</option>

                                    <?php 
                                        if($hayCuentas9==0){   
                                    ?>
                                     <option value="0">No hay cuentas!</option>
                                   <?php  }else{   ?>

                                   <?php while ($datosCuentaPrincipal4=$cuentaPrincipal9->fetch(PDO::FETCH_ASSOC)){  ?>

                                  <option  value="<?php echo $datosCuentaPrincipal4['idRegistro']; ?>"><?php echo $datosCuentaPrincipal4['nomenclatura'].' '. $datosCuentaPrincipal4['cuentaPrincipal']; ?></option>


                                     <?php } } ?>     
                        </select><br>

                          <div  id="selectSubcuenta2" >
                          </div><br>

                </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
       <a type="button" class="btn btn-info botonAgg-1" onclick="crearCuentaCuentaForm();" style="background-color: #0652DD; border:1px solid #0652DD;">Crear cuenta</a>
    </div><br><br>
  </div>



<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="modificarCuenta">
                      <div class="col-md-6">
                      <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Nomenclatura</span>
                      <input type="text" class="form-control"  aria-describedby="basic-addon1" name="nomenclaturaEditar" id="nomenclaturaEditar">
                    </div>
                    </div>
                      <div class="col-md-6">
                       <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Cuenta</span>
                      <input type="text" class="form-control"  name="cuentaEditar"  placeholder="Ingrese el nombre de la cuenta" id="cuentaEditar"  aria-describedby="basic-addon1">
                    </div>
                  </div><br><br>
                    

                    <input type="text" name="idRegistroEditar" id="idRegistroEditar" style="display: none;">
                    <input type="text" name="tipoCuenta" value="4" style="display: none;">
                     <input type="text" name="subCuentaEditar" id="subCuentaEditar"  style="display: none;">


                     </form>  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btnGrado btn btn-secondary" style="background-color: grey; border:1px solid grey;" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info botonAgg-1" onclick="guardarCambiosCuenta();" style="background-color: #0652DD; border:1px solid #0652DD;">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
<p id="uriEnviar" style="display:none;"><?php echo $_SESSION['uriLocal']; ?></p>

                    <script type="text/javascript">

                      var uri1 = $('#uriEnviar').text();


              $(document).ready(function(){
                $('.modal').modal();
              });
                  


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
                       buscarCuentas(idSubCuenta,2);

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
                       alert(idSubCuenta);
                       buscarSubcuentas(idSubCuenta,3);

                        });

                      }); 



                      //crear cuenta principal
                      
                      function crearCuentaPrincipal(){

                          var datosGuardar= $("#crearCuentaPrincipal").serialize();

                                //alert(datosGuardar);
                               $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data: datosGuardar,

                                    success:function(r){

                                      $('.salida').html(r);
                                     // swal("Se creo la cuenta!", "felicidades!", "success");
                                       $('#modal3').modal('toggle');

                                        setInterval(function(){
                                        location.reload();

                                     },1000);

                                    }

                                  });


                      }  


                      //crear cuentacuenta

                      function crearCuentaCuentaForm(){
                        var datosGuardar= $("#crearCuentaCuentaEnv").serialize();
                       // alert(datosGuardar);

                               $.ajax({
                                    type: "POST",
                                    url: uri1+'controller/crudCuentasContables.php',
                                    data: datosGuardar,

                                    success:function(r){

                                      $('.salida').html(r);
                                      swal("Se creo la cuenta!", "felicidades!", "success");
                                      // $('#modal3').modal('toggle');

                                        setInterval(function(){
                                        location.reload();

                                     },1000);

                                    }

                                  });

                      }

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

                              $('.salida').html(r);
                              swal("Se creo la cuenta!", "felicidades!", "success");
                               $('#modal3').modal('toggle');

                                setInterval(function(){
                                location.reload();

                             },1000);

                            }

                          });
                        

                    }

                    //editamos la cuenstas que el administrador cree

                    function editarCuenta(nomenclatura,concepto,idRegistro,subCuenta){

                        $("#modal2").modal("show");
                        $('#cuentaEditar').val(concepto);
                        $('#nomenclaturaEditar').val(nomenclatura);
                        $('#idRegistroEditar').val(idRegistro);
                        $('#subCuentaEditar').val(subCuenta);


                      //alert('nomenclatura cambiar '+nomenclatura+' concepto '+concepto+' idRegistro '+idRegistro);
                    }

                    //actualizar cuenta
                    function guardarCambiosCuenta(){
                      
                      var datosGuardar= $("#modificarCuenta").serialize();
                     // alert(datosGuardar);
                       $.ajax({
                            type: "POST",
                            url: uri1+'controladorModulos/crudCuentasContables.php',
                            data: datosGuardar,

                            success:function(r){

                              $('.salida').html(r);
                              swal("Se Actualizo la cuenta", "felicidades!", "success");
                               $('#modal2').modal('toggle');

                               setInterval(function(){
                                location.reload();

                             },1000);

                            }

                          });

                    }



                    function preguntarEliminarCuenta(idRegistro,eventoEliminar){
                      
                      swal({
                        title: "¿Estás seguro que quieres elimanr la cuenta?",
                        text: "Si lo eliminas todos los datos, transacciones y movimientos que hallas realizado con esta cuenta seran eliminados!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                          swal({
                            title: 'Se elimino la cuenta!',
                            text: 'Se elimino satisfactoriamente la cuenta!',
                            icon: 'success'
                          }).then(function() {
                            eliminarCuenta(idRegistro,eventoEliminar); // <--- submit form programmatically
                          });
                        } else {
                          swal("No se elimino ninguna cuenta!");
                        }
                      });



                     
                    }

                    //eliminar cuenta

                    function eliminarCuenta(idRegistro,eventoEjecutar){

                       $.ajax({
                            type: "POST",
                            url: uri1+'controladorModulos/crudCuentasContables.php',
                            data: {
                              "tipoCuenta": eventoEjecutar,
                              "idRegistroEliminar": idRegistro

                            },

                            success:function(r){

                              $('.salida').html(r);

                               setInterval(function(){
                                location.reload();

                             },2000);

                            }

                          });
                    }



//actualizar Cuenta inicial

function actualizarMonto(idConcepto,evento){

  var cantidadAlmacenar=$('montoInicial'+idConcepto).val();

    $.ajax({
        type: "POST",
        url: uri1+'controladorModulos/crudCuentasContables.php',
        data: {
          "idActualizar": idConcepto,
          "tipoCuenta": evento,
          "valorActualizar": cantidadAlmacenar

        },
        success:function(r){
          $('.salida').html(r);

        createAlert('',' ¡Se actualizo el monto Inicial!','Ya se puedes utilizar el monto','success',true,true,'pageMessages');              
              
          setTimeout(function() {

           // location.reload();

          }, 2000);
          
            
        }

      });

}


//funcion para alertas

function createAlert(title, summary, details, severity, dismissible, autoDismiss, appendToId) {
  var iconMap = {
    info: "glyphicon glyphicon-info-sign",
    success: "glyphicon glyphicon-ok",
    warning: "glyphicon glyphicon-warning-sign",
    danger: "glyphicon glyphicon-remove"
  };

  var iconAdded = false;

  var alertClasses = ["alert", "animated", "flipInX"];
  alertClasses.push("alert-" + severity.toLowerCase());

  if (dismissible) {
    alertClasses.push("alert-dismissible");
  }

  var msgIcon = $("<i />", {
    "class": iconMap[severity] // you need to quote "class" since it's a reserved keyword
  });

  var msg = $("<div />", {
    "class": alertClasses.join(" ") // you need to quote "class" since it's a reserved keyword
  });

  if (title) {
    var msgTitle = $("<h4 />", {
      html: title
    }).appendTo(msg);
    
    if(!iconAdded){
      msgTitle.prepend(msgIcon);
      iconAdded = true;
    }
  }

  if (summary) {
    var msgSummary = $("<strong />", {
      html: summary
    }).appendTo(msg);
    
    if(!iconAdded){
      msgSummary.prepend(msgIcon);
      iconAdded = true;
    }
  }

  if (details) {
    var msgDetails = $("<p />", {
      html: details
    }).appendTo(msg);
    
    if(!iconAdded){
      msgDetails.prepend(msgIcon);
      iconAdded = true;
    }
  }
  

  if (dismissible) {
    var msgClose = $("<span />", {
      "class": "close", // you need to quote "class" since it's a reserved keyword
      "data-dismiss": "alert",
      html: "<span class='glyphicon glyphicon-remove'></span>"
    }).appendTo(msg);
  }
  
  $('#' + appendToId).prepend(msg);
  
  if(autoDismiss){
    setTimeout(function(){
      msg.addClass("flipOutX");
      setTimeout(function(){
        msg.remove();
      },2000);
    }, 2000);
  }
}

                    </script>










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
                   
                    
                  </div>
                </div>
                <div id="activity" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">EVENTOS RECIENTES</h6>
                  <div class="activity" id="registroEventos11">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">just now</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="cyan-text medium-small">Yesterday</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                        <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="green-text medium-small">5 Days Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="amber-text medium-small">1 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list row">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                        <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="brown-text medium-small">1 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list row">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="grey-text medium-small">1 Year Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
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