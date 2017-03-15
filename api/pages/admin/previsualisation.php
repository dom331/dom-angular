<?php

require_once("../../dao/DaoEvenements.php");

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
$valider = $data->valider;
$suppr = $data->suppr;

$daoEvenement = new DaoEvenements();

$daoEvenement->find($id);


if($valider == "valider"){
    $daoEvenement->bean->setApprouve("1");
    $daoEvenement->update();
}

if($suppr == "supprimer"){
    $daoEvenement->delete();
}


?>