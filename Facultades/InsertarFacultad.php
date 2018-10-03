<?php

    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idFacultad = $_POST['idFacultad'];
    $nombreFacultad = $_POST['nombreFacultad'];

    try{
        $sql = "INSERT INTO facultad (idFacultad, nombreFacultad) VALUES (?,?)";
        $query = $connect->prepare($sql);
        $data = [$idFacultad, $nombreFacultad];
        $query->execute($data);
        header("location: ../index.php");
        //$response = ['status' => 1, 'msg' => "Datos guardados exitosamente"];
    }catch (Exception $e){
        //$response = ['status' => 0, 'error' => $e];
        echo $e;
    }   
?>