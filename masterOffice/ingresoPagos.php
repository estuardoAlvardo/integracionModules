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
	<title>Ingreso Pagos - <?php echo $_SESSION['nombre']; ?></title>
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
                <a href="perfil.php" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Perfil</a>
              </li>
              
              <li>
                <a href="../controller/logout.php" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Salir</a>
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
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
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
        <section >
          <!--start container-->
          <h4 style="text-align: center;">Pago</h4>

          <div class="col s12">
            <div class="row">
              <div class="input-field col s11 m11 l11" style="margin-left: 20px;">
                <i class="material-icons prefix">search</i>
                <input type="text" id="txtBuscar" class="autocomplete" >
                <label for="autocomplete">Buscar Cliente</label>
              </div>
            </div>
                  
                  <div class="salida2"></div>

                 <div class="row salida">
                   
                 </div>
              
          </div>


          <div class="row">
            <div class="col s1 m1 l1"></div>
            <div clas="col s10 m10 l10">
              <h5 style="text-align: center;">Registro Pagos</h5>
              <table class="responsive-table striped centered">
                    <thead>
                      <tr>
                          
                          <th># Registro</th>
                          <th>Nombre Cliente</th>
                          <th>No Factura</th>
                          <th>Fecha Pago</th>
                          <th>Monto</th>
                          <th>No documento</th>

                      </tr>
                    </thead>
                     <tbody>  
 <?php


$query1 = ("SELECT * FROM pagos order by idRegistroPago desc");
            $buscarPagos1 = $dbConn->prepare($query1);
            $buscarPagos1->execute();

while ($consultar1=$buscarPagos1->fetch(PDO::FETCH_ASSOC)){ ?>                   
                      <tr>
                        <td><?php echo $consultar1['idRegistroPago']; ?></td>
                        <td><?php 
            $query2 = ("SELECT razonSocial FROM empresa where idempresa=0 or idempresa=:idempresa");
            $buscarEmpresas = $dbConn->prepare($query2);
            $buscarEmpresas->bindParam(':idempresa', $consultar1['idCliente'], PDO::PARAM_INT); 
            $buscarEmpresas->execute();

  while ($consultar2=$buscarEmpresas->fetch(PDO::FETCH_ASSOC)){
    

    echo $consultar2['razonSocial'];}?></td>
                        <td><?php echo $consultar1['noFactura']; ?></td>
                        <td><?php echo $consultar1['fechaPago']; ?></td>
                        <td>Q. <?php echo $consultar1['monto']; ?></td>
                        <td><?php echo $consultar1['noDocumentoPago']; ?></td>
                      </tr>
                    
<?php } ?>
              </tbody>
          </table>
            </div>
            
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
    <p id="idEmpresaEnviar" style="display: none;"><?php echo $_SESSION['empresa']; ?></p>

    <script type="text/javascript">

   $(document).ready(function () {
    $('#modal1').modal();
    // $('#select').formSelect();
});
   
var uri1 = $("#uriEnviar").text();

      ///funcion para busqueda

      $("#txtBuscar").keyup(function(){

        var text = "txtBuscar="+$(this).val();
               
        $.ajax({
          data:text,
          url: uri1+'controller/ingresarPagoC.php',
          type: 'POST',
          beforeSend: function(){ },
          success: function (response){
            $('.salida').html(response);

          },
          error: function(){
            alert("error");
          } 


        });
     


      });


