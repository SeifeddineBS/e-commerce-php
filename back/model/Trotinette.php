<?php
class trotinette{
    private ?int $id = null;
    private ?string $label = null;
    private ?int $prix = null;
    private ?int $id_categorie = null;
    private ?string $image = null;

    public function __construct(string $label, int $prix, int $id_categorie, string $image)
    {
        $this->label = $label;
        $this->prix = $prix;
        $this->id_categorie = $id_categorie;
        $this->image = $image;
    }

    public function getIdtrotinette(): int
    {
        return $this->id;
    }

    public function setIdTrotinette(int $id): void
    {
        $this->id = $id;
    }


    public function getlabel(): string
    {
        return $this->label;
    }


    public function setlabel(string $label): void
    {
        $this->label = $label;
    }


    public function getid_categorie(): int
    {
        return $this->id_categorie;
    }


    public function setid_categorie(int $prix): void
    {
        $this->prix = $id_categorie;
    }


    public function getprix(): int
    {
        return $this->prix;
    }


    public function setprix(int $prix): void
    {
        $this->prix = $prix;
    }

    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }



}
?>