<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

//$test = explode("/", $image[0]);
var_dump($_FILES);

require_once '../../dao/DaoActualite.php';

        $dao = new DaoActualite();

        $dao->bean->setTitre($_POST['titre']);
        $dao->bean->setContenu($_POST['desc']);
        $dao->bean->setDate_debut(date("Y-m-d"));
        $dao->bean->setResponsables($_POST['responsables']);
        $dao->bean->setLeUtilisateur((int)$_SESSION['toto']['id']);
        $dao->bean->setUrgent($_POST['urgent']);
if (!empty($_FILES["file"])) {
        $image = $_FILES["file"]["name"];
//var_dump($image) or die();

        if (move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/actualites/".$image)) {
                $dao->bean->setImage($image);
        }
}

//        var_dump($dao) or die();
echo json_encode($dao);
        $dao->create();

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
    "notifs" => $notifs);

