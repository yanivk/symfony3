<?php

namespace YK\VideoBundle\Controller;

use AppBundle\Entity\GroupeVideos;
use AppBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class GroupeVideosController extends Controller
{
  public function addAction(Request $request){

              $groupeVideo = new GroupeVideos();

              // On crée le FormBuilder grâce au service form factory
              // On ajoute les champs de l'entité que l'on veut à notre formulaire
              $form = $this->createForm(\AppBundle\Form\GroupeVideosType::class, $groupeVideo);

              // Si la requête est en POST
              if ($request->isMethod('POST')) {
                // On fait le lien Requête <-> Formulaire
                // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
                $form->handleRequest($request);

                // On vérifie que les valeurs entrées sont correctes
                if ($form->isSubmitted() && $form->isValid()) {
                  // On enregistre notre objet $form dans la base de données.
                  $em = $this->getDoctrine()->getManager();
                  $em->persist($groupeVideo);
                  $em->flush();

                  $request->getSession()->getFlashBag()->add('notice', 'Video bien enregistrée.');

                  // On redirige vers la page de visualisation de l'entreprise nouvellement créée
                  return $this->redirectToRoute('yk_groupesVideos_show_all');
                 }
              }

              // À partir du formBuilder, on génère le formulaire

              // On passe la méthode createView() du formulaire à la vue
              // afin qu'elle puisse afficher le formulaire toute seule
              return $this->render('YKVideoBundle:Default:creationGroupeVideos.html.twig', array(
                'form' => $form->createView(),
              ));
          /*}*/

  }

  public function addVideoAction($id, Request $request){
      $groupeVideo = $this
      ->getDoctrine()
      ->getRepository('AppBundle:GroupeVideos')
      ->find($id)
      ;
      $video = new Video();
      $video->setGroupeVideos($groupeVideo);

      // On crée le FormBuilder grâce au service form factory
      // On ajoute les champs de l'entité que l'on veut à notre formulaire
      $form = $this->createForm(\AppBundle\Form\VideoType::class, $video);

      // Si la requête est en POST
      if ($request->isMethod('POST')) {
        // On fait le lien Requête <-> Formulaire
        // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
        $form->handleRequest($request);

        // On vérifie que les valeurs entrées sont correctes
        if ($form->isSubmitted() && $form->isValid()) {
          // On enregistre notre objet $form dans la base de données.
          $em = $this->getDoctrine()->getManager();

          $em->persist($video);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Video bien enregistrée.');

          // On redirige vers la page de visualisation de l'entreprise nouvellement créée
          return $this->redirectToRoute('yk_video_show_all');
         }
      }

      // À partir du formBuilder, on génère le formulaire

      // On passe la méthode createView() du formulaire à la vue
      // afin qu'elle puisse afficher le formulaire toute seule
      return $this->render('YKVideoBundle:Default:creationVideo.html.twig', array(
        'form' => $form->createView(),
      ));
  /*}*/

  }

  public function showAllAction(){
  $groupeVideo = $this
  ->getDoctrine()
  ->getRepository('AppBundle:GroupeVideos')
  ->findAll()
  ;

  if (!$groupeVideo){
      throw $this->createNotFoundException('Aucune video n\'existe');
  }

  return $this->render('YKVideoBundle:Default:listeGroupeVideos.html.twig',
          array('groupeVideos'  => $groupeVideo ));
  }

  public function showAction($id){
      $groupeVideo = $this
      ->getDoctrine()
      ->getRepository('AppBundle:GroupeVideos')
      ->find($id)
      ;
      $video = $this
      ->getDoctrine()
      ->getRepository('AppBundle:Video')
      ->find($groupeVideo->getId())
      ;

      if (!$groupeVideo){
          throw $this->createNotFoundException('Aucune  groupe video ne correspond a cette id');
      }

      return $this->render('YKVideoBundle:Default:GroupeVideo.html.twig',
              array('groupeVideos'  => $groupeVideo,
                    'video'  => $video, 
              ));
  }

}
