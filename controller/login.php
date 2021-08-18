<?php
 session_start();
 //phpinfo();
include '../conexion/conexion.php';


//datos recibido del usuario 

 $_POST["txtUsuario"];
 $_POST["txtPassword"];


$sql1 = ("SELECT * FROM usuario where usuario=:usuario");
$obtenerUsuario = $dbConn->prepare($sql1);
$obtenerUsuario->bindParam(':usuario', $_POST['txtUsuario'], PDO::PARAM_STR); 
$obtenerUsuario->execute();
$hayconsulta=$obtenerUsuario->rowCount();






while ($row=$obtenerUsuario->fetch(PDO::FETCH_ASSOC)){

	$_SESSION["idCliente"]=(int)$row['idCliente'];
	$_SESSION["usuario"]=$row['usuario'];
	$_SESSION["nombre"]=$row['nombre'];
	$_SESSION["apellido"]=$row['apellido'];
	$_SESSION["privilegio"]=$row['idPrivilegios'];
	$_SESSION["empresa"]=$row['idEmpresa'];
	$_SESSION["correo"]=$row['correo'];
	$_SESSION["password"]=$row['contrasena'];
	$_SESSION['uri']='http://localhost:8888/asistentevirtual/';
	$_SESSION['uriLocal']='http://localhost:8888/asistentevirtual/';


	
}

echo $_SESSION['privilegio'];
echo $_SESSION['nombre'];
echo $_POST["txtPassword"];


if(strcmp($_SESSION["usuario"], $_POST["txtUsuario"])==0 &&  strcmp($_SESSION["password"], $_POST["txtPassword"])==0){

//buscamos los privilegios que tiene
//echo $_SESSION["privilegio"];

$query2 = ("SELECT * FROM rolesPrivilegios where idPrivilegio=:idPrivilegio");
$buscarPrivilegios = $dbConn->prepare($query2);
$buscarPrivilegios->bindParam(':idPrivilegio', $_SESSION['privilegio'], PDO::PARAM_INT); 
$buscarPrivilegios->execute();
$hayconsulta=$buscarPrivilegios->rowCount();


while ($row2=$buscarPrivilegios->fetch(PDO::FETCH_ASSOC)){
	//privilegios  1= tiene permisos 2= no tiene permisos
	$_SESSION["rolInicial"]=$row2['rol'];
	$_SESSION["edicion"]=$row2['edicion'];
	$_SESSION["eliminacion"]=$row2['eliminacion'];
    $_SESSION["busqueda"]=$row2['busqueda'];
    $_SESSION["actualizacion"]=$row2['actualizacion'];

	
}


echo $_SESSION['privilegio'];
echo $_SESSION['nombre'];
	//redireccionamos segun el tipo de usuario y le mandamos los datos 
switch ($_SESSION["privilegio"]) {
	case 1:
		//admin

		//opciones del panel=========  si puede ver== 1  no puede ver ===2
		$_SESSION['dashboard']=1;
		$_SESSION['reporteCliente']=1;
		$_SESSION['ingresoFacturas']=1;
		$_SESSION['ingresoExtras']=1;
		$_SESSION['ingresoPago']=1;
		$_SESSION['pendientesPago']=1;
		$_SESSION['clienteyUsuarios']=1;
		$_SESSION['empresas']=1;
		$_SESSION['serviciosyPaquetes']=1;
		$_SESSION['privilegios']=1;
		$_SESSION['archivos']=1;

		$_SESSION['miEstadoCuenta']=2;
		$_SESSION['misServicios']=2;
		$_SESSION['miArchivo']=2;
		$_SESSION['misEventos']=2;
		$_SESSION['buzonOfficient']=2;
		$_SESSION['registroLlamadas']=2;
		$_SESSION['inicio']=2;



		header("Location:http://localhost:8888/asistentevirtual/masterOffice/panelControl.php");

		break;

	case 2:
		//asistenteVirtual
		//opciones del panel=========  si puede ver== 1  no puede ver ===2
		$_SESSION['dashboard']=2;
		$_SESSION['reporteCliente']=1;
		$_SESSION['ingresoFacturas']=1;
		$_SESSION['ingresoExtras']=1;
		$_SESSION['ingresoPago']=1;
		$_SESSION['pendientesPago']=1;
		$_SESSION['clienteyUsuarios']=1;
		$_SESSION['empresas']=1;
		$_SESSION['serviciosyPaquetes']=2;
		$_SESSION['privilegios']=2;
		$_SESSION['archivos']=1;

		$_SESSION['miEstadoCuenta']=2;
		$_SESSION['misServicios']=2;
		$_SESSION['miArchivo']=2;
		$_SESSION['misEventos']=2;
		$_SESSION['buzonOfficient']=2;
		$_SESSION['registroLlamadas']=2;
		$_SESSION['inicio']=2;


		header("Location:http://localhost:8888/asistentevirtual/masterOffice/panelControl.php");
		break;


		case 5:
		//asistenteVirtual
		//opciones del panel=========  si puede ver== 1  no puede ver ===2

		$_SESSION['dashboard']=2;
		$_SESSION['reporteCliente']=2;
		$_SESSION['ingresoFacturas']=2;
		$_SESSION['ingresoExtras']=2;
		$_SESSION['ingresoPago']=2;
		$_SESSION['pendientesPago']=2;
		$_SESSION['clienteyUsuarios']=2;
		$_SESSION['empresas']=2;
		$_SESSION['serviciosyPaquetes']=2;
		$_SESSION['privilegios']=2;
		$_SESSION['archivos']=2;
		$_SESSION['miEstadoCuenta']=1;
		$_SESSION['misServicios']=1;
		$_SESSION['miArchivo']=1;
		$_SESSION['misEventos']=1;
		$_SESSION['buzonOfficient']=1;
		$_SESSION['registroLlamadas']=1;
		$_SESSION['inicio']=1;



		header("Location:http://localhost:8888/asistentevirtual/masterOffice/panelCliente.php");

		
		break;
	

	
	
	
	default:
	    header("Location:../index.php");
		break;
}



}else{

			header("Location:http://localhost:8888/asistentevirtual/masterOffice/panelControl.php");

}
// en la base de datos el tipo de usuario se toma como 1=alumno 2=profesor 3=coordinador









?>