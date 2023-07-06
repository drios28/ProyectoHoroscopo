<?php

include_once("conexion.php");

include('header.php');

include('funciones.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Horóscopo Chino y Zodiaco</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id="bodyDatos">
    <h1 id="h1Datos">Horóscopo Chino y Zodiaco</h1>

    <?php
    function obtenerAnimalChino($anio) {
        $animales = array(
            "Rata", "Buey", "Tigre", "Conejo", "Dragón", "Serpiente",
            "Caballo", "Cabra", "Mono", "Gallo", "Perro", "Cerdo"
        );
        
        $indice = ($anio - 1900) % 12;
        return $animales[$indice];
    }

    function obtenerSignoZodiacal($mes, $dia) {
        $signos = array(
            "Capricornio" => array("inicio" => "12-22", "fin" => "01-19"),
            "Acuario" => array("inicio" => "01-20", "fin" => "02-18"),
            "Piscis" => array("inicio" => "02-19", "fin" => "03-20"),
            "Aries" => array("inicio" => "03-21", "fin" => "04-19"),
            "Tauro" => array("inicio" => "04-20", "fin" => "05-20"),
            "Géminis" => array("inicio" => "05-21", "fin" => "06-20"),
            "Cáncer" => array("inicio" => "06-21", "fin" => "07-22"),
            "Leo" => array("inicio" => "07-23", "fin" => "08-22"),
            "Virgo" => array("inicio" => "08-23", "fin" => "09-22"),
            "Libra" => array("inicio" => "09-23", "fin" => "10-22"),
            "Escorpio" => array("inicio" => "10-23", "fin" => "11-21"),
            "Sagitario" => array("inicio" => "11-22", "fin" => "12-21"),
        );
        
        $fecha = sprintf("%02d-%02d", $mes, $dia);
        
        foreach ($signos as $signo => $rango) {
            $inicio = $rango["inicio"];
            $fin = $rango["fin"];
            
            if (($inicio <= $fecha && $fecha <= $fin) || ($inicio > $fin && ($inicio <= $fecha || $fecha <= $fin))) {
                return $signo;
            }
        }
        
        return "";
    }

    $fechaNacimiento = "";
    $animalChino = "";
    $signoZodiacal = "";
    $nombre = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $fechaNacimiento = $_POST["fecha"];
        
        $anio = date("Y", strtotime($fechaNacimiento));
        $mes = date("m", strtotime($fechaNacimiento));
        $dia = date("d", strtotime($fechaNacimiento));
        
        $animalChino = obtenerAnimalChino($anio);
        $signoZodiacal = obtenerSignoZodiacal($mes, $dia);
    }
    ?>

    <form id="formDatos" method="post" action="form_datos.php">
        <label for="fecha">Nombre:</label>
        <input type="text" name="nombre"  required>

        <label for="fecha">Fecha de Nacimiento:</label>
        <input type="date" name="fecha"  required>
        <input type="submit" value="Obtener Horóscopo" name="obtener">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Resultado</h2>
        <p>Hola <?php echo $nombre?> estos son tus resultados:</p>
        <?php if (!empty($animalChino)): ?>
            <h3>Horóscopo Chino</h3>
            <p>Tu animal del horóscopo chino es: <?php echo $animalChino; ?></p>
        <?php endif; ?>


<?php    
$prediccionChino = obtenerPrediccionHoroscopoChino($servername, $username, $password, $dbname, $animalChino);
echo $prediccionChino;
?>

        <?php if (!empty($signoZodiacal)): ?>
            <h3>Signo Zodiacal Occidental</h3>
            <p>Tu signo zodiacal es: <?php echo $signoZodiacal; ?></p>
        <?php endif; ?>
    <?php endif; ?>

   
<?php
$prediccionZodiacal = obtenerPrediccionSignoZodiacal($servername, $username, $password, $dbname, $signoZodiacal);
echo $prediccionZodiacal;
?>

<?php
if(isset($_POST["obtener"])){
    $nombre=$_POST["nombre"];
    $fecha_nacimiento=$_POST["fecha"];
    $signo_tradicional=$signoZodiacal;
    $signo_chino=$animalChino;
    $prediccion_tradicional=$prediccionZodiacal;
    $prediccion_chino=$prediccionChino;
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO personas (id, nombre, fecha_nacimiento, signo_tradicional, prediccion_tradicional,signo_chino, prediccion_chino) VALUES ('','{$nombre}', '{$fecha_nacimiento}', '{$signo_tradicional}', '{$prediccion_tradicional}', '{$signo_chino}', '{$prediccion_chino}')";
    
    
    if ($conn->query($sql) === TRUE) {
      echo "Se guardó la predicción";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    }
    ?>




</body>
</html>

