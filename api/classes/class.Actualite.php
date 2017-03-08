<?php

class Actualite{

    public $id = 0;
    public $titre = 0;
    public $contenu = 0;
    public $image = "default.png";
    public $perdu = 0;
    public $urgent = 0;
    public $date = 0;
    public $responsables = 0;

    public $leAuteur = 0;
    public $lesImages = array();

    public function Actualite($id=0, $titre=0,$contenu=0, $image="default.png", $perdu = 0, $urgent = 0, $date=0,$responsables=0){
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image;
        $this->perdu = $perdu;
        $this->urgent = $urgent;
        $this->date=date("Y-m-d");
        $this->responsables = $responsables;
    }

    public function getId() {return $this->id;}
    public function getTitre() {return $this->titre;}
    public function getContenu() {return $this->contenu;}
    public function getImage() {return $this->image;}
    public function getPerdu() {return $this->perdu;}
    public function getUrgent() {return $this->urgent;}
    public function getDate() {return $this->date;}
    public function getResponsables() {return $this->responsables;}

    public function getLeAuteur(){return $this->leAuteur;}
    public function getLesImages(){return $this->lesImages;}


    public function setId($id) {$this->id = $id;}
    public function setTitre($titre) {$this->titre = $titre;}
    public function setContenu($contenu) {$this->contenu = $contenu;}
    public function setImage($image) {$this->image = $image;}
    public function setPerdu($perdu) {$this->perdu = $perdu;}
    public function setUrgent($urgent){$this->urgent =$urgent;}
    public function setDate($date) {$this->date = $date;}
    public function setResponsables($responsables) {$this->responsables = $responsables;}

    public function setLeAuteur($leAuteur) {$this->leAuteur=$leAuteur;}
    public function setLesImages($lesImages) {$this->lesImages=$lesImages;}

}
?>
