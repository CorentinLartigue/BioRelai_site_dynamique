<?php

class Commande{
    use Hydrate;
    private ?int $idCommande;
    private ?String $dateCommande;
    private ?String $statutCo;
    private ?int $idVente;
    private ?int $idAdherent;


    public function __construct(?int $idCommande, ?string $dateCommande, ?string $statutCo, ?int $idVente, ?int $idAdherent)
    {
        $this->idCommande = $idCommande;
        $this->dateCommande = $dateCommande;
        $this->statutCo = $statutCo;
        $this->idVente = $idVente;
        $this->idAdherent = $idAdherent;
    }

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function setIdCommande(?int $idCommande): void
    {
        $this->idCommande = $idCommande;
    }

    public function getDateCommande(): ?string
    {
        return $this->dateCommande;
    }

    public function setDateCommande(?string $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    public function getStatutCo(): ?string
    {
        return $this->statutCo;
    }

    public function setStatutCo(?string $statutCo): void
    {
        $this->statutCo = $statutCo;
    }

    public function getIdVente(): ?int
    {
        return $this->idVente;
    }

    public function setIdVente(?int $idVente): void
    {
        $this->idVente = $idVente;
    }

    public function getIdAdherent(): ?int
    {
        return $this->idAdherent;
    }

    public function setIdAdherent(?int $idAdherent): void
    {
        $this->idAdherent = $idAdherent;
    }


}