<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
$id = $data->id;
$convoque = $data->convoque;
require_once("../../dao/DaoUtilisateur.php");


        $daoUtilisateur = new DaoUtilisateur();

        $daoUtilisateur->find($id);

        $infos['oui'] = array();

        $infos['oui']['id']=$daoUtilisateur->bean->getId();
        $infos['oui']['nom']=$daoUtilisateur->bean->getNom();
        $infos['oui']['prenom']=$daoUtilisateur->bean->getPrenom();
        $infos['oui']['email']=$daoUtilisateur->bean->getEmail();
        $infos['oui']['description']=$daoUtilisateur->bean->getDescription();
        $infos['oui']['date_inscription']=$daoUtilisateur->bean->getDate_inscription();
        $infos['oui']['avatar']=$daoUtilisateur->bean->getImage();
        $infos['oui']['convoque']=$daoUtilisateur->bean->getConvoque();
        $infos['oui']['naiss']=$daoUtilisateur->bean->getDate_naiss();
//        $daoUtilisateur->setLeAvatar();
//        $infos['oui']['avatar']=$daoUtilisateur->bean->getLeAvatar()->getNom();


$param = array(
    "liste" => $infos);



//var_dump($param) or die();

if ($convoque == "convoque"){
        $daoUtilisateur->bean->setConvoque(1);
        $daoUtilisateur->updateConvoque();
}

if ($convoque == "annule"){
        $daoUtilisateur->bean->setConvoque(0);
        $daoUtilisateur->updateConvoque();
}

echo json_encode($param);


?>