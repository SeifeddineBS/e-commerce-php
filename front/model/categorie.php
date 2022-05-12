<?php
class Categorie{
    private ?int $id_categorie= null;
    private ?string $label_categorie = null;


    public function __construct(int $id_categorie, string $label_categorie)
    {
        $this->id_categorie = $id_categorie;
        $this->label_categorie = $label_categorie; 
    }

    public function getIdcategorie(): int
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(int $idcategorie): void
    {
        $this->idcategorie = $idcategorie;
    }

    public function getlabel_categorie(): string
    {
        return $this->label_categorie;
    }


    public function setlabel_categorie(string $label_categorie): void
    {
        $this->label_categorie = $label_categorie; 
    }

?>