<?php
// src/FormUserType.php
namespace App\Form;

use App\Entity\Client;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;

class Client2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Adresse_email', EmailType::class)
            ->add('numeroDeTelephone',TelType::class,array(
                'required' => true,
                'constraints' => [new Length(8)]
            ))
            ->add('adresse',TextType::class)
            ->add('codePostal',IntegerType::class,array(
                    'required' => true,
                    'constraints' => [new Length(4)]
                )
            )
            ->add('plainPassword', PasswordType::class



            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Client::class,
        ));
    }
}