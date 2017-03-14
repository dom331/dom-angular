<?php

require_once("../../dao/DaoEvenements.php");


$daoEvenement = new DaoEvenements();

$id = $_POST['id'];
$daoEvenement->find($id);


    if (!empty($_POST['titre'])){
        $daoEvenement->bean->setTitre($_POST['titre']);
        $daoEvenement->updateTitre();
    }

    if (!empty($_FILES['file'])) {

        $image = $_FILES['file']['name'];

        if (move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/evenements/" . $image)) {
            $daoEvenement->bean->setImage($image);
            $daoEvenement->updateImage();
        }
    }

    if (!empty($_POST['desc'])){
        $daoEvenement->bean->setContenu($_POST['desc']);
        $daoEvenement->updateContenu();
    }
    
    if (!empty($_POST['prix'])){
        $daoEvenement->bean->setPrix($_POST['prix']);
        $daoEvenement->updatePrix();
    }

    if (!empty($_POST['a_prevoir'])){
        $daoEvenement->bean->setA_prevoir($_POST['a_prevoir']);
        $daoEvenement->updateA_prevoir();
    }





?>