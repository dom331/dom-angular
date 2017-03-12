<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
require_once("../../dao/DaoEvenements.php");


$daoEvenement = new DaoEvenements();

        $daoEvenement->find($id);
        
        $infos['oui'] = array();
        
        $infos['oui']['id']=$daoEvenement->bean->getId();
        $infos['oui']['titre']=$daoEvenement->bean->getTitre();
        $infos['oui']['contenu']=$daoEvenement->bean->getContenu();
        $infos['oui']['image']=$daoEvenement->bean->getImage();
        $infos['oui']['date_debut']=$daoEvenement->bean->getDate_debut();
        $infos['oui']['prix']=$daoEvenement->bean->getPrix();
        $infos['oui']['a_prevoir']=$daoEvenement->bean->getA_prevoir();
        $daoEvenement->setLeUtilisateur();
        $infos['oui']['userId'] = $daoEvenement->bean->getLeUtilisateur()->getId();
        $infos['oui']['userNom'] = $daoEvenement->bean->getLeUtilisateur()->getNom();
        $infos['oui']['userPrenom'] = $daoEvenement->bean->getLeUtilisateur()->getPrenom();
        $infos['oui']['userImg'] = $daoEvenement->bean->getLeUtilisateur()->getImage();


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
    "notifs" => $notifs);

echo json_encode($param);

//var_dump($param) or die();

?>