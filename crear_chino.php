
<?php
include('header.php');
?>

<form method="post" action="crear_tradicional.php">
    <div class="container">
        <h2>Registro de Predicción Horóscopo Chino</h2>

        <label for="signo">Id</label>
        <input type="number" required id="id" class="form-control" name="id"><br>

        <label for="signo">Signo</label>
        <input required id="signo" class="form-control" name="signo"><br>

        <label for="prediccion">Predicción</label>
        <input id="prediccion" class="form-control" name="prediccion"></textarea><br>

        <input type="submit" value="Crear" class="btn btn-success" name="crear">
    </div>
</form>


<?php
include_once("conexion.php");

if(isset($_POST["crear"])){
$id=$_POST["id"];
$signo=$_POST["signo"];
$prediccion=$_POST["prediccion"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO zodiaco_chino (id, signo, prediccion) VALUES ('{$id}','{$signo}', '{$prediccion}')";


if ($conn->query($sql) === TRUE) {
  echo "Se guardó la predicción";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>