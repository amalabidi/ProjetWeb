<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\JoinColumn(name="articles_id", referencedColumnName="id", nullable=true)
     * @ORM\Column(type="array")
     */
    private $articles=array() ;
    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="Commande")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=true)
     */
    private $client ;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

     /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @return bool
     */
    public function isEtat(): bool
    {
        return $this->etat;
    }

    /**
     * @param bool $etat
     */
    public function setEtat(bool $etat): void
    {
        $this->etat = $etat;
    }



    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
     * Commande constructor.
     */
    function __construct()
    {
        $this->date = new \DateTime();
        $this->etat=false;
    }

    /**
     * @return Articles
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param Articles $articles
     */
    public function setArticles($id,$quantity,ArticlesRepository $articlesRepository): void
    {

        $article=$articlesRepository->findby(array('id'=>$id));
        $this->articles[]=[
            'article'=>$article,
            'quantity'=>$quantity
        ] ;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }




    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;

    }
    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }


}
