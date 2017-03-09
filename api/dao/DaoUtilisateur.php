<?php

require_once '../../classes/class.Utilisateur.php';
require_once '../../classes/class.Actualite.php';
require_once '../../classes/class.Evenements.php';
require_once 'Dao.php';

class DaoUtilisateur extends Dao
{

    public function DaoUtilisateur()
    {
        parent::__construct();
        $this->bean = new Utilisateur();
    }

    public function find($id)
    {
        $donnees = $this->findById("utilisateur", "ID_UTILISATEUR", $id);
        $this->bean->setId($donnees['ID_UTILISATEUR']);
        $this->bean->setNom($donnees['NOM_UTILISATEUR']);
        $this->bean->setPrenom($donnees['PRENOM_UTILISATEUR']);
        $this->bean->setIdentifiant($donnees['IDENTIFIANT_UTILISATEUR']);
        $this->bean->setPsw($donnees['PSW_UTILISATEUR']);
        $this->bean->setEmail($donnees['EMAIL_UTILISATEUR']);
        $this->bean->setDescription($donnees['DESCRIPTION_UTILISATEUR']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setConvoque($donnees['CONVOQUE']);
        $this->bean->setDate_inscription($donnees['DATE_INSCRIPTION']);
        $this->bean->setAdmin($donnees['ADMIN']);
        $this->bean->setPedagogie($donnees['PEDAGOGIE']);
        $this->bean->setEx_mmi($donnees['EX_MMI']);
        $this->bean->setApprouve($donnees['UTILISATEUR_APPROUVE']);
        $this->bean->setDate_naiss($donnees['DATE_NAISS']);

    }

    public function create()
    {
        $sql = "INSERT INTO utilisateur(NOM_UTILISATEUR, PRENOM_UTILISATEUR, IDENTIFIANT_UTILISATEUR,
                            PSW_UTILISATEUR, EMAIL_UTILISATEUR, DESCRIPTION_UTILISATEUR, IMAGE, DATE_INSCRIPTION,
                            ADMIN, PEDAGOGIE, EX_MMI, UTILISATEUR_APPROUVE, DATE_NAISS) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getNom());
        $requete->bindValue(2, $this->bean->getPrenom());
        $requete->bindValue(3, $this->bean->getIdentifiant());
        $requete->bindValue(4, $this->bean->getPsw());
        $requete->bindValue(5, $this->bean->getEmail());
        $requete->bindValue(6, $this->bean->getDescription());
        $requete->bindValue(7, $this->bean->getImage());
        $requete->bindValue(8, $this->bean->getDate_inscription());
        $requete->bindValue(9, $this->bean->getAdmin());
        $requete->bindValue(10, $this->bean->getPedagogie());
        $requete->bindValue(11, $this->bean->getEx_mmi());
        $requete->bindValue(12, $this->bean->getApprouve());
        $requete->bindValue(13, $this->bean->getDate_naiss());
        

