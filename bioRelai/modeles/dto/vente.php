<?php

class Vente
{
    use Hydrate;

    private ?int $idVentes;
    private ?DateTime $dateVente;
    private ?DateTime $dateDebutProd;
    private ?DateTime $dateDebutFinProd;
    private ?DateTime $dateDebutCli;
    private ?DateTime $dateFinCli;


    public function __construct(?int $idVentes, ?DateTime $dateVente, ?DateTime $dateDebutProd, ?DateTime $dateDebutFinProd, ?DateTime $dateDebutCli, ?DateTime $dateFinCli)
    {
        $this->idVentes = $idVentes;
        $this->dateVente = $dateVente;
        $this->dateDebutProd = $dateDebutProd;
        $this->dateDebutFinProd = $dateDebutFinProd;
        $this->dateDebutCli = $dateDebutCli;
        $this->dateFinCli = $dateFinCli;
    }

    public function getIdVentes(): ?int
    {
        return $this->idVentes;
    }

    public function setIdVentes(?int $idVentes): void
    {
        $this->idVentes = $idVentes;
    }

    public function getDateVente(): ?DateTime
    {
        return $this->dateVente;
    }

    public function setDateVente(?DateTime $dateVente): void
    {
        $this->dateVente = $dateVente;
    }

    public function getDateDebutProd(): ?DateTime
    {
        return $this->dateDebutProd;
    }

    public function setDateDebutProd(?DateTime $dateDebutProd): void
    {
        $this->dateDebutProd = $dateDebutProd;
    }

    public function getDateDebutFinProd(): ?DateTime
    {
        return $this->dateDebutFinProd;
    }

    public function setDateDebutFinProd(?DateTime $dateDebutFinProd): void
    {
        $this->dateDebutFinProd = $dateDebutFinProd;
    }

    public function getDateDebutCli(): ?DateTime
    {
        return $this->dateDebutCli;
    }

    public function setDateDebutCli(?DateTime $dateDebutCli): void
    {
        $this->dateDebutCli = $dateDebutCli;
    }

    public function getDateFinCli(): ?DateTime
    {
        return $this->dateFinCli;
    }

    public function setDateFinCli(?DateTime $dateFinCli): void
    {
        $this->dateFinCli = $dateFinCli;
    }




}