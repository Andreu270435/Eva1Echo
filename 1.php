
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    
    <?php
    IF ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Paquetes = $_POST["paquetes"];
        $Tamaño = $_POST["tamaño"];
        $Peso = $_POST["kilos"];
        $Largo = $_POST["largo"];
        $Alto = $_POST["alto"];
        $Ancho = $_POST["ancho"];
        $Transporte = $_POST["transporte"];
        $UbicacionEnvio = $_POST["zona"];
        $Volumen = $Alto * $Ancho * $Largo;

        if ($Tamaño <= 0.5) {
            $PrecioBase = 50;
        } elseif ($Tamaño <= 1) {
            $PrecioBase = 75;
        } else {
            $PrecioBase = 100;
        }

        $PrecioPaquete = $PrecioBase * $Tamaño;

        if ($Peso > 15) {
            echo "Lo sentimos, no se pueden enviar paquetes que pesen más de 15kg.";
            exit();
        } elseif ($Peso > 10) {
            $PrecioPaquete *= 1.50; 
        } elseif ($Peso > 5) {
            $PrecioPaquete *= 1.25; 
        }
        $PrecioTotalEnvio = $PrecioPaquete * $Paquetes;
        
        if ($UbicacionEnvio == "Canarias") {
            $PrecioTotalEnvio *= 1.10;
        } elseif ($UbicacionEnvio == "Baleares" && $Transporte == "aereo") {
            $PrecioTotalEnvio *= 1.10;}

            echo "Detalles del Envío";
            echo "Cantidad de paquetes: " . $Paquetes . "<br>";
            echo "Volumen por paquete: " .$Volumen . " m³<br>";
            echo "Peso por paquete: " . $Peso . " kg<br>";
            echo "Precio por paquete: " .$PrecioPaquete . " €<br>";
            echo "Precio total del envío: " . $PrecioTotalEnvio . " €<br>";
        
    }

    ?>
    
    <form method="POST" action="">
        <label for="kilos">PAQUETES:</label>
        <input type="number" id="paquetes" name="paquetes" value="">
        <label for="tamaño">TAMAÑO:</label>
        <input type="number" id="tamaño" name="tamaño" value="">
        <label for="peso">KILOS:</label>
        <input type="number" id="kilos" name="kilos" value="">
        <label for="largo">LARGO:</label>
        <input type="number" id="largo" name="largo" value="">
        <label for="alto">ALTO:</label>
        <input type="number" id="alto" name="alto" value="">
        <label for="ancho">ANCHO:</label>
        <input type="number" id="ancho" name="ancho" value=""><br><br>
        <label for="zona">Zona de Envío:</label>
        <select id="zona" name="zona">
            <option value="Peninsula">Península</option>
            <option value="Baleares">Baleares</option>
            <option value="Canarias">Canarias</option>
        </select>
        
        <label for="transporte">Tipo de Transporte (En la Peninsula no se puede):</label>
        <select id="transporte" name="transporte">
            <option value="maritimo">Marítimo</option>
            <option value="aereo">Aéreo</option>
        </select>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>