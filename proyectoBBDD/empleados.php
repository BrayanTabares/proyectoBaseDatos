 <?php
 require_once("php/crudEmpleado.php");

 $obj=new Empleado();
 $empleados=$obj->getEmpleados();
 if(!empty($_GET)){
   $cedula=strip_tags($_GET["cedula"]);
   $obj->eliminarEmpleado($cedula);
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
                    if($empleados!=null){
                    foreach ($empleados as $empleado): ?>
                      <div class="fotos">
                           <p><?php echo $empleado['cedula']; ?></p>
                           <p><?php echo $empleado['nombre']; ?></p>
                           <p><?php echo $empleado['numero']; ?></p>
                           <p><?php echo $empleado["campo"]; ?></p>
                           <p><?php echo $empleado["zona"]; ?></p>
                           <p><?php echo $obj->tipoEmpleado[$empleado["tipoempleado"]]; ?></p>
                           <p><?php echo $empleado["descripcion"]; ?></p>
                           <a class="btn" href="empleados.php?cedula=<?php echo $empleado['cedula']; ?>">Eliminar</a>
                           <a class="btn" href="actualizarEmpleado.php?cedula=<?php echo $empleado['cedula']; ?>">Editar</a>
                      </div>
                    <?php endforeach; }?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
