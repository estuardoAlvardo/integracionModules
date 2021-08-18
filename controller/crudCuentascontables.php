<?php 
session_start();

			require("../conexion/conexion.php");

			date_default_timezone_set('America/Guatemala');

			$fecha_actual=date("d/m/Y");
			$fechaCompleta=date('Y-m-d H:i:s',time());

switch ($_POST['tipoCuenta']) {
	case 1:
		# buscar subCuentas

		  $query2 = ("SELECT * FROM contaSubcuenta where cuentaPrincipal=:cuentaPrincipal");
          $subCuentas = $dbConn->prepare($query2);
          $subCuentas->bindParam(':cuentaPrincipal',$_POST['idBuscar'], PDO::PARAM_INT);
          $subCuentas->execute(); 
          $hayCuentas=$subCuentas->rowCount();
 
          echo '<option>Selecciona una SubCuenta</option>';
                         
                          if($hayCuentas==0){
                            
          echo  '<option value="0">No hay cuentas!</option>';
                       }else{  

                     while ($datosSubcuentas=$subCuentas->fetch(PDO::FETCH_ASSOC)){ 

           echo '<option  value="'.$datosSubcuentas['idRegistro'].'">'.$datosSubcuentas['nomenclatura'].' '.$datosSubcuentas['subCuenta'].'</option>';


                       } }    
               echo      '<br>';





		break;

		case 2:

		  $query2 = ("SELECT * FROM contaConcepto where subCuenta=:subCuenta");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':subCuenta',$_POST['idBuscar'], PDO::PARAM_INT);
          $cuentas->execute(); 
          $hayCuentas=$cuentas->rowCount();
 			 echo '<p>Cuentas Actuales</p>'; 
              
                          if($hayCuentas==0){
                            
          echo  '<p value="0">No hay cuentas!</p>';
                       }else{  

                     while ($datosCuentas=$cuentas->fetch(PDO::FETCH_ASSOC)){ 



           echo '<p>'.$datosCuentas['nomenclatura'].'  '.$datosCuentas['concepto'].'</p>';

           

           

                       } }    
               echo      '<div class="row">
  <div class="col s6 m6 l6">
      <input type="text" name="nomenclaturaIngresar" class="form-control" placeholder="Ingrese nomenclatura">
  </div>
  <div class="col s6 m6 l6">
      <input type="text" name="cuentaIngresar" class="form-control" placeholder="Ingrese el nombre de la cuenta">
  </div>
