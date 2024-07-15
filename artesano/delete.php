<?php
include '../config.php';

if (isset($_GET['id'])) {
    $art_id = $_GET['id'];

    // Si se ha confirmado, proceder con el borrado
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        $sql = "DELETE FROM artesano WHERE art_id='$art_id'";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Mostrar el formulario de confirmación
        echo "
		<html>
			<head>
				<title>Añadir Departamento</title>
				<link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" rel=\"stylesheet\">
			</head>
			<body>
				<div class=\"container\">
					<h3>¿Estás seguro de que deseas eliminar este artesano?</h3>
					<form method='post'>
						<input type='hidden' name='confirm' value='yes'>
						<button type='submit' class='btn btn-danger'>Eliminar</button>
						<a href='index.php' class='btn btn-warning'>Cancelar</a>
					</form>
				</div>
			</body>
		</html>";
    }
}
?>
