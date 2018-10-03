<?php
    require_once("conexion/Conexion.php");
    $connection = new Conexion();
    $connect = $connection->get_conexion();

    try {
        $sql = "SELECT * FROM estudiante";
        $query = $connect->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();
        //$response = ['status' => 1, 'clientes' => $data];
    } catch (Exception $e) {
        //$response = ['status' => 0, 'error' => $e];
        echo $e;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo.css">
    <title>Estudiantes</title>
</head>
<body>
    <div class="contorno">
        <h1>CRUD ESRUDIANTES</h1>
        <a href="Estudiante/insertarEstudiante.php" class="aggEstudiante">Agregar Estudiante</a>
        <a href="Estudiante/BuscarEstudiante.php" class="searchEstudiante">Buscar Estudiante</a>
    </div>
    
    <table border="2">
        <thead>
            <tr>
                <td>Id Estudiante</td>
                <td>Cedula </td>
                <td>Nombre </td>
                <td>Apellidos </td>
                <td>Carrera</td>
                <td>Más</td>
            </tr>
        </thead>

        <?php
            foreach ($data as $estudiante) {
                //echo $estudiante;
                $editRoute = "Estudiante/EditarEstudiante.php?id=".$estudiante['idestudiante'];
                $deleteRoute = "Estudiante/EliminarEstudiante.php?id=".$estudiante['idestudiante'];
        ?>
        <tr>
                    <td> <?php echo $estudiante['idestudiante']; ?> </td>
                    <td> <?php echo $estudiante['cedula']; ?> </td>
                    <td> <?php echo $estudiante['nombres']; ?> </td>
                    <td> <?php echo $estudiante['apellidos']; ?> </td>
                    <td> <?php echo $estudiante['idCarrera']; ?> </td>
                    <td>
                        <a href="<?php echo $editRoute; ?>" class="editar">Editar</a>
                        &nbsp;
                        <a href="<?php echo $deleteRoute ?>" class="eliminar">Eliminar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
    </table>
</body>
</html>