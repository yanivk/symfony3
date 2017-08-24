<?php

namespace YK\CompetencesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKCompetencesBundle:Default:index.html.twig');
    }
}
