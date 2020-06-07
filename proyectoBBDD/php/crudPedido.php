<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Pedido{

	private $datos;
	public $tipoEmpleado;
	public function __construct(){

	}
	public function getMesasDisponibles(){
	include("conexion.php");
		$sql="SELECT idmesa
		FROM mesa m where m.disponible='s'";
		$query = $mysqli->query($sql);

		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}

		return $this->datos;

	}
public function getPedidos(){
include("conexion.php");
	$sql="SELECT p.fecha,p.precio,e.nombre
	FROM pedido p inner join empleado e on p.empleado_cedula=e.cedula";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getPedidosPorFactura($idfactura){
include("conexion.php");
	$sql="SELECT p.fecha,p.precio,e.nombre
	FROM pedido p inner join empleado e on p.empleado_cedula=e.cedula where p.factura_idfactura='".$idfactura."'";
	$query = $mysqli->query($sql);

	while ($row=$query->fetch_array()) {
	 $this->datos[]=$row;
	}

	return $this->datos;

}
public function getPedidoPorId($fecha){
include("conexion.php");
// $sql="SELECT p.fecha,p.precio,dp.plato_idplato,dp.cantidad,db.bebida_idbebida,db.cantidad
// FROM pedido p inner join detallepedido dp on p.fecha=dp.pedido_fecha inner join detallebebida db on p.fecha=db.pedido_fecha where p.fecha='".$fecha."'";
$sql="SELECT * FROM pedido p where p.fecha='".$fecha."'";
$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}
	return null;


}
public function getDetallesPlatoPorId($fecha){
include("conexion.php");
// $sql="SELECT p.fecha,p.precio,dp.plato_idplato,dp.cantidad,db.bebida_idbebida,db.cantidad
// FROM pedido p inner join detallepedido dp on p.fecha=dp.pedido_fecha inner join detallebebida db on p.fecha=db.pedido_fecha where p.fecha='".$fecha."'";
$sql="SELECT * FROM detallepedido d inner join plato p on d.plato_idplato=p.idplato where d.pedido_fecha='".$fecha."'";
$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos;
	}
	return null;


}
public function getDetallesBebidaPorId($fecha){
include("conexion.php");
// $sql="SELECT p.fecha,p.precio,dp.plato_idplato,dp.cantidad,db.bebida_idbebida,db.cantidad
// FROM pedido p inner join detallepedido dp on p.fecha=dp.pedido_fecha inner join detallebebida db on p.fecha=db.pedido_fecha where p.fecha='".$fecha."'";
$sql="SELECT * FROM detallebebida d inner join bebida b on d.bebida_idbebida=b.idbebida where d.pedido_fecha='".$fecha."'";
$query = $mysqli->query($sql);

	if($query!=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos;
	}
	return null;


}
public function getIdUltimaFactura(){
include("conexion.php");

$sql="select idfactura from factura order by idfactura desc limit 1";
$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}else{
		print "<script>
				alert(\"Ha ocurrido un error.\");

				</script>";
	}
	return null;


}
public function getPedidosUltimaFactura(){
include("conexion.php");

$sql="SELECT p.fecha,p.precio,e.nombre
FROM pedido p inner join empleado e on p.empleado_cedula=e.cedula where p.factura_idfactura=(select idfactura from factura order by idfactura desc limit 1)";
$query = $mysqli->query($sql);

	if($query !=null){
		while ($row=$query->fetch_array()) {
		 $this->datos[]=$row;
		}
		return $this->datos[0];
	}else{
		print "<script>
				alert(\"Ha ocurrido un error.\");

				</script>";
	}
	return null;


}

public function eliminarPedido($fecha){
	include("conexion.php");
	$sql="delete from pedido where fecha='".$fecha."'";
	$sql2="delete from detallepedido where pedido_fecha='".$fecha."'";
	$sql3="delete from detallebebida where pedido_fecha='".$fecha."'";

	$query3=$mysqli->query($sql3);
	$query2=$mysqli->query($sql2);
$query=$mysqli->query($sql);

	if($query !=null&&$query2 !=null&&$query3 !=null){

		print "<script>
				alert(\"Eliminado exitosamente.\");
				window.location='pedidos.php';
				</script>";
			}{
				print "<script>
						alert(\"No se ha podido eliminar.\");
						window.location='pedidos.php';
						</script>";
			}
}
public function registrarFactura(){

			 include("conexion.php");
			 if(isset($_POST["empleadoCajero_cedula"]) && isset($_POST["cliente_cedula"]) ){


				 $sql = "insert into factura(empleado_cedula,cliente_cedula) value(\"$_POST[empleadoCajero_cedula]\",\"$_POST[cliente_cedula]\")";
				 $query = $mysqli->query($sql);

					 // $sql = "insert into factura(empleado_cedula,cliente_cedula) value(\"$_POST[empleadoCajero_cedula]\",\"$_POST[cliente_cedula]\")";
					 // $sql2 = "insert into pedido(empleado_cedula,mesa_idmesa,factura_idfactura) value(\"$_POST[empleadoMesero_cedula]\",\"$_POST[mesa_idmesa]\", (select idfactura from factura order by idfactura desc limit 1))";
					 //
					 //
					 //  $query = $mysqli->query($sql);
					 //  $query2 = $mysqli->query($sql2);

					 if($query !=null){
						 print "<script>
								 alert(\"Agregado exitosamente.\");
								 window.location='listarPedidos.php';
								 </script>";
					 } else{
						 print "<script>
							 alert(\"No se pudo agregar.\");
							 window.location='registrarFactura.php';
							 </script>";
					 }

			 }

	 }
 public function registrarPedido($idfactura){

	 			include("conexion.php");
				if(isset($_POST["empleadoMesero_cedula"]) && isset($_POST["mesa_idmesa"])  ){


					$sql = "insert into pedido(empleado_cedula,mesa_idmesa,factura_idfactura) value(\"$_POST[empleadoMesero_cedula]\",\"$_POST[mesa_idmesa]\", '".$idfactura."')";
					$query = $mysqli->query($sql);

						// $sql = "insert into factura(empleado_cedula,cliente_cedula) value(\"$_POST[empleadoCajero_cedula]\",\"$_POST[cliente_cedula]\")";
						// $sql2 = "insert into pedido(empleado_cedula,mesa_idmesa,factura_idfactura) value(\"$_POST[empleadoMesero_cedula]\",\"$_POST[mesa_idmesa]\", (select idfactura from factura order by idfactura desc limit 1))";
						//
						//
						//  $query = $mysqli->query($sql);
						//  $query2 = $mysqli->query($sql2);

						if($query !=null){
							print "<script>
									alert(\"Agregado exitosamente.\");
									window.location='listarPedidos.php?idfactura=$idfactura';
									</script>";
						} else{
							print "<script>
								alert(\"No se pudo agregar.\");
									window.location='listarPedidos.php?idfactura=$idfactura';
								</script>";
						}

				}

		}
		public function registrarDetallePlato($fecha){
	 	 			include("conexion.php");
	 				if(isset($_POST["plato_idplato"]) ){

	 						$sql = "insert into detallepedido(cantidad,pedido_fecha,plato_idplato) value($_POST[cantidad],'".$fecha."',$_POST[plato_idplato])";

	 						 $query = $mysqli->query($sql);

	 						if($query !=null){
	 							print "<script>
	 									alert(\"Agregado exitosamente.\");
	 									window.location='listarDetalles.php?fecha=$fecha';
	 									</script>";
	 						} else{
	 							print "<script>
	 								alert(\"No se pudo agregar.\");
	 								window.location='listarDetalles.php?fecha=$fecha';
	 								</script>";
	 						}

	 				}

	 		}
			public function registrarDetalleBebida($fecha){

						include("conexion.php");
						if(isset($_POST["bebida_idbebida"]) ){

								$sql = "insert into detallebebida(pedido_fecha,bebida_idbebida,cantidad) value('".$fecha."',$_POST[bebida_idbebida],$_POST[cantidad])";

								 $query = $mysqli->query($sql);

								if($query !=null){
									print "<script>
											alert(\"Agregado exitosamente.\");
											window.location='listarDetalles.php?fecha=$fecha';
											</script>";
								} else{
									print "<script>
										alert(\"No se pudo agregar.\");
										window.location='listarDetalles.php?fecha=$fecha';
										</script>";
								}

						}

				}
		public function actualizarPedido(){

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
