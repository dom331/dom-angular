<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

//$test = explode("/", $image[0]);
var_dump($_FILES);

require_once '../../dao/DaoObjets_perdus.php';

$dao = new DaoObjets_perdus();

$dao->bean->setTitre($_POST['titre']);
$dao->bean->setContenu($_POST['desc']);
$dao->bean->setDate_debut(date("Y-m-d"));
$dao->bean->setResponsables($_POST['responsables']);
$dao->bean->setLeUtilisateur((int)$_SESSION['toto']['id']);
if (!empty($_FILES["file"])) {
    $image = $_FILES["file"]["name"];
//var_dump($image) or die();

    if (move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/objetsperdus/".$image)) {
        $dao->bean->setImage($image);
    }
}

//        var_dump($dao) or die();
echo json_encode($dao);
$dao->create();

