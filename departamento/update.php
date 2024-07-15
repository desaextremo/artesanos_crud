<?php
include '../config.php';

if (isset($_GET['id'])) {
    $dept_id = $_GET['id'];

    $sql = "SELECT * FROM departamento WHERE dept_id='$dept_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dept_id = $_POST['dept_id'];
    $dept_nombre = $_POST['dept_nombre'];

    $sql = "UPDATE departamento SET dept_nombre='$dept_nombre' WHERE dept_id='$dept_id'";
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
    <title>Editar Departamento</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Editar Departamento</h1>
    <form method="POST">
        <div class="form-group">
            <label for="dept_id">ID</label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" value="<?php echo $row['dept_id']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="dept_nombre">Nombre</label>
            <input type="text" class="form-control" id="dept_nombre" name="dept_nombre" value="<?php echo $row['dept_nombre']; ?>" required>
        </div>
        <button type="submit" class="btn btn-danger">Guardar</button>
		<a href="index.php" class="btn btn-warning">Cancelar</a>
    </form>
</div>
</body>
</html>
