<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleCommandeRepository")
 */
class ArticleCommande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;



    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="articleCommande")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=true)

     */
    private $client;

    /**
     * @var Articles
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="articleCommande")
     * @ORM\JoinColumn(name="articles_id", referencedColumnName="id", nullable=true)
     */
    private $article;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }



    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Articles
     */
    public function getArticle(): Articles
    {
        return $this->article;
    }

    /**
     * @param Articles $article
     */
    public function setArticle(Articles $article): void
    {
        $this->article = $article;
    }


}
