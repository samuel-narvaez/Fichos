<?php

    require_once("../conexion/Conexion.php");

    $connection = new Conexion();
    $connect = $connection->get_conexion();

    $idEstudiante = $_POST['idestudiante'];
    $cedulaEstudiante = $_POST['cedula'];
    $nombreEstudiante = $_POST['nombres'];
    $apellidosEstudiante= $_POST['apellidos'];
    $carrera = $_POST['idCarrera'];

    try{
        $sql = "INSERT INTO estudiante (idEstudiante, nombreEstudiante) VALUES (?,?,?,?,?)";
        $query = $connect->prepare($sql);
        $data = [$idestudiante,$cedulaEstudiante,$nombreEstudiante,$apellidosEstudiante, $carrera];
        $query->execute($data);
        header("location: ../index.php");
        //$response = ['status' => 1, 'msg' => "Datos guardados exitosamente"];
    }catch (Exception $e){
        //$response = ['status' => 0, 'error' => $e];
        echo $e;
    }   



?>