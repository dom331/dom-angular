<?php

require_once '../../classes/class.Utilisateur.php';
require_once '../../classes/class.Evenements.php';
require_once 'Dao.php';

class DaoEvenements extends Dao{

    public function DaoEvenements(){
        parent::__construct();
        $this->bean = new Evenements();
    }

    public function find($id){
        $donnees = $this->findById("evenements", "ID_EVENEMENT", $id);
        $this->bean->setId($donnees['ID_EVENEMENT']);
        $this->bean->setTitre($donnees['TITRE_EVENEMENT']);
        $this->bean->setContenu($donnees['CONTENU_EVENEMENT']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setDate_debut($donnees['DATE_DEBUT_EVENEMENT']);
        $this->bean->setDate_fin($donnees['DATE_FIN_EVENEMENT']);
        $this->bean->setArchive($donnees['ARCHIVE']);
        $this->bean->setPrix($donnees['PRIX_EVENEMENT']);
        $this->bean->setA_prevoir($donnees['A_PREVOIR_EVENEMENT']);
        $this->bean->setApprouve($donnees['EVENEMENT_APPROUVE']);

    }

    public function create(){
        $sql = "INSERT INTO evenements(TITRE_EVENEMENT, CONTENU_EVENEMENT, IMAGE, DATE_DEBUT_EVENEMENT, DATE_FIN_EVENEMENT, ARCHIVE, PRIX_EVENEMENT, A_PREVOIR_EVENEMENT, EVENEMENT_APPROUVE, ID_UTILISATEUR) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getTitre());
        $requete->bindValue(2, $this->bean->getContenu());
        $requete->bindValue(3, $this->bean->getImage());
        $requete->bindValue(4, $this->bean->getDate_debut());
        $requete->bindValue(5, $this->bean->getDate_fin());
        $requete->bindValue(6, $this->bean->getArchive());
        $requete->bindValue(7, $this->bean->getPrix());
        $requete->bindValue(8, $this->bean->getA_prevoir());
        $requete->bindValue(9, $this->bean->getApprouve());
        $requete->bindValue(10, $this->bean->getLeUtilisateur());

        $requete->execute();
    }

    public function update(){
        $sql ="UPDATE evenements
               SET EVENEMENT_APPROUVE = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getApprouve());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateTitre(){
        $sql ="UPDATE evenements
               SET TITRE_EVENEMENT = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getTitre());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateImage(){
        $sql ="UPDATE evenements
               SET IMAGE = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getImage());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updatePrix(){
        $sql ="UPDATE evenements
               SET PRIX_EVENEMENT = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getPrix());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateContenu(){
        $sql ="UPDATE evenements
               SET CONTENU_EVENEMENT = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getContenu());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateA_prevoir(){
        $sql ="UPDATE evenements
               SET A_PREVOIR_EVENEMENT = ?
               WHERE ID_EVENEMENT = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getA_prevoir());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function delete(){
        $sql ="DELETE 
               FROM evenements
               WHERE evenements.ID_EVENEMENT = ?";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getId());

        $requete->execute();
    }

    public function getListe(){
        $sql = "SELECT * 
                FROM evenements    
                ORDER BY DATE_DEBUT_EVENEMENT DESC";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if($requete->execute()){
            while($donnees = $requete->fetch()){
                $evenements = new Evenements(
                    $donnees['ID_EVENEMENT'],
                    $donnees['TITRE_EVENEMENT'],
                    $donnees['CONTENU_EVENEMENT'],
                    $donnees['IMAGE'],
                    $donnees['DATE_DEBUT_EVENEMENT'],
                    $donnees['DATE_FIN_EVENEMENT'],
                    $donnees['ARCHIVE'],
                    $donnees['PRIX_EVENEMENT'],
                    $donnees['A_PREVOIR_EVENEMENT'],
                    $donnees['EVENEMENT_APPROUVE']
                );
                $liste[] = $evenements;
            }
        }
        return $liste;
    }

    public function setLeUtilisateur(){
        $sql = "SELECT * FROM evenements, utilisateur
        WHERE evenements.ID_UTILISATEUR = utilisateur.ID_UTILISATEUR 
        AND evenements.ID_EVENEMENT = ".$this->bean->getId();
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
    

    public function listeAprob(){
        $sql = "SELECT *
                FROM evenements
                WHERE evenements.EVENEMENT_APPROUVE = 0
                ORDER BY DATE_DEBUT_EVENEMENT DESC";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if($requete->execute()){
            while($donnees = $requete->fetch()){
                $evenements = new Evenements(
                    $donnees['ID_EVENEMENT'],
                    $donnees['TITRE_EVENEMENT'],
                    $donnees['CONTENU_EVENEMENT'],
                    $donnees['IMAGE'],
                    $donnees['DATE_DEBUT_EVENEMENT'],
                    $donnees['DATE_FIN_EVENEMENT'],
                    $donnees['ARCHIVE'],
                    $donnees['PRIX_EVENEMENT'],
                    $donnees['A_PREVOIR_EVENEMENT'],
                    $donnees['EVENEMENT_APPROUVE']
                );
                $liste[] = $evenements;
            }
        }
        return $liste;
    }

    

}