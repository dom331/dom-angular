<?php

class Objets_perdus{

    public $id = 0;
    public $titre = null;
    public $contenu = null;
    public $image = "default.png";
    public $date_debut = null;
    public $date_fin = null;
    public $archive = 0;
    public $responsables = null;

    public $leUtilisateur = null;

    public function Objets_perdus($id=0, $titre=null,$contenu=null, $image="default.png", $date_debut = null, $date_fin = null, $archive = 0,$responsables=null){
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image;
        $this->date_debut =date("Y-m-d");
        $this->date_fin = $date_fin;
        $this->archive = $archive;
        $this->responsables = $responsables;
    }

    public function getId() {return $this->id;}
    public function getTitre() {return $this->titre;}
    public function getContenu() {return $this->contenu;}
    public function getImage() {return $this->image;}
    public function getDate_debut() {return $this->date_debut;}
    public function getDate_fin() {return $this->date_fin;}
    public function getArchive() {return $this->archive;}
    public function getResponsables() {return $this->responsables;}

    public function getLeUtilisateur(){return $this->leUtilisateur;}


    public function setId($id) {$this->id = $id;}
    public function setTitre($titre) {$this->titre = $titre;}
    public function setContenu($contenu) {$this->contenu = $contenu;}
    public function setImage($image) {$this->image = $image;}
    public function setDate_debut($date_debut) {$this->date_debut=$date_debut;}
    public function setDate_fin($date_fin) {$this->date_fin=$date_fin;}
    public function setArchive($archive) {$this->archive=$archive;}
    public function setResponsables($responsables) {$this->responsables = $responsables;}

    public function setLeUtilisateur($leUtilisateur) {$this->leUtilisateur=$leUtilisateur;}

}
?>
