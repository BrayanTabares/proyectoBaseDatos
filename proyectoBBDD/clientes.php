 <?php
  require_once("php/crudCliente.php");

 $obj=new Cliente();
 $clientes=$obj->getClientes();
 if(!empty($_GET)){
   $cedula=strip_tags($_GET["cedula"]);
   $obj->eliminarCliente($cedula);
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
                <div id="content">
                    <?php
                    if($clientes!=null){
                    foreach ($clientes as $cliente): ?>
                      <div class="fotos">
                           <p><?php echo $cliente['cedula']; ?></p>
                           <p><?php echo $cliente['nombre']; ?></p>
                           <p><?php echo $cliente['numero']; ?></p>
                           <p><?php echo $cliente["email"]; ?></p>
                           <p><?php echo $cliente["direccion"]; ?></p>
                           <p><?php echo $cliente["descripcion"]; ?></p>
                           <a class="btn" href="clientes.php?cedula=<?php echo $cliente['cedula']; ?>">Eliminar</a>
                           <a class="btn" href="actualizarCliente.php?cedula=<?php echo $cliente['cedula']; ?>">Editar</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
