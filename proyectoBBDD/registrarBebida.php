<?php

   require_once("php/crudPlato.php");

   $obj=new Plato();

   if(!empty($_POST)){
  		if(isset($_POST["registrarBebida"])){
        $obj->registrarBebida();
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
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la bebida">
  </div>

     <button type="submit" name="registrarBebida" class="btn btn-default"> Registrar </button>

</form>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