        $requete->execute();
    }

    public function updateImage()
    {
        $sql ="UPDATE utilisateur
               SET IMAGE = ?
               WHERE ID_UTILISATEUR = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getImage());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateDescription()
    {
        $sql ="UPDATE utilisateur
               SET DESCRIPTION_UTILISATEUR = ?
               WHERE ID_UTILISATEUR = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getDescription());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateDate_Naiss()
    {
        $sql ="UPDATE utilisateur
               SET DATE_NAISS = ?
               WHERE ID_UTILISATEUR = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getDate_naiss());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function updateConvoque()
    {
        $sql ="UPDATE utilisateur
               SET CONVOQUE = ?
               WHERE ID_UTILISATEUR = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getConvoque());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }



    public function updateEmail()
    {
        $sql ="UPDATE utilisateur
               SET EMAIL_UTILISATEUR = ?
               WHERE ID_UTILISATEUR = ?";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(1, $this->bean->getEmail());
        $requete->bindValue(2, $this->bean->getId());
        $requete->execute();
    }

    public function delete()
    {
        $sql ="DELETE 
               FROM utilisateur
               WHERE utilisateur.ID_UTILISATEUR = ?";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getId());

        $requete->execute();
    }

    public function getListe()
    {
        $sql = "SELECT * 
                FROM utilisateur    
                ORDER BY NOM_UTILISATEUR";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $utilisateur = new Utilisateur(
                    $donnees['ID_UTILISATEUR'],
                    $donnees['NOM_UTILISATEUR'],
                    $donnees['PRENOM_UTILISATEUR'],
                    $donnees['IDENTIFIANT_UTILISATEUR'],
                    $donnees['PSW_UTILISATEUR'],
                    $donnees['EMAIL_UTILISATEUR'],
                    $donnees['DESCRIPTION_UTILISATEUR'],
                    $donnees['IMAGE'],
                    $donnees['CONVOQUE'],
                    $donnees['DATE_INSCRIPTION'],
                    $donnees['ADMIN'],
                    $donnees['PEDAGOGIE'],
                    $donnees['EX_MMI'],
                    $donnees['UTILISATEUR_APPROUVE'],
                    $donnees['DATE_NAISS']
                );
                $liste[] = $utilisateur;
            }
        }
        return $liste;
    }

    public function setLesActualites()
    {

    }

    public function setLesEvenements()
    {

    }
    

    public function setLesSites()
    {

    }
    

    public function cnx($identifiant, $psw)
    {
        $sql = "SELECT * 
                FROM utilisateur
                WHERE
                utilisateur.IDENTIFIANT_UTILISATEUR = '" . $identifiant . "' 
                AND utilisateur.PSW_UTILISATEUR = '" . $psw . "'";
        $requete = $this->pdo->prepare($sql);
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $this->bean->setId($donnees['ID_UTILISATEUR']);
                $this->bean->setNom($donnees['NOM_UTILISATEUR']);
                $this->bean->setPrenom($donnees['PRENOM_UTILISATEUR']);
                $this->bean->setIdentifiant($donnees['IDENTIFIANT_UTILISATEUR']);
                $this->bean->setPsw($donnees['PSW_UTILISATEUR']);
                $this->bean->setEmail($donnees['EMAIL_UTILISATEUR']);
                $this->bean->setDescription($donnees['DESCRIPTION_UTILISATEUR']);
                $this->bean->setImage($donnees['IMAGE']);
                $this->bean->setConvoque($donnees['CONVOQUE']);
                $this->bean->setDate_inscription($donnees['DATE_INSCRIPTION']);
                $this->bean->setAdmin($donnees['ADMIN']);
                $this->bean->setPedagogie($donnees['PEDAGOGIE']);
                $this->bean->setEx_mmi($donnees['EX_MMI']);
                $this->bean->setApprouve($donnees['UTILISATEUR_APPROUVE']);
                $this->bean->setDate_naiss($donnees['DATE_NAISS']);

            }
        }
    }

    public function getNonApprouve()
    {
        $sql = "SELECT * 
                FROM utilisateur
                WHERE UTILISATEUR_APPROUVE = 0
                ORDER BY NOM_UTILISATEUR";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $utilisateur = new Utilisateur(
                    $donnees['ID_UTILISATEUR'],
                    $donnees['NOM_UTILISATEUR'],
                    $donnees['PRENOM_UTILISATEUR'],
                    $donnees['IDENTIFIANT_UTILISATEUR'],
                    $donnees['PSW_UTILISATEUR'],
                    $donnees['EMAIL_UTILISATEUR'],
                    $donnees['DESCRIPTION_UTILISATEUR'],
                    $donnees['IMAGE'],
                    $donnees['CONVOQUE'],
                    $donnees['DATE_INSCRIPTION'],
                    $donnees['ADMIN'],
                    $donnees['PEDAGOGIE'],
                    $donnees['EX_MMI'],
                    $donnees['UTILISATEUR_APPROUVE'],
                    $donnees['DATE_NAISS']
                );
                $liste[] = $utilisateur;
            }
        }
        return $liste;
    }

    public function updateApprouve(){
        {
            $sql ="UPDATE utilisateur
               SET UTILISATEUR_APPROUVE = ?
               WHERE ID_UTILISATEUR = ?";
            $requete = $this->pdo->prepare($sql);
            $requete->bindValue(1, $this->bean->getApprouve());
            $requete->bindValue(2, $this->bean->getId());
            $requete->execute();
        }
    }

//    public function countNonApprouv() {
//        $sql = "SELECT COUNT(*) FROM utilisateur WHERE UTILISATEUR_APPROUVE = 0";
//        $requete = $this->pdo->prepare($sql);
//        $requete->execute();
//        return $requete;
//    }
}