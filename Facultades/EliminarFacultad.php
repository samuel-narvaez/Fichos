<?php 

    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();
    
    $idFacultad = $_GET['id'];

    echo "El identificador de este cliente es: $idFacultad"; 

    try { 
        $sql = "DELETE FROM facultad WHERE idFacultad=?";
        $query = $connect->prepare($sql);
        $data = [$idFacultad];
        $query->execute($data);
        //$response = ['status' => 1, 'msg' => "Dato eliminado exitosamente"];
        header("location: ../index.php");
    } catch (Exception $e) {
        //$response = ['status' => 0, 'error' => $e];
        echo $e;
    }    
?> 
