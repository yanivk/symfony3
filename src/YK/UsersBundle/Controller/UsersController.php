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
<<<<<<< HEAD
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
=======
        // verify we have username/password to send out emails - IMPORTANT
        if (!sfconfig::has('app_sendgrid_username') or !sfconfig::has('app_sendgrid_password')) {
            throw new sfException('SMTP username/password is required to send email out');
        }
        $text = null;
        $html = null;
        if (is_array($partials)) {
            // load libraries
            sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
            if (isset($partials['text'])) {
                $text = get_partial($partials['text'], $parameters);
            }
            if (isset($partials['html'])) {
                $html = get_partial($partials['html'], $parameters);
            }
        }

        if ($text === null && $html === null) {
            throw new sfException('A text and/or HTML partial must be given');
        }

        try {
            /*
             * Load connection for mailer
             */
            $connection = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 465, 'ssl')->setUsername(sfconfig::get('app_sendgrid_username'))->setPassword(sfconfig::get('app_sendgrid_password'));

            // setup connection/content
            $mailer  = Swift_Mailer::newInstance($connection);
            $message = Swift_Message::newInstance()->setSubject($subject)->setTo($mailTo);

            if ($text && $html) {
                $message->setBody($html, 'text/html');
                $message->addPart($text, 'text/plain');
            } else if ($text) {
                $message->setBody($text, 'text/plain');
            } else {
                $message->setBody($html, 'text/html');
            }

            // if contains SMTPAPI header add it
            if (null !== $sgHeaders) {
                $message->getHeaders()->addTextHeader('X-SMTPAPI', json_encode($sgHeaders));
            }

            // update the from address line to include an actual name
            if (is_array($mailFrom) and count($mailFrom) == 2) {
                $mailFrom = array(
                    $mailFrom['email'] => $mailFrom['name']
                );
            }

            // add attachments to email
            if ($attachments !== null and is_array($attachments)) {
                foreach ($attachments as $attachment) {
                    $attach = Swift_Attachment::fromPath($attachment['file'], $attachment['mime'])->setFilename($attachment['filename']);
                    $message->attach($attach);
                }
            }

            // Send
            $message->setFrom($mailFrom);
            $mailer->send($message);
        }
        catch (Exception $e) {
            throw new sfException('Error sending email out - ' . $e->getMessage());
        }
    }

    public function indexAction($name ="toto", \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('contact@yanivkoubbi.fr')
            ->setTo('yanivkoubbi@gmail.com')
            ->setBody(
                $this->renderView(
                    'YKUsersBundle:Default:email.txt.twig',
                    array('name' => $name)
                )
            )
        ;
        $mailer->send($message);

        return $this->render('YKUsersBundle:Default:index.html.twig');
    }
>>>>>>> 8ad394b0b7dc955825b0d38ca383af8ce0623624
}
