<?php      

$puerto="localhost";
$usuario="root";
$contraseña="";
$conexion= mysql_connect($puerto,$usuario,$contrase�a)or die("Error, revise la conexion al servidor local");
mysql_select_db("sistema",$conexion)or die("Error, revise la conexion a la base de datos");



ModificarUsuario
($_POST['placa'], 
$_POST['nombre'], 
$_POST['marcamod'], 
$_POST['color'],
$_POST['lavador'],
$_POST['vehiculo'],
$_POST['servicio'],
$_POST['valor']);

function ModificarUsuario($pl, $nombre, $marcamod, $color, $lavador, $vehiculo, $servicio, $valor)
    {
  $consulta="UPDATE vehiculos SET placa='".$pl."', 
                                  nombre='".$nombre."', 
                                  marcamod='".$marcamod."',
                                  color='".$color."',
                                  lavador='".$lavador."',
                                  vehiculo='".$vehiculo."',
                                  servicio='".$servicio."',
                                  valor='".$valor."'WHERE placa='".$pl."'";
        mysql_query($consulta) or die (mysql_error());
    }  

    
?>


<script type="text/javascript">
    alert("Usuario Modificado exitosamente");
    window.location.href='index.html';
</script>

