<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Plato{

	private $datos;
	public $tipoPlato;
	public function __construct(){
			$this->tipoPlato=array("Sopa","Principio","Carne","Especial" );
	}

public function getPlatos(){
include("conexion.php");
	$sql="SELECT * FROM plato";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getBebidas(){
include("conexion.php");
	$sql="SELECT * FROM bebida";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getPlatoPorId($id){
include("conexion.php");
	$sql="SELECT * FROM plato p where idplato='".$id."'";
	$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}
	return null;


}
public function getBebidaPorId($id){
include("conexion.php");
	$sql="SELECT * FROM bebida b where idplato='".$id."'";
	$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}
	return null;


}
public function eliminarPlato($id){
	include("conexion.php");
	$sql="delete from plato where idplato='".$id."'";
	$sql2="delete from detallepedido where plato_idplato='".$id."'";

	$mysqli->query($sql2);
	$mysqli->query($sql);

		print "<script>
				alert(\"Eliminado exitosamente.\");
				window.location='platos.php';
				</script>";
}
public function eliminarBebida($id){
	include("conexion.php");
	$sql="delete from bebida where idbebida='".$id."'";
	$sql2="delete from detallebebida where bebida_idbebida='".$id."'";

	$mysqli->query($sql2);
	$mysqli->query($sql);

		print "<script>
				alert(\"Eliminado exitosamente.\");
				window.location='bebidas.php';
				</script>";
}
 public function registrarPlato(){

	 			include("conexion.php");
				if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["tipoPlato"]) ){




						$sql = "insert into plato(nombre,descripcion,precio,tipoPlato) value(\"$_POST[nombre]\",\"$_POST[descripcion]\",\"$_POST[precio]\",\"$_POST[tipoPlato]\")";


						 $query = $mysqli->query($sql);


						if($query !=null){
							print "<script>
									alert(\"Agregado exitosamente.\");
									window.location='platos.php';
									</script>";
						} else{
							print "<script>
								alert(\"No se pudo agregar.\");
								window.location='platos.php';
								</script>";
						}

				}

		}
		public function registrarBebida(){

	 	 			include("conexion.php");
	 				if(isset($_POST["nombre"]) ){




	 						$sql = "insert into bebida(nombre) value(\"$_POST[nombre]\")";


	 						 $query = $mysqli->query($sql);


	 						if($query !=null){
	 							print "<script>
	 									alert(\"Agregado exitosamente.\");
	 									window.location='bebidas.php';
	 									</script>";
	 						} else{
	 							print "<script>
	 								alert(\"No se pudo agregar.\");
	 								window.location='bebidas.php';
	 								</script>";
	 						}

	 				}

	 		}
		public function actualizarPlato(){

					 include("conexion.php");
					 if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["tipoPlato"]) && isset($_POST["idplato"])){




							 $sql = "update plato set nombre=\"$_POST[nombre]\", descripcion=\"$_POST[descripcion]\", precio=\"$_POST[precio]\", tipoPlato=\"$_POST[tipoPlato]\" where idplato=\"$_POST[idplato]\"";


							  $query = $mysqli->query($sql);

								 print "<script>
										 alert(\"Actualizado exitosamente.\");
										 window.location='platos.php';
										 </script>";


					 }else{
						 print "<script>
								 alert(\"Debe llenar todos los campos.\");

								 </script>";
					 }

			 }
			 public function actualizarBebida(){

							include("conexion.php");
							if(isset($_POST["nombre"]) && isset($_POST["idbebida"]) ){




									$sql = "update bebida set nombre=\"$_POST[nombre]\" where idbebida=\"$_POST[idbebida]\"";


									 $query = $mysqli->query($sql);

										print "<script>
												alert(\"Actualizado exitosamente.\");
												window.location='platos.php';
												</script>";


							}else{
								print "<script>
										alert(\"Debe llenar todos los campos.\");

										</script>";
							}

					}
}
?>
