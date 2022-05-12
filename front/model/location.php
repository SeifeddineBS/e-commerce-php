<?php
    class Location{
        
    private ?int $id = null;
    private ?string $date_debut = null;
    private ?string $date_fin = null;
    private ?int $numero = null;
    private ?string $adresse = null;
    private ?int $iduser = null;

        public function __construct(?string $date_debut, ?string $date_fin, ?int $numero, ?string $adresse, ?int $iduser)
        {
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->numero = $numero;
            $this->adresse = $adresse;
            $this->iduser = $iduser;
        }

        public function setId(?int $id): void
        {
            $this->id = $id;
        }

        public function setDateDebut(?string $date_debut): void
        {
            $this->date_debut = $date_debut;
        }

        public function setDateFin(?string $date_fin): void
        {
            $this->date_fin = $date_fin;
        }

        public function setNumero(?int $numero): void
        {
            $this->numero = $numero;
        }

        public function setAdresse(?string $adresse): void
        {
            $this->adresse = $adresse;
        }

        public function setIduser(?int $iduser): void
        {
            $this->iduser = $iduser;
        }

        public function getId(): ?int
        {
            return $this->id;
        }

        public function getDateDebut(): ?string
        {
            return $this->date_debut;
        }

        public function getDateFin(): ?string
        {
            return $this->date_fin;
        }

        public function getNumero(): ?int
        {
            return $this->numero;
        }

        public function getAdresse(): ?string
        {
            return $this->adresse;
        }

        public function getIduser(): ?int
        {
            return $this->iduser;
        }


    }
?>