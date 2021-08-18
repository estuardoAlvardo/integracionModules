<?php 

session_start();
 //phpinfo();
include '../conexion/conexion.php';

@$evento=$_POST['accionEjecutar'];

switch ($evento) {
	case 1:
		//insertar


			$q1 = ("INSERT INTO servicio (nombre, descripcion, monto, cortesia) VALUES(:nombre,:descripcion, :monto, :cortesia)");
			$insertarServicio = $dbConn->prepare($q1);
			$insertarServicio->bindParam(':nombre', $_POST['txtNombre'], PDO::PARAM_STR); 
			$insertarServicio->bindParam(':descripcion', $_POST['txtDescripcion'], PDO::PARAM_STR); 
			$insertarServicio->bindParam(':monto', $_POST['txtMonto'], PDO::PARAM_INT); 
			$insertarServicio->bindParam(':cortesia', $_POST['txtCortesia'], PDO::PARAM_STR); 
     
			$insertarServicio->execute();	




    break;
    case 2:
    //actualizar

    $q1 = ("UPDATE servicio SET nombre=:nombre, descripcion=:descripcion, monto=:monto, cortesia=:cortesia where idservicio=:idservicio");
			$actualizarServicio = $dbConn->prepare($q1);
			$actualizarServicio->bindParam(':nombre', $_POST['modNombre'], PDO::PARAM_STR); 
			$actualizarServicio->bindParam(':descripcion', $_POST['modDescripcion'], PDO::PARAM_STR); 
			$actualizarServicio->bindParam(':monto', $_POST['modMonto'], PDO::PARAM_STR); 
			$actualizarServicio->bindParam(':cortesia', $_POST['modCortesia'], PDO::PARAM_STR); 
			$actualizarServicio->bindParam(':idservicio', $_POST['idActualizar'], PDO::PARAM_STR);

			$actualizarServicio->execute();

		
    break;
    case 3:
		//eliminar
    	$q1 = ("DELETE FROM servicio WHERE idservicio=:idservicio");
			$eliminarRegistro = $dbConn->prepare($q1);
			$eliminarRegistro->bindParam(':idservicio', $_POST['idEliminar'], PDO::PARAM_INT); 
			$eliminarRegistro->execute();


    break;

	
	default:
		# mostrar

			//consultamos clientes 
			$q1 = ("SELECT * FROM servicio");
			      $buscarServicio = $dbConn->prepare($q1);
			      $buscarServicio->execute();


echo '<table class="responsive-table striped centered">
                    <thead>
                      <tr>
                          
                          <th>#</th>
                          <th>Servicio</th>
                          <th>Descripción</th>
                          <th>Monto</th>
                          <th>Cortesia</th>
                      </tr>
                    </thead>
                    <tbody>';


while ($row1=$buscarServicio->fetch(PDO::FETCH_ASSOC)){

  $servicio="servicio".$row1["idservicio"];
	$descripcion="descripcion".$row1["idservicio"];
	$monto="monto".$row1["idservicio"];
	$cortesia="cortesia".$row1["idservicio"];
	
	@$i+=1;





	 echo              '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row1["nombre"].'</td>
                        <td>'.$row1["descripcion"].'</td>
                        <td>'.$row1["monto"].'</td>
                        <td>'.$row1["cortesia"].'</td>
                        

                        <td><a class="btn-floating waves-effect indigo darken-4 modal-trigger" id="'.$row1["idservicio"].'" href="#modal2"  onclick="actualizarDatos(this.id); ">
                        <i class="material-icons">mode_edit</i></td>

                        <input type="text" id="'.$servicio.'" value="'.$row1["nombre"].'" style="display:none;">
                        <input type="text" id="'.$descripcion.'" value="'.$row1["descripcion"].'" style="display:none;">
                        <input type="text" id="'.$monto.'" value="'.$row1["monto"].'" style="display:none;">
                        <input type="text" id="'.$cortesia.'" value="'.$row1["cortesia"].'" style="display:none;">

                        <td><a class="btn-floating waves-effect lighten-1" id="'.$row1["idservicio"].'" onclick="eliminacionDatos(this.id);">
                        <i class="material-icons">visibility_off</i>
                      </a></td>
                      </tr>';

                  }
echo    		'</tbody>
                  </table>';




		break;
}


$evento2=@$_POST['accionEjecutar2'];

switch ($evento2) {
  case 1:

  //insercion de paquete
      $queryInsertar = ("INSERT INTO paquete (idpaquete, nombrePaquete, totalPaquete, descuento,idCuentaPrincipal,idCuenta,idSubCuenta) VALUES(:idpaquete, :nombrePaquete, :totalPaquete, :descuento,:idCuentaPrincipal,:idCuenta,:idSubCuenta)");
      $insertarPaquete = $dbConn->prepare($queryInsertar);
      $insertarPaquete->bindParam(':idpaquete', $_POST['txtidPaqueteRegistro'], PDO::PARAM_INT); 
      $insertarPaquete->bindParam(':nombrePaquete', $_POST['txtNombrePaquete'], PDO::PARAM_STR); 
      $insertarPaquete->bindParam(':totalPaquete', $_POST['txtTotalPaquete'], PDO::PARAM_INT); 
      $insertarPaquete->bindParam(':descuento', $_POST['txtDescuento'], PDO::PARAM_INT); 
      $insertarPaquete->bindParam(':idCuentaPrincipal', $_POST['cuentaPrincipal'], PDO::PARAM_INT); 
      $insertarPaquete->bindParam(':idCuenta', $_POST['selectSubcuenta'], PDO::PARAM_INT); 
      $insertarPaquete->bindParam(':idSubCuenta', $_POST['conceptos'], PDO::PARAM_INT); 
      $insertarPaquete->execute(); 

 

//asignacion de servicios
//consultamos servicios 
      $qBusqueda = ("SELECT * FROM servicio");
            $busquedaServicioPaquete = $dbConn->prepare($qBusqueda);
            $busquedaServicioPaquete->execute();
     

      while ($registroBus1=$busquedaServicioPaquete->fetch(PDO::FETCH_ASSOC)){

            if ($_POST['marcado'.$registroBus1['idservicio']]=='on') {

              $idPaqueteInsertar=$_POST['txtidPaqueteRegistro'];
              $idServicioInsertar=$_POST['servicio'.$registroBus1['idservicio']];
              $estado=1;

              $queryInsertarServicio = ("INSERT INTO registrosPaquetes (idPaquete, idServicio,estado) VALUES(:idPaquete, :idServicio, :estado)");
              $asignarServicios = $dbConn->prepare($queryInsertarServicio);

              $asignarServicios->bindParam(':idPaquete', $idPaqueteInsertar , PDO::PARAM_INT); 
              $asignarServicios->bindParam(':idServicio',  $idServicioInsertar, PDO::PARAM_INT); 
              $asignarServicios->bindParam(':estado',$estado , PDO::PARAM_INT);
              $asignarServicios->execute(); 
              

            }else{
              echo 'no hay registros marcados';
            }




      }





    break;
  
  default:
    # code...
    break;
}








?>