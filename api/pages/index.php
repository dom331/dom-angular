<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
$log = $data->user;
$psw = $data->psw;

if(isset($_SESSION["toto"])) {
    header('Location: index.php?page=actualites');
}

require_once ("../dao/DaoUtilisateur.php");

$daoUtilisateur = new DaoUtilisateur();


    $daoUtilisateur->cnx($log, $psw);
    $approuve = (int)$daoUtilisateur->bean->getApprouve();

    if ($approuve == 0) {
        session_destroy();
        echo "<h1 class='name'> Votre compte n'a pas encore été approuvé </h1>";
        header('Location: index.php');
    } else {


        if ($daoUtilisateur->bean->getIdentifiant() != null) {


            $_SESSION['toto'] = array();

            $_SESSION['toto']['id'] = $daoUtilisateur->bean->getId();
            $_SESSION['toto']['nom'] = $daoUtilisateur->bean->getNom();
            $_SESSION['toto']['prenom'] = $daoUtilisateur->bean->getPrenom();
            $_SESSION['toto']['mail'] = $daoUtilisateur->bean->getEmail();
            $_SESSION['toto']['admin'] = $daoUtilisateur->bean->getAdmin();
            $_SESSION['toto']['avatar'] = $daoUtilisateur->bean->getImage();
            $_SESSION['toto']['convoque'] = $daoUtilisateur->bean->getConvoque();
            $_SESSION['toto']['description'] = $daoUtilisateur->bean->getDescription();

            $informations = json_encode($_SESSION['toto']);
            echo $informations;
        }
    

}

//var_dump($notifs) or die();




?>