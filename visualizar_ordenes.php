<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Órdenes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap">
</head>
<body>
    <h1>Órdenes</h1>

    <?php
    $total_pagar = 0;
    $plato1=0;
    $plato2=0;
    $plato3=0;
    $plato4=0;
    $plato5=0;
    $plato6=0;
    $plato7=0;

    if (isset($_SESSION["ordenes"])) {
        foreach ($_SESSION["ordenes"] as $orden) {
	    switch ($orden["numero_orden"]){
	    	case "1":
            		$precio_unitario = 3;
			$plato1+=$orden["cantidad"];
			break;
		case "2":
            		$precio_unitario = 2.5;
			$plato2+=$orden["cantidad"];
			break;
		case "3": 
            		$precio_unitario = 1.5;
			$plato3+=$orden["cantidad"];
			break;

		case "4":
            		$precio_unitario = 1.75;
			$plato4+=$orden["cantidad"];
			break;
		
		case "5":
                          $precio_unitario = 4.30;
                          $plato5+=$orden["cantidad"];			
			  break;
		case "6":
                          $precio_unitario = 6.50;
			  $plato6+=$orden["cantidad"];
			  break;
  		case "7": 
                          $precio_unitario = 3.50;
			  $plato7+=$orden["cantidad"];
			  break;
		default: 
			  continue;

	    }
            $subtotal = $orden["cantidad"] * $precio_unitario;

            echo "<p><strong>Nombre del Cliente:</strong> " . $orden["nombre_cliente"] . "<br>";
            echo "<strong>Número de Orden:</strong> " . $orden["numero_orden"] . "<br>";
            echo "<strong>Cantidad:</strong> " . $orden["cantidad"] . "<br>";
            echo "<strong>Precio por plato:</strong> $" . $precio_unitario . "<br>";
            echo "<strong>Subtotal:</strong> $" . $subtotal . "<br>";

            if ($orden["es_jubilado"]) {
                $descuento = $subtotal * 0.2;
                $subtotal -= $descuento;
                echo "<strong>Descuento (20% jubilado):</strong> -$" . $descuento . "<br>";
	    }

	    
			


            echo "<strong>Total a Pagar:</strong> $" . $subtotal . "</p>";
	    echo "<hr>";
	    $total_plato+=$orden["cantidad"];

            $total_pagar += $subtotal;
        }
    } else {
        echo "<p>No hay órdenes registradas.</p>";
    }

    echo "<h2>Total en Caja: $" . $total_pagar . "</h2>";
    echo "<h2> Total vendida por plato: #". $total_plato."</h2>";
    echo "<h2>% Vendido por plato: <br> #1: ".  round(($plato1/7)*100) ."%</h2>";
    echo "<h2>% Vendido por plato: <br> #2: ".  round(($plato2/7)*100) . "%</h2>";
    echo "<h2>% Vendido por plato: <br> #3: ".  round(($plato3/7)*100) ."% </h2>";
    echo "<h2>% Vendido por plato: <br> #4: ".  round(($plato4/7)*100) ."% </h2>";
    echo "<h2>% Vendido por plato: <br> #5: ".  round(($plato5/7)*100) ."% </h2>";
    echo "<h2>% Vendido por plato: <br> #6: ".  round(($plato6/7)*100) ."% </h2>";
    echo "<h2>% Vendido por plato: <br> #7: ".  round(($plato7/7)*100) ."% </h2>";

    session_destroy();
?>

    <p><a href="index.php">Volver a Iniciar otro turno</a></p>
</body>
</html>

