<?php
    require_once("conexion/Conexion.php");
    $connection = new Conexion();
    $connect = $connection->get_conexion();

    try {
        $sql = "SELECT * FROM facultad";
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
    <title>Bienvenidos</title>
</head>
<body>
    <div class="contorno">
        <h1>CRUD FACULTADES</h1>
        <a href="Facultades/AgregarFacultad.html" class="aggFacultad">Agregar Facultad</a>
        <a href="Facultades/BuscarFacultad.php" class="seachFacultad">Buscar Facultad</a>
    </div>
    
    <table border="2">
        <thead>
            <tr>
                <td>Id Facultad</td>
                <td>Nombre Facultad</td>
                <td>Más</td>
            </tr>
        </thead>

        <?php
            foreach ($data as $facultad) {
                //echo $facultad;
                $editRoute = "Facultades/EditarFacultad.php?id=".$facultad['idFacultad'];
                $deleteRoute = "Facultades/EliminarFacultad.php?id=".$facultad['idFacultad'];
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