<?php

namespace App\Entity;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 * @Vich\Uploadable()
 */
class Articles
{

    const CATEGORIE = [
        'Pâtisserie traditionnelle' => 'Pâtisserie traditionnelle',
        'Gâteau fête' => 'Gâteau fête',
        'Petit gâteau' => 'Petit gâteau',
        'Coffret' => 'Coffret',
        'Bouchée traditionnelle' => 'Bouchée traditionnelle',
        'Bouchée froide' => 'Bouchées froides',
        'Bouchée chaude' => 'Bouchée chaude',
        'Brochette' => 'Brochette'
    ];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="article_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;




    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
       $this->image=$this->imageFile->getFilename();

    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    public function getSlug(): string {

        return (new Slugify())->slugify($this->nom);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }
    public function getFormattedPrix() : string {
        return number_format($this->prix, 3,'.',' ');
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }









}
