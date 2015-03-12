<?php
namespace BackboneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
    public function indexAction() {
        return new JsonResponse(array('success' => 'yes!'));
    }
}