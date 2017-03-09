<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
require_once("../../dao/DaoActualite.php");


$daoActualite = new DaoActualite();

        $daoActualite->find($id);

            $infos['oui'] = array();

            $infos['oui']['id']=$daoActualite->bean->getId();
            $infos['oui']['titre']=$daoActualite->bean->getTitre();
            $infos['oui']['contenu']=$daoActualite->bean->getContenu();
            $infos['oui']['image']=$daoActualite->bean->getImage();
            $infos['oui']['date']=$daoActualite->bean->getDate_debut();
            $infos['oui']['responsables']=$daoActualite->bean->getResponsables();
            $daoActualite->setLeUtilisateur();
            $infos['oui']['userNom'] = $daoActualite->bean->getLeUtilisateur()->getNom();
            $infos['oui']['userPrenom'] = $daoActualite->bean->getLeUtilisateur()->getPrenom();
            $infos['oui']['userImg'] = $daoActualite->bean->getLeUtilisateur()->getImage();


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