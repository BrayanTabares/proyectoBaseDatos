 <?php
 require_once("php/crudPedido.php");

 $obj=new Pedido();
 if(!empty($_GET["fecha"])){
     $fecha=strip_tags($_GET["fecha"]);
     $detallesPlato=$obj->getDetallesPlatoPorId($fecha);
     $detallesBebida=$obj->getDetallesBebidaPorId($fecha);
     echo count($detallesPlato);
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
                <br><br><br><a class="btn" href="registrarDetallePedido.php?idPedido=<?php echo $fecha ?>">Agregar Plato</a>
                 <a class="btn" href="registrarDetalleBebida.php?idPedido=<?php echo $fecha ?>">Agregar Bebida</a><br>
                <div id="content">
                    <?php
                    if($detallesPlato!=null){
                    foreach ($detallesPlato as $detallePlato): ?>
                      <div class="fotos">
                           <p><?php echo $detallePlato['pedido_fecha']; ?></p>
                           <p><?php echo $detallePlato['cantidad']; ?></p>
                           <a class="btn" href="empleados.php?fecha=<?php echo $fecha; ?>">Eliminar</a>
                           <a class="btn" href="registrarDetallePedido.php?idPedido=<?php echo $fecha; ?>">Editar Detalle</a>
                      </div>
                    <?php endforeach; }?>
                    <?php
                    if($detallesBebida!=null){
                    foreach ($detallesBebida as $detalleBebida): ?>
                      <div class="fotos">
                           <p><?php echo $detalleBebida['pedido_fecha']; ?></p>
                           <p><?php echo $detalleBebida['nombre']; ?></p>
                           <a class="btn" href="empleados.php?fecha=<?php echo $fecha; ?>">Eliminar</a>
                           <a class="btn" href="registrarDetallePedido.php?idPedido=<?php echo $fecha; ?>">Editar Detalle</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
