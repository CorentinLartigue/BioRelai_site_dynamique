<?php

class Produit{
    use Hydrate;

    private ?int $idProduit;
    private ?String $nomProduit;
    private ?String $descriptifProduit;
    private ?string $photoProduit;
    private ?int $idProducteur;
    private ?int $idCategorie;


    public function __construct(?int $idProduit, ?string $nomProduit, ?string $descriptifProduit, ?string $photoProduit,?int $idProducteur, ?int $idCategorie)
    {
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
        $this->descriptifProduit = $descriptifProduit;
        $this->photoProduit = $photoProduit;
        $this->idProducteur = $idProducteur;
        $this->idCategorie = $idCategorie;

    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function setIdProduit(?int $idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(?string $nomProduit): void
    {
        $this->nomProduit = $nomProduit;
    }

    public function getDescriptifProduit(): ?string
    {
        return $this->descriptifProduit;
    }

    public function setDescriptifProduit(?string $descriptifProduit): void
    {
        $this->descriptifProduit = $descriptifProduit;
    }

    public function getPhotoProduit(): ?string
    {
        return $this->photoProduit;
    }

    public function setPhotoProduit(?string $photoProduit): void
    {
        $this->photoProduit = $photoProduit;
    }

    public function getIdProducteur(): ?int
    {
        return $this->idProducteur;
    }

    public function setIdProducteur(?int $idProducteur): void
    {
        $this->idProducteur = $idProducteur;
    }

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?int $idCategorie): void
    {
        $this->idCategorie = $idCategorie;
    }



}