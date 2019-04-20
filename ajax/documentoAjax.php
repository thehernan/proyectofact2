<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documentoAjax
 *
 * @author HERNAN
 */

require_once '../model/persona.php';

$data = array();
if (isset($_POST['ruc']) && !empty($_POST['ruc'])) {

    $ruc = $_POST['ruc'];
    
    $objeto= new persona();
    $persona = $objeto->search($ruc);



    if ($persona != null) {
        $datos = array(
            0 => $persona->getId(),
            1 => $persona->getRuc(),
            2 => $persona->getNombre(),
            3 => $persona->getDireccion(),
            4 => $persona->getEmail(),
        );
    } else {

        $data = file_get_contents("https://api.sunat.cloud/ruc/" . $ruc);
        $info = json_decode($data, true);

        if ($data === '[]' || $info['fecha_inscripcion'] === '--') {
            $datos = array(0 => 'nada');
            echo json_encode($datos);
        } else {
            $datos = array(
                0 => 0,
                1 => $info['ruc'],
                2 => $info['razon_social'],
                3 => $info['domicilio_fiscal'],
                4 => '-',
            );
        }
    }
}

echo json_encode($datos);

