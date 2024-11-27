<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_base_de_datos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperación de datos del formulario
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];

    $respuestas_correctas = 0;
    $respuestas_incorrectas = 0;

    for ($i = 1; $i <= 9; $i++) {
        $respuesta = $_POST["pregunta" . $i];

        if ($respuesta == "SI") {
            $respuestas_correctas++;
        } else {
            $respuestas_incorrectas++;
        }
    }

    // Calificación
    $calificacion = ($respuestas_correctas >= 5) ? "APROBADO" : "DESAPROBADO";

    // Inserción de datos en la base de datos
    $sql = "INSERT INTO resultados (nombre, documento, telefono, respuestas_correctas, respuestas_incorrectas, calificacion) VALUES ('$nombre', '$documento', '$telefono', '$respuestas_correctas', '$respuestas_incorrectas', '$calificacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Resultado registrado correctamente.";
    } else {
        echo "Error al registrar el resultado: " . $conn->error;
    }

    $conn->close();

    // Mostrar resultado
    echo "<h1>Resultado</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Documento: $documento</p>";
    echo "<p>Teléfono: $telefono</p>";
    echo "<p>Respuestas correctas: $respuestas_correctas</p>";
    echo "<p>Respuestas incorrectas: $respuestas_incorrectas</p>";
    echo "<p>Calificación: $calificacion</p>";

    // Enlace para volver a realizar el cuestionario
    echo "<p><a href='index.php'>Volver a realizar el cuestionario</a></p>";
?>