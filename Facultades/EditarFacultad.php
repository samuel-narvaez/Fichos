<?php
    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idFacultad = $_GET['id'];

    try {
        $sql = "SELECT * FROM facultad WHERE idFacultad=?";
        $query = $connect->prepare($sql);
        $data = [$idFacultad];
        $query->execute($data);
        $infofacultad = $query->fetch();
        //echo $infofacultad['idFacultad'];
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
    <title>Editar Facultad</title>
</head>
<body>
    <h1 class="titulos">Editar Facultad</h1>
    <form action="UpdateFacultad.php" method="POST">

    <h1 class="tit">Editar un cliente</h1>

	<input type="hidden" name="idFacultad" value="<?php echo $infofacultad['idFacultad'] ?>">
	
	<input type="text" name="nombreFacultad" value="<?php echo $infofacultad['nombreFacultad']; ?>" placeholder="Nombre Facultad" class="inputgroup"><br><br>

	<input type="submit" name="Editar" class="enviar">

</form>
</body>
</html>