<?php

require_once("../../dao/DaoUtilisateur.php");


$daoUtilisateur = new DaoUtilisateur();

$id = $_POST['id'];
$daoUtilisateur->find($id);


//var_dump($param) or die();

    if (!empty($_FILES['file'])) {

    $image = $_FILES['file']['name'];

    if (move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/avatars/" . $image)) {
        $daoUtilisateur->bean->setImage($image);
        $daoUtilisateur->updateImage();
    }
}

    if (!empty($_POST['desc'])){
        $daoUtilisateur->bean->setDescription($_POST['desc']);
        $daoUtilisateur->updateDescription();
    }


    if (!empty($_POST['email'])){
        $daoUtilisateur->bean->setEmail($_POST['email']);
        $daoUtilisateur->updateEmail();
    }

    if (!empty($_POST['date'])){
        $date = explode("/", $_POST["date"]);
        $daoUtilisateur->bean->setDate_naiss($date[2]."-".$date[1]."-".$date[0]);
        $daoUtilisateur->updateDate_Naiss();
    }







?>