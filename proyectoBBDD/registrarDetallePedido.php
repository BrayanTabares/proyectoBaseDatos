<?php

   require_once("php/crudPedido.php");
   require_once("php/crudPlato.php");

   $obj=new Pedido();
   $mesas=$obj->getMesasDisponibles();

   $objP=new Plato();
   $platos=$objP->getPlatos();

   if(!empty($_GET)){
     if(isset($_GET["idPedido"])){
       $idPedido=strip_tags($_GET["idPedido"]);

     }
   }
   if(!empty($_POST)){
  		if(isset($_POST["registrarDetallePedido"])){
        $obj->registrarDetallePlato($idPedido);
  		}
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
                    <form action="#" method="post">


    <div class="form-group">
      <label for="idPedido">ID Pedido: </label>
      <input type="text" class="form-control" id="idPedido" name="idPedido" value="<?php echo $idPedido; ?>" readonly="true">
    </div>
    <div class="form-group">
    <label for="plato_idplato">Plato: </label>
    <select class="form-control" id="plato_idplato" name="plato_idplato">
      <?php
        for ($i = 0; $i <count($platos) ; $i++) {
            ?><option value="<?php echo $platos[$i]['idplato']; ?>" ><?php echo $platos[$i]['nombre']; ?>-<?php echo $platos[$i]['precio']; ?></option><?php
        }
    ?>
      </select>
  </div>
    <div class="form-group">
      <label for="cantidad">Cantidad: </label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
    </div>
     <button type="submit" name="registrarDetallePedido" class="btn btn-default"> Registrar </button>

</form>
                </div>

                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