function ingresarPagos(clicked_id){

var idCliente=$("#"+clicked_id+"txtIdCliente").val();
var noFactura=$("#"+clicked_id+"txtNoFactura").val();
var fechaPago=$("#"+clicked_id+"txtFechaPago").val();
var noDocumento=$("#"+clicked_id+"txtDocumentoPago").val();
var monto=$("#"+clicked_id+"txtMonto").val();
var eventoEjecutar=$("#"+clicked_id+"eventoEjecutar").val();

//abono cuenta abono por cobrar
var cuentaPrincipalAbono=$('#cuentaPrincipalAbono').val();
var cuentaCuentaAbono=$('#selectSubcuentaAbono').val();
var subCuentaAbono=$('#conceptosAbono').val();
var abonoCuentaPorCobrar=1;
var cargoCuentaPorCobrar=0;

//cuenta abono ingresos
var cuentaPrincipal=$('#cuentaPrincipal').val();
var cuentaCuenta=$('#selectSubcuenta').val();
var subCuenta=$('#conceptos').val();
var abonoCuentaIngreso=1;
var cargoCuentaIngreso=0;

var idEmpresaMaestra=$('#idEmpresaEnviar').text();


//alert("idCliente "+idCliente+" noFactura "+noFactura+" fechaPago "+fechaPago+" noDocumento "+noDocumento+" monto "+monto+ " eventoEjecutar "+eventoEjecutar+' cuenta principal abono cobrar '+cuentaPrincipalAbono+' cuentaCuentaAbono '+cuentaCuentaAbono+' subCuentaAbono '+subCuentaAbono+' cuentaPrincipal Ingreso '+cuentaPrincipal+' cuenta Ingreso '+cuentaCuenta+' subCuenta Ingreso '+subCuenta+' idEmpresaMaestra'+idEmpresaMaestra);


       

     
      $.ajax({
        type: "POST",
        url: uri1+"controller/ingresarPagoC.php",
        data: {
        "idCliente": idCliente,
        "noFactura": noFactura,
        "fechaPago": fechaPago,
        "noDocumento": noDocumento,
        "monto": monto,
        "eventoEjecutar": eventoEjecutar,
        "cuentaPrincipalAbono": cuentaPrincipalAbono,
        "cuentaCuentaAbono": cuentaCuentaAbono,
        "subCuentaAbono": subCuentaAbono,
        "abonoCuentaPorCobrar": abonoCuentaPorCobrar,
        "cargoCuentaPorCobrar": cargoCuentaPorCobrar,
        "cuentaPrincipalIngreso": cuentaPrincipal,
        "cuentaCuentaIngreso": cuentaCuenta,
        "subCuentaIngreso": subCuenta,
        "abonoCuentaIngreso": abonoCuentaIngreso,
        "cargoCuentaIngreso": cargoCuentaIngreso,
        "idEmpresaMaestra": idEmpresaMaestra


      },
        success:function(r){
           // $('.salida2').html(r);
            M.toast({html: 'Se ha registrado el pago de manera correcta :)', classes: 'rounded'});
            
        }

      });





}


 //buscamos subcuentaPrincipal

                       function buscarSubcuentas(idCuentaPrincipal,tipoCuenta){
                        //tipoCuenta  1=subCuenta 2=concepto
                      //  alert('idCuentaPrincipal'+idCuentaPrincipal);
                        $.ajax({
                            type: "POST",
                            url: uri1+"controller/crudCuentasContables.php",
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $("#selectSubcuenta").html(r);

                         
                            }

                          });

                    }


                    function buscarCuentaCuenta(idCuentaPrincipal,tipoCuenta){

                        $.ajax({
                            type: "POST",
                            url: uri1+"controller/crudCuentasContables.php",
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $("#selectSubcuenta2").html(r);
                           //$(".salida").html(r);

                         
                            }

                          });

                    }

                       function buscarCuentas(idCuentaPrincipal,tipoCuenta){
                        //tipoCuenta  1=subCuenta 2=concepto


                        $.ajax({
                            type: "POST",
                            url: uri1+"controller/crudCuentasContables.php",
                            data: {
                            "idBuscar": idCuentaPrincipal,
                            "tipoCuenta": tipoCuenta
                            },

                            success:function(r){

                              $("#conceptos").html(r);

                         
                            }

                          });

                    }

                    function crearCuenta(){

                       var datosGuardar= $("#crearCuenta").serialize();
                      // alert(datosGuardar);
                       
                       $.ajax({
                            type: "POST",
                            url: uri1+"controller/crudCuentasContables.php",
                            data: datosGuardar,

                            success:function(r){

                             // $(".salida").html(r);
                              swal("Se creo la cuenta!", "felicidades!", "success");

                                setInterval(function(){
                                location.reload();

                             },1000);

                            }

                          });
                        

                    }


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