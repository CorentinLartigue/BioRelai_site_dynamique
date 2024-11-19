<?php

class Producteur{
    use Hydrate;

    private ?int $idProducteur;
    private ?String $adresseProducteur;
    private ?String $communeProducteur;
    private ?string $codePostalProduit;
    private ?string $descriptifProducteur;
    private ?string $photoProducteur;


    public function __construct(?int $idProducteur, ?string $adresseProducteur, ?string $communeProducteur, ?string $codePostalProduit, ?string $descriptifProducteur, ?string $photoProducteur)
    {
        $this->idProducteur = $idProducteur;
        $this->adresseProducteur = $adresseProducteur;
        $this->communeProducteur = $communeProducteur;
        $this->codePostalProduit = $codePostalProduit;
        $this->descriptifProducteur = $descriptifProducteur;
        $this->photoProducteur = $photoProducteur;
    }

    public function getIdProducteur(): ?int
    {
        return $this->idProducteur;
    }

    public function setIdProducteur(?int $idProducteur): void
    {
        $this->idProducteur = $idProducteur;
    }

    public function getAdresseProducteur(): ?string
    {
        return $this->adresseProducteur;
    }

    public function setAdresseProducteur(?string $adresseProducteur): void
    {
        $this->adresseProducteur = $adresseProducteur;
    }

    public function getCommuneProducteur(): ?string
    {
        return $this->communeProducteur;
    }

    public function setCommuneProducteur(?string $communeProducteur): void
    {
        $this->communeProducteur = $communeProducteur;
    }

    public function getCodePostalProduit(): ?string
    {
        return $this->codePostalProduit;
    }

    public function setCodePostalProduit(?string $codePostalProduit): void
    {
        $this->codePostalProduit = $codePostalProduit;
    }

    public function getDescriptifProducteur(): ?string
    {
        return $this->descriptifProducteur;
    }

    public function setDescriptifProducteur(?string $descriptifProducteur): void
    {
        $this->descriptifProducteur = $descriptifProducteur;
    }

    public function getPhotoProducteur(): ?string
    {
        return $this->photoProducteur;
    }

    public function setPhotoProducteur(?string $photoProducteur): void
    {
        $this->photoProducteur = $photoProducteur;
    }




}
?>