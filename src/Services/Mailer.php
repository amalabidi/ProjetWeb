<?php
namespace App\Services;

use Twig\Environment;
class Mailer{
    private $mailer;
    private $sender;
    private $templating;
    public function __construct(\Swift_Mailer $mailer,Environment $templating,$sender)
    {
        $this->mailer=$mailer;
        $this->sender=$sender;
        $this->templating = $templating;
    }
    public function sendMail($receiver,$view,$subject,$data){
        $message = (new \Swift_Message($subject))
            ->setFrom($this->sender)
            ->setTo($receiver)
            ->setBody(
                $this->templating->render(
               $view,array('data'=> $data)
            ), 'text/html'
            );

       $this->mailer->send($message);
        return true;
    }
}
?>