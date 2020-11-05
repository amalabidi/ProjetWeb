<?php
// src/FormUserType.php
namespace App\Form;

use App\Entity\Client;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Adresse_email', EmailType::class)
            ->add('username', TextType::class)
            ->add('numeroDeTelephone',TelType::class,[
                'required' => true,
                'constraints' => [new Length(8)]
            ])
            ->add('adresse')
            ->add('codePostal', IntegerType::class ,[
                'required' => true,
                'constraints' => [new Length(4)]
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe ','block_name'=>'mot de passe'),
                'second_options' => array('label' => 'Repeter le mot de passe ',"auto_initialize"=>'repeter'),
            ))
            ->add('valider',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Client::class,
        ));
    }
}