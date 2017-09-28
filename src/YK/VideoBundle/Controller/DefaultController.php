<?php

namespace YK\VideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKVideoBundle:Default:index.html.twig');
    }
}
