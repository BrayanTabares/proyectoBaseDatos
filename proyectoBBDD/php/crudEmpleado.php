<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Empleado{

	private $datos;
	public $tipoEmpleado;
	public function __construct(){
			$this->tipoEmpleado=array("Mesero","Cocinero","Auxiliar de salón","Auxiliar de cocina","Cajero" );
	}

public function getEmpleados(){
include("conexion.php");
	$sql="SELECT * FROM empleado e inner join telefonoempleado t on e.cedula=t.empleado_cedula";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getNombresEmpleados(){
include("conexion.php");
	$sql="SELECT nombre,cedula FROM empleado";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getEmpleadoPorCC($cedula){
include("conexion.php");
	$sql="SELECT * FROM empleado e inner join telefonoempleado t on e.cedula=t.empleado_cedula where cedula='".$cedula."'";
	$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}
	return null;


}

public function eliminarEmpleado($cedula){
	include("conexion.php");
	$sql="delete from empleado where cedula='".$cedula."'";
	$sql2="delete from telefonoempleado where empleado_cedula='".$cedula."'";

	$mysqli->query($sql2);
	$mysqli->query($sql);

		print "<script>
				alert(\"Eliminado exitosamente.\");
				window.location='empleados.php';
				</script>";
}

 public function registrarEmpleado(){

	 			include("conexion.php");
				if(isset($_POST["cedula"]) && isset($_POST["campo"]) && isset($_POST["nombre"]) && isset($_POST["zona"]) && isset($_POST["tipoEmpleado"])
				&& isset($_POST["descripcion"]) && isset($_POST["telefono"]) ){




						$sql = "insert into empleado(cedula,nombre,tipoEmpleado,campo,zona) value(\"$_POST[cedula]\",\"$_POST[nombre]\",\"$_POST[tipoEmpleado]\",\"$_POST[campo]\",\"$_POST[zona]\")";
						$sql2 = "insert into telefonoempleado(empleado_cedula,numero,descripcion) value(\"$_POST[cedula]\",\"$_POST[telefono]\",\"$_POST[descripcion]\")";

						 $query = $mysqli->query($sql);
						 $query2 = $mysqli->query($sql2);

						if($query !=null&&$query2 !=null){
							print "<script>
									alert(\"Agregado exitosamente.\");
									window.location='empleados.php';
									</script>";
						} else{
							print "<script>
								alert(\"No se pudo agregar.\");
								window.location='empleados.php';
								</script>";
						}

				}

		}
		public function actualizarEmpleado(){

					 include("conexion.php");
					 if(isset($_POST["cedula"]) && isset($_POST["campo"]) && isset($_POST["nombre"]) && isset($_POST["zona"]) && isset($_POST["tipoEmpleado"])
	 					&& isset($_POST["descripcion"]) && isset($_POST["telefono"]) ){




							 $sql = "update empleado set nombre=\"$_POST[nombre]\", tipoEmpleado=\"$_POST[tipoEmpleado]\", campo=\"$_POST[campo]\", zona=\"$_POST[zona]\" where cedula=\"$_POST[cedula]\"";
							 $sql2 = "update telefonoempleado set empleado_cedula=\"$_POST[cedula]\" ,numero=\"$_POST[telefono]\" ,descripcion=\"$_POST[descripcion]\" ";

							  $query = $mysqli->query($sql);
							  $query2 = $mysqli->query($sql2);
;

								 print "<script>
										 alert(\"Actualizado exitosamente.\");
										 window.location='empleados.php';
										 </script>";


					 }else{
						 print "<script>
								 alert(\"Debe llenar todos los campos.\");

								 </script>";
					 }

			 }
}
?>
