<?php

require_once("../../dao/DaoActualite.php");


$daoActualite = new DaoActualite();

$id = $_GET['id'];
$daoActualite->find($id);

$infos['oui'] = array();

$infos['oui']['id']=$daoActualite->bean->getId();
$infos['oui']['titre']=$daoActualite->bean->getTitre();
$infos['oui']['contenu']=$daoActualite->bean->getContenu();
$infos['oui']['image']=$daoActualite->bean->getImage();
$infos['oui']['date']=$daoActualite->bean->getDate();
$infos['oui']['responsables']=$daoActualite->bean->getResponsables();


$daoActualite->delete();

$param = array(
    "liste" => $infos
);

echo json_encode($param);

//var_dump($param) or die();












?>