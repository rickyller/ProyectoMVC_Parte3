<?php
    include("conexion.php");

    if (isset($_GET['id'])) {    
        $id = $_GET['id'];

        // Usar sentencia preparada para mayor seguridad
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);  // "i" indica que la variable es un entero

        if ($stmt->execute()) {
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; // Funcion de bootstrap
            header('Location:index.php'); // Redireccionar el archivo
        } else {
            echo "Error al borrar registro: " . $stmt->error;
        }

        $stmt->close();
    }
?>
