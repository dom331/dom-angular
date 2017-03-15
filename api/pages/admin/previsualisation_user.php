<?php
require_once("../../dao/DaoUtilisateur.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
$valider = $data->valider;
$suppr = $data->suppr;

$daoUtilisateur = new DaoUtilisateur();

$daoUtilisateur->find($id);

if ($valider == "valider") {
    $daoUtilisateur->bean->setApprouve(1);
    $daoUtilisateur->updateApprouve();
}

if ($suppr == "supprimer") {
    $daoUtilisateur->delete();
}

?>