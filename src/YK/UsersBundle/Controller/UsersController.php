<?php

namespace YK\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
  public function contactAction(Request $request)
      {
          // Create the form according to the FormType created previously.
          // And give the proper parameters
          $form = $this->createForm('\AppBundle\Form\ContactType',null,array(
              // To set the action use $this->generateUrl('route_identifier')
              'action' => $this->generateUrl('yk_users_contact'),
              'method' => 'POST'
          ));

          if ($request->isMethod('POST')) {
              // Refill the fields in case the form is not valid.
              $form->handleRequest($request);

              if($form->isValid()){
                  // Send mail
                  if($this->sendEmail($form->getData())){

                      // Everything OK, redirect to wherever you want ! :

                      return $this->redirectToRoute('redirect_to_somewhere_now');
                  }else{
                      // An error ocurred, handle
                      var_dump("Errooooor :(");
                  }
              }
          }

          return $this->render('YKUsersBundle:Default:contact.html.twig', array(
              'form' => $form->createView()
          ));
      }

      public static function sendEmailActio()
      {
        $from = new SendGrid\Email("Example User", "contact@yanivkoubbi.fr");
        $subject = "Sending with SendGrid is Fun";
        $to = new SendGrid\Email("Example User", "test@example.com");
        $content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        print_r($response->headers());
        echo $response->body();
      }
}
