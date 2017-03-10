<?php

class Evenements {

    public $id=0;
    public $titre=null;
    public $contenu=null;
    public $image="default.png";
    public $date_debut=null;
    public $date_fin=null;
    public $archive=0;
    public $prix=0;
    public $a_prevoir=null;
    public $approuve=0;

    public $leUtilisateur = array();
    

    public function Evenements($id=0, $titre=null, $contenu=null, $image="default.png", $date_debut=null, $date_fin=null, $archive=0,  $prix=0, $a_prevoir=null, $approuve=0) {
        $this->id=$id;
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->image=$image;
        $this->date_debut=date("Y-m-d");
        $this->date_fin=$date_fin;
        $this->archive = $archive;
        $this->prix=$prix;
        $this->a_prevoir=$a_prevoir;
        $this->approuve=$approuve;
    }

    public function getId() {return $this->id; }
    public function getTitre() {return $this->titre; }
    public function getContenu() {return $this->contenu; }
    public function getImage() {return $this->image;}
    public function getDate_debut() {return $this->date_debut;}
    public function getDate_fin() {return $this->date_fin;}
    public function getArchive() {return $this->archive;}
    public function getPrix() {return $this->prix;}
    public function getA_prevoir() {return $this->a_prevoir;}
    public function getApprouve() {return $this->approuve;}

    public function getLeUtilisateur() {return $this->leUtilisateur;}

    public function setId($id) {$this->id = $id;}
    public function setTitre($titre) {$this->titre = $titre;}
    public function setContenu($contenu) {$this->contenu = $contenu;}
    public function setImage($image) {$this->image = $image;}
    public function setDate_debut($date_debut) {$this->date_debut =$date_debut;}
    public function setDate_fin($date_fin) {$this->date_fin =$date_fin;}
    public function setArchive($archive) {$this->archive =$archive;}
    public function setPrix($prix) {$this->prix=$prix;}
    public function setA_prevoir($a_prevoir) {$this->a_prevoir=$a_prevoir;}
    public function setApprouve($approuve) {$this->approuve=$approuve;}

    public function setLeUtilisateur($leUtilisateur) {$this->leUtilisateur=$leUtilisateur;}

}
?>