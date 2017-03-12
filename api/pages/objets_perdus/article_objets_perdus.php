<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
require_once("../../dao/daoObjets_perdus.php");


$daoObjets_perdus = new DaoObjets_perdus();

$daoObjets_perdus->find($id);

$infos['oui'] = array();

$infos['oui']['id']=$daoObjets_perdus->bean->getId();
$infos['oui']['titre']=$daoObjets_perdus->bean->getTitre();
$infos['oui']['contenu']=$daoObjets_perdus->bean->getContenu();
$infos['oui']['image']=$daoObjets_perdus->bean->getImage();
$infos['oui']['date']=$daoObjets_perdus->bean->getDate_debut();
$infos['oui']['responsables']=$daoObjets_perdus->bean->getResponsables();
$daoObjets_perdus->setLeUtilisateur();
$infos['oui']['userId'] = $daoObjets_perdus->bean->getLeUtilisateur()->getId();
$infos['oui']['userNom'] = $daoObjets_perdus->bean->getLeUtilisateur()->getNom();
$infos['oui']['userPrenom'] = $daoObjets_perdus->bean->getLeUtilisateur()->getPrenom();
$infos['oui']['userImg'] = $daoObjets_perdus->bean->getLeUtilisateur()->getImage();


//var_dump($param) or die();
require_once('../../dao/DaoUtilisateur.php');
require_once('../../dao/DaoEvenements.php');
$daoU = new DaoUtilisateur();

$liste2 = $daoU->getNonApprouve();

$users = count($liste2);

$daoE = new DaoEvenements();

$liste3 = $daoE->listeAprob();

$events = count($liste3);

$notifs['number'] = array();
$notifs['number']['oui'] = $events + $users;
$param = array(
    "liste" => $infos,
    "notifs" => $notifs,
    "sess" => $_SESSION);

echo json_encode($param);




?>