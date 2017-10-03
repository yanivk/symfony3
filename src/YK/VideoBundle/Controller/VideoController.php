<?php

namespace YK\VideoBundle\Controller;

use AppBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class VideoController extends Controller
{

  public function showAllAction(){
  $video = $this
  ->getDoctrine()
  ->getRepository('AppBundle:Video')
  ->findAll()
  ;

  if (!$video){
      throw $this->createNotFoundException('Aucune video n\'existe');
  }

  return $this->render('YKVideoBundle:Default:listeVideo.html.twig',
          array('video'  => $video ));
  }

  public function showAction($id){
      $video = $this
      ->getDoctrine()
      ->getRepository('AppBundle:Video')
      ->find($id)
      ;

      $groupevideo = $video->getGroupeVideos();

      if (!$video){
          throw $this->createNotFoundException('Aucune video ne correspond a cette id');
      }

      return $this->render('YKVideoBundle:Default:index.html.twig',
              array('video'  => $video,
              ));
  }

}
