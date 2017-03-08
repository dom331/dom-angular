<?php

class Evenements {

    public $id=0;
    public $titre=null;
    public $contenu=null;
    public $image="default.png";
    public $date=null;
    public $prix=0;
    public $a_prevoir=null;
    public $approuve=null;

    public $leAuteur = null;
    public $lesImages = array();

    public function Evenements($id=0, $titre=null, $contenu=null, $image="default.png", $date=null,  $prix=0, $a_prevoir=null, $approuve=null) {
        $this->id=$id;
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->date=date("Y-m-d");
        $this->image=$image;
        $this->prix=$prix;
        $this->a_prevoir=$a_prevoir;
        $this->approuve=$approuve;
    }

    public function getId() {return $this->id; }
    public function getTitre() {return $this->titre; }
    public function getContenu() {return $this->contenu; }
    public function getImage() {return $this->image;}
    public function getDate() {return $this->date;}
    public function getPrix() {return $this->prix;}
    public function getA_prevoir() {return $this->a_prevoir;}
    public function getApprouve() {return $this->approuve;}

    public function getLeAuteur() {return $this->leAuteur;}
    public function getLesImages() {return $this->lesImages;}

    public function setId($id) {$this->id = $id;}
    public function setTitre($titre) {$this->titre = $titre;}
    public function setContenu($contenu) {$this->contenu = $contenu;}
    public function setImage($image) {$this->image = $image;}
    public function setDate($date) {$this->date =$date;}
    public function setPrix($prix) {$this->prix=$prix;}
    public function setA_prevoir($a_prevoir) {$this->a_prevoir=$a_prevoir;}
    public function setApprouve($approuve) {$this->approuve=$approuve;}

    public function setLeAuteur($leAuteur) {$this->leAuteur=$leAuteur;}
    public function setLesImages($lesImages) {$this->lesImages=$lesImages;}

}
?>