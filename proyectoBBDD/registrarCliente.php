<?php

   require_once("php/crudCliente.php");

   $obj=new Cliente();
   if(!empty($_POST)){
  		if(isset($_POST["registrarCliente"])){
        $obj->registrarCliente();
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
    <label for="cedula">Cédula: </label>
    <input type="number" class="form-control" id="cedula" name="cedula" placeholder="cédula">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono: </label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono celular o fijo">
  </div>
  <div class="form-group">
    <label for="direccion">Dirección: </label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección de residencia">
  </div>
  <div class="form-group">
    <label for="email">Correo: </label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción: </label>
     <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea"></textarea>
  </div>

     <button type="submit" name="registrarCliente" class="btn btn-default"> Registrar </button>

</form>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
