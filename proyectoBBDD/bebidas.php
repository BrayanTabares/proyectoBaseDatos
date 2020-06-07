 <?php
  require_once("php/crudPlato.php");

 $obj=new Plato();
 $bebidas=$obj->getBebidas();
 if(!empty($_GET)){
   $id=strip_tags($_GET["id"]);
   $obj->eliminarBebida($id);
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
                    if($bebidas!=null){
                    foreach ($bebidas as $bebida): ?>
                      <div class="fotos">
                           <p><?php echo $bebida['idbebida']; ?></p>
                           <p><?php echo $bebida['nombre']; ?></p>
                           <a class="btn" href="bebidas.php?idbebida=<?php echo $bebida['idbebida']; ?>">Eliminar</a>
                           <a class="btn" href="actualizarBebida.php?idbebida=<?php echo $bebida['idbebida']; ?>">Editar</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
