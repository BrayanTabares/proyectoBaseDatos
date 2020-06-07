 <?php
 require_once("php/crudPedido.php");

 $obj=new Pedido();
 if(!empty($_GET)){
   if(isset($_GET["fecha"])){
     $fecha=strip_tags($_GET["fecha"]);
     $obj->eliminarPedido($fecha);
   }else if(isset($_GET["idfactura"])){
     $factura=strip_tags($_GET["idfactura"]);
    $pedidos= $obj->getPedidosPorFactura($factura);
   }
}else{

  $pedidos= $obj->getPedidosUltimaFactura();
  $idfactura=$obj->getIdUltimaFactura();
}

?>

<html>
   <head>
		<?php require_once("resources/head.php") ?>
   </head>
         <body>
           <div class="cabez">
            <div id="header">
                <?php require_once("resources/header.php") ?>
            </div>
          </div>
              <div id="principal">
                <br><br><br><a class="btn" href="registrarPedido.php?idfactura=<?php echo $idfactura['idfactura']; ?>">Agregar Pedido</a><br>
                <div id="content">
                    <?php
                    if($pedidos!=null){
                    foreach ($pedidos as $pedido): ?>
                      <div class="fotos">
                           <p><?php echo $pedido['fecha']; ?></p>
                           <p><?php echo $pedido['nombre']; ?></p>
                           <p><?php echo $pedido['precio']; ?></p>
                           <a class="btn" href="empleados.php?fecha=<?php echo $pedido['fecha']; ?>">Eliminar</a>
                           <a class="btn" href="listarDetalles.php?fecha=<?php echo $pedido['fecha']; ?>">Agregar Detalle</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
