<?php
    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idFacultad = $_GET["idFacultad"];

    try {
        $sql = "SELECT * FROM facultad WHERE idFacultad LIKE ?";
        $query = $connect->prepare($sql);
        $data = ["%".$idFacultad."%"];
        $query->execute($data);
        $infofacultad = $query->fetchAll();
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
    <title>Buscar Facultad</title>
</head>
<body>
    <h1 class="titulos">Buscar Facultad</h1>
    <form action="" method="GET">
		<input type="text" name="idFacultad" class="inputgroup" autofocus>
		<input type="submit" value="buscar" class="enviar">
    </form><br><br>

    <table border="2">
        <thead>
            <tr>
                <td>Id Facultad</td>
                <td>Nombre Facultad</td>
                <td>Más</td>
            </tr>
        </thead>

        <?php
            foreach ($infofacultad as $facultad) {
        ?>
        <tr>
                    <td> <?php echo $facultad['idFacultad']; ?> </td>
                    <td> <?php echo $facultad['nombreFacultad']; ?> </td>
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