<?php

include_once 'Database.php';
include_once 'Automoviles.php';

$database = new Database();
$db = $database->getConnection();

$item = new Automoviles($db);

if (isset($_POST['txtpalca'])&&
	isset($_POST['modelo'])&&
	isset($_POST['txtid'])) 
{
	$Placa = $_POST['txtpalca'];
	$Modelo = $_POST['modelo'];
	$ID_Propietario = $_POST['txtid'];
	$Nombre_Propietario = $_POST['txtpropietario'];
	$Fecha_Nac = $_POST['fecha'];
	$Sexo = $_POST['sexo'];
	$Tipo_Propietario = $_POST['tipo'];
	$Departamento = $_POST['departamento'];

	$item->Placa = $Placa;
	$item->Modelo = $Modelo;
	$item->ID_Propietario = $ID_Propietario;
	$item->Nombre_Propietario = $Nombre_Propietario;
	$item->Fecha_Nac = $Fecha_Nac;
	$item->Sexo = $Sexo;
	$item->Tipo_Propietario = $Tipo_Propietario;
	$item->Departamento = $Departamento;

	if ($item->createAutos()) {
		echo "automovil creado";
	}
	else
	{
		echo "automovil no creado";
	}

}

?>