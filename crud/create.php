<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

if (isset($_POST['send'])) { 

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $budget = $_POST['budget']; // Recoge el valor de 'budget' del formulario

    // Modifica la sentencia SQL para incluir 'budget'
    $stmt = $conn->prepare("INSERT INTO users (username, password, id, name, budget) VALUES (?, ?, ?, ?, ?)");
    // Ajusta la llamada a bind_param para incluir la variable $budget
    $stmt->bind_param("ssisd", $username, $password, $id, $name, $budget);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Registro guardado exitosamente';
        $_SESSION['message_type'] = 'success'; 
        header('Location: index.php');
    } else {
        echo "El registro no se pudo guardar: " . $stmt->error;
    }

    $stmt->close();
}
?>
