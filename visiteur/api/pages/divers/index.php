<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
$log = $data->user;
$psw = $data->psw; //AJOUTER SHA1() ICI

if(isset($_SESSION)) {
    header('Location: index.php?page=actualites');
}

require_once("../../dao/DaoUtilisateur.php");

$daoUtilisateur = new DaoUtilisateur();


    $daoUtilisateur->cnx($log, $psw);
    $approuve = (int)$daoUtilisateur->bean->getApprouve();

    if ($approuve == 0) {
        session_destroy();
        echo "<h1 class='name'> Votre compte n'a pas encore été approuvé </h1>";
        header('Location: index.php');
    } else {


        if ($daoUtilisateur->bean->getIdentifiant() != null) {


            $_SESSION = array();

            $_SESSION['id'] = $daoUtilisateur->bean->getId();
            $_SESSION['nom'] = $daoUtilisateur->bean->getNom();
            $_SESSION['prenom'] = $daoUtilisateur->bean->getPrenom();
            $_SESSION['mail'] = $daoUtilisateur->bean->getEmail();
            $_SESSION['admin'] = $daoUtilisateur->bean->getAdmin();
            $_SESSION['avatar'] = $daoUtilisateur->bean->getImage();
            $_SESSION['convoque'] = $daoUtilisateur->bean->getConvoque();
            $_SESSION['description'] = $daoUtilisateur->bean->getDescription();

            $informations = json_encode($_SESSION);
            echo $informations;
        }
    

}

//var_dump($notifs) or die();




?>