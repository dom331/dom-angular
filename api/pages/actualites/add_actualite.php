<?php

require_once '../../dao/DaoActualite.php';

$dao = new DaoActualite();

if(!empty($_FILES))
{
        $path = 'http://localhost/dom-angular/media/uploads/actualites/' . $_FILES['file']['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
        {
                $dao->bean->setImage($_FILES['file']['name']);
                echo "okkkkkkkkk";
                $dao->create();
        }
}
else
{
        $dao->bean->setImage("default.png");
        $dao->create();
        echo 'Some Error';
}


//header('Access-Control-Allow-Origin:*');
//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
//header('Access-Control-Allow-Methods: GET, POST, PUT');
//
//$data = json_decode(file_get_contents("php://input"));
//$titre = $data->titre;
//$desc = $data->desc;
//$responsables = $data->responsables;
////$image = $data->image;
//$urgent = $data->urgent;
//var_dump($data);
//
//require_once '../../dao/DaoActualite.php';
//
//        $dao = new DaoActualite();
//
//        $dao->bean->setTitre($titre);
//        $dao->bean->setContenu($desc);
//        $dao->bean->setDate_debut(date("Y-m-d"));
//        $dao->bean->setResponsables($responsables);
//        $dao->bean->setLeUtilisateur((int)$_SESSION['toto']['id']);
//        $dao->bean->setUrgent($urgent);
//if (!empty($_FILES)) {
//        $path = "media/uploads/actualites/".$_FILES['file']['name'];
////var_dump($image) or die();
//
//        if (move_uploaded_file($_FILES['file']['tpm_name'], $path)) {
//            $dao->bean->setImage($_FILES['file']['name']);
//        }
//
//        else {
//            $dao->bean->setImage("default.png");
//        }}
//
////        var_dump($dao) or die();
//echo json_encode($dao);
//        $dao->create();
//
//require_once('../../dao/DaoUtilisateur.php');
//require_once('../../dao/DaoEvenements.php');
//$daoU = new DaoUtilisateur();
//
//$liste2 = $daoU->getNonApprouve();
//
//$users = count($liste2);
//
//$daoE = new DaoEvenements();
//
//$liste3 = $daoE->listeAprob();
//
//$events = count($liste3);
//
//$notifs['number'] = array();
//$notifs['number']['oui'] = $events + $users;
//
//$param = array(
//    "notifs" => $notifs);
//
