<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mun_id = $_POST['mun_id'];
    $mun_dept_id = $_POST['mun_dept_id'];
    $mun_nombre = $_POST['mun_nombre'];

    $sql = "INSERT INTO municipio (mun_id, mun_dept_id, mun_nombre) VALUES ('$mun_id', '$mun_dept_id', '$mun_nombre')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener departamentos para el dropdown
$sql = "SELECT * FROM departamento";
$departamentos = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Añadir Municipio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Añadir Municipio</h1>
    <form method="POST">
        <div class="form-group">
            <label for="mun_id">ID</label>
            <input type="text" class="form-control" id="mun_id" name="mun_id" required>
        </div>
        <div class="form-group">
            <label for="mun_dept_id">Departamento</label>
            <select class="form-control" id="mun_dept_id" name="mun_dept_id" required>
                <?php while ($row = $departamentos->fetch_assoc()) { ?>
                    <option value="<?php echo $row["dept_id"]; ?>"><?php echo $row["dept_nombre"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mun_nombre">Nombre</label>
            <input type="text" class="form-control" id="mun_nombre" name="mun_nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
		<a href="index.php" class="btn btn-warning">Cancelar</a>
    </form>
</div>
</body>
</html>
