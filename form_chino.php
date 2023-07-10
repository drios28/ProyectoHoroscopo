<?php
include_once('conexion.php');
include('header.php');
?>

<div class="container">
    <div class="row">
        <h1>Lista de predicciones del horóscopo chino</h1>
   <a target='_blank' class='btn btn-success' href='crear_chino.php?id=" . $row["id"] . "'>Crear</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Signo</th>
                    <th scope="col">Predicción</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['idOculto'])) {
                        $idEliminar = $_POST['idOculto'];
                        // Eliminar el registro de la base de datos
                        $sqlEliminar = "DELETE FROM zodiaco_chino WHERE id = $idEliminar";
                        $resultadoEliminar = $conn->query($sqlEliminar);
                        if ($resultadoEliminar) {
                            echo "<div class='alert alert-success' role='alert'>Registro eliminado correctamente</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Error al eliminar el registro: " . $conn->error . "</div>";
                        }
                    }
                }

                $sql = "SELECT id, signo, prediccion FROM zodiaco_chino";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $row["signo"] . "</td>";
                        echo "<td>" . $row["prediccion"] . "</td>";
                        echo "<td>
                                    <a target='_blank' class='btn btn-success' href='actualizar_chino.php?id=" . $row["id"] . "'>Editar</a>
                                    <button type='button' class='btn btn-danger eliminar-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='" . $row["id"] . "'>Eliminar</button>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="modal-header">
                    <input type="hidden" id="idOculto" name="idOculto" />
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atención</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const eliminarBtns = document.getElementsByClassName("eliminar-btn");
        const idOcultoInput = document.getElementById("idOculto");

        for (let i = 0; i < eliminarBtns.length; i++) {
            eliminarBtns[i].addEventListener("click", (event) => {
                const id = event.target.getAttribute("data-id");
                idOcultoInput.value = id;
            });
        }
    });
</script>

<?php
include_once("footer.php");
?>
