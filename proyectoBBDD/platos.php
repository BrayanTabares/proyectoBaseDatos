 <?php
 require_once("php/crudPlato.php");

 $obj=new Plato();
 $platos=$obj->getPlatos();
 if(!empty($_GET)){
   $id=strip_tags($_GET["id"]);
   $obj->eliminarPlato($id);
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
                    if($platos!=null){
                    foreach ($platos as $plato): ?>
                      <div class="fotos">
                           <p><?php echo $plato['idplato']; ?></p>
                           <p><?php echo $plato['nombre']; ?></p>
                           <p><?php echo $plato['precio']; ?></p>
                           <p><?php echo $obj->tipoPlato[$plato["tipoPlato"]]; ?></p>
                           <p><?php echo $plato["descripcion"]; ?></p>
                           <a class="btn" href="platos.php?idplato=<?php echo $plato['idplato']; ?>">Eliminar</a>
                           <a class="btn" href="actualizarPlato.php?idplato=<?php echo $plato['idplato']; ?>">Editar</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
