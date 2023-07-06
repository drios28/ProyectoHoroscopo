<?php
function lista_signos($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, signo FROM zodiaco_tradicional";
    $result = $conn->query($sql);
    $signos = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($signos, [
                "id" => $row["id"],
                "signo" => $row["signo"]
            ]);
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $signos;
}


function obtener_registroTradicional($servername, $username, $password, $dbname, $id)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, signo, prediccion FROM zodiaco_tradicional WHERE id = " . $id;
    $result = $conn->query($sql);
    $registro = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $registro = [
                "id" => $row["id"],
                "signo" => $row["signo"],
                "prediccion" => $row["prediccion"]
            ];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $registro;
}




function obtener_registroChino($servername, $username, $password, $dbname, $id)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, signo, prediccion FROM zodiaco_chino WHERE id = " . $id;
    $result = $conn->query($sql);
    $registro = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $registro = [
                "id" => $row["id"],
                "signo" => $row["signo"],
                "prediccion" => $row["prediccion"]
            ];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $registro;
}




function obtenerPrediccionHoroscopoChino($servername, $username, $password, $dbname, $animalChino) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
        die("Falló la conexión: " . $conn->connect_error);
    }
    
    $animalChino = $conn->real_escape_string($animalChino);
    $sql = "SELECT prediccion FROM zodiaco_chino WHERE signo = '$animalChino'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prediccion = $row["prediccion"];
    } else {
        $prediccion = "No se encontró la predicción para el animal chino '$animalChino'";
    }
    
    $conn->close();
    return $prediccion;
}



function obtenerPrediccionSignoZodiacal($servername, $username, $password, $dbname, $signoZodiacal) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
        die("Falló la conexión: " . $conn->connect_error);
    }
    
    $signoZodiacal = $conn->real_escape_string($signoZodiacal);
    $sql = "SELECT prediccion FROM zodiaco_tradicional WHERE signo = '$signoZodiacal'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prediccion = $row["prediccion"];
    } else {
        $prediccion = "No se encontró la predicción para el signo zodiacal '$signoZodiacal'";
    }
    
    $conn->close();
    return $prediccion;
}
?>

