<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dept_id = $_POST['dept_id'];
    $dept_nombre = $_POST['dept_nombre'];

    $sql = "INSERT INTO departamento (dept_id, dept_nombre) VALUES ('$dept_id', '$dept_nombre')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Añadir Departamento</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Añadir Departamento</h1>
    <form method="POST">
        <div class="form-group">
            <label for="dept_id">ID</label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" required>
        </div>
        <div class="form-group">
            <label for="dept_nombre">Nombre</label>
            <input type="text" class="form-control" id="dept_nombre" name="dept_nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
		<a href="index.php" class="btn btn-warning">Cancelar</a>
    </form>
</div>
</body>
</html>
