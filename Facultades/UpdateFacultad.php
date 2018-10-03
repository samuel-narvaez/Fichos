<?php

    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idFacultad = $_POST['idFacultad'];
    $nombreFacultad = $_POST['nombreFacultad'];

    try {
        $sql = "UPDATE facultad SET nombreFacultad=? WHERE idFacultad=?";
        $query = $connect->prepare($sql);
        $data = [$nombreFacultad, $idFacultad];
        $query->execute($data);
        //$response = ['status' => 1, 'msg' => "Cliente actulizado correctamente"];
        header("location: ../index.php");
    } catch (Exception $e) {
        //$response = ['status' => 0, 'error' => $e];
        echo $e;
    }
?>
