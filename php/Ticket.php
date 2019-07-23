<?php
require '../vendor/autoload.php';

use models\{Producto, Pedido};

if(!empty($_REQUEST)) {

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

// echo($_REQUEST['']);

$comidaRapidaPedido = new Pedido('localhost', 'root', '', 'restaurante');

$comidaRapidaPedido-> InsertarPedido($_REQUEST);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
 <form action="../index.php" method="post">
<section>

<h1>

Estas son los productos que pediste
</h1>

<?php

$envioProductos = new Pedido('localhost', 'root', '', 'restaurante');

if(!empty($_REQUEST)) {




$envioProductos-> mostrarEnvio('productos', 'elementospedido', $_REQUEST);



// $envioProductos-> precio('productos', $_REQUEST);

    

// echo('<br>');

// $envioProductos-> calcularPrecio('productos', $_REQUEST);

}

?>

</section>
    <!-- FOOTER -->

    <footer>
    
    <a href="registroUsuario.php">QUIERES REGISTRARTE PARA OBTENER PROMOCIONES? REGISTRATE AQUI</a>
    </footer>

    </form>
</body>
</html>