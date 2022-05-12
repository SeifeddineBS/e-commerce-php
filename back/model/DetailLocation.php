<?php
    class DetailLocation{

        private ?int $iddetaillocation = null;
        private ?int $idlocation = null;
        private ?int $idtrottinette = null;
        private ?int $qte = null;

        public function __construct(?int $idlocation, ?int $idtrottinette, ?int $qte)
        {
            $this->idlocation = $idlocation;
            $this->idtrottinette = $idtrottinette;
            $this->qte = $qte;
        }

        public function getIddetaillocation(): ?int
        {
            return $this->iddetaillocation;
        }

        public function setIddetaillocation(?int $iddetaillocation): void
        {
            $this->iddetaillocation = $iddetaillocation;
        }

        public function getIdlocation(): ?int
        {
            return $this->idlocation;
        }

        public function setIdlocation(?int $idlocation): void
        {
            $this->idlocation = $idlocation;
        }

        public function getIdtrottinette(): ?int
        {
            return $this->idtrottinette;
        }

        public function setIdtrottinette(?int $idtrottinette): void
        {
            $this->idtrottinette = $idtrottinette;
        }

        public function getQte(): ?int
        {
            return $this->qte;
        }

        public function setQte(?int $qte): void
        {
            $this->qte = $qte;
        }


    }
?>