</div>';

		

		break;

    case 3:

          //funcion para agregar una cuenta a la coleccion de cuentas
          $cuentaCreada=1;

          $query2 = ("INSERT INTO contaConcepto(concepto,nomenclatura,subCuenta,cuentaCreada) values(:concepto,:nomenclatura,:subCuenta,:cuentaCreada)");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':concepto',$_POST['cuentaIngresar'], PDO::PARAM_STR);
          $cuentas->bindParam(':nomenclatura',$_POST['nomenclaturaIngresar'], PDO::PARAM_STR);
          $cuentas->bindParam(':subCuenta',$_POST['selectSubcuenta'], PDO::PARAM_INT);
          $cuentas->bindParam(':cuentaCreada',$cuentaCreada, PDO::PARAM_INT);

          $cuentas->execute(); 




    break;


    case 4:

    //funcion para actualizar la cuenta
   // echo 'actualizando...';
              $cuentaCreada=1;

             $query2 = ("UPDATE contaConcepto set concepto=:concepto, nomenclatura=:nomenclatura,subCuenta=:subCuenta, cuentaCreada=:cuentaCreada where idRegistro=:idRegistro");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':concepto',$_POST['cuentaEditar'], PDO::PARAM_STR);
          $cuentas->bindParam(':nomenclatura',$_POST['nomenclaturaEditar'], PDO::PARAM_STR);
          $cuentas->bindParam(':subCuenta',$_POST['subCuentaEditar'], PDO::PARAM_INT);
          $cuentas->bindParam(':cuentaCreada',$cuentaCreada, PDO::PARAM_INT);
          $cuentas->bindParam(':idRegistro',$_POST['idRegistroEditar'], PDO::PARAM_INT);
          $cuentas->execute(); 

    break;


    case 5:

    //funcion para eliminar la cuenta creada 
          $query2 = ("DELETE FROM contaConcepto where idRegistro=:idRegistro");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':idRegistro',$_POST['idRegistroEliminar'], PDO::PARAM_INT);
          $cuentas->execute(); 



    break;


    case 6:

         $query2 = ("UPDATE contaConcepto set movimientoInicial=:movimientoInicial, fechaIngresoInicial=:fechaIngresoInicial");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':concepto',$_POST['cuentaEditar'], PDO::PARAM_STR);
          $cuentas->bindParam(':nomenclatura',$_POST['nomenclaturaEditar'], PDO::PARAM_STR);
          $cuentas->execute(); 

    break;

    case 7:

              $query2 = ("INSERT INTO contaCuentaPrincipal(cuentaPrincipal,nomenclatura) values(:cuentaPrincipal,:nomenclatura)");
          $cuentas = $dbConn->prepare($query2);
          $cuentas->bindParam(':cuentaPrincipal',$_POST['cuentaIngresar'], PDO::PARAM_STR);
          $cuentas->bindParam(':nomenclatura',$_POST['nomenclaturaIngresar'], PDO::PARAM_STR);
          $cuentas->execute(); 

    break;

    case 8:
    # buscar subCuentas

     $query2 = ("SELECT * FROM contaSubcuenta where cuentaPrincipal=:cuentaPrincipal");
          $subCuentas = $dbConn->prepare($query2);
          $subCuentas->bindParam(':cuentaPrincipal',$_POST['idBuscar'], PDO::PARAM_INT);
          $subCuentas->execute(); 
          $hayCuentas=$subCuentas->rowCount();

          if($hayCuentas==0){
            echo '<p>No hay cuentas creadas!!</p>';
          }else{

          while ($datosSubcuentas=$subCuentas->fetch(PDO::FETCH_ASSOC)){ 

           echo '<p>'.$datosSubcuentas['nomenclatura'].' '.$datosSubcuentas['subCuenta'].'</p>';


                       }

                       echo '
             <form id="crearCuentaCuentaEnv">
                <div class="col s6 m6 l6">
                    <input type="text" name="nomenclaturaIngresarN" class="form-control" placeholder="Ingrese nomenclatura">
                </div>
                <div class="col s6 m6 l6">
                    <input type="text" name="cuentaIngresarN" class="form-control" placeholder="Ingrese el nombre de la cuenta">
                </div>

                      <input type="text" name="tipoCuenta" class="form-control" value="9" style="display: none;">
                      <input type="text" name="cuentaPrincipal" value="'.$_POST['idBuscar'].'" style="display:none;">
                  </form>';


                }       


    break;


    case 9:


         $queryN = ("INSERT INTO contaSubcuenta(subCuenta,nomenclatura,cuentaPrincipal) values(:subCuenta,:nomenclatura,:cuentaPrincipal)");
          $cuentasPp = $dbConn->prepare($queryN);
          $cuentasPp->bindParam(':subCuenta',$_POST['cuentaIngresarN'], PDO::PARAM_STR);
          $cuentasPp->bindParam(':nomenclatura',$_POST['nomenclaturaIngresarN'], PDO::PARAM_STR);
          $cuentasPp->bindParam(':cuentaPrincipal',$_POST['cuentaPrincipal'], PDO::PARAM_INT);

          $cuentasPp->execute(); 



    break;


    case 10:
    //ingresar saldo inicial abono


      // echo 'idCuentaPrincipal '.$_POST['idCuentaPrincipal'].'<br>';
      // echo 'idCuentaCuenta '.$_POST['idCuentaCuenta'].'<br>';
      // echo 'idSubCuenta '.$_POST['idSubCuenta'].'<br>';
     //  echo 'saldoInicialAbono '.$_POST['saldoInicialAbono'].'<br>';
      // echo 'idEmpresa'.$_POST['idEmpresaMaster'].'<br>';

           $queryN = ("INSERT INTO contaActividaddCuenta(idCuentaPrincipal,idCuenta,idSubCuenta,saldoInicialAbono,idEmpresaMaestra) values(:idCuentaPrincipal,:idCuenta,:idSubCuenta,:saldoInicialAbono,:idEmpresaMaestra)");
          $insertSaldoInicialAbono = $dbConn->prepare($queryN);
          $insertSaldoInicialAbono->bindParam(':idCuentaPrincipal',$_POST['idCuentaPrincipal'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':idCuenta',$_POST['idCuentaCuenta'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':idSubCuenta',$_POST['idSubCuenta'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':saldoInicialAbono',$_POST['saldoInicialAbono'], PDO::PARAM_STR);
          $insertSaldoInicialAbono->bindParam(':idEmpresaMaestra',$_POST['idEmpresaMaster'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->execute(); 



    break;


    case 11:
    //ingresar saldo inicial cargo 
     echo 'idCuentaPrincipal '.$_POST['idCuentaPrincipal'].'<br>';
     echo 'idCuentaCuenta '.$_POST['idCuentaCuenta'].'<br>';
     echo 'idSubCuenta '.$_POST['idSubCuenta'].'<br>';
     echo 'saldoInicialAbono '.$_POST['saldoInicialCargo'].'<br>';


           $queryN = ("INSERT INTO contaActividaddCuenta(idCuentaPrincipal,idCuenta,idSubCuenta,saldoInicialCargo,idEmpresaMaestra) values(:idCuentaPrincipal,:idCuenta,:idSubCuenta,:saldoInicialCargo,:idEmpresaMaestra)");
          $insertSaldoInicialAbono = $dbConn->prepare($queryN);
          $insertSaldoInicialAbono->bindParam(':idCuentaPrincipal',$_POST['idCuentaPrincipal'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':idCuenta',$_POST['idCuentaCuenta'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':idSubCuenta',$_POST['idSubCuenta'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->bindParam(':saldoInicialCargo',$_POST['saldoInicialCargo'], PDO::PARAM_STR);
          $insertSaldoInicialAbono->bindParam(':idEmpresaMaestra',$_POST['idEmpresaMaster'], PDO::PARAM_INT);
          $insertSaldoInicialAbono->execute(); 

          
    break;


    case 12:

      $query2 = ("SELECT * FROM contaConcepto where subCuenta=:subCuenta");
          $subCuentas = $dbConn->prepare($query2);
          $subCuentas->bindParam(':subCuenta',$_POST['idBuscar'], PDO::PARAM_INT);
          $subCuentas->execute(); 
          $hayCuentas=$subCuentas->rowCount();
 
          echo '<option>Selecciona una SubCuenta</option>';
                         
                          if($hayCuentas==0){
                            
          echo  '<option value="0">No hay cuentas!</option>';
                       }else{  

                     while ($datosSubcuentas=$subCuentas->fetch(PDO::FETCH_ASSOC)){ 

           echo '<option  value="'.$datosSubcuentas['idRegistro'].'">'.$datosSubcuentas['nomenclatura'].' '.$datosSubcuentas['concepto'].'</option>';


                       } }    
               echo      '<br>';





    break;


    case 13:
    // actualizar nomenclaturas

      if($_POST['nivelCuenta']==1){
        //cuenta principal
        echo 'nomenclaturaActualizar =='.$_POST['nomenclaturaActualizar'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaCuentaPrincipal` SET nomenclatura=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNomenclatura = $dbConn->prepare($queryN);
          $actualizarNomenclatura->bindParam(':nomenclatura',$_POST['nomenclaturaActualizar'], PDO::PARAM_STR);
          $actualizarNomenclatura->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNomenclatura->execute(); 

      }else if($_POST['nivelCuenta']==2){
          //cuentaCuenta

        echo 'nomenclaturaActualizar =='.$_POST['nomenclaturaActualizar'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaSubcuenta` SET nomenclatura=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNomenclatura = $dbConn->prepare($queryN);
          $actualizarNomenclatura->bindParam(':nomenclatura',$_POST['nomenclaturaActualizar'], PDO::PARAM_STR);
          $actualizarNomenclatura->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNomenclatura->execute(); 
      } else if($_POST['nivelCuenta']==3){
          //cuentaCuenta

        echo 'nomenclaturaActualizar =='.$_POST['nomenclaturaActualizar'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaConcepto` SET nomenclatura=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNomenclatura = $dbConn->prepare($queryN);
          $actualizarNomenclatura->bindParam(':nomenclatura',$_POST['nomenclaturaActualizar'], PDO::PARAM_STR);
          $actualizarNomenclatura->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNomenclatura->execute(); 
      }







    break;


    case 14:
    //actualizar nombres

          if($_POST['nivelCuenta']==1){
        //cuenta principal
        echo 'nombreCuenta =='.$_POST['nombreCuenta'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaCuentaPrincipal` SET cuentaPrincipal=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNombreCuenta = $dbConn->prepare($queryN);
          $actualizarNombreCuenta->bindParam(':nomenclatura',$_POST['nombreCuenta'], PDO::PARAM_STR);
          $actualizarNombreCuenta->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNombreCuenta->execute(); 

      }else if($_POST['nivelCuenta']==2){
          //cuentaCuenta

        echo 'nomenclaturaActualizar =='.$_POST['nomenclaturaActualizar'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaSubcuenta` SET subCuenta=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNomenclatura = $dbConn->prepare($queryN);
          $actualizarNomenclatura->bindParam(':nomenclatura',$_POST['nombreCuenta'], PDO::PARAM_STR);
          $actualizarNomenclatura->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNomenclatura->execute(); 

      } else if($_POST['nivelCuenta']==3){
          //cuentaCuenta

        echo 'nomenclaturaActualizar =='.$_POST['nomenclaturaActualizar'].' idRegistroBuscar=='.$_POST['idRegistroBuscar'].' nivelCuenta '.$_POST['nivelCuenta'];

         $queryN = ("UPDATE `contaConcepto` SET concepto=:nomenclatura WHERE idRegistro=:idRegistro");
          $actualizarNomenclatura = $dbConn->prepare($queryN);
          $actualizarNomenclatura->bindParam(':nomenclatura',$_POST['nomenclaturaActualizar'], PDO::PARAM_STR);
          $actualizarNomenclatura->bindParam(':idRegistro',$_POST['idRegistroBuscar'], PDO::PARAM_INT);
          $actualizarNomenclatura->execute(); 
      }




    break;
	
	default:
		# code...
		break;
}