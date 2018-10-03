<?php
    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idEstudiante = $_GET["idestudiante"];

    try {
        $sql = "SELECT * FROM estudiante WHERE idestudiante LIKE ?";
        $query = $connect->prepare($sql);
        $data = ["%".$idEstudiante."%"];
        $query->execute($data);
        $dataEstudiante = $query->fetchAll();
        //$response = ['status' => 1, 'cliente' => $infocliente];
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
    <link rel="stylesheet" href="../styles/estilo.css">
    <title>Buscar Estudiante</title>
</head>
<body>
    <h1 class="titulos">Buscar Estudiante</h1>
    <form action="" method="GET">
		<input type="text" name="idestudiante" class="inputgroup" autofocus>
		<input type="submit" value="buscar" class="enviar">
    </form><br><br>

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
            foreach ($dataEstudiante as $estudiante) {
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