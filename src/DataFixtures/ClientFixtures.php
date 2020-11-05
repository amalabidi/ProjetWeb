<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setUsername('admin');
        $client->setPassword($this->encoder->encodePassword($client,'admin'));
        $client->setAdresseEmail('chaimabenghanem@yahoo.fr');
        $client->setAdresse('La Marsa');
        $client->setCodePostal(2070);
        $client->setNumeroDeTelephone(54565507);
        $client->setRoles(['ROLE_ADMIN']);
        $manager->persist($client);
        $manager->flush();
    }
}