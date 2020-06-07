<?php

   require_once("php/crudPedido.php");
   require_once("php/crudPlato.php");

   $obj=new Pedido();
   $mesas=$obj->getMesasDisponibles();

   $objP=new Plato();
   $platos=$objP->getBebidas();

   if(!empty($_GET)){
     if(isset($_GET["idPedido"])){
       $idPedido=strip_tags($_GET["idPedido"]);

     }
   }
   if(!empty($_POST)){
  		if(isset($_POST["registrarDetalleBebida"])){
        $obj->registrarDetalleBebida($idPedido);
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
    <label for="bebida_idbebida">Bebida: </label>
    <select class="form-control" id="bebida_idbebida" name="bebida_idbebida">
      <?php
        for ($i = 0; $i <count($platos) ; $i++) {
            ?><option value="<?php echo $platos[$i]['idbebida']; ?>" ><?php echo $platos[$i]['nombre']; ?></option><?php
        }
    ?>
      </select>
  </div>
    <div class="form-group">
      <label for="cantidad">Cantidad: </label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
    </div>
     <button type="submit" name="registrarDetalleBebida" class="btn btn-default"> Registrar </button>

</form>
                </div>

                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
