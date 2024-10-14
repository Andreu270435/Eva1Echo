
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["num"];
            if (filter_var($numero, FILTER_VALIDATE_INT) && $numero > 0) {

    ?>
    
    <form method="POST" action="">
        <label for="num">NÚMERO:</label>
        <input type="number" id="num" name="num" value="">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>