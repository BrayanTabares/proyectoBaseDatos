<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Cliente{

	private $datos;
	public function __construct(){

	}
	public function getNombresClientes(){
	include("conexion.php");
		$sql="SELECT nombre,cedula FROM cliente";
		$query = $mysqli->query($sql);

		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}

		return $this->datos;

	}
public function getClientes(){
include("conexion.php");
	$sql="SELECT * FROM cliente c inner join telefonocliente t on c.cedula=t.cliente_cedula";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getClientePorCC($cedula){
include("conexion.php");
	$sql="SELECT * FROM cliente c inner join telefonocliente t on c.cedula=t.cliente_cedula where cedula='".$cedula."'";
	$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}
	return null;


}

public function eliminarCliente($cedula){
	include("conexion.php");
	$sql="delete from cliente where cedula='".$cedula."'";
	$sql2="delete from telefonocliente where cliente_cedula='".$cedula."'";

	$mysqli->query($sql2);
	$mysqli->query($sql);

		print "<script>
				alert(\"Eliminado exitosamente.\");
				window.location='clientes.php';
				</script>";
}

 public function registrarCliente(){

	 			include("conexion.php");
				if(isset($_POST["cedula"]) && isset($_POST["direccion"]) && isset($_POST["nombre"]) && isset($_POST["email"])
				&& isset($_POST["descripcion"]) && isset($_POST["telefono"]) ){




						$sql = "insert into cliente(cedula,nombre,direccion,email) value(\"$_POST[cedula]\",\"$_POST[nombre]\",\"$_POST[direccion]\",\"$_POST[email]\")";
						$sql2 = "insert into telefonocliente(cliente_cedula,numero,descripcion) value(\"$_POST[cedula]\",\"$_POST[telefono]\",\"$_POST[descripcion]\")";

						 $query = $mysqli->query($sql);
						 $query2 = $mysqli->query($sql2);

						if($query !=null&&$query2 !=null){
							print "<script>
									alert(\"Agregado exitosamente.\");
									window.location='clientes.php';
									</script>";
						} else{
							print "<script>
								alert(\"No se pudo agregar.\");
								window.location='clientes.php';
								</script>";
						}

				}

		}
		public function actualizarCliente(){

					 include("conexion.php");
					 if(isset($_POST["cedula"]) && isset($_POST["direccion"]) && isset($_POST["nombre"]) && isset($_POST["email"])
	 				&& isset($_POST["descripcion"]) && isset($_POST["telefono"]) ){




							 $sql = "update cliente set nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", email=\"$_POST[email]\" where cedula=\"$_POST[cedula]\"";
							 $sql2 = "update telefonocliente set cliente_cedula=\"$_POST[cedula]\" ,numero=\"$_POST[telefono]\" ,descripcion=\"$_POST[descripcion]\" ";

							  $query = $mysqli->query($sql);
							  $query2 = $mysqli->query($sql2);
;

								 print "<script>
										 alert(\"Actualizado exitosamente.\");
										 window.location='clientes.php';
										 </script>";


					 }else{
						 print "<script>
								 alert(\"Debe llenar todos los campos.\");

								 </script>";
					 }

			 }
}
?>
