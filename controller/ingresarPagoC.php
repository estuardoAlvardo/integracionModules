<?php

session_start();

include '../conexion/conexion.php';

//echo $_POS['txtBuscar'];
date_default_timezone_set('America/Guatemala');
$fecha_actual=date("Y-m-d");
$hora_actual=date('H:i:s',time());
$fechaCompleto= $fecha_actual.' '.$hora_actual;


if(@$_POST['eventoEjecutar']==2){

  $q3 = ("INSERT INTO pagos(idCliente, noFactura,fechaPago,monto,noDocumentoPago) VALUES(:idCliente, :noFactura,:fechaPago,:monto,:noDocumentoPago)");
      $insertarPago = $dbConn->prepare($q3);
      $insertarPago->bindParam(':idCliente', $_POST['idCliente'], PDO::PARAM_INT);
      $insertarPago->bindParam(':noFactura', $_POST['noFactura'], PDO::PARAM_INT);
      $insertarPago->bindParam(':fechaPago', $_POST['fechaPago'], PDO::PARAM_STR);
      $insertarPago->bindParam(':monto', $_POST['monto'], PDO::PARAM_INT); 
      $insertarPago->bindParam(':noDocumentoPago', $_POST['noDocumento'], PDO::PARAM_INT); 
      $insertarPago->execute();



    echo 'idCliente '.$_POST['idCliente'].' noFactura '.$_POST['noFactura'].' fechaPago '.$_POST['fechaPago'].' noDocumento '.$_POST['noDocumento'].' monto '.$_POST['monto'].' eventoEjecutar '.$_POST['eventoEjecutar'].' cuentaPrincipalAbono '.$_POST['cuentaPrincipalAbono'].' cuentaCuentaAbono '.$_POST['cuentaCuentaAbono'].' subCuentaAbono '.$_POST['subCuentaAbono'].' abonoCuentaPorCobrar '.$_POST['abonoCuentaPorCobrar'].' cargoCuentaPorCobrar '.$_POST['cargoCuentaPorCobrar'].' cuentaPrincipalIngreso '.$_POST['cuentaPrincipalIngreso'].' cuentaCuentaIngreso '.$_POST['cuentaCuentaIngreso'].' subCuentaIngreso '.$_POST['subCuentaIngreso'].' abonoCuentaIngreso '.$_POST['abonoCuentaIngreso'].' cargoCuentaIngreso '.$_POST['cargoCuentaIngreso'].' idEmpresaMaestra '.$_POST['idEmpresaMaestra'];




    //ingresamos el abono a cuentas por cobrar -------------------------------------------------------

    //buscamos actividad cuenta por cobrar para ingresar ----------------------------------

    $q4 = ("SELECT * FROM contaActividadCuenta  WHERE idEmpresaMaestra=:idEmpresaMaestra and idCuentaPrincipal=:idCuentaPrincipal and idCuenta=:idCuenta and idSubCuenta=:idSubCuenta");
      $buscarActividadCuentaAbono = $dbConn->prepare($q4);
      $buscarActividadCuentaAbono->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT);
      $buscarActividadCuentaAbono->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalAbono'], PDO::PARAM_INT);
      $buscarActividadCuentaAbono->bindParam(':idCuenta', $_POST['cuentaCuentaAbono'], PDO::PARAM_INT);
      $buscarActividadCuentaAbono->bindParam(':idSubCuenta', $_POST['subCuentaAbono'], PDO::PARAM_INT); 
      $buscarActividadCuentaAbono->execute();
      $hayActividadCuentaAbono=$buscarActividadCuentaAbono->rowCount();



     if($hayActividadCuentaAbono==0){
            

            $idNew=hexdec(uniqid());

        echo 'no hay registro se debe de crear un movimiento inicial con cargo=0 y abono=0 y al mismo tiempo se registro detalle con el movimiento de la cuenta el objetivo solo es registrar el detalle e iniciar la cuenta si no existe'.$idNew;


        if($_POST['abonoCuentaPorCobrar']==1){
          $saldoAbono=0;

        }else{
          $saldoAbono=0;
        }

        if($_POST['cargoCuentaPorCobrar']==1){
          $saldoCargo=0;

        }else{
          $saldoCargo=0;
        }

      $q5 = ("INSERT INTO contaActividadCuenta(idRegistro,idCuentaPrincipal, idCuenta,idSubCuenta,saldoInicialAbono,saldoInicialCargo,idEmpresaMaestra,saldoActualAbono,saldoActualCargo,fechaRegistroInicial) VALUES(:idRegistro,:idCuentaPrincipal, :idCuenta,:idSubCuenta,:saldoInicialAbono,:saldoInicialCargo,:idEmpresaMaestra,:saldoActualAbono,:saldoActualCargo,:fechaRegistroInicial)");
      $movimientoInicial = $dbConn->prepare($q5);
      $movimientoInicial->bindParam(':idRegistro', $idNew, PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalAbono'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuenta', $_POST['cuentaCuentaAbono'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idSubCuenta', $_POST['subCuentaAbono'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':saldoInicialAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoInicialCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $movimientoInicial->bindParam(':saldoActualAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoActualCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':fechaRegistroInicial', $fechaCompleto, PDO::PARAM_STR); 
      $movimientoInicial->execute();



        if($_POST['abonoCuentaPorCobrar']==1){
          $saldoAbonoDetale=$_POST['monto'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaPorCobrar']==1){
          $saldoCargoDetalle=$_POST['monto'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q5 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q5);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleto, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idNew, PDO::PARAM_INT); 
      $movimientoDetalle->execute();







      }else{

                echo 'Se verifica registro se obtiene el idDelaactividad se anade detalleregistro no se actualiza saldosActuales';



             $idCuentaInicial=0;     

      while ($datosCuentaInicial=$buscarActividadCuentaAbono->fetch(PDO::FETCH_ASSOC)){

        $idCuentaInicial=$datosCuentaInicial['idRegistro'];


      }



        if($_POST['abonoCuentaPorCobrar']==1){
          $saldoAbonoDetale=$_POST['monto'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaPorCobrar']==1){
          $saldoCargoDetalle=$_POST['monto'];

        }else{
          $saldoCargoDetalle=0;
        }





      $q5 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q5);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleto, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idCuentaInicial, PDO::PARAM_INT); 
      $movimientoDetalle->execute();

      }

    //ingresamos el abono a cuentas por cobrar -------------------------------------------------------




    //buscamos actividad cuenta por cobrar para ingresar ----------------------------------





    //ingresamos  a cuentas ingreso -------------------------------------------------------

    //buscamos a cuentas ingreso ----------------------------------

    $q7 = ("SELECT * FROM contaActividadCuenta  WHERE idEmpresaMaestra=:idEmpresaMaestra and idCuentaPrincipal=:idCuentaPrincipal and idCuenta=:idCuenta and idSubCuenta=:idSubCuenta");
      $buscarActividadIngreso = $dbConn->prepare($q7);
      $buscarActividadIngreso->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT);
      $buscarActividadIngreso->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalIngreso'], PDO::PARAM_INT);
      $buscarActividadIngreso->bindParam(':idCuenta', $_POST['cuentaCuentaIngreso'], PDO::PARAM_INT);
      $buscarActividadIngreso->bindParam(':idSubCuenta', $_POST['subCuentaIngreso'], PDO::PARAM_INT); 
      $buscarActividadIngreso->execute();
      $hayActividadIngreso=$buscarActividadIngreso->rowCount();




     if($hayActividadIngreso==0){
            

            $idNew=hexdec(uniqid());

        echo 'no hay registro se debe de crear un movimiento inicial con cargo=0 y abono=0 y al mismo tiempo se registro detalle con el movimiento de la cuenta el objetivo solo es registrar el detalle e iniciar la cuenta si no existe'.$idNew;


        if($_POST['abonoCuentaIngreso']==1){
          $saldoAbono=0;

        }else{
          $saldoAbono=0;
        }

        if($_POST['cargoCuentaIngreso']==1){
          $saldoCargo=0;

        }else{
          $saldoCargo=0;
        }

      $q120 = ("INSERT INTO contaActividadCuenta(idRegistro,idCuentaPrincipal, idCuenta,idSubCuenta,saldoInicialAbono,saldoInicialCargo,idEmpresaMaestra,saldoActualAbono,saldoActualCargo,fechaRegistroInicial) VALUES(:idRegistro,:idCuentaPrincipal, :idCuenta,:idSubCuenta,:saldoInicialAbono,:saldoInicialCargo,:idEmpresaMaestra,:saldoActualAbono,:saldoActualCargo,:fechaRegistroInicial)");
      $movimientoInicial = $dbConn->prepare($q120);
      $movimientoInicial->bindParam(':idRegistro', $idNew, PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalIngreso'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuenta', $_POST['cuentaCuentaIngreso'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idSubCuenta', $_POST['subCuentaIngreso'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':saldoInicialAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoInicialCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $movimientoInicial->bindParam(':saldoActualAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoActualCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':fechaRegistroInicial', $fechaCompleto, PDO::PARAM_STR); 
      $movimientoInicial->execute();



        if($_POST['abonoCuentaIngreso']==1){
          $saldoAbonoDetale=$_POST['monto'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaIngreso']==1){
          $saldoCargoDetalle=$_POST['monto'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q121 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q121);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleto, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idNew, PDO::PARAM_INT); 
      $movimientoDetalle->execute();







      }else{

                echo 'Se verifica registro se obtiene el idDelaactividad se anade detalleregistro no se actualiza saldosActuales';



             $idCuentaInicial=0;     

      while ($datosCuentaInicial=$buscarActividadIngreso->fetch(PDO::FETCH_ASSOC)){

        $idCuentaInicial=$datosCuentaInicial['idRegistro'];


      }



        if($_POST['abonoCuentaIngreso']==1){
          $saldoAbonoDetale=$_POST['monto'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaIngreso']==1){
          $saldoCargoDetalle=$_POST['monto'];

        }else{
          $saldoCargoDetalle=0;
        }





      $q122 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q122);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleto, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idCuentaInicial, PDO::PARAM_INT); 
      $movimientoDetalle->execute();

      }












}else{




if (isset($_POST['txtBuscar']) and !empty($_POST['txtBuscar'])) {

	$nombreBuscar="%".$_POST['txtBuscar']."%";

$q1 = ("SELECT * FROM empresa where nombreCliente LIKE :buscar or razonSocial LIKE :buscar");
            $buscarClientes = $dbConn->prepare($q1);
            $buscarClientes->bindParam(':buscar', $nombreBuscar, PDO::PARAM_STR); 
            $buscarClientes->execute();


date_default_timezone_set('America/Guatemala');
$fecha_actual=date("Y-m-d");
$hora_actual=date('H:i:s',time());
$fechaCompleto=$fecha_actual.' '.$hora_actual;

//crear el codigo del mes de manera dinamica sin que intervencion humana

/*
$mesActual = date('m');
$anoActual = date('y');

for ($d=1; $d <=(int)$mesActual ; $d++) { 
  switch ($d) {
    case 1:
      $mesMostrar='Enero';
      $codMes=$d;
      $codigoAmarre=$codMes
      
      break;

    case 2:
      # code...
      break;

    case 3:
      # code...
      break;

    case 4:
      # code...
      break;

     case 5:
      # code...
      break;

     case 6:
      # code...
      break;

     case 7:
      # code...
      break;

     case 8:
      # code...
      break;

      case 9:
      # code...
      break;

    case 10:
      # code...
      break;

      case 11:
      # code...
      break;

      case 12:
      # code...
      break;




    
    default:
      # code...
      break;
  }

 
}

*/


//buscamos cuentasPrincipales 2
  $query26 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal6 = $dbConn->prepare($query26);
  $cuentaPrincipal6->execute();
  $hayCuentas6=$cuentaPrincipal6->rowCount();



while ($row1=$buscarClientes->fetch(PDO::FETCH_ASSOC)){

switch ($row1["periodo"]) {
  case 1:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Mensual</div>'; 
    break;
  case 2:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Bimensual</div>'; 
    break;
  case 3:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Trimestral</div>';  
    break;
  case 4:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Cuatrimestre</div>';  
    break;
  case 5:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Quintrimestre</div>'; 
    break;
  case 6:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Semestre</div>';  
    break;
  case 12:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Anual</div>'; 
    break;

  default:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Sin especificar</div>';
    break;
}
  

  switch ($row1['estado']) {

      case 2:
        $estadoEmpresa='<div class="chip z-depth-2 light-blue lighten-1" style="color:black;">Ocacional</div>';  
            
      break;
    case 3:
      $estadoEmpresa='<div class="chip z-depth-2 yellow lighten-1" style="color:black;">Suspendido</div>';
      break;
    case 4:
      $estadoEmpresa='<div class="chip z-depth-2 orange" style="color:black;">Fraude</div>';
      break;
    
    case 5:
      $estadoEmpresa='<div class="chip z-depth-2 deep-orange accent-4" style="color:white;">Inactivo</div>';      
      break; 
    
    default:
      $estadoEmpresa='<div class="chip z-depth-2 green accent-3" style="color:black;">Activo</div>';        
    break;
  }

  if(empty($row1['nombreCliente'])){  $nombreCliente= "Sin nombre cliente" ;}else {  $nombreCliente= $row1['nombreCliente']; }

  if (empty($row1['pbx'])) {
                           $pbx=" Sin PBX"; }else{  $pbx=" ".$row1['pbx']; }

if (empty($row1['fechaCorte'])) {
                          $fechaCorte=" Sin fecha corte";
                        }else{
                           $fechaCorte=" ".$row1['fechaCorte'];

                        }
    if (empty($row1['razonSocial'])) {
                        $razonSocial="Sin razón social"; }else{  $razonSocial= $row1['razonSocial'] ;}


if (empty($row1['nit'])) {
                          $nit= " Sin Nit"; }else{ $nit= " ".$row1['nit']; }

            		echo '<div class="row" style="margin-left:30px;">
                <div class="col s11 m11 l11">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">payment</i>
                      <h6 class="collection-header m-0">'.$row1['razonSocial'].'</h6>
                      <p>'.$row1['nombreCliente'].'</p>
                    </li>
                    <form id="pagoRegistrar" class="col s12">

                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtIdCliente" type="text" value="'.$row1['idempresa'].'" autofocus style="display:none;">
                              <input id="'.$row1['idempresa'].'eventoEjecutar" type="text" value="2" style="display:none;">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12 m12 l12">
                            <p>Paquete asignado:</p>';

                      $paq1 = ("SELECT * FROM paquete where idpaquete=:idpaquete");
                      $paquetes = $dbConn->prepare($paq1);
                      $paquetes->bindParam(':idpaquete', $row1['paqueteAsignado'], PDO::PARAM_STR);
                      $paquetes->execute();
                      $hayPaqueteAsignado=$paquetes->rowCount();
                        while ($datosPaquete=$paquetes->fetch(PDO::FETCH_ASSOC)){
                          echo '<p>'.$datosPaquete['nombrePaquete'].' Q.'.$datosPaquete['totalPaquete'].'</p>';

                          echo '<input type="text" value="'.$datosPaquete['idCuentaPrincipal'].'" style="display:none;"  id="cuentaPrincipalAbono"> ';
                          echo '<input type="text" value="'.$datosPaquete['idCuenta'].'" style="display:none;" id="selectSubcuentaAbono">';
                          echo '<input type="text" value="'.$datosPaquete['idSubCuenta'].'" style="display:none;" id="conceptosAbono"></div>';
                          echo '<input type="text" value="'.$row1['idempresa'].'" style="display:none;">';


                        }

                   echo  '
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtNoFactura" type="text" >
                              <label for="email">Numero de factura</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtFechaPago" type="date">
                              <label for="password">Fecha Pago</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtDocumentoPago" type="text">
                              <label for="password">Documento Pago</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtMonto" type="text">
                              <label for="password">Monto</label>
                            </div>
                          </div>

              <div style="display:block;">
                  <p style="text-align: center; font-size: 16pt;">Seleccione las cuentas de ingreso</p>

                    <select class="browser-default" name="cuentaPrincipal" id="cuentaPrincipal"  required>
                           <option>Selecciona la cuenta de ingreso</option>';

                      
                          if($hayCuentas6==0){   
                    
                  echo    '<option value="0">No hay cuentas!</option>';
                       }else{  

                    while ($datosCuentaPrincipal2=$cuentaPrincipal6->fetch(PDO::FETCH_ASSOC)){  

                 echo   '<option  value="'.$datosCuentaPrincipal2['idRegistro'].'">'.$datosCuentaPrincipal2['nomenclatura'].' '.$datosCuentaPrincipal2['cuentaPrincipal'].'</option>';


                        } }   
                   echo       '</select><br>

                          <select class="browser-default" name="selectSubcuenta" id="selectSubcuenta" required>
                            <option>Selecciona una cuenta</option>
                          </select><br>


                          <select class="browser-default" name="conceptos" id="conceptos"  required>
                              <option>Selecciona una Sub-Cuenta</option>

                           </select><br>
</div>

                            <div class="row">
                              <div class="input-field col s12">
                                <a class="btn waves-effect waves-light right" id="'.$row1['idempresa'].'" onclick="ingresarPagos(this.id);">Registrar pago
                                  <i class="material-icons right">send</i>
                                </a>
                              </div>
                            </div>
                        </form>
                    
                    
                  </ul>
                </div>
                </div>';
            }

echo '<script type="text/javascript">


                     $(document).ready(function() {
                       $("select[name=cuentaPrincipal]").change(function(){
                       var idCuentaPrincipal = $("select[name=cuentaPrincipal]").val();
                      // alert(idCuentaPrincipal);
                       buscarSubcuentas(idCuentaPrincipal,1);
                        });

                     });


                       $(document).ready(function(){

                       $("select[name=selectSubcuenta]").change(function(){
                       var idSubCuenta = $("select[name=selectSubcuenta]").val();
                      // alert(idSubCuenta);
                       buscarCuentas(idSubCuenta,12);

                        });

                      }); 


 </script>';


}else{
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No ha realizado ninguna búsqueda!! :) 
    <i class="close material-icons">close</i>
  	</div>
  </div>';
}

}
?>