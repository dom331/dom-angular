<?php

require_once '../../dao/DaoEvenements.php';

        $dao = new DaoEvenements();

        $dao->bean->setTitre($_POST["titre"]);
        $dao->bean->setContenu($_POST["desc"]);

        $date = explode("/", $_POST["date"]); //Explode les / afin de mettre format y-m-j
        $dao->bean->setDate_debut($date[2]."-".$date[1]."-".$date[0]);

        $dao->bean->setPrix($_POST["prix"]);
        $dao->bean->setA_prevoir($_POST['a_prevoir']);
        $dao->bean->setLeUtilisateur((int)$_SESSION['toto']['id']);

        $image = $_FILES['file']['name'];

        if(move_uploaded_file($_FILES['file']['tmp_name'], "../../../medias/uploads/evenements/".$image)){
            $dao->bean->setImage($image);
        }
//        var_dump($dao) or die();
        $dao->create();
