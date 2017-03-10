<?php

require_once '../../dao/DaoObjets_perdus.php';
//var_dump($_SESSION) or die();
$dao = new DaoObjets_perdus();

$liste = $dao->getListe();

for($i=0;$i<count($liste); $i++){

    $dao = new DaoObjets_perdus();

    $dao->find($liste[$i]->getId());


    $liste[$i] = $dao->bean;

}

$param = array(
    "objets" => $liste);

echo json_encode($param);
//var_dump($param) or die();

?>