<?php

namespace YK\ProjetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKProjetsBundle:Default:index.html.twig');
    }
}
