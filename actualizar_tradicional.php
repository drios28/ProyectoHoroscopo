<?php
include('header.php');
include_once("conexion.php");
include_once("funciones.php");

$signos = lista_signos($servername, $username, $password, $dbname);

$registro = [];
if (isset($_GET["id"])) {
    $registro = obtener_registroTradicional($servername, $username, $password, $dbname, $_GET["id"]);
}

$signo = isset($registro["signo"]) ? $registro["signo"] : "";
$prediccion = isset($registro["prediccion"]) ? $registro["prediccion"] : "";
?>



<form method="post" action="actualizar_tradicional.php<?php echo isset($_GET["id"]) ? "?id=" . $_GET["id"] : ""; ?>">
    <div class="container">
        <h2>Actualización de Predicciones de Horóscopo Tradicional</h2>
        <label for="signo">Signo</label>
        <input required id="signo" class="form-control" name="signo" value="<?php echo $signo; ?>"><br>

        <label for="prediccion">Predicción</label>
        <textarea id="prediccion" class="form-control" name="prediccion"><?php echo $prediccion; ?></textarea><br>

        <input type="submit" value="Grabar" class="btn btn-success" name="grabar">
    </div>
</form>

<?php

if (isset($_POST["grabar"])) {
    $signo = $_POST["signo"];
    $prediccion = $_POST["prediccion"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = isset($_GET["id"]) ? $_GET["id"] : 0; // Obtener el ID del registro a actualizar

    $sql = "UPDATE zodiaco_tradicional SET signo = '" . $signo . "', prediccion = '" . $prediccion . "' WHERE id = " . $id;

    if ($conn->query($sql) === TRUE) {
        echo "Se actualizó correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>