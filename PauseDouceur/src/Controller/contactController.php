<?php


namespace App\Controller;
use App\Entity\Contact;
use App\Services\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormView;


class contactController extends AbstractController{
     /**
      * @Route("/contact",name="contact.index")
      */
     public  function index(Request $request,Mailer $mailer,EntityManagerInterface $entityManager){

         $contact=new Contact();
         // 1) build the form
         $myform=$this->createForm(ContactType::class,$contact);

         // 2) handle the submit (will only happen on POST)
         $myform->handleRequest($request);

         if($myform->isSubmitted() and  $myform->isValid()){

             $entityManager->persist($contact);
             $entityManager->flush();

             //send an email
             $mailer->sendMail('bghanem.chaima@gmail.com',
                 'Email/emailContact.html.twig',
                 $contact->getSujet(),$contact);

             return $this->redirectToRoute('Home.index');
         }

         return $this->render('page/contact.html.twig',array(
             'form' => $myform->createView(),
             'current_menu'=> 'contact'
         ));
     }
 }
 ?>