<?php
// src/Entity/User.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity
 * @UniqueEntity(fields="adresse_email", message="Mail déjà existant")
 * @UniqueEntity(fields="username", message="Nom d\'utilisateur déjà existant")
 */
class Client implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $adresse_email;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     * @ORM\Column(type="string", length=64)

     */
    private $password;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_de_telephone;
    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeTelephone()
    {
        return $this->Numero_de_telephone;
    }

    /**
     * @param mixed $Numero_de_telephone
     */
    public function setNumeroDeTelephone($Numero_de_telephone): void
    {
        $this->Numero_de_telephone = $Numero_de_telephone;
    }



    /**
     * @return mixed
     */


    public function __construct() {
        $this->roles = array('ROLE_USER');
    }

    /**
     * @return mixed
     */
    public function getAdresseEmail()
    {
        return $this->adresse_email;
    }

    /**
     * @param mixed $adresse_email
     */
    public function setAdresseEmail($adresse_email): void
    {
        $this->adresse_email = $adresse_email;
    }
    // other properties and methods

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You may need a real salt if you choose a different encoder.
        return null;
    }
    public function getRoles()
    {
        return $this->roles;
    }
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
    public function eraseCredentials()
    {
    }

}