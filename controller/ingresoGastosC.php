<?php 
session_start();

include '../conexion/conexion.php';



date_default_timezone_set('America/Guatemala');
$fecha_actual=date("Y-m-d");
$hora_actual=date('H:i:s',time());
$fechaCompleta= $fecha_actual.' '.$hora_actual;


switch($_POST['eventoEjecutar']){

case 1:




  echo 'cuentaPrincipalEgreso '.$_POST['cuentaPrincipal'].' cuentaCuentaEgreso '.$_POST['selectSubcuenta'].' subCuentaEgreso '.$_POST['conceptos'].' facturaServicioPago '.$_POST['facturaServicio'].' descripcion '.$_POST['descripcion'].' docuemento soporte '.$_POST['documentoSoporte'].' idEmpresaMaestra '.$_POST['idEmpresaMaestra'].' CuentaPrincipalGasto '.$_POST['cuentaPrincipalGasto'].' cuentaCuentaGasto '.$_POST['selectSubcuentaGastos'].' subCuentaGasto '.$_POST['conceptosGasto'];


  //ingresamos registro de los gastos


  $q3 = ("INSERT INTO registroGastos(facturaServicio, descripcionServicio,documentoSoporte,montoPago,idEmpresaMaestra,fechaRegistro) VALUES(:facturaServicio, :descripcionServicio,:documentoSoporte,:montoPago,:idEmpresaMaestra,:fechaRegistro)");
      $insertarFactura = $dbConn->prepare($q3);
      $insertarFactura->bindParam(':facturaServicio', $_POST['facturaServicio'], PDO::PARAM_INT);
      $insertarFactura->bindParam(':descripcionServicio', $_POST['descripcion'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':documentoSoporte', $_POST['documentoSoporte'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':montoPago', $_POST['montoPago'], PDO::PARAM_STR); 
      $insertarFactura->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $insertarFactura->bindParam(':fechaRegistro', $fechaCompleta, PDO::PARAM_STR); 
      $insertarFactura->execute();



  //cuenta egreso cargo

      $q4 = ("SELECT * FROM contaActividadCuenta WHERE idEmpresaMaestra=:idEmpresaMaestra and idCuentaPrincipal=:idCuentaPrincipal and idCuenta=:idCuenta and idSubCuenta=:idSubCuenta");
      $buscarActividadCuentaEgreso = $dbConn->prepare($q4);
      $buscarActividadCuentaEgreso->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT);
      $buscarActividadCuentaEgreso->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipal'], PDO::PARAM_INT);
      $buscarActividadCuentaEgreso->bindParam(':idCuenta', $_POST['selectSubcuenta'], PDO::PARAM_INT);
      $buscarActividadCuentaEgreso->bindParam(':idSubCuenta', $_POST['conceptos'], PDO::PARAM_INT); 
      $buscarActividadCuentaEgreso->execute();
      $hayActividadCuentaEgreso=$buscarActividadCuentaEgreso->rowCount();


      if($hayActividadCuentaEgreso==0){
            

            $idNew=hexdec(uniqid());

        echo 'no hay registro se debe de crear un movimiento inicial con cargo=0 y abono=0 y al mismo tiempo se registro detalle con el movimiento de la cuenta el objetivo solo es registrar el detalle e iniciar la cuenta si no existe'.$idNew;


        if($_POST['abonoIngreso']==1){
          $saldoAbono=0;

        }else{
          $saldoAbono=0;
        }

        if($_POST['cargoIngreso']==1){
          $saldoCargo=0;

        }else{
          $saldoCargo=0;
        }

      $q5 = ("INSERT INTO contaActividadCuenta(idRegistro,idCuentaPrincipal, idCuenta,idSubCuenta,saldoInicialAbono,saldoInicialCargo,idEmpresaMaestra,saldoActualAbono,saldoActualCargo,fechaRegistroInicial) VALUES(:idRegistro,:idCuentaPrincipal, :idCuenta,:idSubCuenta,:saldoInicialAbono,:saldoInicialCargo,:idEmpresaMaestra,:saldoActualAbono,:saldoActualCargo,:fechaRegistroInicial)");
      $movimientoInicial = $dbConn->prepare($q5);
      $movimientoInicial->bindParam(':idRegistro', $idNew, PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipal'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuenta', $_POST['selectSubcuenta'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idSubCuenta', $_POST['conceptos'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':saldoInicialAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoInicialCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $movimientoInicial->bindParam(':saldoActualAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoActualCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':fechaRegistroInicial', $fechaCompleta, PDO::PARAM_STR); 
      $movimientoInicial->execute();



        if($_POST['abonoIngreso']==1){
          $saldoAbonoDetale=$_POST['montoPago'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoIngreso']==1){
          $saldoCargoDetalle=$_POST['montoPago'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q8 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q8);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleta, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idNew, PDO::PARAM_INT); 
      $movimientoDetalle->execute();







      }else{

                echo 'Se verifica registro se obtiene el idDelaactividad se anade detalleregistro no se actualiza saldosActuales';



             $idCuentaInicial=0;     

      while ($datosCuentaInicial=$buscarActividadCuentaEgreso->fetch(PDO::FETCH_ASSOC)){

        $idCuentaInicial=$datosCuentaInicial['idRegistro'];


      }


        if($_POST['abonoIngreso']==1){
          $saldoAbonoDetale=$_POST['montoPago'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoIngreso']==1){
          $saldoCargoDetalle=$_POST['montoPago'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q7 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q7);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleta, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idCuentaInicial, PDO::PARAM_INT); 
      $movimientoDetalle->execute();


      }







  //cuenta abono cuenta por pagar gastos servicios



      $q14 = ("SELECT * FROM contaActividadCuenta WHERE idEmpresaMaestra=:idEmpresaMaestra and idCuentaPrincipal=:idCuentaPrincipal and idCuenta=:idCuenta and idSubCuenta=:idSubCuenta");
      $buscarActividadCuentaPorPagar = $dbConn->prepare($q14);
      $buscarActividadCuentaPorPagar->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT);
      $buscarActividadCuentaPorPagar->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalGasto'], PDO::PARAM_INT);
      $buscarActividadCuentaPorPagar->bindParam(':idCuenta', $_POST['selectSubcuentaGastos'], PDO::PARAM_INT);
      $buscarActividadCuentaPorPagar->bindParam(':idSubCuenta', $_POST['conceptosGasto'], PDO::PARAM_INT); 
      $buscarActividadCuentaPorPagar->execute();
      $hayActividadCuentaPorPagar=$buscarActividadCuentaPorPagar->rowCount();





      if($hayActividadCuentaPorPagar==0){
            

            $idNew=hexdec(uniqid());

        echo 'no hay registro se debe de crear un movimiento inicial con cargo=0 y abono=0 y al mismo tiempo se registro detalle con el movimiento de la cuenta el objetivo solo es registrar el detalle e iniciar la cuenta si no existe'.$idNew;


        if($_POST['abonoCuentaPorPagar']==1){
          $saldoAbono=0;

        }else{
          $saldoAbono=0;
        }

        if($_POST['cargoCuentaPorPagar']==1){
          $saldoCargo=0;

        }else{
          $saldoCargo=0;
        }

      $q15 = ("INSERT INTO contaActividadCuenta(idRegistro,idCuentaPrincipal, idCuenta,idSubCuenta,saldoInicialAbono,saldoInicialCargo,idEmpresaMaestra,saldoActualAbono,saldoActualCargo,fechaRegistroInicial) VALUES(:idRegistro,:idCuentaPrincipal, :idCuenta,:idSubCuenta,:saldoInicialAbono,:saldoInicialCargo,:idEmpresaMaestra,:saldoActualAbono,:saldoActualCargo,:fechaRegistroInicial)");
      $movimientoInicial = $dbConn->prepare($q15);
      $movimientoInicial->bindParam(':idRegistro', $idNew, PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipalGasto'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idCuenta', $_POST['selectSubcuentaGastos'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':idSubCuenta', $_POST['conceptosGasto'], PDO::PARAM_INT);
      $movimientoInicial->bindParam(':saldoInicialAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoInicialCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':idEmpresaMaestra', $_POST['idEmpresaMaestra'], PDO::PARAM_INT); 
      $movimientoInicial->bindParam(':saldoActualAbono', $saldoAbono, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':saldoActualCargo', $saldoCargo, PDO::PARAM_STR); 
      $movimientoInicial->bindParam(':fechaRegistroInicial', $fechaCompleta, PDO::PARAM_STR); 
      $movimientoInicial->execute();



        if($_POST['abonoCuentaPorPagar']==1){
          $saldoAbonoDetale=$_POST['montoPago'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaPorPagar']==1){
          $saldoCargoDetalle=$_POST['montoPago'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q18 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q18);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleta, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idNew, PDO::PARAM_INT); 
      $movimientoDetalle->execute();







      }else{

                echo 'Se verifica registro se obtiene el idDelaactividad se anade detalleregistro no se actualiza saldosActuales';



             $idCuentaInicial=0;     

      while ($datosCuentaInicial=$buscarActividadCuentaPorPagar->fetch(PDO::FETCH_ASSOC)){

        $idCuentaInicial=$datosCuentaInicial['idRegistro'];


      }


        if($_POST['abonoCuentaPorPagar']==1){
          $saldoAbonoDetale=$_POST['montoPago'];

        }else{
          $saldoAbonoDetale=0;
        }

        if($_POST['cargoCuentaPorPagar']==1){
          $saldoCargoDetalle=$_POST['montoPago'];

        }else{
          $saldoCargoDetalle=0;
        }



      $q17 = ("INSERT INTO contaRegistroMovimientoDetalle(abono, credito,fechaMovimiento,idContaActividadCuenta) VALUES(:abono, :credito,:fechaMovimiento,:idContaActividadCuenta)");
      $movimientoDetalle = $dbConn->prepare($q17);
      $movimientoDetalle->bindParam(':abono', $saldoAbonoDetale, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':credito', $saldoCargoDetalle, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':fechaMovimiento', $fechaCompleta, PDO::PARAM_STR);
      $movimientoDetalle->bindParam(':idContaActividadCuenta', $idCuentaInicial, PDO::PARAM_INT); 
      $movimientoDetalle->execute();


      }




break;

}


?>