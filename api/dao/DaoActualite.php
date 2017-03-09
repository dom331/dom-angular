<?php

require_once '../../classes/class.Utilisateur.php';
require_once '../../classes/class.Actualite.php';
require_once 'Dao.php';

class DaoActualite extends Dao{

    public function DaoActualite(){
        parent::__construct();
        $this->bean = new Actualite();
    }

    public function find($id){
        $donnees = $this->findById("actualite", "ID_ACTUALITE", $id);
        $this->bean->setId($donnees['ID_ACTUALITE']);
        $this->bean->setTitre($donnees['TITRE_ACTUALITE']);
        $this->bean->setContenu($donnees['CONTENU_ACTUALITE']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setUrgent($donnees['URGENT']);
        $this->bean->setDate_debut($donnees['DATE_DEBUT_ACTUALITE']);
        $this->bean->setDate_fin($donnees['DATE_FIN_ACTUALITE']);
        $this->bean->setArchive($donnees['ARCHIVE']);
        $this->bean->setResponsables($donnees['RESPONSABLES_ACTUALITE']);

    }

    public function create(){
        $sql = "INSERT INTO actualite(TITRE_ACTUALITE, CONTENU_ACTUALITE, IMAGE, URGENT, DATE_DEBUT_ACTUALITE, DATE_FIN_ACTUALITE, ARCHIVE, RESPONSABLES_ACTUALITE, ID_UTILISATEUR) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getTitre());
        $requete->bindValue(2, $this->bean->getContenu());
        $requete->bindValue(3, $this->bean->getImage());
        $requete->bindValue(4, $this->bean->getUrgent());
        $requete->bindValue(5, $this->bean->getDate_debut());
        $requete->bindValue(6, $this->bean->getDate_fin());
        $requete->bindValue(7, $this->bean->getArchive());
        $requete->bindValue(8, $this->bean->getResponsables());
        $requete->bindValue(9, $this->bean->getLeUtilisateur());

        $requete->execute();
    }

    public function updateTitre(){
        {
            $sql ="UPDATE actualite
               SET TITRE_ACTUALITE = ?
               WHERE ID_ACTUALITE = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getTitre());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateContenu(){
        {
            $sql ="UPDATE actualite
               SET CONTENU_ACTUALITE = ?
               WHERE ID_ACTUALITE = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getContenu());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateImage(){
        {
            $sql ="UPDATE actualite
               SET IMAGE = ?
               WHERE ID_ACTUALITE = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getImage());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function updateResponsables(){
        {
            $sql ="UPDATE actualite
               SET RESPONSABLES_ACTUALITE = ?
               WHERE ID_ACTUALITE = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getResponsables());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

    public function delete(){

        $sql ="DELETE 
               FROM actualite
               WHERE actualite.ID_ACTUALITE = ?";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getId());

        $requete->execute();

    }

    public function getListe(){
        $sql = "SELECT * 
                FROM actualite    
                ORDER BY DATE_DEBUT_ACTUALITE DESC";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if($requete->execute()){
            while($donnees = $requete->fetch()){


                $actualite = new Actualite(
                    $donnees['ID_ACTUALITE'],
                    $donnees['TITRE_ACTUALITE'],
                    $donnees['CONTENU_ACTUALITE'],
                    $donnees['IMAGE'],
                    $donnees['URGENT'],
                    $donnees['DATE_DEBUT_ACTUALITE'],
                    $donnees['DATE_FIN_ACTUALITE'],
                    $donnees['ARCHIVE'],
                    $donnees['RESPONSABLES_ACTUALITE']
                
                );
                $liste[] = $actualite;
            }
        }
        return $liste;
    }



    public function setLeUtilisateur(){
        $sql = "SELECT * FROM actualite, utilisateur
        WHERE actualite.ID_UTILISATEUR = utilisateur.ID_UTILISATEUR 
        AND actualite.ID_ACTUALITE = ".$this->bean->getId();
        $requete = $this->pdo->prepare($sql);
        if($requete->execute()){
            if($donnees = $requete->fetch()){
                $utilisateur = new Utilisateur($donnees['ID_UTILISATEUR'], $donnees['NOM_UTILISATEUR'], $donnees['PRENOM_UTILISATEUR'],
                    $donnees['IDENTIFIANT_UTILISATEUR'], $donnees['PSW_UTILISATEUR'], $donnees['EMAIL_UTILISATEUR'],
                    $donnees['DESCRIPTION_UTILISATEUR'], $donnees['IMAGE'], $donnees['CONVOQUE'], $donnees['DATE_INSCRIPTION'], $donnees['ADMIN'], $donnees['PEDAGOGIE'],
                    $donnees['EX_MMI'], $donnees['UTILISATEUR_APPROUVE'], $donnees['DATE_NAISS']);
                $this->bean->setLeUtilisateur($utilisateur);
            }
        }

    }
    
}