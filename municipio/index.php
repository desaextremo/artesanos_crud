<?php
include '../config.php';

// Paginación
$limit = 10;  
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
} else { 
    $page=1;
};  
$start_from = ($page-1) * $limit; 

$sql = "SELECT municipio.*, departamento.dept_nombre 
        FROM municipio 
        JOIN departamento ON municipio.mun_dept_id = departamento.dept_id 
        ORDER BY municipio.mun_nombre ASC 
        LIMIT $start_from, $limit";
$rs_result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Municipio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Artesanos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../departamento/index.php">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Municipios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../artesano/index.php">Artesanos</a>
                </li>
            </ul>
        </div>
    </nav>
    </nav>
<div class="container">
    <h1 class="mt-4">Municipios</h1>
    <a href="create.php" class="btn btn-primary mb-4">+</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $rs_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["mun_id"]; ?></td>
                <td><?php echo $row["mun_nombre"]; ?></td>
                <td><?php echo $row["dept_nombre"]; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row["mun_id"]; ?>" class="btn btn-warning">Editar</a>
                    <a href="delete.php?id=<?php echo $row["mun_id"]; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php }; ?>
        </tbody>
    </table>
    <?php 
    $sql = "SELECT COUNT(mun_id) FROM municipio";  
    $rs_result = $conn->query($sql);  
    $row = $rs_result->fetch_row();  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $limit);  
    $pagLink = "<nav><ul class='pagination'>";  
    for ($i=1; $i<=$total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>"; 
    };  
    echo $pagLink . "</ul></nav>";  
    ?>
</div>
</body>
</html>
