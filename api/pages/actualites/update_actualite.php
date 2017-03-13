<?php

require_once("../../dao/DaoActualite.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

$data = json_decode(file_get_contents("php://input"));

$id = $_POST['id'];


$daoActualite = new DaoActualite();

$daoActualite->find($id);

    if (!empty($_POST['titre'])){
        $daoActualite->bean->setTitre($_POST['titre']);
        $daoActualite->updateTitre();
    }
    
    if (!empty($_FILES['file'])) {

        $image = $_FILES['file']['name'];

        if (move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/actualites/" . $image)) {
            $daoActualite->bean->setImage($image);
            $daoActualite->updateImage();
        }
    }

    if (!empty($_POST['desc'])){
        $daoActualite->bean->setContenu($_POST['desc']);
        $daoActualite->updateContenu();
    }


    if (!empty($_POST['responsables'])){
        $daoActualite->bean->setResponsables($_POST['responsables']);
        $daoActualite->updateResponsables();
    }





?>