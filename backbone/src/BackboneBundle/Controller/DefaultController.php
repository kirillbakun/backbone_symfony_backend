<?php

namespace BackboneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BackboneBundle:Default:index.html.twig', array('name' => $name));
    }
}
