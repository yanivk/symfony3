<?php

namespace YK\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKUsersBundle:Default:index.html.twig');
    }
}
