<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $art_mun_id = $_POST['art_mun_id'];
    $art_nombres = $_POST['art_nombres'];
    $art_apellidos = $_POST['art_apellidos'];
    $art_razon_social = $_POST['art_razon_social'];
    $art_descripccion = $_POST['art_descripccion'];
    $art_email = $_POST['art_email'];
    $art_celular = $_POST['art_celular'];

    $sql = "INSERT INTO artesano (art_mun_id, art_nombres, art_apellidos, art_razon_social, art_descripccion, art_email, art_celular) 
            VALUES ('$art_mun_id', '$art_nombres', '$art_apellidos', '$art_razon_social', '$art_descripccion', '$art_email', '$art_celular')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener municipios para el dropdown
$sql = "SELECT * FROM municipio";
$municipios = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Añadir Artesano</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Añadir Artesano</h1>
    <form method="POST">
        <div class="form-group">
            <label for="art_mun_id">Municipio</label>
            <select class="form-control" id="art_mun_id" name="art_mun_id" required>
                <?php while ($row = $municipios->fetch_assoc()) { ?>
                    <option value="<?php echo $row["mun_id"]; ?>"><?php echo $row["mun_nombre"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="art_nombres">Nombres</label>
            <input type="text" class="form-control" id="art_nombres" name="art_nombres" required>
        </div>
        <div class="form-group">
            <label for="art_apellidos">Apellidos</label>
            <input type="text" class="form-control" id="art_apellidos" name="art_apellidos" required>
        </div>
        <div class="form-group">
            <label for="art_razon_social">Razón Social</label>
            <input type="text" class="form-control" id="art_razon_social" name="art_razon_social" required>
        </div>
        <div class="form-group">
            <label for="art_descripccion">Descripción</label>
            <textarea class="form-control" id="art_descripccion" name="art_descripccion"></textarea>
        </div>
        <div class="form-group">
            <label for="art_email">Email</label>
            <input type="email" class="form-control" id="art_email" name="art_email" required>
        </div>
        <div class="form-group">
            <label for="art_celular">Celular</label>
            <input type="text" class="form-control" id="art_celular" name="art_celular" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
		<a href="index.php" class="btn btn-warning">Cancelar</a>
    </form>
</div>
</body>
</html>
