<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP MySQL CRUD</title>
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark  bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">PHP MySQL CRUD</a>
            </div>
        </nav>
        <?php
        include("conexion.php");

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Uso de sentencias preparadas
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $password = $row['password'];
                $id = $row['id'];
                $name = $row['name'];
                $budget = $row['budget'];
            }

            $stmt->close();
        }

        if(isset($_POST['update'])){
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id = $_POST['id'];
            $name = $_POST['name'];
            $budget = $_POST['budget'];

            // Uso de sentencias preparadas para el UPDATE
            $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, name = ?, budget = ? WHERE id = ?");
            $stmt->bind_param("sssdi", $username, $password, $name, $budget, $id);

            if ($stmt->execute()) {
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info';
                header('Location:index.php');
            } else {
                echo "Error al actualizar registro: " . $stmt->error;
            }

            $stmt->close();
        }
    ?>
<div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="update.php?id=<?php echo $id; ?>" method="POST">
                            <div class="form-group">
                                ID: <input type="text" name="id" value="<?php echo isset($id) ? $id : ''; ?>"
                                    class="form-control" placeholder="ID" readonly>
                            </div>
                            <div class="form-group">
                                Username: <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>"
                                    class="form-control" placeholder="Actualiza Username" required>
                            </div>
                            <div class="form-group">
                                Password: <input type="password" name="password" class="form-control" placeholder="Actualiza Contraseña" required>
                            </div>
                            <div class="form-group">
                                Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>"
                                    class="form-control" placeholder="Actualiza Nombre" required>
                            </div>
                            <div class="form-group">
                                Budget: <input type="text" name="budget" value="<?php echo isset($budget) ? $budget : ''; ?>"
                                    class="form-control" placeholder="Actualiza Budget" required>
                            </div>
                            <button class="btn btn-success btn-block" name="update">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>
