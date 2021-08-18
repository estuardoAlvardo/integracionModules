<?php 

session_start();

include '../conexion/conexion.php';

date_default_timezone_set('America/Guatemala');
$fecha_actual=date("Y-m-d");
$hora_actual=date('H:i:s',time());
$fechaCompleto=$fecha_actual.' '.$hora_actual;

if(@$_POST['eventoEjecutar']==2){

//registro de factura en la tabla factura
  $q3 = ("INSERT INTO factura(numeroFactura, fechaFactura,idCliente,codigoMes,montoFactura) VALUES(:numeroFactura, :fechaFactura,:idCliente,:codigoMes,:montoFactura)");
      $insertarFactura = $dbConn->prepare($q3);
      $insertarFactura->bindParam(':numeroFactura', $_POST['noFactura'], PDO::PARAM_INT);
      $insertarFactura->bindParam(':fechaFactura', $_POST['fechaFactura'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':idCliente', $_POST['idCliente'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':codigoMes', $_POST['mesTransaccion'], PDO::PARAM_INT); 
      $insertarFactura->bindParam(':montoFactura', $_POST['total'], PDO::PARAM_INT); 
      $insertarFactura->execute();

//Consultar movimiento inicial: si esta registrado tomamos id actualizamos estado actual abono y cargo, si no esta registrado ingresamos como movimiento inicial a las cuentas cargo 0 abono 0


echo 'idEmpresa '.$_POST['idEmpresaMaestra'].'<br>';
echo 'idCuentaPrincipal '.$_POST['idCuentaPrincipal'];
echo 'idCuenta '.$_POST['idCuenta'];
echo 'idSubCuenta '.$_POST['idSubCuenta'];


  $q4 = ("SELECT * FROM contaActividadCuenta WHERE idEmpresaMaestra=:idEmpresaMaestra and idCuentaPrincipal=:idCuentaPrincipal and idCuenta=:idCuenta and idSubCuenta=:idSubCuenta");
      $buscarActividadCuenta = $dbConn->prepare($q4);
      $buscarActividadCuenta->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT);
      $buscarActividadCuenta->bindParam(':idCuentaPrincipal', $_POST['idCuentaPrincipal'], PDO::PARAM_INT);
      $buscarActividadCuenta->bindParam(':idCuenta', $_POST['idCuenta'], PDO::PARAM_INT);
      $buscarActividadCuenta->bindParam(':idSubCuenta', $_POST['idSubCuenta'], PDO::PARAM_INT); 
      $buscarActividadCuenta->execute();
      $hayActividadCuenta=$buscarActividadCuenta->rowCount();


      if($hayActividadCuenta==0){
            

            $idNew=hexdec(uniqid());

        echo 'no hay registro se debe de crear un movimiento inicial con cargo=0 y abono=0 y al mismo tiempo se registro detalle con el movimiento de la cuenta el objetivo solo es registrar el detalle e iniciar la cuenta si no existe'.$idNew;


        if($_POST['movimientoAbono']==1){
          $saldoAbono=0;

        }else{
          $saldoAbono=0;
        }

        if($_POST['movimientoCargo']==1){
          $saldoCargo=0;

        }else{
          $saldoCargo=0;
        }

      $q5 = ("INSERT INTO contaActividadCuenta(idRegistro,idCuentaPrincipal, idCuenta,idSubCuenta,saldoInicialAbono,saldoInicialCargo,idEmpresaMaestra,saldoActualAbono,saldoActualCargo,fechaRegistroInicial) VALUES(:idRegistro,:idCuentaPrincipal, :idCuenta,:idSubCuenta,:saldoInicialAbono,:saldoInicialCargo,:idEmpresaMaestra,:saldoActualAbono,:saldoActualCargo,:fechaRegistroInicial)");
      $movimientoInicial = $dbConn->prepare($q5);
      $movimientoInicial->bindParam(':idRegistro', $idNew, PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuentaPrincipal', $_POST['idCuentaPrincipal'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuenta', $_POST['idCuenta'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idSubCuenta', $_POST['idSubCuenta'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':saldoInicialAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoInicialCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $movimientoInicial->bindParam(':saldoActualAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoActualCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':fechaRegistroInicial', $fechaCompleto, PDO::PARAM_STR); 
      $movimientoInicial->execute();



        if($_POST['movimientoAbono']==1){
          $saldoAbonoDetale=$_POST['total'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['movimientoCargo']==1){
          $saldoCargoDetalle=$_POST['total'];

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

      while ($datosCuentaInicial=$buscarActividadCuenta->fetch(PDO::FETCH_ASSOC)){

        $idCuentaInicial=$datosCuentaInicial['idRegistro'];


      }


        if($_POST['movimientoAbono']==1){
          $saldoAbonoDetale=$_POST['total'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['movimientoCargo']==1){
          $saldoCargoDetalle=$_POST['total'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q7 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q7);
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
$fecha_actual=date("d/m/Y");
$hora_actual=date('H:i:s',time());
$fechaCompleto=$fecha_actual.' '.$hora_actual;

//crear el codigo del mes de manera dinamica sin que intervencion humana


$mesActual = date('m');
$anoActual = date('y');
$mesAnterior = date("m",strtotime($fecha_actual."-4 month"));

for ($d=1; $d <=(int)$mesActual ; $d++) { 
  switch ($d) {
    case 1:
      $mesMostrar='Enero (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Diciembre (Anterior)";

      
      break;

    case 2:
      $mesMostrar='Febrero (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;   

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Enero (Anterior)";  

       break;

    case 3:
    $mesMostrar='Marzo (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Febrero (Anterior)";  

      break;

    case 4:
      $mesMostrar='Abril (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Marzo (Anterior)";  
      break;

     case 5:
     $mesMostrar='Mayo (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Abril (Anterior)";  

      break;

     case 6:
     $mesMostrar='Junio (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Mayo (Anterior)";  

      break;

     case 7:
     $mesMostrar='Julio Actual (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Junio (Anterior)";  

      break;

     case 8:
     $mesMostrar='Agosto (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Julio (Anterior)";  
      break;

      case 9:
      $mesMostrar='Septiembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Agosto (Anterior)";  
      break;

    case 10:
    $mesMostrar='Octubre Actual (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Septiembre (Anterior)";  
      break;

      case 11:
      $mesMostrar='Noviembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Octubre (Anterior)";  
      break;

      case 12:
      $mesMostrar='Diciembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Noviembre (Anterior)";  

      break;




    
    default:
     $mesMostrar='No hay mes';
     $codigoActual=0;
     $codMes=0;

      break;
  }

 
}
//buscamos cuentasPrincipales 2
  $query26 = ("SELECT * FROM contaCuentaPrincipal");
  $cuentaPrincipal6 = $dbConn->prepare($query26);
  $cuentaPrincipal6->execute();
  $hayCuentas6=$cuentaPrincipal6->rowCount();

while ($row1=$buscarClientes->fetch(PDO::FETCH_ASSOC)){


  echo '<div class="row" style="margin-left:30px;">
                <div class="col s11 m11 l11">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">receipt</i>
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
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtNoFactura" type="text" >
                              <label for="email">Numero de factura</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtFechaFactura" type="date">
                              <label for="password">Fecha Factura</label>
                            </div>
                          </div>

                          <div>
                           <p>Paquete asignado</p>';

                      $paq1 = ("SELECT * FROM paquete where idpaquete=:idpaquete");
                      $paquetes = $dbConn->prepare($paq1);
                      $paquetes->bindParam(':idpaquete', $row1['paqueteAsignado'], PDO::PARAM_STR);
                      $paquetes->execute();
                      $hayPaqueteAsignado=$paquetes->rowCount();
                        while ($datosPaquete=$paquetes->fetch(PDO::FETCH_ASSOC)){
                          echo '<p>Paquete asignado: '.$datosPaquete['nombrePaquete'].' Q.'.$datosPaquete['totalPaquete'].'</p>';

                          echo '<input type="text" value="'.$datosPaquete['idCuentaPrincipal'].'" style="display:none;"  id="cuentaPrincipal"> ';
                          echo '<input type="text" value="'.$datosPaquete['idCuenta'].'" style="display:none;" id="selectSubcuenta">';
                          echo '<input type="text" value="'.$datosPaquete['idSubCuenta'].'" style="display:none;" id="conceptos">';

                        }


                    echo '</div>


                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtTotal" type="text">
                              <label for="password">Total</label>
                            </div>
                          </div>

                         <div class="row">
                          <p style="margin-left:10px;">Mes de la transacción</p>     
                              <div class="col s3 m3 l3">
                                <p>
                                <label>
                                  <input type="checkbox" class="check'.$row1['idempresa'].'mesAnterior" value="'.$codigoAnterior.'" onclick="mesAnteriorCheck('.$row1['idempresa'].','.$codigoAnterior.');" />
                                  <span title="" >'.$mesAnteriorM.'</span>
                                </label>
                              </p>
                              <p>
                              </div>
                              
                              <div class="col s3 m3 l3">
                              
                                <p>
                                <label>
                                  <input type="checkbox"  class="check'.$row1['idempresa'].'mesActual" value="'.$codigoActual.'"  onclick="mesActualCheck('.$row1['idempresa'].','.$codigoActual.');"  />
                                  <span title="" >'.$mesMostrar.'</span>
                                </label>
                              </p>
                              <p>
                              </div>
                             </div>
                             <input type="text"  id="'.$row1['idempresa'].'txtMes" disabled >
                            
                <div style="display:none;">          
                 <p style="text-align: center; font-size: 16pt;">Seleccione la cuenta por cobrar</p>

                    <select class="browser-default" name="cuentaPrincipal"  required>
                           <option>Selecciona Cuenta Principal</option>';

                      
                          if($hayCuentas6==0){   
                    
                  echo    '<option value="0">No hay cuentas!</option>';
                       }else{  

                    while ($datosCuentaPrincipal2=$cuentaPrincipal6->fetch(PDO::FETCH_ASSOC)){  

                 echo   '<option  value="'.$datosCuentaPrincipal2['idRegistro'].'">'.$datosCuentaPrincipal2['nomenclatura'].' '.$datosCuentaPrincipal2['cuentaPrincipal'].'</option>';


                        } }   
                   echo       '</select><br>

                          <select class="browser-default" name="selectSubcuenta"  required>
                            <option>Selecciona una cuenta</option>
                          </select><br>


                          <select class="browser-default" name="conceptos"  required>
                              <option>Selecciona una Sub-Cuenta</option>

                           </select><br>

                          </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <a class="btn waves-effect waves-light right" id="'.$row1['idempresa'].'" onclick="ingresarFactura(this.id);">Registrar Factura
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
                       //alert(idCuentaPrincipal);
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