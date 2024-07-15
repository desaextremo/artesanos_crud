<?php
include '../config.php';

if (isset($_GET['id'])) {
    $mun_id = $_GET['id'];

    $sql = "SELECT * FROM municipio WHERE mun_id='$mun_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Obtener departamentos para el dropdown
$sql = "SELECT * FROM departamento";
$departamentos = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mun_id = $_POST['mun_id'];
    $mun_dept_id = $_POST['mun_dept_id'];
    $mun_nombre = $_POST['mun_nombre'];

    $sql = "UPDATE municipio SET mun_dept_id='$mun_dept_id', mun_nombre='$mun_nombre' WHERE mun_id='$mun_id'";
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
    <title>Editar Municipio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Editar Municipio</h1>
    <form method="POST">
        <div class="form-group">
            <label for="mun_id">ID</label>
            <input type="text" class="form-control" id="mun_id" name="mun_id" value="<?php echo $row['mun_id']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="mun_dept_id">Departamento</label>
            <select class="form-control" id="mun_dept_id" name="mun_dept_id" required>
                <?php while ($dept_row = $departamentos->fetch_assoc()) { ?>
                    <option value="<?php echo $dept_row["dept_id"]; ?>" <?php if ($dept_row["dept_id"] == $row["mun_dept_id"]) echo "selected"; ?>>
                        <?php echo $dept_row["dept_nombre"]; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mun_nombre">Nombre</label>
            <input type="text" class="form-control" id="mun_nombre" name="mun_nombre" value="<?php echo $row['mun_nombre']; ?>" required>
        </div>
        <button type="submit" class="btn btn-danger">Guardar</button>
		<a href="index.php" class="btn btn-warning">Cancelar</a>
    </form>
</div>
</body>
</html>
