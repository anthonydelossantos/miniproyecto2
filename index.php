<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST["nombre_cliente"];
    $numero_orden = $_POST["numero_orden"];
    $cantidad = $_POST["cantidad"];
    $es_jubilado = isset($_POST["jubilado"]);

    $orden = array(
        "nombre_cliente" => $nombre_cliente,
        "numero_orden" => $numero_orden,
        "cantidad" => $cantidad,
        "es_jubilado" => $es_jubilado
    );

    $_SESSION["ordenes"][] = $orden;
    echo "<h3> $nombre_cliente ordenó #$cantidad cantidad del plato #$numero_orden  </h3>";

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap">
</head>
<body>
    <h1>Restaurante</h1>
    <img src="public/banner.jpg" alt="Banner del restaurante" class="banner-image">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre_cliente">Nombre del Cliente:</label>
        <input type="text" name="nombre_cliente" required><br>

        <label for="numero_orden">Número de la Orden:</label>
        <input type="number" name="numero_orden" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="jubilado">¿Es jubilado?</label>
        <input type="checkbox" name="jubilado"><br>

        <input type="submit" value="Agregar Orden">
    </form>

    <!-- Agregar un botón "Cerrar" para redirigir manualmente -->
    <form method="post" action="visualizar_ordenes.php">
        <input type="submit" name="cerrar" value="Cerrar">
    </form>
</body>
</html>

