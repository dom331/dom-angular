<?php

require_once '../../classes/class.Utilisateur.php';
require_once '../../classes/class.Objets_perdus.php';
require_once 'Dao.php';

class DaoObjets_perdus extends Dao{

    public function DaoObjets_perdus(){
        parent::__construct();
        $this->bean = new Objets_perdus();
    }

    public function find($id){
        $donnees = $this->findById("objet_perdus", "ID_OBJET", $id);
        $this->bean->setId($donnees['ID_OBJET']);
        $this->bean->setTitre($donnees['TITRE_OBJET']);
        $this->bean->setContenu($donnees['CONTENU_OBJET']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setDate_debut($donnees['DATE_DEBUT_OBJET']);
        $this->bean->setDate_fin($donnees['DATE_FIN_OBJET']);
        $this->bean->setArchive($donnees['ARCHIVE']);
        $this->bean->setResponsables($donnees['RESPONSABLES_OBJET']);

    }

    public function create(){
        $sql = "INSERT INTO objet_perdus(TITRE_ACTUALITE, CONTENU_ACTUALITE, IMAGE,  DATE_DEBUT_ACTUALITE, DATE_FIN_ACTUALITE, ARCHIVE, RESPONSABLES_ACTUALITE, ID_UTILISATEUR) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getTitre());
        $requete->bindValue(2, $this->bean->getContenu());
        $requete->bindValue(3, $this->bean->getImage());
        $requete->bindValue(5, $this->bean->getDate_debut());
        $requete->bindValue(6, $this->bean->getDate_fin());
        $requete->bindValue(7, $this->bean->getArchive());
        $requete->bindValue(8, $this->bean->getResponsables());
        $requete->bindValue(9, $this->bean->getLeUtilisateur());

        $requete->execute();
    }

    public function updateTitre(){
        {
            $sql ="UPDATE objet_perdus
               SET TITRE_OBJET = ?
               WHERE ID_OBJET = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getTitre());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateContenu(){
        {
            $sql ="UPDATE objet_perdus
               SET CONTENU_OBJET = ?
               WHERE ID_OBJET = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getContenu());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateImage(){
        {
            $sql ="UPDATE objet_perdus
               SET IMAGE = ?
               WHERE ID_OBJET = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getImage());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateResponsables(){
        {
            $sql ="UPDATE objet_perdus
               SET RESPONSABLES_OBJET = ?
               WHERE ID_OBJET = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getResponsables());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function delete(){

        $sql ="DELETE 
               FROM objet_perdus
               WHERE objet_perdus.ID_OBJET = ?";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getId());

        $requete->execute();

    }

    public function getListe(){
        $sql = "SELECT * 
                FROM objet_perdus   
                ORDER BY DATE_DEBUT_OBJET DESC";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if($requete->execute()){
            while($donnees = $requete->fetch()){


                $objet = new Objets_perdus(
                    $donnees['ID_OBJET'],
                    $donnees['TITRE_OBJET'],
                    $donnees['CONTENU_OBJET'],
                    $donnees['IMAGE'],
                    $donnees['DATE_DEBUT_OBJET'],
                    $donnees['DATE_FIN_OBJET'],
                    $donnees['ARCHIVE'],
                    $donnees['RESPONSABLES_OBJET']

                );
                $liste[] = $objet;
            }
        }
        return $liste;
    }



    public function setLeUtilisateur(){

    }

}