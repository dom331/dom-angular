<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));
$nom = $data->nom;
$prenom = $data->prenom;
$identifiant = $data->identifiant;
$psw = $data->psw;  //AJOUTER SHA1() ICI
$email = $data->email;

//var_dump($nom, $prenom, $psw, $identifiant, $email);

if(isset($_SESSION["toto"])) {
    header('Location: index.php?page=actualites');
}
require_once '../../dao/DaoUtilisateur.php';

        $dao = new DaoUtilisateur();

            $dao->bean->setNom(ucwords($nom));
            $dao->bean->setPrenom(ucwords($prenom));
            $dao->bean->setIdentifiant($identifiant);
            $dao->bean->setPsw($psw);
            $dao->bean->setEmail($email);
            $dao->bean->setDate_inscription(date("Y-m-d"));
//        var_dump($dao) or die();
            $dao->create();

echo json_encode($dao);
        
        



   





?>