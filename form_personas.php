<?php
include_once('conexion.php');
include('header.php');
?>

<div class="container">
    <div class="row">
        <h1>Lista de personas del horoscopo:</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Signo Tradicional</th>
                    <th scope="col">Prediccion</th>
                    <th scope="col">Signo Chino</th>
                    <th scope="col">Prediccion Chino</th>
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
                        $sqlEliminar = "DELETE FROM personas WHERE id = $idEliminar";
                        $resultadoEliminar = $conn->query($sqlEliminar);
                        if ($resultadoEliminar) {
                            echo "<div class='alert alert-success' role='alert'>Registro eliminado correctamente</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Error al eliminar el registro: " . $conn->error . "</div>";
                        }
                    }
                }

                $sql = "SELECT id, nombre, fecha_nacimiento, signo_tradicional, prediccion_tradicional, signo_chino, prediccion_chino FROM personas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                        echo "<td scope='row'>" . $row["signo_tradicional"] . "</td>";
                        echo "<td>" . $row["prediccion_tradicional"] . "</td>";
                        echo "<td scope='row'>" . $row["signo_chino"] . "</td>";
                        echo "<td>" . $row["prediccion_chino"] . "</td>";
                        echo "<td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
