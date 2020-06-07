<?php

   require_once("php/crudPlato.php");

   $obj=new Plato();
   $tipoplato=$obj->tipoPlato;

   if(!empty($_POST)){
  		if(isset($_POST["registrarPlato"])){
        $obj->registrarPlato();
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
    <label for="nombre">Nombre Completo: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del plato">
  </div>
  <div class="form-group">
    <label for="precio">Precio: </label>
    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del plato">
  </div>
  <div class="form-group">
    <label for="tipoPlato">Tipo de plato</label>
    <select class="form-control" id="tipoPlato" name="tipoPlato">
      <?php
        for ($i = 0; $i <count($tipoplato) ; $i++) {
            ?><option value="<?php echo $i ?>" ><?php echo $tipoplato[$i]; ?></option><?php
        }
    ?>
      </select>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción: </label>
     <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea"></textarea>
  </div>

     <button type="submit" name="registrarPlato" class="btn btn-default"> Registrar </button>

</form>
                </div>

                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
